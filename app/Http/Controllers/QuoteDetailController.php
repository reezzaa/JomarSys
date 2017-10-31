<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuoteDetail;
use App\Quote;
use App\Material;
use App\MaterialClass;
use App\MatNeed;
use App\DetailUOM;
use App\Client;
use App\CompanyClient;
use App\ServicesOffered;
use App\QuoteConDetail;
use App\ProgressDetailActual;
use App\EquipType;
use App\Equipment;
use App\EquipNeed;
use App\EmpNeed;
use App\Specialization;
use App\QuoteAdditional;
use DB;
use Response;
use Carbon\carbon;

class QuoteDetailController extends Controller
{

    public function newresource($id)
    {
        $quoteD = QuoteDetail::join('tblServicesOffered','tblQuoteDetail.intSOID','tblServicesOffered.intServiceOffID')
                ->select('tblQuoteDetail.*','tblServicesOffered.*')
                ->where('intQDID',$id)->get();
        $material = Material::join('tblMaterialClass','tblMaterial.intMatClassID','tblMaterialClass.intMatClassID')
                    ->select('tblMaterial.*','tblMaterialClass.*')
                    ->where('tblMaterial.status',1)
                    ->where('tblMaterial.todelete',1)
                    ->get();
        $materialClass = MaterialClass::where('status',1)
                        ->where('todelete',1)
                        ->get();
        $uom = DetailUOM::where('status',1)
                        ->where('todelete',1)
                        ->get();

        $equipType = EquipType::where('status',1)->where('todelete',1)->get();
        $equip = Equipment::where('status',1)->where('todelete',1)->get();

        $spec = Specialization::where('status',1)->where('todelete',1)->get();

        return view('layouts.transact.quote.add.resource.index', compact('quoteD','material','materialClass','uom','equipType','equip','spec'));
    }

    public function readMaterial($id)
    {
        $quoteMat = Material::join('tblMatNeed','tblMaterial.intMaterialID','tblMatNeed.intMaterialID')
                    ->join('tblMaterialClass','tblMaterial.intMatClassID','tblMaterialClass.intMatClassID')
                    ->select('tblMatNeed.*','tblMaterial.*','tblMaterialClass.strMatClassName')
                    ->where('tblMatNeed.intQDID',$id)
                    ->get();
        return view('layouts.transact.quote.add.resource.tablemat',compact('quoteMat'));
    }

    public function readEquipment($id)
    {
        $quoteEquip = Equipment::join('tblEquipNeed','tblEquipment.intEquipID','tblEquipNeed.intEquipID')
                    ->select('tblEquipNeed.*','tblEquipment.*')
                    ->where('tblEquipNeed.intQDID',$id)
                    ->get();
        return view('layouts.transact.quote.add.resource.tableequip',compact('quoteEquip'));
    }

    public function readWorker($id)
    {
        $workspec = Specialization::join('tblEmpNeed','tblSpecialization.intSpecID','tblEmpNeed.intSpecID')
                    ->select('tblEmpNeed.*','tblSpecialization.*')
                    ->where('tblEmpNeed.intQDID',$id)
                    ->get();
        return view('layouts.transact.quote.add.resource.tableworker',compact('workspec'));
    }


    public function findMatbyClass($id)
    {
        $matbyClass = Material::where('intMatClassID',$id)
                    ->where('status',1)
                    ->where('todelete',1)
                    ->get();
        return Response($matbyClass);
    }

    public function findMatbyUOM($id)
    {
        $matbyClass = Material::where('intMatUOM',$id)
                    ->where('status',1)
                    ->where('todelete',1)
                    ->get();
        return Response($matbyClass);
    }

    public function findMatbyNone()
    {
        $matbyClass = Material::where('status',1)
                        ->where('todelete',1)
                        ->get();

        return Response($matbyClass);
    }

    public function addMatQuote(Request $request)
    {
        $material = MatNeed::where('intQDID', '=', $request->intQDID )
            ->where('intMaterialID','=',$request->intMaterialID)
            ->get();

        if($material->count() == 0)
        {
            MatNeed::insert(['intQDID'=>$request->intQDID,
                'intMaterialID'=>$request->intMaterialID,
                'intQty'=>$request->intQty,
                'dcmUnitCost'=>$request->dcmUnitCost
                ]);

            $addthis = $request->dcmUnitCost;
            DB::table('tblQuoteDetail')->where('intQDID',$request->intQDID)
                ->increment('dcmQuoteServiceCost',$addthis);
            return Response($material);
        }   
    }


