<?php

namespace App\Http\Controllers\O;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Material;
use Carbon\carbon;
use Config;
use Response;
use App\StockCard;
use App\Stocks;

class StockController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:operations');
    }
    public function index()
    {
        //
         return view('layouts.O.transact.stockadjustment.index',['mat'=> Material::where('status','=',1)->where('todelete','=',1)->pluck('MaterialName', 'id')]);
    }

    public function readByAjax()
    {
       $stock = DB::table('tblmaterial')
        ->join('tblstocks','tblstocks.MatID','tblmaterial.id')
        ->join('tblmaterialclass','tblmaterialclass.id','tblmaterial.MatClassID')
        ->join('tblmaterialtype','tblmaterialtype.id','tblmaterialClass.MatTypeID')
        ->select('tblmaterial.MaterialName','tblstocks.stocks','tblstocks.date as date_s','tblmaterial.id')
        ->where('tblmaterial.status',1)
        ->where('tblmaterial.todelete',1)
        ->where('tblmaterialclass.status',1)
        ->where('tblmaterialclass.todelete',1)
        ->where('tblmaterialtype.status',1)
        ->where('tblmaterialtype.todelete',1)
        ->get();
        
        return view('layouts.O.transact.stockadjustment.table',['stock'=> $stock,
            'mat'=> Material::where('status','=',1)->where('todelete','=',1)->pluck('MaterialName', 'id')]);   
    }
    public function store(Request $request)
    {
        //
       $var = new StockCard();
        $var->MatID=$request->mat;
        $var->quantity=$request->quantity;
        $var->date=Carbon::now(Config::get('app.timezone'));
        $var->method='IN';
        $var->stock=$request->quantity;
        $var->save();

        $sto = new Stocks();
        $sto->MatID= $request->mat;
        $sto->stocks=$request->quantity;
        $sto->date=Carbon::now(Config::get('app.timezone'));
        $sto->save();

         return response::json($sto);
    }
     public function storeThat(Request $request)
    {
        //
        $sto=Stocks::find($request->matd);
        $sto->stocks=($request->quantityd-$request->qtyd);
        $sto->save();

        $var = new StockCard();
        $var->MatID=$request->matd;
        $var->quantity=$request->qtyd;
        $var->date=Carbon::now(Config::get('app.timezone'));
        $var->method='OUT';
        $var->stock=($request->quantityd-$request->qtyd);
        $var->save();

         return redirect(route('stockadjustment.index'));


    }
      public function storeThis(Request $request)
    {
        //
        $sto=Stocks::find($request->mats);
        $sto->stocks=($request->quantitys+$request->qty);
        $sto->save();

        $var = new StockCard();
        $var->MatID=$request->mats;
        $var->quantity=$request->qty;
        $var->date=Carbon::now(Config::get('app.timezone'));
        $var->method='IN';
        $var->stock=($request->quantitys+$request->qty);
        $var->save();

         return redirect(route('stockadjustment.index'));


    }

    public function edit($id)
    {
        //
        $mate=DB::table('tblmaterial')
        ->join('tblstocks','tblstocks.MatID','tblmaterial.id')
        ->where('tblmaterial.id',$id)
        ->select('tblstocks.stocks','tblstocks.MatID','tblmaterial.MaterialName')
        ->first();
        return response::json($mate);
    }
    public function show($id)
    {
        $mate=DB::table('tblmaterial')
        ->join('tblstockcard','tblstockcard.MatID','tblmaterial.id')
        ->where('tblmaterial.id',$id)
        ->select('tblstockcard.stock','tblstockcard.MatID','tblmaterial.MaterialName','tblstockcard.quantity','tblstockcard.date')
        ->orderby('tblstockcard.date')
        ->get();
        return response::json($mate);
    }

  
}
