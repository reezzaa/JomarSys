<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\carbon;
use App\CompanyClient;
use App\IndividualClient;
// use App\Contract;


class QueriesProjectController extends Controller
{
    //
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

    	return view('layouts.queries.Project.index',compact('clients','indclients'));
    }
    public function readByAjax($id)
    {
    	$cli = DB::table('tblClient')
    	->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblClient.strClientID')
    	->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
    	->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblCompanyClient.strCompClientName','tblQuoteHeader.strQuoteName','tblContract.strContractID','tblQuoteConDetail.*')
    	// ->where('tblQuoteHeader.status','!=',0)
    	->where('tblClient.strClientID',$id)
    	->get();
    	dd($cli);
    	$clie=DB::table('tblClient')
    	->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
    	->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblIndividualClient.*','tblQuoteHeader.strQuoteName','tblQuoteIndDetail.*','tblQuoteHeader.status as statu')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblClient.strClientID',$id)
    	->get();

    	if(count($cli)==0)
    	{
    	return view('layouts.queries.Project.table2',compact('clie'));

    	}
    	else
    	{
    	return view('layouts.queries.Project.table',compact('cli'));

    	}
    }
    public function byPending()
    {
    	$cli = DB::table('tblClient')
    	->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblClient.strClientID')
    	->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
    	->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblCompanyClient.strCompClientName','tblQuoteHeader.strQuoteName','tblContract.*','tblQuoteConDetail.*')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblContract.status',0)
    	->get();

    	$clie=DB::table('tblClient')
    	->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
    	->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblIndividualClient.*','tblQuoteHeader.strQuoteName','tblQuoteIndDetail.*')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblQuoteHeader.status',1)
    	->get();

    	return view('layouts.queries.Project.table3',compact('cli','clie'));

    }

    public function byOngoing()
{
	$clio = DB::table('tblClient')
    	->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblClient.strClientID')
    	->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
    	->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblCompanyClient.strCompClientName','tblQuoteHeader.strQuoteName','tblContract.*','tblQuoteConDetail.*')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblContract.status',0)
    	->get();

    	$clieo=DB::table('tblClient')
    	->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
    	->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblIndividualClient.*','tblQuoteHeader.strQuoteName','tblQuoteIndDetail.*','tblQuoteHeader.')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblQuoteHeader.status',1)
    	->get();

    	return view('layouts.queries.Project.table4',compact('clio','clieo'));
}
public function byTerminated()
{
	$clit = DB::table('tblClient')
    	->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblClient.strClientID')
    	->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
    	->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblCompanyClient.strCompClientName','tblQuoteHeader.strQuoteName','tblContract.*','tblQuoteConDetail.*')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblContract.status',0)
    	->get();

    	$cliet=DB::table('tblClient')
    	->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
    	->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblIndividualClient.*','tblQuoteHeader.strQuoteName','tblQuoteIndDetail.*')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblQuoteHeader.status',1)
    	->get();

    	return view('layouts.queries.Project.table5',compact('clit','cliet'));
}
	public function findPStartDate($id)
    {
    	$sdate = DB::table('tblClient')
    	->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblClient.strClientID')
    	->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
    	->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblCompanyClient.strCompClientName','tblQuoteHeader.strQuoteName','tblContract.*','tblQuoteConDetail.*')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblQuoteConDetail.datProjStart',$id)
    	->get();

    	$isdate=DB::table('tblClient')
    	->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
    	->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
    	->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
    	->select('tblIndividualClient.*','tblQuoteHeader.strQuoteName','tblQuoteIndDetail.*')
    	->where('tblQuoteHeader.status','!=',0)
    	->where('tblQuoteIndDetail.datProjStart',$id)
    	->get();
        return view('layouts.queries.Invoice.table6',compact('sdate','isdate'));

    }


}
