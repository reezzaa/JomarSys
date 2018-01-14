<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\O;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Equipment;
use App\Equiptype;
use Response;
class EquipmentController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:operations');
    }

    public function index()
    {
        return view('layouts.O.mainte.equipment.index', ['equiptype'=> EquipType::where('status','=',1)->where('todelete','=',1)->pluck('EquipTypeDesc', 'id')]);
    }

    public function readByAjax()
    {
        $equip = Equipment::join('tblEquipType', 'tblEquipment.TypeID', '=', 'tblEquipType.id')
            ->select('tblEquipment.*','tblEquipType.EquipTypeDesc')
            ->orderby('tblEquipment.id')
            ->where('tblEquipment.todelete','=',1)
            ->where('tblEquipType.todelete','=',1)
            ->where('tblEquipType.status','=',1)
            ->get();
            foreach ($equip as $key ) {
             $key->EquipPrice=number_format($key->EquipPrice,2);
                
            }
        return view('layouts.O.mainte.equipment.table', ['equip'=>$equip, 'equiptype'=> EquipType::where('status','=',1)->where('todelete','=',1)->pluck('EquipTypeDesc', 'id')]);
    }

    public function store(Request $request)
    {
        $equipAdd = Equipment::where('EquipKey', '=', $request->EquipKey )
            ->where('EquipName', '=', $request->EquipName )
            ->where('todelete','=',1)
            ->get();

        if($equipAdd->count() == 0)
        {
            Equipment::insert(['EquipName'=>$request->EquipName,
                'EquipKey'=>$request->EquipKey,
                'EquipLeaser'=>$request->EquipLeaser,
                'EquipPrice'=>$request->EquipPrice,
                'TypeID'=>$request->TypeID,
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
            $updequip = Equipment::find($equipID);
            $updequip->EquipName = $request->EquipName;
            $updequip->TypeID = $request->TypeID;
            $updequip->EquipPrice = $request->EquipPrice;
            $updequip->EquipKey = $request->EquipKey;
            $updequip->EquipLeaser = $request->EquipLeaser;
            $updequip->save();
            return Response($updequip);
       
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
