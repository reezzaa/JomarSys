<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\O;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\DeliveryTruck;
use Response;
class DeliveryTruckController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:operations');
    }

  	public function index()
    {
        $deltCheck = DeliveryTruck::where('status','=',1)->where('todelete','=',1)
            ->get();
        return view('layouts.O.mainte.deliverytruck.index', compact('deltCheck'));
    }

    public function readByAjax()
    {
        $delt = DeliveryTruck::where('todelete','=',1)
        ->get();
        
        return view('layouts.O.mainte.deliverytruck.table', ['delt'=>$delt]);
    }
    

    public function store(Request $request)
    {
        $deltAdd = DeliveryTruck::where('DeliTruckPlateNo', '=', $request->DeliTruckPlateNo)
            ->where('todelete','=',1)
            ->get();

        $deltAdd2 = DeliveryTruck::where('DeliTruckVINNo', '=', $request->DeliTruckVINNo)
            ->where('todelete','=',1)
            ->get();

        if($deltAdd->count() == 0)
        {
            if($deltAdd2->count() == 0)
            {
                DeliveryTruck::insert(['DeliTruckPlateNo'=>$request->DeliTruckPlateNo,
                'DeliTruckVINNo'=> $request->DeliTruckVINNo,
                'DeliTruckCapacity'=> $request->DeliTruckCapacity,
                'DeliTruckGrossWeight'=> $request->DeliTruckGrossWeight,
                'todelete'=>1,
                'status'=>1,
                'active'=>0,
                ]);
                return Response($deltAdd2);
            }
        }
    }
    
    public function edit($deltID)
    {
        $matclasse = DeliveryTruck::find($deltID);
        return Response($matclasse);
    }

    public function update(Request $request, $truckID)
    {
            $updmat = DeliveryTruck::find($truckID);
            $updmat->DeliTruckPlateNo = $request->DeliTruckPlateNo;
            $updmat->DeliTruckVINNo = $request->DeliTruckVINNo;
            $updmat->DeliTruckCapacity = $request->DeliTruckCapacity;
            $updmat->DeliTruckGrossWeight = $request->DeliTruckGrossWeight;
            $updmat->save();
            return Response($updmat);
    }

    public function checkbox($id)
    {
        $matclass = DeliveryTruck::find($id);
        if ($matclass->status) {
            $matclass->status=0;
        }
        else{
            $matclass->status=1;
        }
        $matclass->save();
    }

    public function delete($deltID)
    {
        $matclass = DeliveryTruck::find($deltID);
        $matclass->todelete = 0;
        $matclass->save();
        return Response($matclass);
    }
}
