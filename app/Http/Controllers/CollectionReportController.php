<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use Carbon\Carbon;

class CollectionReportController extends Controller
{
    //
    public function index()
    {
        return view('layouts.reports.collection.index');

    }
    public function collection_report(Request $request)
    {
    	$from=$request->datStart;
        $to=$request->datEnd;
        $null='';
        $company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();

        $proj = DB::table('tblServiceInvoiceHeader')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceHeader.strServInvHID','tblServiceInvoiceDetail.strServInvHDID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblServiceInvoiceDetail.*','tblPayment.*')
        ->whereBetween('tblServiceInvoiceHeader.datServInvHDate',[$request->datStart,$request->datEnd])
        ->get();

        $total = DB::table('tblServiceInvoiceHeader')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceHeader.strServInvHID','tblServiceInvoiceDetail.strServInvHDID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->whereBetween('tblServiceInvoiceHeader.datServInvHDate',[$request->datStart,$request->datEnd])
        ->sum('tblPayment.dblPaymentCost');


        $table=DB::table('tblContract')
            // ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
  			// ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strContractID')
            // ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
            // ->leftjoin('tblCO','tblCO.strCOContractID','tblContract.strContractID')
  			// ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
  			// ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->join('tblRetention','tblRetention.intRetID','tblProgressBill.intPBRetID')
            ->join('tblRecoupment','tblRecoupment.intRecID','tblProgressBill.intPBRecID')
            ->join('tblTax','tblTax.intTaxID','tblProgressBill.intPBTaxID')
            ->join('tblGetAmount','tblGetAmount.PB_id','tblProgressBill.intPBID')
            ->select('tblContract.*','tblProgressBill.*','tblProgressBill.status as pbstatus','tblRetention.*','tblRecoupment.*','tblGetAmount.*'/*'tblCompanyClient.*',*//*'tblQuoteHeader.*'*//*,'tblQuoteConDetail.*'*//*,'tblServiceInvoiceHeader.*'*/)
            // ->where('tblContract.strContractID',$request->project)
            // ->orderby('tblProgressBill.intPBValue','ASC')
            ->get();
            // dd($table);

         $showDown=DB::table('tblContract')
            ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
            ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
            ->leftjoin('tblCO','tblCO.strCOContractID','tblContract.strContractID')
            ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
            ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
            // ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
            ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
            ->join('tblTax','tblTax.intTaxID','tblDownP.intDPTaxID')
            ->join('tblGetDP','tblGetDP.DownP_id','tblDownP.id')
            ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
            ->select('tblDownP.*','tblDownP.status as downstatus','tblDownpayment.*','tblContract.*','tblGetDP.*','tblQuoteConDetail.*','tblCompanyClient.*','tblQuoteHeader.*','tblServiceInvoiceHeader.strServInvHID','tblCO.*')
            // ->where('tblContract.strContractID',$request->project)
            ->get();
            // dd($showDown);

        //  $getdata = DB::table('tblQuoteHeader')
        // ->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        // ->leftjoin('tblPO','tblPO.strQuoteID','tblQuoteHeader.strQuoteID')
        // ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        // ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        // ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        // ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        // // ->join('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        // ->select('tblServiceInvoiceHeader.*','tblQuoteIndDetail.*','tblIndividualClient.*','tblServiceInvoiceHeader.status as serstatus','tblQuoteHeader.*','tblServiceInvoiceDetail.*','tblPO.*')
        // // ->where('tblQuoteHeader.strQuoteID',$request->project)
        // ->get();
        // // dd($getdata);
        // foreach ($getdata as $g) {
        // 	 $g->dblProjCost=number_format($g->dblProjCost,2);
        //     $g->initialtax=number_format($g->initialtax,2);
        //     $g->taxValue=number_format($g->taxValue,2);
        // }
           

            foreach ($showDown as $s) {
            	$s->dcmDPAmount=number_format($s->dcmDPAmount,2);
            $s->initialtax=number_format($s->initialtax,2);
            $s->taxValue=number_format($s->taxValue,2);
            }

          foreach ($proj as $key) {
            $key->dblServInvDCost=number_format($key->dblServInvDCost,2);
            $key->dblPaymentCost=number_format($key->dblPaymentCost,2);


          }
        foreach ($table as $t) 
        {
            $t->initial=number_format($t->initial,2);
            $t->recValue=number_format($t->recValue,2);
            $t->retValue=number_format($t->retValue,2);
            $t->dblPBAmount=number_format($t->dblPBAmount,2);
            $t->initialtax=number_format($t->initialtax,2);
            $t->taxValue=number_format($t->taxValue,2);

        }

        $pdf = PDF::loadView('layouts.reports.collection.collection',compact('showDown','table','company','proj'/*,'getdata'*/,'from','to','null','total'))->setPaper('legal','landscape');      
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream(); //pang stream as in sa buong page is pdf lang
    }
}
