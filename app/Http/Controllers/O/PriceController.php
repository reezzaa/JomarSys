<?php

namespace App\Http\Controllers\O;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Material;
use App\Specialization;
use App\Equipment;
class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:operations');
    }
    public function index()
    {
        //
        return view('layouts.O.mainte.price.index');
    }
    public function readByAjax()
    {
         $material = Material::join('tblMaterialClass', 'tblMaterial.MatClassID', 'tblMaterialClass.id')
            ->join('tblMaterialType', 'tblMaterialClass.MatTypeID', 'tblMaterialType.id')
            ->select('tblMaterial.*')
            ->orderby('tblMaterial.id')
            ->where('tblMaterial.todelete','=',1)
            ->where('tblMaterialClass.todelete',1)
            ->where('tblMaterialClass.status',1)
            ->where('tblMaterialType.todelete',1)
            ->where('tblMaterialType.status',1)
            ->get();

            foreach ($material as $key ) {
             $key->MaterialUnitPrice=number_format($key->MaterialUnitPrice,2);
                
            }
        return view('layouts.O.mainte.price.tables.material', compact('material'));


    }
    // public function readByAjax1()
    // {
    //      $spec = Specialization::where('todelete','=',1)
    //     ->get();
    //     foreach ($spec as $key ) {
    //          $key->rpd=number_format($key->rpd,2);
                
    //         }

    //     return view('layouts.O.mainte.price.tables.spec', compact('spec'));
    // }
    public function readByAjax2()
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
        return view('layouts.O.mainte.price.tables.equipment', compact('equip'));   
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
        //
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

        // $spec = Specialization::where('id',$id)
        // ->select('tblSpecialization.id','tblSpecialization.rpd','tblSpecialization.SpecDesc')
        // ->get();

        $equip = Equipment::where('id',$id)
        ->select('tblEquipment.id','tblEquipment.EquipPrice','tblEquipment.EquipName')
        ->get();

        return Response($equip);

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
        $material = Material::where('id',$id)
            ->select('tblMaterial.id','tblMaterial.MaterialUnitPrice','tblMaterial.MaterialName')
            ->get();

        return Response($material);

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
        $material = Material::find($id);
        $material->MaterialUnitPrice= $request->MaterialUnitPrice;
        $material->save();

        return Response($material);
    }

    public function equip_update(Request $request, $id)
    {
        //
        $equip = Equipment::find($id);
        $equip->EquipPrice= $request->EquipPrice;
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
