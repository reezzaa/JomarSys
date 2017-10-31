<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\EquipType;
use Response;
class EquipmentController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function index()
    {
        return view('layouts.mainte.equipment.index', ['equiptype'=> EquipType::where('status','=',1)->where('todelete','=',1)->pluck('strEquipTypeDesc', 'intEquipTypeID')]);
    }

    public function readByAjax()
    {
        $equip = Equipment::join('tblEquipType', 'tblEquipment.intTypeID', '=', 'tblEquipType.intEquipTypeID')
            ->select('tblEquipment.*','tblEquipType.strEquipTypeDesc')
            ->orderby('tblEquipment.intEquipID')
            ->where('tblEquipment.todelete','=',1)
            ->where('tblEquipType.todelete','=',1)
            ->where('tblEquipType.status','=',1)
            ->get();
        return view('layouts.mainte.equipment.table', ['equip'=>$equip, 'equiptype'=> EquipType::where('status','=',1)->where('todelete','=',1)->pluck('strEquipTypeDesc', 'intEquipTypeID')]);
    }

    public function store(Request $request)
    {
        $equipAdd = Equipment::where('strEquipModel', '=', $request->strEquipModel )
            ->where('strEquipName', '=', $request->strEquipName )
            ->where('todelete','=',1)
            ->get();

        if($equipAdd->count() == 0)
        {
            Equipment::insert(['strEquipName'=>$request->strEquipName,
                'dblEquipWeight'=>$request->dblEquipWeight,
                'strEquipModel'=>$request->strEquipModel,
                'intTypeID'=>$request->intTypeID,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($equipAdd);
        }
    }

	public function edit($equipID)
    {
        $equipe = Equipment::find($equipID);
        return Response($equipe);
    }

    public function update(Request $request, $equipID)
    {
        $equip = Equipment::where('strEquipName', '=', $request->strEquipName)
                ->where('todelete','=',1)
                ->get();

        $equipc = Equipment::where('intEquipID','=', $equipID)
                ->where('strEquipName', '=', $request->strEquipName)
                ->where('intTypeID','<>', $request->intTypeID)
                ->get();
        $equipcc = Equipment::where('intEquipID','=', $equipID)
                ->where('strEquipName', '=', $request->strEquipName)
                ->where('intTypeID','=', $request->intTypeID)
                ->where('dblEquipPrice','<>', $request->dblEquipPrice)
                ->get();

        if($equip->count() == 0)
        {
            $updequip = Equipment::find($equipID);
            $updequip->strEquipName = $request->strEquipName;
            $updequip->intTypeID = $request->intTypeID;
            $updequip->dblEquipPrice = $request->dblEquipPrice;
            $updequip->save();
            return Response($updequip);
        } 
        else if($equipc->count() != 0)
        {
            $updequip = Equipment::find($equipID);
            $updequip->strEquipName = $request->strEquipName;
            $updequip->intTypeID = $request->intTypeID;
            $updequip->dblEquipPrice = $request->dblEquipPrice;
            $updequip->save();
            return Response($updequip);
        }
        else if($equipcc->count() != 0)
        {
            $updequip = Equipment::find($equipID);
            $updequip->strEquipName = $request->strEquipName;
            $updequip->intTypeID = $request->intTypeID;
            $updequip->dblEquipPrice = $request->dblEquipPrice;
            $updequip->save();
            return Response($updequip);
        }
    }
    
    public function checkbox($id)
    {
        $equip = Equipment::find($id);
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
        $equip = Equipment::find($equipID);
        $equip->todelete = 0;
        $equip->save();
        return Response($equip);
    }
    
}
