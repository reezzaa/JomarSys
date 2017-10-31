<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\carbon;
use App\CompanyClient;
use App\IndividualClient;
use App\Contract;

class QueriesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $clients = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.strCompClientName','tblClient.strClientID')
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get();
        $indclients = IndividualClient::join('tblClient', 'tblIndividualClient.strIndClientID', '=', 'tblClient.strClientID')
            ->select('tblIndividualClient.*','tblClient.strClientID')
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get();
        $getProj = DB::table('tblContract')
            ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
            ->select('tblContract.strContractID','tblQuoteHeader.strQuoteName')
            // ->where('tblContract.status'1)
            ->where('tblQuoteHeader.status',2)
            ->get();
        $getProji = DB::table('tblQuoteHeader')
            ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
            ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
            ->select('tblQuoteHeader.strQuoteID','tblQuoteHeader.strQuoteName')
            ->where('tblQuoteHeader.status','!=',0)
            ->get();
            // dd($getProj);


        return view('layouts.queries.Invoice.index',['clients'=>$clients,'indclients'=>$indclients,'getProj'=>$getProj,'getProji'=>$getProji]);

    }
     public function readByAjax()
    {
         $inv =  DB::table('tblServiceInvoiceHeader')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        // ->where('tblContract.status','!=',3)
        ->get();

        return view('layouts.queries.Invoice.table',['inv'=>$inv]);
    }
    public function findClient($id)
    {
        $cli = DB::table('tblClient')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
        ->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')

        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        // ->where('tblContract.todelete',1)
        ->where('tblClient.strClientID',$id)
        ->get();
        $clie = DB::table('tblClient')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')

        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        ->where('tblClient.strClientID',$id)
        ->get();

       if(count($cli)==0)
       {
        return view('layouts.queries.Invoice.table7',['clie'=>$clie]);

       }
       else
       {
        return view('layouts.queries.Invoice.table2',['cli'=>$cli]);

       }

        


    }

    public function readByAjax2()
    {
        $invp = DB::table('tblContract')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        ->where('tblServiceInvoiceHeader.status',1)
        // ->where('tblContract.status','!=',3)
        ->get();

        $invp2 = DB::table('tblQuoteHeader')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        ->where('tblServiceInvoiceHeader.status',1)
        // ->where('tblContract.status','!=',3)
        ->get();
        
        return view('layouts.queries.Invoice.table3',['invp'=>$invp,'invp2'=>$invp2]);

        
    }
    public function readByAjax3()
    {
        $invu = DB::table('tblContract')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')

        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        // ->where('tblContract.todelete',1)
        ->where('tblServiceInvoiceHeader.status',0)
        // ->where('tblContract.status','!=',3)
        ->get();
        $invu2 = DB::table('tblQuoteHeader')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')

        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        // ->where('tblContract.todelete',1)
        ->where('tblServiceInvoiceHeader.status',0)
        // ->where('tblContract.status','!=',3)
        ->get();

        return view('layouts.queries.Invoice.table4',['invu'=>$invu,'invu2'=>$invu2]);


    }
    public function findQProj($id)
    {
        $qproj = DB::table('tblContract')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        ->where('tblContract.strContractID',$id)
        // ->where('tblContract.status','!=',3)
        ->get();
        $qproj2= DB::table('tblQuoteHeader')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        ->where('tblQuoteHeader.strQuoteID',$id)
        // ->where('tblContract.status','!=',3)
        ->get();
        
        if(count($qproj)==0)
        {
        return view('layouts.queries.Invoice.table8',['qproj2'=>$qproj2]);

        }
        else
        {
        return view('layouts.queries.Invoice.table5',['qproj'=>$qproj]);

        }

        

    }
    public function findIStartDate($id)
    {
        $sdate = DB::table('tblServiceInvoiceHeader')
        ->leftjoin('tblContract','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->leftjoin('tblQuoteHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')

        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')

        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        ->where('tblServiceInvoiceHeader.datServInvHDate',$id)
        ->get();

        return view('layouts.queries.Invoice.table6',['sdate'=>$sdate]);

    }


}