    public function addEquipQuote(Request $request)
    {
        $equip = EquipNeed::where('intQDID', '=', $request->intQDID )
            ->where('intEquipID','=',$request->intEquipID)
            ->get();

        if($equip->count() == 0)
        {
            EquipNeed::insert(['intQDID'=>$request->intQDID,
                'intEquipID'=>$request->intEquipID,
                'dcmUnitPrice'=>$request->dcmUnitPrice,
                'intQty'=>$request->intQty,
                'dcmUnitCost'=>$request->dcmUnitCost
                ]);

            $addthis = $request->dcmUnitCost;
            DB::table('tblQuoteDetail')->where('intQDID',$request->intQDID)
                ->increment('dcmQuoteServiceCost',$addthis);
            return Response($equip);
        }   
    }

    public function addWorkerQuote(Request $request)
    {
        $worker = EmpNeed::where('intQDID', '=', $request->intQDID )
            ->where('intSpecID','=',$request->intSpecID)
            ->get();

        if($worker->count() == 0)
        {
            EmpNeed::insert(['intQDID'=>$request->intQDID,
                'intSpecID'=>$request->intSpecID,
                'dcmrate'=>$request->dcmrate,
                'dcmhour'=>$request->dcmhour,
                'intQty'=>$request->intQty,
                'dcmTotLaborCost'=>$request->dcmTotLaborCost
                ]);

            $addthis = $request->dcmTotLaborCost;
            DB::table('tblQuoteDetail')->where('intQDID',$request->intQDID)
                ->increment('dcmQuoteServiceCost',$addthis);
            return Response($worker);
        }   
    }

