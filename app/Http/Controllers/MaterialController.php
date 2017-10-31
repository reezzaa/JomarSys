<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaterialClass;
use App\MaterialType;
use App\Material;
use App\MaterialPrice;
use App\GroupUOM;
use App\DetailUOM;
use Response;
class MaterialController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function index()
    {
        return view('layouts.mainte.material.index', ['mattype'=> MaterialType::where('status','=',1)->where('todelete','=',1)->get(),'groupuom'=> GroupUOM::where('status','=',1)->where('todelete','=',1)->get()]);
    }
    public function readByAjax()
    {
        $material = Material::join('tblMaterialClass', 'tblMaterial.intMatClassID', '=', 'tblMaterialClass.intMatClassID')
            ->join('tblMaterialType', 'tblMaterialClass.intMatTypeID', '=', 'tblMaterialType.intMatTypeID')
            ->join('tblDetailUOM', 'tblMaterial.intMatUOM', '=', 'tblDetailUOM.intDetailUOMID')
            ->select('tblMaterial.*','tblMaterialClass.strMatClassName','tblDetailUOM.*','tblMaterialType.*')
            ->orderby('tblMaterial.intMaterialID')
            ->where('tblMaterial.todelete','=',1)
            ->get();
        $type = MaterialType::where('status','=',1)->where('todelete','=',1)->get(); 
        $class = MaterialClass::where('status','=',1)->where('todelete','=',1)->get(); 
        $guom = GroupUOM::where('status','=',1)->where('todelete','=',1)->get(); 
        $duom = DetailUOM::where('status','=',1)->where('todelete','=',1)->get(); 
         
        return view('layouts.mainte.material.table', compact('material','type','class','guom','duom'));
    }

    public function getMatClass($id)
    {
        $matcat = MaterialClass::where('status',1)->where('todelete',1)->where('intMatTypeID',$id)->get();
        
        return Response($matcat);
    }
    public function getMatUOM($id)
    {
        $detailuom = DetailUOM::where('intGroupUOMID',$id)->get();
        
        return Response($detailuom);
    }
    public function getMatSymbol($id)
    {
        $detailSymbol = DetailUOM::where('intDetailUOMID',$id)->get();
        
        return Response($detailSymbol);
    }
    

    public function store(Request $request)
    {
        $matAdd = Material::where('intMatClassID', '=', $request->intMatClassID )
            ->where('strMaterialName', '=', $request->strMaterialName )
            ->where('todelete','=',1)
            ->get();
        if($matAdd->count() == 0)
        {
            $matID = Material::insertGetId([
                'intMatClassID'=>$request->intMatClassID,
                'strMaterialName'=>$request->strMaterialName,
                'intMatUOM'=>$request->intMatUOM,
                'strMaterialBrand'=>$request->strMaterialBrand,
                'strMaterialSize'=>$request->strMaterialSize,
                'strMaterialColor'=>$request->strMaterialColor,
                'strMaterialDimension'=>$request->strMaterialDimension,
                'dcmMaterialUnitPrice'=>$request->dcmMaterialUnitPrice,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($matAdd);
        }
    }

    public function edit($classID)
    {
        $matclasse = Material::find($classID);
        return Response($matclasse);
    }

    public function update(Request $request, $matID)
    {
        $mat = Material::where('strMaterialName', '=', $request->strMaterialName)
                ->where('todelete','=',1)
                ->get();

        $matc = Material::where('intMaterialID','=', $matID)
                ->where('strMaterialName', '=', $request->strMaterialName)
                ->where('intMatMaterialClassID','<>', $request->intMatMaterialClassID)
                ->get();
        $matcc = Material::where('intMaterialID','=', $matID)
                ->where('strMaterialName', '=', $request->strMaterialName)
                ->where('intMatMaterialClassID','=', $request->intMatMaterialClassID)
                ->where('dblMaterialPrice','<>', $request->dblMaterialPrice)
                ->get();

        if($mat->count() == 0)
        {
            $updmat = Material::find($matID);
            $updmat->strMaterialName = $request->strMaterialName;
            $updmat->intMatMaterialClassID = $request->intMatMaterialClassID;
            $updmat->dblMaterialPrice = $request->dblMaterialPrice;
            $updmat->save();
            return Response($updmat);
        } 
        else if($matc->count() != 0)
        {
            $updmat = Material::find($matID);
            $updmat->strMaterialName = $request->strMaterialName;
            $updmat->intMatMaterialClassID = $request->intMatMaterialClassID;
            $updmat->dblMaterialPrice = $request->dblMaterialPrice;
            $updmat->save();
            return Response($updmat);
        }
        else if($matcc->count() != 0)
        {
            $updmat = Material::find($matID);
            $updmat->strMaterialName = $request->strMaterialName;
            $updmat->intMatMaterialClassID = $request->intMatMaterialClassID;
            $updmat->dblMaterialPrice = $request->dblMaterialPrice;
            $updmat->save();
            return Response($updmat);
        }
    }

    public function checkbox($id)
    {
        $mat = Material::find($id);
        if ($mat->status) {
            $mat->status=0;
        }
        else{
            $mat->status=1;
        }
        $mat->save();
    }

    public function delete($matID)
    {
        $mat = Material::find($matID);
        $mat->todelete = 0;
        $mat->save();
        return Response($mat);
    }
}