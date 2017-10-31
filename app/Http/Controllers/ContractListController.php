<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use DB;

class ContractListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function index()
    {
        return view('layouts.transact.contract.index',['contracts'=> $contracts=DB::table('tblContract')
            ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
            ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
            ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
            ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
            ->select('tblContract.*','tblCompanyClient.strCompClientName','tblQuoteHeader.strQuoteName','tblQuoteConDetail.*')
            ->where('tblContract.todelete','=',1)
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get()]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function turnover($id)
    {
        //


        return view('layouts.transact.contract.turnover',['myId'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $fetch = DB::table('tblProgressHeader')
        // ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        // ->leftjoin('tblProgressDetailActual','tblProgressDetailActual.intProgDAProgDID','tblProgressDetailTarget.intProgID')
        // ->join('tblQuoteDetail','tblQuoteDetail.intQDID','tblProgressDetailTarget.intProgDPSID')
        // ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        // ->join('tblContract','tblContract.strContractID','tblProgressHeader.strProgHProjID')
        // ->select('tblProgressDetailTarget.*','tblServicesOffered.strServiceOffName','tblProgressDetailTarget.txtProgDActivity','tblProgressDetailTarget.dblProgDTargPercent','tblProgressDetailActual.dblProgActualPercent','tblProgressHeader.dblProgOverall','tblProgressDetailTarget.intProgDProgHID','tblProgressDetailTarget.status','tblQuoteDetail.intQDID','tblProgressDetailTarget.datProgDTargEndDate')
        // ->where('tblServicesOffered.status',1)
        // ->where('tblServicesOffered.todelete',1)
        //  ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intProgDAProgDID=tblProgressDetailTarget.intProgID)')
        //  ->where('tblProgressDetailTarget.status',"!=",0)
        //  ->where('tblProgressHeader.strProgHProjID',$id)
        //  ->orderby('tblProgressDetailTarget.intProgID','asc')
        // ->get();

       
            // dd($f->intProgDProgHID);

        // dd($viewwork);

        $getdata = DB::table('tblContract')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*')
        ->where('tblContract.todelete',1)
        ->where('tblContract.strContractID',$id)
        ->get();


        $table=DB::table('tblContract')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->select('tblProgressBill.*')
            ->where('tblContract.strContractID',$id)
            ->where('tblContract.todelete','=',1)
            ->orderby('tblProgressBill.intPBValue','ASC')
            ->get();

         $showDown=DB::table('tblContract')
            ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
            ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
            ->select('tblDownP.*','tblDownP.status as downstatus','tblDownpayment.*')
            ->where('tblContract.strContractID',$id)
            ->where('tblContract.todelete','=',1)
            ->first();

         $var=DB::table('tblContract')
            ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
            ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
            ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
            ->select('tblContract.*','tblCompanyClient.*','tblQuoteHeader.*')
            ->where('tblContract.strContractID',$id)
            ->where('tblContract.todelete','=',1)
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get();

        $thisvar=DB::table('tblContract')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
            ->select('tblContract.*','tblProgressBill.*')
            ->where('tblContract.strContractID',$id)
            ->where('tblContract.todelete','=',1)
            ->orderby('tblProgressBill.intPBValue','ASC')
            ->get();    
        $delitable = DB::table('tblContract') 
        ->join('tblDeliveryHeader','tblDeliveryHeader.strDeliveryHProjID','tblContract.strContractID')
        ->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->select('tblQuoteHeader.strQuoteName','tblDeliveryHeader.*','tblEmployee.*')
        ->where('tblContract.todelete',1)
        ->where('tblDeliveryHeader.todelete',1)
        ->where('tblDeliveryHeader.strDeliveryHProjID',$id)
        ->get();

        $showDown->dcmDPAmount=number_format($showDown->dcmDPAmount,2);
        foreach ($table as $t) 
        {
            $t->dblPBAmount=number_format($t->dblPBAmount,2);
        }
        foreach ($getdata as $ge) 
        {
            $ge->dblPaymentCost=number_format($ge->dblPaymentCost,2);
            $ge->dblPaymentChange=number_format($ge->dblPaymentChange,2);

        }

            // dd($thisvar);
        return view('layouts.transact.contract.show',['var'=> $var,'thisvar'=>$thisvar,'table'=>$table,'showDown'=>$showDown,'getdata'=>$getdata,'delitable'=>$delitable]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
