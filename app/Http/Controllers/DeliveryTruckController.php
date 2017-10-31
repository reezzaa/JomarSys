<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryTruck;
use Response;
class DeliveryTruckController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

  	public function index()
    {
        $deltCheck = DeliveryTruck::where('status','=',1)->where('todelete','=',1)
            ->get();
        return view('layouts.mainte.deliverytruck.index', compact('deltCheck'));
    }

    public function readByAjax()
    {
        $delt = DeliveryTruck::where('todelete','=',1)
        ->get();
        
        return view('layouts.mainte.deliverytruck.table', ['delt'=>$delt]);
    }
    

    public function store(Request $request)
    {
        $deltAdd = DeliveryTruck::where('strDeliTruckPlateNo', '=', $request->strDeliTruckPlateNo)
            ->where('todelete','=',1)
            ->get();

        $deltAdd2 = DeliveryTruck::where('strDeliTruckVINNo', '=', $request->strDeliTruckVINNo)
            ->where('todelete','=',1)
            ->get();

        if($deltAdd->count() == 0)
        {
            if($deltAdd2->count() == 0)
            {
                DeliveryTruck::insert(['strDeliTruckPlateNo'=>$request->strDeliTruckPlateNo,
                'strDeliTruckVINNo'=> $request->strDeliTruckVINNo,
                'dblDeliTruckCapacity'=> $request->dblDeliTruckCapacity,
                'dblDeliTruckGrossWeight'=> $request->dblDeliTruckGrossWeight,
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
       $mat = DeliveryTruck::where('strDeliTruckPlateNo', '=',$request->strDeliTruckPlateNo)
                ->where('strDeliTruckVINNo', '=', $request->strDeliTruckVINNo)
                ->where('todelete','=',1)
                ->get();

        $matt = DeliveryTruck::where('intDeliTruckID','=', $truckID)
                ->where('strDeliTruckPlateNo', '=', $request->strDeliTruckPlateNo)
                ->where('strDeliTruckVINNo', '=', $request->strDeliTruckVINNo)
                ->get();

        if($mat->count() == 0)
        {
            $updmat = DeliveryTruck::find($truckID);
            $updmat->strDeliTruckPlateNo = $request->strDeliTruckPlateNo;
            $updmat->strDeliTruckVINNo = $request->strDeliTruckVINNo;
            $updmat->dblDeliTruckCapacity = $request->dblDeliTruckCapacity;
            $updmat->dblDeliTruckGrossWeight = $request->dblDeliTruckGrossWeight;
            $updmat->save();
            return Response($updmat);
        } 
        else if($matt->count() != 0)
        {
            $updmat = DeliveryTruck::find($truckID);
            $updmat->strDeliTruckPlateNo = $request->strDeliTruckPlateNo;
            $updmat->strDeliTruckVINNo = $request->strDeliTruckVINNo;
            $updmat->dblDeliTruckCapacity = $request->dblDeliTruckCapacity;
            $updmat->dblDeliTruckGrossWeight = $request->dblDeliTruckGrossWeight;
            $updmat->save();
            return Response($updmat);
        }
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
