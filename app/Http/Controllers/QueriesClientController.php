<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyClient;
use App\IndividualClient;
use Response;
use DB;

class QueriesClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locai= IndividualClient::join('tblClient', 'tblIndividualClient.strIndClientID', '=', 'tblClient.strClientID')
            ->select(DB::raw('distinct strIndClientCity')/*,'tblCompanyClient.strCompClientProv'*/)
            ->orderby('tblIndividualClient.strIndClientID')
            ->where('tblClient.todelete','=',1)
            ->get();

        return view('layouts.queries.Clients.index',compact('locai'));
    }
    public function readByAjax()
    {
        $clients = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.*','tblClient.strClientType')
            ->orderby('tblCompanyClient.strCompClientID')
            ->where('tblClient.todelete','=',1)
            ->get();
        return view('layouts.queries.Clients.table1', compact('clients'));
    }
    public function readByAjax2()
    {
        $iclients = DB::table('tblClient')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->select('tblIndividualClient.*')
        ->where('tblClient.todelete','=',1)
        ->get();
        // $iclients = IndividualClient::join('tblClient', 'tblIndividualClient.strIndClientID', '=', 'tblClient.strClientID')
        //     ->select('tblIndividualClient.*','tblClient.strClientType')
        //     ->orderby('tblIndividualClient.strIndClientID')
        //     ->where('tblClient.todelete','=',1)
        //     ->get();
            // dd($iclients);
        return view('layouts.queries.Clients.table2', compact('iclients'));
    }
    public function findLocation()
    {
        $loca = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select(DB::raw('distinct strCompClientCity')/*,'tblCompanyClient.strCompClientProv'*/)
            ->orderby('tblCompanyClient.strCompClientID')
            ->where('tblClient.todelete','=',1)
            ->get();
        return Response($loca);

    }
    public function findIndLocation()
    {
        $loca2 = IndividualClient::join('tblClient', 'tblIndividualClient.strIndClientID', '=', 'tblClient.strClientID')
            ->select(DB::raw('distinct strIndClientCity')/*,'tblCompanyClient.strCompClientProv'*/)
            ->orderby('tblIndividualClient.strIndClientID')
            ->where('tblClient.todelete','=',1)
            ->get();
        return Response($loca2);

    }
    public function readByAjax3($text)
    {
         $locat = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.*')
            ->orderby('tblCompanyClient.strCompClientID')
            ->where('tblClient.todelete','=',1)
            ->where('tblCompanyClient.strCompClientCity',$text)
            ->get();
        return view('layouts.queries.Clients.table3', compact('locat'));
    }
    public function readByAjax4($text)
    {
         $locat2 = IndividualClient::join('tblClient', 'tblIndividualClient.strIndClientID', '=', 'tblClient.strClientID')
            ->select('tblIndividualClient.*')
            ->orderby('tblIndividualClient.strIndClientID')
            ->where('tblClient.todelete','=',1)
            ->where('tblIndividualClient.strIndClientCity',$text)
            ->get();
        return view('layouts.queries.Clients.table4', compact('locat2'));
    }


}
