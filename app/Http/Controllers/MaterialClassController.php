<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaterialClass;
use App\MaterialType;
use Response;
class MaterialClassController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function index()
    {
        $mattype = MaterialType::where('status','=',1)->where('todelete','=',1)
            ->pluck('strMatTypeName','intMatTypeID');
        return view('layouts.mainte.materialclass.index', compact('mattype'));
    }

    public function readByAjax()
    {
        $matclass = MaterialClass::join('tblMaterialType', 'tblMaterialClass.intMatTypeID', '=', 'tblMaterialType.intMatTypeID')
            ->select('tblMaterialClass.*','tblMaterialType.strMatTypeName')
            ->orderby('tblMaterialClass.intMatClassID')
            ->where('tblMaterialClass.todelete','=',1)
            ->where('tblMaterialType.todelete','=',1)
            ->where('tblMaterialType.status','=',1)
            ->get();
        
        return view('layouts.mainte.materialclass.table', ['matclass'=>$matclass,'mattype'=>MaterialType::where('status','=',1)->where('todelete','=',1)->pluck('strMatTypeName', 'intMatTypeID')]);
    }
    

    public function store(Request $request)
    {
        $classnameAdd = MaterialClass::where('strMatClassname', '=', $request->strMatClassname )
            ->where('todelete','=',1)
            ->get();
        if($classnameAdd->count() == 0)
        {
            MaterialClass::insert(['intMatTypeID'=>$request->intMatTypeID,
                'strMatClassName'=>$request->strMatClassname,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($classnameAdd);
        }
    }
    
    public function edit($classID)
    {
        $matclasse = MaterialClass::find($classID);
        return Response($matclasse);
    }

    public function update(Request $request, $classID)
    {
        $classname = MaterialClass::where('strMatClassname', '=', $request->strMatClassname )
                ->where('todelete','=',1)
                ->get();
        if($classname->count() == 0)
        {
            $updclass = MaterialClass::find($classID);
            $updclass->strMatClassname = $request->strMatClassname;
            $updclass->intMatTypeID = $request->intMatTypeID;
            $updclass->save();
            return Response($updclass);
        } 
    }

    public function checkbox($id)
    {
        $matclass = MaterialClass::find($id);
        if ($matclass->status) {
            $matclass->status=0;
        }
        else{
            $matclass->status=1;
        }
        $matclass->save();
    }

    public function delete($classID)
    {
        $matclass = MaterialClass::find($classID);
        $matclass->todelete = 0;
        $matclass->save();
        return Response($matclass);
    }
}	
