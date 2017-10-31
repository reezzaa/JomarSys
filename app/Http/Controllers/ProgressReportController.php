<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use Carbon\Carbon;


class ProgressReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('layouts.reports.progress.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function findByCompClient()
    {
        $clients = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->select('tblContract.strContractID','tblQuoteHeader.strQuoteName')
        ->where('tblContract.status','!=',0)
        ->where('tblContract.status','!=',2)
        ->get();
        return Response($clients);
    }
    public function findByIndClient()
    {
        $indclients = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->select('tblQuoteHeader.strQuoteID','tblQuoteHeader.strQuoteName')
        ->where('tblQuoteHeader.status','!=',0)
        ->where('tblQuoteHeader.status','!=',1)
        ->get();
        return Response($indclients);
    }

    public function progress_report(Request $request)
    {
        //
        $company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();
        // $fetch = DB::table('tblProgressHeader')
        // ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        // ->leftjoin('tblProgressDetailActual','tblProgressDetailActual.intProgDAProgDID','tblProgressDetailTarget.intProgID')
        // ->join('tblQuoteDetail','tblQuoteDetail.intQDID','tblProgressDetailTarget.intProgDPSID')
        // ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        // ->join('tblContract','tblContract.strContractID','tblProgressHeader.strProgHProjID')
        // ->select('tblProgressDetailTarget.*','tblServicesOffered.strServiceOffName','tblProgressDetailTarget.txtProgDActivity','tblProgressDetailTarget.dblProgDTargPercent','tblProgressDetailActual.dblProgActualPercent','tblProgressHeader.dblProgOverall','tblProgressDetailTarget.intProgDProgHID','tblProgressDetailTarget.status','tblQuoteDetail.intQDID','tblProgressDetailTarget.datProgDTargEndDate')
        // // ->where('tblServicesOffered.status',1)
        // // ->where('tblServicesOffered.todelete',1)
        //  ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intProgDAProgDID=tblProgressDetailTarget.intProgID)')
        //  ->where('tblProgressDetailTarget.status',"!=",0)
        //  ->where('tblProgressHeader.strProgHProjID',$request->project)
        //  ->orderby('tblProgressDetailTarget.intProgID','asc')
        // ->get();
        // // dd($fetch);
        $fetch = DB::table('tblQuoteDetail')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblQuoteDetail.strQHID')
        ->join('tblProgressDetailActual','tblProgressDetailActual.intQDID','tblQuoteDetail.intQDID')
        // ->join('tblQuoteDetail','tblQuoteDetail.intQDID','tblProgressDetailTarget.intProgDPSID')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteDetail.*','tblServicesOffered.strServiceOffName','tblContract.dblProgOverall','tblQuoteDetail.intQDID','tblQuoteDetail.status as qstatus','tblProgressDetailActual.intQDID as intProgID','tblProgressDetailActual.*')
        ->where('tblServicesOffered.status',1)
        ->where('tblServicesOffered.todelete',1)
         ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intQDID=tblQuoteDetail.intQDID)')
         // ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblContract.strContractID',$request->project)
         // ->orderby('tbl.intProgID','asc')
        ->get();
         $progd = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
        // ->join('tblProgressHeader','tblProgressHeader.strProgHProjID','tblContract.strContractID')
        ->select('tblContract.strContractID','tblQuoteHeader.strQuoteName','tblCompanyClient.strCompClientName','tblContract.status','tblQuoteConDetail.*')
        // ->where('tblContract.todelete',1)
        // ->where('tblClient.todelete',1)
        // ->where('tblContract.status',1)
        ->where('tblContract.strContractID',$request->project)
        ->first();
        // dd($progd);
         $coun = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblProgressDetailActual','tblProgressDetailActual.intQDID','tblQuoteDetail.intQDID')
        ->select('tblProgressDetailActual.dblProgActualPercent')
        ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intQDID=tblQuoteDetail.intQDID)')
         // ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblContract.strContractID',$request->project)
        // ->select( DB::raw("AVG(tblprogressdetailactual.dblProgActualPercent)"))
         ->count();

        $showOverall = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblProgressDetailActual','tblProgressDetailActual.intQDID','tblQuoteDetail.intQDID')
        ->select('tblProgressDetailActual.dblProgActualPercent')
        ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intQDID=tblQuoteDetail.intQDID)')
         // ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblContract.strContractID',$request->project)
        // ->select( DB::raw("AVG(tblprogressdetailactual.dblProgActualPercent)"))
         ->get();
         // dd($showOverall);
         $overall=0;
         foreach ($showOverall as $key) {
            $overall+=$key->dblProgActualPercent;
         }
        $overall = $overall/$coun;
        // foreach()
            // $showOverall=number_format($showOverall,2);
         // dd($showOverall);

        //  $prog = DB::table('tblQuoteHeader')
        // ->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        // ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        // ->join('tblIndividualClient', 'tblIndividualClient.strIndClientID', 'tblClient.strClientID')
        // ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        // ->select('tblQuoteHeader.strQuoteID','tblQuoteHeader.strQuoteName','tblIndividualClient.*','tblQuoteHeader.status','tblQuoteIndDetail.*','tblProgressHeader.intProgHID')
        // ->where('tblQuoteHeader.status','!=',1)
        // ->where('tblQuoteHeader.status','!=',0)
        // ->where('tblQuoteHeader.strQuoteID',$request->project)
        // ->first();
        //  $fetch2 = DB::table('tblProgressHeader')
        // ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        // ->leftjoin('tblProgressDetailActual','tblProgressDetailActual.intProgDAProgDID','tblProgressDetailTarget.intProgID')
        // ->join('tblQuoteDetail','tblQuoteDetail.intQDID','tblProgressDetailTarget.intProgDPSID')
        // ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        // ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblProgressHeader.strQuoteID')
        // // ->join('tblQuoteHeader','tblQuoteHeader.strContractID','tblProgressHeader.strQuoteID')
        // ->select('tblProgressDetailTarget.intProgID','tblServicesOffered.strServiceOffName','tblProgressDetailTarget.txtProgDActivity','tblProgressDetailTarget.*','tblProgressDetailActual.dblProgActualPercent','tblProgressHeader.dblProgOverall','tblProgressDetailTarget.intProgDProgHID','tblProgressDetailTarget.status','tblQuoteDetail.intQDID','tblProgressDetailTarget.datProgDTargEndDate')
        //  ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intProgDAProgDID=tblProgressDetailTarget.intProgID)')
        //  ->where('tblProgressDetailTarget.status',"!=",0)
        //  ->where('tblProgressHeader.strQuoteID',$request->project)
        //  ->orderby('tblProgressDetailTarget.intProgID','asc')
        // ->get();
        // $showOverall2 = DB::table('tblQuoteHeader')
        // ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        // ->leftjoin('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        // ->leftjoin('tblProgressDetailActual','tblProgressDetailActual.intProgDAProgDID','tblProgressDetailTarget.intProgID')
        // ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intProgDAProgDID=tblProgressDetailTarget.intProgID)')
        //  ->where('tblProgressDetailTarget.status',"!=",0)
        //  ->where('tblQuoteHeader.strQuoteID',$request->project)
        // // ->select( DB::raw("AVG(tblprogressdetailactual.dblProgActualPercent)"))
        //  ->avg('dblProgActualPercent');
        //     $showOverall2=number_format($showOverall2,2);


        //  if(count($fetch)==0)
        //  {
        // $pdf = PDF::loadView('layouts.reports.progress.indprogress',compact('fetch2','company','prog','showOverall2'));
        //  }
        //  else
        //  {
        $pdf = PDF::loadView('layouts.reports.progress.progress',compact('fetch','company','progd','overall'));

         // }

        
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream();
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
