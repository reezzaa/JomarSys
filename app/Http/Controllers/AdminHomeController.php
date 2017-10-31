<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Employee;
use App\ServicesOffered;
use App\DeliveryTruck;
use App\Client;
use App\Contract;
use App\IndividualClient;
use App\CompanyClient;
use Response;
use DB;
use Carbon\Carbon;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();

        $compctr=DB::table('tblClient')
        ->join('tblCompanyClient','tblClient.strClientID','tblCompanyClient.strCompClientID')
        ->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
        ->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
        ->groupby('tblCompanyClient.strCompClientID','tblCompanyClient.strCompClientName')
        ->select(DB::raw('distinct strCompClientID'),'tblCompanyClient.strCompClientName',DB::raw('COUNT(tblContract.strContractID) as ctr'))
        ->orderby('ctr','desc')
        ->limit(5)
        ->get();

        $indctr=DB::table('tblClient')
        ->join('tblIndividualClient','tblClient.strClientID','tblIndividualClient.strIndClientID')
        ->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
        ->groupby('tblIndividualClient.strIndClientID','tblIndividualClient.strIndClientFName','tblIndividualClient.strIndClientLName')
        ->select(DB::raw('distinct strIndClientID'),'tblIndividualClient.strIndClientFName','tblIndividualClient.strIndClientLName',DB::raw('COUNT(tblQuoteHeader.strQuoteID) as ctr'))
        ->orderby('ctr','desc')
        ->limit(5)
        ->where('tblQuoteHeader.status',"!=",0)
        ->where('tblQuoteHeader.status',"!=",1)
        ->get();

        $indclients = IndividualClient::join('tblClient', 'tblIndividualClient.strIndClientID', '=', 'tblClient.strClientID')
            ->select('tblIndividualClient.*','tblClient.strClientType')
            ->where('tblClient.todelete','=',1)
            ->count();

         $compclients = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.*','tblClient.strClientType')
            ->where('tblClient.todelete','=',1)
            ->count();
        $deli = DB::table('tblDeliveryHeader')
        ->where('tblDeliveryHeader.status',2)
        ->count('tblDeliveryHeader.strDeliveryHID');

        $compproj = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->select('tblQuoteHeader.strQuoteName','tblContract.strContractID')
        ->where('tblContract.status',1)
        ->get();

        // $indproj = DB::table('tblQuoteHeader')
        // ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        // ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        // ->select('tblQuoteHeader.strQuoteID','tblQuoteHeader.strQuoteName')
        // ->where('tblQuoteHeader.status','!=',0)
        // ->where('tblQuoteHeader.status','!=',3)
        // ->get();

        $compbill = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->where('tblContract.status',"!=",3)
        ->where('tblServiceInvoiceHeader.status',0)
        ->select('tblServiceInvoiceHeader.strServInvHID','tblQuoteHeader.strQuoteName','tblServiceInvoiceHeader.datServInvHDate','tblContract.strContractID')
        ->get();

        // $indbill = DB::table('tblServiceInvoiceHeader')
        // ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblServiceInvoiceHeader.strQuoteID')
        // ->where('tblQuoteHeader.status','=',1)
        // ->where('tblServiceInvoiceHeader.status',0)
        // ->select('tblServiceInvoiceHeader.strServInvHID','tblQuoteHeader.strQuoteName','tblServiceInvoiceHeader.datServInvHDate','tblQuoteHeader.strQuoteID')
        // ->get();




        return view('layouts.dashboard.master',compact('role','compctr','indctr','indclients','compclients','deli','compproj',/*'indproj',*/'compbill'/*,'indbill'*/));
    }
    public function readWorkers()
    {
        $workers = Employee::where('todelete',1)->count();
        return Response($workers);
    }
    public function readServices()
    {
        $services = ServicesOffered::where('todelete',1)->count();
        return Response($services);   
    }
    public function readTrucks()
    {
        $trucks = DeliveryTruck::where('todelete',1)->count();
        return Response($trucks);   
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
