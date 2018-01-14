<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\O;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Equiptype;
use Response;
class EquipTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:operations');
    }
    public function index()
    {
        $equiptypeCheck = EquipType::where('status','=',1)->where('todelete','=',1)->get();
        
        return view('layouts.O.mainte.equiptype.index', compact('equiptypeCheck'));
    }

    public function readByAjax()
    {
    	 $equiptype = EquipType::where('todelete','=',1)
        ->get();

    	return view('layouts.O.mainte.equiptype.table', compact('equiptype'));
    }

    public function store(Request $request)
    {
        $equipdescAdd = EquipType::where('EquipTypeDesc', '=', $request->EquipTypeDesc )
            ->where('todelete','=',1)
            ->get();
        if($equipdescAdd->count() == 0)
        {
            EquipType::insert(['EquipTypeDesc'=>$request->EquipTypeDesc,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($equipdescAdd);
        }
    }

    public function edit($typeID)
    {
        $equiptypee = EquipType::find($typeID);
        return Response($equiptypee);
    }

    public function update(Request $request, $typeID)
    {
        $equipdesc = EquipType::where('EquipTypeDesc', '=', $request->EquipTypeDesc )
                ->where('todelete','=',1)
                ->get();
        if($equipdesc->count() == 0)
        {
            $updclass = EquipType::find($typeID);
            $updclass->EquipTypeDesc = $request->EquipTypeDesc;
            $updclass->save();
            return Response($updclass);
        } 
    }
    
    public function checkbox($id)
    {
        $equiptype = EquipType::find($id);
        if ($equiptype->status) {
            $equiptype->status=0;
        }
        else{
            $equiptype->status=1;
        }
        $equiptype->save();
    }

    public function delete($typeID)
    {
        $equiptype = EquipType::find($typeID);
        $equiptype->todelete = 0;
        $equiptype->save();
        return Response($equiptype);
    }
}
