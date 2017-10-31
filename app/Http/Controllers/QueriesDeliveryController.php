<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Carbon\carbon;
class QueriesDeliveryController extends Controller
{
    //

    public function index()
    {
    	$del = DB::table('tblDeliveryHeader')
    	->join('tblContract','tblContract.strContractID','tblDeliveryHeader.strDeliveryHProjID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->select('tblDeliveryHeader.*','tblContract.strContractID','tblQuoteHeader.strQuoteName')
    	->get();

    	$delcity = DB::table('tblDeliveryHeader')
    	->join('tblContract','tblContract.strContractID','tblDeliveryHeader.strDeliveryHProjID')
    	->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->select(DB::raw('distinct strDelCity'))
    	->get();


    	return view('layouts.queries.Delivery.index',['del'=>$del,'delcity'=>$delcity]);
    }
    public function readByAjax()
    {
    	$read = DB::table('tblDeliveryHeader')
    	->join('tblContract','tblContract.strContractID','tblDeliveryHeader.strDeliveryHProjID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')

    	->select('tblDeliveryHeader.*','tblEmployee.strEmpFirstName','tblEmployee.strEmpMiddleName','tblEmployee.strEmpLastName','tblContract.strContractID','tblQuoteHeader.strQuoteName')
    	->get();
    	return view('layouts.queries.Delivery.table',['read'=>$read]);
    }
    public function findbyProject($id)
    {
    	$byproj = DB::table('tblContract')
    	->join('tblDeliveryHeader','tblDeliveryHeader.strDeliveryHProjID','tblContract.strContractID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')

    	->select('tblDeliveryHeader.*','tblEmployee.strEmpFirstName','tblEmployee.strEmpMiddleName','tblEmployee.strEmpLastName','tblContract.strContractID','tblQuoteHeader.strQuoteName')
    	->where('tblContract.strContractID',$id)
    	->get();
    	// dd($id);

    	return view('layouts.queries.Delivery.table1',['byproj'=>$byproj]);
    }
    public function byPending()
    {
    	$bypending = DB::table('tblContract')
    	->join('tblDeliveryHeader','tblDeliveryHeader.strDeliveryHProjID','tblContract.strContractID')
    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')

    	->select('tblDeliveryHeader.*','tblContract.strContractID','tblEmployee.strEmpFirstName','tblEmployee.strEmpMiddleName','tblEmployee.strEmpLastName','tblQuoteHeader.strQuoteName')
    	->where('tblDeliveryHeader.status',2)
    	->get();
    	return view('layouts.queries.Delivery.table2',['bypending'=>$bypending]);

    }
    public function byFinished()
    {
    	$byfinished = DB::table('tblContract')
    	->join('tblDeliveryHeader','tblDeliveryHeader.strDeliveryHProjID','tblContract.strContractID')
    	->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')

    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->select('tblDeliveryHeader.*','tblContract.strContractID','tblEmployee.strEmpFirstName','tblEmployee.strEmpMiddleName','tblEmployee.strEmpLastName','tblQuoteHeader.strQuoteName')
    	->where('tblDeliveryHeader.status',1)
    	->get();

    	return view('layouts.queries.Delivery.table3',['byfinished'=>$byfinished]);

    }

    public function byLocation($id)
    {
    	$byloca = DB::table('tblContract')
    	->join('tblDeliveryHeader','tblDeliveryHeader.strDeliveryHProjID','tblContract.strContractID')
    	->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')

    	->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->select('tblDeliveryHeader.*','tblContract.strContractID','tblEmployee.strEmpFirstName','tblEmployee.strEmpMiddleName','tblEmployee.strEmpLastName','tblQuoteHeader.strQuoteName')
    	->where('tblDeliveryHeader.strDelCity',$id)
    	->get();
    	return view('layouts.queries.Delivery.table4',['byloca'=>$byloca]);

    }
    public function finddelStartDate($id)
    {
        $getsdate = Carbon::parse($id);
        $getsdate->toDateString();
        $sdate = DB::table('tblDeliveryHeader')
        ->join('tblContract','tblContract.strContractID','tblDeliveryHeader.strDeliveryHProjID')
    	->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')

        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
    	->select('tblDeliveryHeader.*','tblContract.strContractID','tblEmployee.strEmpFirstName','tblEmployee.strEmpMiddleName','tblEmployee.strEmpLastName','tblQuoteHeader.strQuoteName')
        ->where('tblDeliveryHeader.datDeliveryHDate','=',$getsdate)
        ->orderby('tblDeliveryHeader.datDeliveryHDate','DESC')
        ->get();
    	return view('layouts.queries.Delivery.table5',['sdate'=>$sdate]);


        // return view('layouts.queries.Stock.table4',['sdate'=>$sdate]);

    }


}
