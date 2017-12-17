<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\O;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ServicesOffered;
use Response;
use App\Material;
use App\MaterialClass;
use App\DetailUOM;
use App\Equipment;
use App\EquipType;
use App\Specialization;
use DB;
use App\ServWorker;
use App\ServMaterial;
use App\ServEquipment;
use App\ServTotal;
use Carbon\carbon;
class ServicesOfferedController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth:operations');
    }
    public function index()
    {
        $serveCheck = ServicesOffered::where('status','=',1)->where('todelete','=',1)->get();
        
        return view('layouts.O.mainte.services.index', compact('serveCheck'));
    }

    public function readByAjax()
    {
    	 $serve = ServicesOffered::join('tblServTotal','tblServTotal.ServID','tblServicesOffered.id')
        ->select('tblServicesOffered.*','tblServTotal.total')
        ->where('todelete','=',1)
        ->get();
        foreach ($serve as $key ) {
             $key->total=number_format($key->total,2);
                
            }

    	return view('layouts.O.mainte.services.table', compact('serve'));
    }

    public function store(Request $request)
    {
        // $serveAdd = ServicesOffered::where('strServiceOffName', '=', $request->strServiceOffName )
        //     ->where('todelete','=',1)
        //     ->get();
        // if($serveAdd->count() == 0)
        // {
        //     ServicesOffered::insert(['strServiceOffName'=>$request->strServiceOffName,
        //         'todelete'=>1,
        //         'status'=>1
        //         ]);
        //     return Response($serveAdd);
        // }
        $i='';
        $test='';

        $getTotalRPD='';
        $getTotalMat='';
        $getTotalEquip='';

        $servOff = new ServicesOffered();
        // $servOff->id = 1;
        $servOff->ServiceOffName = $request->servname;
        $servOff->duration = $request->duration;
        $servOff->unit = $request->unit;
        $servOff->ServiceDesc = $request->servdesc;
        $servOff->status = 1;
        $servOff->todelete = 1;
        $servOff->save();

        for($i = 0;$i<count($request->worker);$i++)
        {
            $test = new ServWorker();
            $test->ServID = $servOff->id;
            $test->SpecID = $request->worker[$i];
            $test->quantity = $request->workerqty[$i];
            $test->todelete = 1;
            $test->save();

            $getTotalRPD += $request->rpd[$i]*$request->workerqty[$i];
        }
        for($i = 0;$i<count($request->material);$i++)
        {
            $test = new ServMaterial();
            $test->ServID = $servOff->id;
            $test->MatID = $request->material[$i];
            $test->quantity = $request->materialqty[$i];
            $test->todelete = 1;
            $test->save();

            $getTotalMat += $request->cost[$i];
        }
        for($i = 0;$i<count($request->equipname);$i++)
        {
            $test = new ServEquipment();
            $test->ServID = $servOff->id;
            $test->EquipID = $request->equipname[$i];
            $test->todelete = 1;
            $test->save();

            $getTotalEquip += $request->equipprice[$i];

        }

        $total = new ServTotal();
        $total->ServID = $servOff->id;
        $total->total = $getTotalRPD+$getTotalMat+$getTotalEquip;
        $total->save();
        
        // return redirect()->route('serviceOff.index');
        return Response($servOff);

    }

    public function create()
    {
        $spec = Specialization::where('status',1)->where('todelete',1)->get();
        
        $material = Material::join('tblMaterialClass','tblMaterial.MatClassID','tblMaterialClass.id')
                    ->select('tblMaterial.*','tblMaterialClass.*')
                    ->where('tblMaterial.status',1)
                    ->where('tblMaterial.todelete',1)
                    ->where('tblMaterialClass.todelete',1)
                    ->where('tblMaterialClass.status',1)
                    ->get();

        $materialClass = MaterialClass::where('status',1)
                        ->where('todelete',1)
                        ->get();
        $uom = DetailUOM::where('status',1)
                        ->where('todelete',1)
                        ->get();
         $equip = Equipment::join('tblEquipType','tblEquipType.id','tblEquipment.TypeID')
        ->where('tblEquipType.status',1)
        ->where('tblEquipType.todelete',1)
        ->where('tblEquipment.status',1)
        ->where('tblEquipment.todelete',1)
        ->get();

        $equiptype = EquipType::where('status',1)
                        ->where('todelete',1)
                        ->get();
        return view('layouts.O.mainte.services.addservice', compact('spec','material','materialClass','uom','equip','equiptype'));
    }
     public function readMaterial()
    {
        
        return view('layouts.O.mainte.services.resourcetable.tablemat');
    }

    public function readEquipment()
    {
        
        
        return view('layouts.O.mainte.services.resourcetable.tableequip');
    }

    public function readWorker()
    {
        
        return view('layouts.O.mainte.services.resourcetable.tableworker');
    }
    public function getMatPrice($id)
    {
        $matprice = Material::where('id',$id)->get();
        
        return Response($matprice);
    }
    public function getEPrice($id)
    {
        $equiprice = Equipment::where('id',$id)->get();
        
        return Response($equiprice);
    }
    public function findRPD($id)
    {
        $rpd = Specialization::where('id',$id)
                    ->where('status',1)
                    ->where('todelete',1)
                    ->get();
        return Response($rpd);
    }

    public function findMatbyClass($id)
    {
        $matbyClass = Material::where('MatClassID',$id)
                    ->where('status',1)
                    ->where('todelete',1)
                    ->get();
        return Response($matbyClass);
    }

    public function findMatbyUOM($id)
    {
        $matbyClass = Material::where('MatUOM',$id)
                    ->where('status',1)
                    ->where('todelete',1)
                    ->get();
        return Response($matbyClass);
    }

    public function findMatbyNone()
    {
        $none = Material::where('status',1)
                        ->where('todelete',1)
                        ->get();

        return Response($none);
    }

    public function findEquipbyType($id)
    {
        $type = Equipment::where('TypeID',$id)
                    ->where('status',1)
                    ->where('todelete',1)
                    ->get();
        return Response($type);
    }

    public function findEquipbyNone()
    {
        $none = Equipment::where('status',1)
                        ->where('todelete',1)
                        ->get();

        return Response($none);
    }

    public function edit($serveID)
    {
        $servee = ServicesOffered::find($serveID);
        return Response($servee);
    }

    public function update(Request $request, $serveID)
    {
        $servename = ServicesOffered::where('ServiceOffName', '=', $request->ServiceOffName )
                ->where('todelete','=',1)
                ->get();
        if($servename->count() == 0)
        {
            $updserve = ServicesOffered::find($serveID);
            $updserve->ServiceOffName = $request->ServiceOffName;
            $updserve->save();
            return Response($updserve);
        } 
    }
    
    public function checkbox($id)
    {
        $serve = ServicesOffered::find($id);
        if ($serve->status) {
            $serve->status=0;
        }
        else{
            $serve->status=1;
        }
        $serve->save();
    }

    public function delete($serveID)
    {
        $serve = ServicesOffered::find($serveID);
        $serve->todelete = 0;
        $serve->save();
        return Response($serve);
    }
}
