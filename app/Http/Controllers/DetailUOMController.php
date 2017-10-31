<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupUOM;
use App\DetailUOM;
use Response;

class DetailUOMController extends Controller
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
        return view('layouts.mainte.uom.detailindex', ['groupuom'=> GroupUOM::where('status','=',1)->where('todelete','=',1)->pluck('strGroupUOMText', 'intGroupUOMID')]);
    }

    public function readByAjax()
    {
        $detailuom = DetailUOM::join('tblGroupUOM', 'tblDetailUOM.intGroupUOMID', '=', 'tblGroupUOM.intGroupUOMID')
            ->select('tblDetailUOM.*','tblGroupUOM.strGroupUOMText')
            ->orderby('tblDetailUOM.intDetailUOMID')
            ->where('tblDetailUOM.todelete','=',1)
            ->where('tblGroupUOM.todelete','=',1)
            ->where('tblGroupUOM.status','=',1)
            ->get();
        return view('layouts.mainte.uom.detailtable', ['detailuom'=>$detailuom, 'groupuom'=> GroupUOM::where('status','=',1)->where('todelete','=',1)->pluck('strGroupUOMText', 'intGroupUOMID')]);
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
        $detailAdd = DetailUOM::where('strDetailUOMText', '=', $request->strDetailUOMText )
            ->where('todelete','=',1)
            ->get();
        $symbolAdd = DetailUOM::where('strUOMUnitSymbol', '=', $request->strUOMUnitSymbol )
            ->where('todelete','=',1)
            ->get();
        if($detailAdd->count() != 0)
        {
        }
        if($symbolAdd->count() != 0)
        {
        }
        if($detailAdd->count() == 0 && $symbolAdd->count() == 0)
        {
            $res = DetailUOM::insertGetId(['intGroupUOMID'=>$request->intGroupUOMID,
                'strUOMUnitSymbol'=>$request->strUOMUnitSymbol,
                'strDetailUOMText'=>$request->strDetailUOMText,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($res);
        }
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
        $detailuome = DetailUOM::find($id);
        return Response($detailuome);
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
        $equip = DetailUOM::where('strDetailUOMText', '=', $request->strDetailUOMText)
                ->where('todelete','=',1)
                ->get();

        $equipc = DetailUOM::where('intDetailUOMID','=', $id)
                ->where('strDetailUOMText', '=', $request->strDetailUOMText)
                ->where('intGroupUOMID','<>', $request->intGroupUOMID)
                ->get();
        $equipcc = DetailUOM::where('intDetailUOMID','=', $id)
                ->where('strDetailUOMText', '=', $request->strDetailUOMText)
                ->where('intGroupUOMID','<>', $request->intGroupUOMID)
                ->where('strUOMUnitSymbol','=', $request->strUOMUnitSymbol)
                ->get();

        if($equip->count() == 0)
        {
            $updequip = DetailUOM::find($id);
            $updequip->strDetailUOMText = $request->strDetailUOMText;
            $updequip->intGroupUOMID = $request->intGroupUOMID;
            $updequip->strUOMUnitSymbol = $request->strUOMUnitSymbol;
            $updequip->save();
            return Response($updequip);
        } 
        else if($equipc->count() != 0)
        {
            $updequip = DetailUOM::find($id);
            $updequip->strDetailUOMText = $request->strDetailUOMText;
            $updequip->intGroupUOMID = $request->intGroupUOMID;
            $updequip->strUOMUnitSymbol = $request->strUOMUnitSymbol;
            $updequip->save();
            return Response($updequip);
        }
        else if($equipcc->count() != 0)
        {
            $updequip = DetailUOM::find($id);
            $updequip->strDetailUOMText = $request->strDetailUOMText;
            $updequip->intGroupUOMID = $request->intGroupUOMID;
            $updequip->strUOMUnitSymbol = $request->strUOMUnitSymbol;
            $updequip->save();
            return Response($updequip);
        }
    }

    public function checkbox($id)
    {
        $equip = DetailUOM::find($id);
        if ($equip->status) {
            $equip->status=0;
        }
        else{
            $equip->status=1;
        }
        $equip->save();
    }

    public function delete($equipID)
    {
        $equip = DetailUOM::find($equipID);
        $equip->todelete = 0;
        $equip->save();
        return Response($equip);
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


