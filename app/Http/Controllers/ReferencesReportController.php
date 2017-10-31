<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use Carbon\Carbon;
use App\CompanyClient;
use App\IndividualClient;

class ReferencesReportController extends Controller
{
    //

    public function index()
    {
    	 $clients = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.strCompClientName','tblClient.strClientID')
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get();

    	  	

    	return view('layouts.reports.references.index',compact('getProj','getIndProj','clients'));
    }
    public function references(Request $request)
    {
    	$company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();

        $var = DB::table('tblContract')
        ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->select('tblServiceInvoiceHeader.*','tblContract.strContractID')
        ->where('tblContract.strContractID',$request->project)
        // ->orderby('tblServiceInvoiceHeader.strServInvHID','asc')
        ->get();
        // dd($var);



    	$table=DB::table('tblContract')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->join('tblRetention','tblRetention.intRetID','tblProgressBill.intPBRetID')
            ->join('tblRecoupment','tblRecoupment.intRecID','tblProgressBill.intPBRecID')
            ->join('tblTax','tblTax.intTaxID','tblProgressBill.intPBTaxID')
            ->join('tblGetAmount','tblGetAmount.PB_id','tblProgressBill.intPBID')
            ->select('tblContract.*','tblProgressBill.*','tblProgressBill.status as pbstatus','tblRetention.*','tblRecoupment.*','tblGetAmount.*')
            ->where('tblContract.strContractID',$request->project)
            // ->where('tblContract.todelete','=',1)
            ->orderby('tblProgressBill.intPBValue','ASC')
            ->get();

         $showDown=DB::table('tblContract')
            ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
            ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
            ->leftjoin('tblCO','tblCO.strCOContractID','tblContract.strContractID')
            ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
            ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
            ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
            ->join('tblTax','tblTax.intTaxID','tblDownP.intDPTaxID')
            ->join('tblGetDP','tblGetDP.DownP_id','tblDownP.id')
            ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
            ->select('tblDownP.*','tblDownP.status as downstatus','tblDownpayment.*','tblContract.*','tblGetDP.*','tblQuoteConDetail.*','tblCompanyClient.*','tblQuoteHeader.*','tblServiceInvoiceHeader.strServInvHID','tblCO.*')
            ->where('tblContract.strContractID',$request->project)
            // ->where('tblContract.todelete','=',1)
            // ->where('tblDownP.status',0)
            ->first();
            // dd($showDown);

  
      

        	 
        $showDown->dblProjCost=number_format($showDown->dblProjCost,2);
            $showDown->dcmDPAmount=number_format($showDown->dcmDPAmount,2);
            $showDown->initialtax=number_format($showDown->initialtax,2);
            $showDown->taxValue=number_format($showDown->taxValue,2);

        foreach ($table as $t) 
        {
            $t->initial=number_format($t->initial,2);
            $t->recValue=number_format($t->recValue,2);
            $t->retValue=number_format($t->retValue,2);
            $t->dblPBAmount=number_format($t->dblPBAmount,2);
            $t->initialtax=number_format($t->initialtax,2);
            $t->taxValue=number_format($t->taxValue,2);

        }
        $pdf = PDF::loadView('layouts.reports.references.compref',compact('showDown','table','company','var'))->setPaper('letter','landscape');      
        
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream(); //pang stream as in sa buong page is pdf lang
    }
    public function findByRepClient($id)
    {
    	$getProj=DB::table('tblQuoteHeader')
    	->join('tblContract','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
		->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
		->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
		->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
		->select('tblQuoteHeader.*','tblContract.strContractID as id')
		// ->where('tblQuoteHeader.status','!=',0)
		->where('tblClient.strClientID',$id)
		->get();  
		// dd($getProj);
		
		
			return Response($getProj);
		

    }
}
