<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Material;
use Carbon\carbon;
use Config;
use Response;
use App\StockCard;
use App\Stock;

class StockController extends Controller
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
        //
        return view('layouts.transact.stockadjustment.index',[ 'mat'=> Material::where('status','=',1)->where('todelete','=',1)->pluck('strMaterialName', 'intMaterialID')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function readByAjax()
    {
        $stock = DB::table('tblMaterial')
        ->join('tblStocks','tblStocks.intMaterialID','tblMaterial.intMaterialID')
        ->join('tblMaterialClass','tblMaterialClass.intMatClassID','tblMaterial.intMatClassID')
        ->join('tblMaterialType','tblMaterialType.intMatTypeID','tblMaterialClass.intMatTypeID')
        ->select('tblMaterial.strMaterialName','tblStocks.intStocks','tblStocks.dtmStock','tblMaterial.intMaterialID')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->where('tblMaterialClass.status',1)
        ->where('tblMaterialClass.todelete',1)
        ->where('tblMaterialType.status',1)
        ->where('tblMaterialType.todelete',1)
        ->get();
        
        return view('layouts.transact.stockadjustment.table',['stock'=> $stock,
            'mat'=> Material::where('status','=',1)->where('todelete','=',1)->pluck('strMaterialName', 'intMaterialID')]);
    }
    public function store(Request $request)
    {
        //
        $var = new StockCard();
        $var->intStockMatID=$request->mat;
        $var->intStockQty=$request->quantity;
        $var->dtmStockDate=Carbon::now(Config::get('app.timezone'));
        $var->strStockMethod='IN';
        $var->intStock=$request->quantity;
        $var->save();

        $sto = new Stock();
        $sto->intMaterialID= $request->mat;
        $sto->intStocks=$request->quantity;
        $sto->dtmStock=Carbon::now(Config::get('app.timezone'));
        $sto->save();

         return response::json($sto);


    }
     public function storeThis(Request $request)
    {
        //
        $sto=Stock::find($request->mats);
        $sto->intStocks=($request->quantitys+$request->qty);
        $sto->save();

        $var = new StockCard();
        $var->intStockMatID=$request->mats;
        $var->intStockQty=($request->quantitys+$request->qty);
        $var->dtmStockDate=Carbon::now(Config::get('app.timezone'));
        $var->strStockMethod='IN';
        $var->intStock=$request->qty;
        $var->save();

         return redirect(route('stockadjustment.index'));


    }
    public function storeThat(Request $request)
    {
        //
        $sto=Stock::find($request->matd);
        $sto->intStocks=($request->quantityd-$request->qtyd);
        $sto->save();

        $var = new StockCard();
        $var->intStockMatID=$request->matd;
        $var->intStockQty=($request->quantityd-$request->qtyd);
        $var->dtmStockDate=Carbon::now(Config::get('app.timezone'));
        $var->strStockMethod='OUT';
        $var->intStock=$request->qtyd;
        $var->save();

         return redirect(route('stockadjustment.index'));


    }
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
         $mate=DB::table('tblmaterial')
        ->join('tblStocks','tblStocks.intMaterialID','tblMaterial.intMaterialID')
        ->where('tblmaterial.intMaterialID',$id)
        ->select('tblStocks.intStocks','tblStocks.intMaterialID','tblMaterial.strMaterialName')
        ->first();
        return response::json($mate);
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
