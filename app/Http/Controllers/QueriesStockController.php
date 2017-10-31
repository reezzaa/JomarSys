<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Carbon\carbon;

class QueriesStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $getMat = DB::table('tblMaterial')
        // ->leftjoin('tblStockCard','tblStockCard.intStockMatID','tblMaterial.intMaterialID')
        ->select('tblMaterial.strMaterialName','tblMaterial.intMaterialID')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->get();

        return view('layouts.queries.Stock.index',['getMat'=>$getMat]);
    }

    public function readByAjax()
    {
        $mat = DB::table('tblMaterial')
        ->join('tblStockCard','tblStockCard.intStockMatID','tblMaterial.intMaterialID')
        ->select('tblMaterial.*','tblStockCard.*')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->orderby('tblStockCard.dtmStockDate')
        ->get();

        return view('layouts.queries.Stock.table',['mat'=>$mat]);
    }

    public function findMate($id)
    {
        $fmat = DB::table('tblMaterial')
        ->join('tblStockCard','tblStockCard.intStockMatID','tblMaterial.intMaterialID')
        ->select('tblMaterial.*','tblStockCard.*')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->where('tblMaterial.intMaterialID',$id)
        ->orderby('tblStockCard.dtmStockDate')
        ->get();

        return view('layouts.queries.Stock.table1',['fmat'=>$fmat]);
    }
    public function readByAjax2()
    {
        $imat = DB::table('tblMaterial')
        ->join('tblStockCard','tblStockCard.intStockMatID','tblMaterial.intMaterialID')
        ->select('tblMaterial.*','tblStockCard.*')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->where('tblStockCard.strStockMethod','IN')
        ->orderby('tblStockCard.dtmStockDate')
        ->get();

        return view('layouts.queries.Stock.table2',['imat'=>$imat]);
    }
    public function readByAjax3()
    {
        $omat = DB::table('tblMaterial')
        ->join('tblStockCard','tblStockCard.intStockMatID','tblMaterial.intMaterialID')
        ->select('tblMaterial.*','tblStockCard.*')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->where('tblStockCard.strStockMethod','OUT')
        ->orderby('tblStockCard.dtmStockDate')
        ->get();

        return view('layouts.queries.Stock.table3',['omat'=>$omat]);
    }
    public function findStartDate($id)
    {
        $getsdate = Carbon::parse($id);
        $getsdate->toDateString();
        $sdate = DB::table('tblMaterial')
        ->join('tblStockCard','tblStockCard.intStockMatID','tblMaterial.intMaterialID')
        ->select('tblMaterial.*','tblStockCard.*')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->where('tblStockCard.dtmStockDate',$getsdate)
        ->orderby('tblStockCard.dtmStockDate','DESC')
        ->get();

        return view('layouts.queries.Stock.table4',['sdate'=>$sdate]);

    }
    
}
