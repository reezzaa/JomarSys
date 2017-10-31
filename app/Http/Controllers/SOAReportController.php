<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use Carbon\Carbon;
use App\CompanyClient;

class SOAReportController extends Controller
{
    //
    public function index()
    {
    	$clients = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.strCompClientName','tblClient.strClientID')
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get();
            	  	

    	return view('layouts.reports.soa.index',compact('clients','indclients'));
    }
    public function soa(Request $request)
    {
    	$company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();

    	$client=DB::table('tblClient')
    	->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
    	->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblCompanyClient.*','tblQuoteHeader.*')
    	->where('tblClient.strClientID',$request->client)
    	->first();

    

    	$soa=DB::table('tblServiceInvoiceHeader')
    	->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
    	->join('tblContract','tblContract.strContractID','tblServiceInvoiceHeader.strServInvHProjID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
    	->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
    	->select('tblServiceInvoiceHeader.*','tblContract.*','tblQuoteHeader.*','tblServiceInvoiceHeader.status as serstatus','tblServiceInvoiceDetail.*','tblPayment.*')
    	->where('tblClient.strClientID',$request->client)
    	->get();


        	foreach ($soa as $soa1) {
            $soa1->dblServInvDCost=number_format($soa1->dblServInvDCost,2);
        		
        	}

        $pdf = PDF::loadView('layouts.reports.soa.compsoa',compact('client','soa','company'))->setPaper('letter','landscape');      
        
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream(); //pang stream as in sa buong page is pdf lang

    }
}