    public function finalquote(Request $request)
    {
        
        // dd($cost);


        $var = new QuoteConDetail();
        $var->strQuoteID=$request->id;
        $var->intTerm=$request->strTermPayment;
        $var->strTermDate=$request->termdate;
        $var->strContractLocation=$request->location;
        $var->datProjStart=$request->datStart;
        $var->datProjEnd=$request->datEnd;
        $var->dblProjCost=$request->final;
        $var->strPurpose=$request->purpose;
        $var->intFormID=$request->strFormPayment;
        $var->taxvalue=$request->taxvalue;
        $var->initial=$request->initial;
        $var->save();


        $upd = Quote::find($request->id);
        $upd->status = 1;
        $upd->save();

        return Response($upd);
    }
    public function finalquote2(Request $request)
    {
        // $cost =DB::table('tblQuoteHeader')
        //  ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        //  ->select('tblQuoteDetail.dcmQuoteServiceCost')
        //  ->where('tblQuoteHeader.strQuoteID',$request->id)
        // ->sum('dcmQuoteServiceCost');
        // dd($cost);

        // $withTax = ($cost * $request->taxvalue)/100; 
        // $finalcost = $cost + $withTax;
        // $initial = $finalcost-$withTax;

        // $var = new QuoteIndDetail();
        // $var->strQuoteID=$request->id;
        // $var->intTerm=$request->strTermPayment;
        // $var->strTermDate=$request->termdate;
        // $var->datProjStart=$request->datQStart;
        // $var->datProjEnd=$request->datQEnd;
        // $var->dblProjCost=$request->final;
        // $var->intFormID=$request->strFormPayment;
        // $var->initialtax=$request->initial;
        // $var->taxValue=$request->taxvalue;
        // $var->save();


        // $upd = Quote::find($request->id);
        // $upd->status = 1;
        // $upd->save();

        // return Response($upd);
    }
    public function quoteadditional(Request $request)
    {
        $qa = new QuoteAdditional();
        $qa->strQAdesc=$request->addDesc;
        $qa->dblQAamt=$request->amt;
        $qa->strQuoteID=$request->qdid;
        $qa->save();

        return Response($qa);


    }
    public function readAdditional($id)
    {
        $re = DB::table('tblQuoteHeader')
        ->join('tblQuoteAdditional','tblQuoteAdditional.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteAdditional.*')
        ->where('tblQuoteAdditional.strQuoteID',$id)
        ->get();

        return view('layouts.transact.quote.add.tableadditional',compact('re'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $service = QuoteDetail::where('strQHID', '=', $request->strQHID )
            ->where('intSOID','=',$request->intSOID)
            ->get();

        if($service->count() == 0)
        {
            $service = QuoteDetail::insertGetId(['strQHID'=>$request->strQHID,
                'intSOID'=>$request->intSOID,
                'dcmQuoteServiceCost'=>0,
                'strQuoteDesc'=>$request->strQuoteDesc,
                'status'=>1
                ]);
            // dd($service);

            $actual = new ProgressDetailActual();
            $actual->intQDID=$service;
            $actual->datProgDActualDate=Carbon::now();
            $actual->dblProgActualPercent=0;
            $actual->save();

            return Response($service);
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

        $quote = Client::join('tblCompanyClient', 'tblClient.strClientID', '=', 'tblCompanyClient.strCompClientID')
            ->join('tblQuoteHeader', 'tblClient.strClientID', '=', 'tblQuoteHeader.strClientID')
            ->select('tblCompanyClient.*','tblQuoteHeader.*')
            ->where('tblQuoteHeader.strQuoteID',$id)
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get();

        
         $form = DB::table('tblpaymentform')
        ->select('tblpaymentform.intFormID','tblpaymentform.strFormName')
         ->where('status',1)
        ->get();

        $serveOff = ServicesOffered::where('status',1)->where('todelete',1)->get();

        $tax = DB::table('tblTax')
        ->select('tblTax.intTaxID','tblTax.intTaxValue')
        ->first();

        return view('layouts.transact.quote.add.draft.index',compact('quote','serveOff','form','tax'));

       
    }

    public function readByAjax($id)
    {
       $qdserve = MatNeed::join('tblQuoteHeader', 'tblMatNeed.strQHID', '=', 'tblQuoteHeader.strQHID')
            ->join('tblMaterial', 'tblMatNeed.intMaterialID', '=', 'tblMaterial.intMaterialID')
            ->where('tblMatNeed.strQHID',$id)
            ->select('tblMatNeed.*','tblMaterial.*')
            ->get();
        return view('layouts.transact.quote.material', compact('qdserve'));
    }
    public function readByAjax2($id)
    {
       $qdserve = EquipNeed::join('tblQuoteDetail', 'tblEquipNeed.intQDID', '=', 'tblQuoteDetail.intQDID')
            ->join('tblEquipment', 'tblEquipNeed.intEquipID', '=', 'tblEquipment.intEquipID')
            ->where('tblEquipNeed.intQDID',$id)
            ->select('tblEquipNeed.*','tblEquipment.*')
            ->get();
        return view('layouts.transact.quote.equipment', compact('qdserve'));
    }
    public function readByAjax3($id)
    {
       $qdserve = EquipNeed::join('tblQuoteDetail', 'tblEquipNeed.intQDID', '=', 'tblQuoteDetail.intQDID')
            ->join('tblEquipment', 'tblEquipNeed.intEquipID', '=', 'tblEquipment.intEquipID')
            ->where('tblEquipNeed.intQDID',$id)
            ->select('tblEquipNeed.*','tblEquipment.*')
            ->get();
        return view('layouts.transact.quote.worker', compact('qdserve'));
    }
    public function compute($id)
    {

        $serv = DB::table('tblQuoteHeader')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        // ->join('tblQuoteAdditional','tblQuoteAdditional.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select(DB::raw('SUM(tblQuoteDetail.dcmQuoteServiceCost) as cost'))
        ->where('tblQuoteDetail.strQHID',$id)
        ->first();
        $addi = DB::table('tblQuoteHeader')
        // ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblQuoteAdditional','tblQuoteAdditional.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select(DB::raw('SUM(tblQuoteAdditional.dblQAamt) as Qamt'))
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->first();

        // dd($serv);
        // $initial= 
          $sum= $serv->cost + $addi->Qamt;

        // dd($sum);


        return Response($sum);
    }

    /**
     * Show the form for editidcmQuoteServiceCostng the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function getaddmaterial($id)
    {
        $qdid = QuoteDetail::find($id);
        $qdids = QuoteDetail::where('intQDID',$id)->get();
        $mats = Material::get();
        return view('layouts.transact.quote.addmaterial',compact('qdid','qdids','mats'));
    }
    public function postaddmaterial(Request $request)
    {
         $material = MatNeed::where('intQDID', '=', $request->intQDID )
            ->where('intMaterialID','=',$request->intMaterialID)
            ->get();

        if($material->count() == 0)
        {
            MatNeed::insert(['intQDID'=>$request->intQDID,
                'intMaterialID'=>$request->intMaterialID,
                'intQty'=>$request->intQty
                ]);
            return Response($material);
        }   
    }

    public function getaddequipment($id)
    {
        $qdid = QuoteDetail::find($id);
        $qdids = QuoteDetail::where('intQDID',$id)->get();
        $equip = Equipment::get();
        return view('layouts.transact.quote.addequipment',compact('qdid','qdids','equip'));
    }
    public function postaddequipment(Request $request)
    {
        $equipment = EquipNeed::where('intQDID', '=', $request->intQDID )
            ->where('intEquipID','=',$request->intEquipID)
            ->get();

        if($equipment->count() == 0)
        {
            EquipNeed::insert(['intQDID'=>$request->intQDID,
                'intEquipID'=>$request->intEquipID,
                'intQty'=>$request->intQty
                ]);
            return Response($equipment);
        }   
    }
    public function getaddworker($id)
    {
        $qdid = EmpNeed::find($id);
        $qdids = QuoteDetail::where('intQDID',$id)->get();
        $worker = Specialization::get();
        return view('layouts.transact.quote.addworker',compact('qdid','qdids','worker'));
    }
    public function postaddworker(Request $request)
    {
    }
    public function getMatPrice($id)
    {
        $matprice = Material::where('intMaterialID',$id)->get();
        
        return Response($matprice);
    }
    public function getQDID()
    {
        $QDID = QuoteDetail::get()->last();

        return Response($QDID);
    }
}
    