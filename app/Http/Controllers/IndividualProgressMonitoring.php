<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgressHeader;
use App\ProgressDetailTarget;
use App\ProgressDetailActual;
use App\ServiceOffered;
use App\Quote;
use App\EmpUsed;
use App\EquipUsed;
use App\MatUsed;
use App\StockCard;
use App\Employee;
use App\DelMaterial;
use Response;
use DB;
use Carbon\carbon;
use Config;
use App\Stock;

class IndividualProgressMonitoring extends Controller
{
    public function index()
    {
        //
        return view('layouts.transact.progressmonitoring.indindex');
    }
    public function readByAjax()
    {
        $prog = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient', 'tblIndividualClient.strIndClientID', 'tblClient.strClientID')
        ->join('tblPO','tblPO.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.strQuoteID','tblQuoteHeader.strQuoteName','tblIndividualClient.*','tblPO.strPONumber','tblQuoteHeader.status')
        ->where('tblClient.todelete',1)
        ->where('tblClient.status',1)
        ->where('tblQuoteHeader.status',2)
        ->get();

        return view('layouts.transact.progressmonitoring.indtable', ['prog'=>$prog]);
    }
    public function readByAjax2($id)
    {

        $fetch = DB::table('tblProgressHeader')
        ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        ->leftjoin('tblProgressDetailActual','tblProgressDetailActual.intProgDAProgDID','tblProgressDetailTarget.intProgID')
        ->join('tblQuoteDetail','tblQuoteDetail.intQDID','tblProgressDetailTarget.intProgDPSID')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblProgressHeader.strQuoteID')
        // ->join('tblQuoteHeader','tblQuoteHeader.strContractID','tblProgressHeader.strQuoteID')
        ->select('tblProgressDetailTarget.intProgID','tblServicesOffered.strServiceOffName','tblProgressDetailTarget.txtProgDActivity','tblProgressDetailTarget.dblProgDTargPercent','tblProgressDetailActual.dblProgActualPercent','tblProgressHeader.dblProgOverall','tblProgressDetailTarget.intProgDProgHID','tblProgressDetailTarget.status','tblQuoteDetail.intQDID','tblProgressDetailTarget.datProgDTargEndDate')
        ->where('tblServicesOffered.status',1)
        ->where('tblServicesOffered.todelete',1)
         ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intProgDAProgDID=tblProgressDetailTarget.intProgID)')
         ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblProgressHeader.strQuoteID',$id)
         ->orderby('tblProgressDetailTarget.intProgID','asc')
        ->get();
        // dd($fetch);

       

        return view('layouts.transact.progressmonitoring.indtableprogress',['fetch'=>$fetch]);
    }
     public function store(Request $request)
    {
        //
        $addTarg = Carbon::parse($request->datEnd);
        $addTarg->addDay();
        $var = new ProgressDetailTarget();
        $var->intProgDProgHID=$request->lpId;
        $var->intProgDPSID=$request->serv;
        $var->dblProgDTargPercent=100;
        $var->datProgTargStartDate=$request->datStart;
        $var->datProgDTargEndDate=$request->datEnd;
        $var->txtProgDActivity=$request->actdesc;
        $var->status=1;
        $var->datProgDTargDateToBe=$addTarg;
        $var->save();

        $g = new ProgressDetailActual();
        $g->intProgDAProgDID=$var->intProgID;
        $g->datProgDActualDate=$request->datStart;
        $g->dblProgActualPercent=0;
        $g->save();

        $i ='';
        $x ='';
        $y ='';
        for($i =0;$i< count($request->workers);$i++)
        {

            $empused = new EmpUsed();
            $empused->intEUProgID=$var->intProgID;
            $empused->strEUEmpID=$request->workers[$i];
            $empused->save();
            

        }
        for($x=0;$x< count($request->mat);$x++)
        {

            if(!is_null($request->qty[$x]))
            {
                $addDel = new DelMaterial();
                $addDel->intDelProgHID=$request->lpId;
                $addDel->intDelMatID=$request->mat[$x];
                $addDel->intDelRemainQty=$request->qty[$x];
                $addDel->save();

                    $matused = new MatUsed();
                    $matused->intMUProgID=$var->intProgID;
                    $matused->intMUMatID=$request->mat[$x];
                    $matused->intMUQty=$request->qty[$x];
                    $matused->save();

                     $sto=Stock::find($request->mat[$x]);
                        $sto->intStocks=($request->stock[$x]-$request->qty[$x]);
                        $sto->save();

                            $st = new StockCard();
                            $st->intStockMatID=$request->mat[$x];
                            $st->intStockQty=$request->stock[$x]-$request->qty[$x];
                            $st->dtmStockDate=Carbon::now(Config::get('app.timezone'));
                            $st->strStockMethod='OUT';
                            $st->intStock=$request->qty[$x];
                            $st->save();
                        }
            

           
        }
        for($y=0;$y< count($request->equip);$y++)
        {
            $equipused = new EquipUsed();
            $equipused->intEUProgID=$var->intProgID;
            $equipused->intEUEquipID=$request->equip[$y];
            $equipused->save();
        }




        

        return response::json($var);   
    }

 public function storeThis(Request $request)
    {
        $upd = new ProgressDetailActual();
        $upd->intProgDAProgDID=$request->updId;
        $upd->datProgDActualDate=Carbon::now(Config::get('app.timezone'));
        $upd->dblProgActualPercent=$request->val_range;
        $upd->save();

        $getTarg = Carbon::parse($request->updend);
        $getToBe = Carbon::parse($request->updtobe);
        $getAct = Carbon::parse($upd->datProgDActualDate);
        $great = $getTarg->gt($getAct);//ontime
        $less = $getToBe->lt($getAct);//late
        $those = $getToBe->gt($getAct);
        $these = $getAct->gt($getTarg);
        // dd($great);
        if($request->val_range < $request->updstat)
        {
           if($great||($getToBe==$getAct))
           {
            // dd('true');
            $updstatus = ProgressDetailTarget::find($request->updId);
            $updstatus->status = 1;
            $updstatus->save();

           }
           else if($less)
           {
            $updstatus = ProgressDetailTarget::find($request->updId);
            $updstatus->status = 3;
            $updstatus->save();
            // dd('false');
           }

        }
        else if ($request->val_range == $request->updstat)
        {
            if($those && $these)
            {
            $updfin = ProgressDetailTarget::find($request->updId);
            $updfin->status = 1;
            $updfin->save();
            }
            else if($great)
            {
            $updfin = ProgressDetailTarget::find($request->updId);
            $updfin->status = 2;
            $updfin->save();   
            }
            else
            {
            $updfin = ProgressDetailTarget::find($request->updId);
            $updfin->status = 3;
            $updfin->save();
            }
        }
        $showOverall = DB::table('tblQuoteHeader')
        ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->leftjoin('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        ->leftjoin('tblProgressDetailActual','tblProgressDetailActual.intProgDAProgDID','tblProgressDetailTarget.intProgID')
        ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intProgDAProgDID=tblProgressDetailTarget.intProgID)')
         ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblQuoteHeader.strQuoteID',$request->mydId)
         ->avg('dblProgActualPercent');

        $updoa = ProgressHeader::find($request->updover);
        $updoa->dblProgOverall=$showOverall;
        $updoa->save();
        // dd($updfin);
         return redirect(route('indprogressmonitoring.show',$request->mydId));

    }
    public function show($id)
    {
        $progd = DB::table('tblQuoteHeader')
        ->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient', 'tblIndividualClient.strIndClientID', 'tblClient.strClientID')
        ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.strQuoteID','tblQuoteHeader.strQuoteName','tblIndividualClient.*','tblQuoteHeader.status','tblQuoteIndDetail.*','tblProgressHeader.intProgHID')
        ->where('tblClient.todelete',1)
        ->where('tblQuoteHeader.status',2)
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->get();
        // dd($progd);

        $getWork = DB::table('tblQuoteHeader')
        ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        ->join('tblempused','tblempused.intEUProgID','tblProgressDetailTarget.intProgID')
        ->join('tblEmployee','tblEmployee.strEmpID','tblempused.strEUEmpID')
        ->select(DB::raw('distinct strEUEmpID'),'tblEmployee.*')
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->where('tblEmployee.status',1)
        ->where('tblEmployee.todelete',1)
        ->where('tblProgressDetailTarget.status','!=',0)
        ->get();
        // dd($getWork);

         $getMat = DB::table('tblQuoteHeader')
        ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        ->join('tblmatused','tblmatused.intMUProgID','tblProgressDetailTarget.intProgID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblmatused.intMUMatID')
        ->select('tblMaterial.strMaterialName','tblmatused.*','tblProgressDetailTarget.*')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->where('tblProgressDetailTarget.status','!=',0)
        ->where('tblQuoteHeader.strQuoteID',$id)

        ->get();
        // dd($getMat);

        $getEquip = DB::table('tblQuoteHeader')
        ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        ->join('tblequipused','tblequipused.intEUProgID','tblProgressDetailTarget.intProgID')
        ->join('tblEquipment','tblEquipment.intEquipID','tblequipused.intEUEquipID')
        ->select('tblEquipment.*','tblequipused.*','tblProgressDetailTarget.*')
        ->where('tblEquipment.status',1)
        ->where('tblEquipment.todelete',1)
        ->where('tblProgressDetailTarget.status','!=',0)
        ->where('tblQuoteHeader.strQuoteID',$id)
        
        ->get();



        $getSpec = DB::table('tblQuoteHeader')
        // ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblQuoteHeader.strConQuoteID')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->join('tblEmpNeed','tblEmpNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        ->select('tblspecialization.*','tblEmpNeed.*','tblServicesOffered.*')
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->get();

        $getWorker = DB::table('tblQuoteHeader')
        // ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblQuoteHeader.strConQuoteID')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->join('tblEmpNeed','tblEmpNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        ->join('tblempspec','tblempspec.intESSpecID','tblspecialization.intSpecID')
        ->join('tblEmployee','tblEmployee.strEmpID','tblempspec.strESEmpID')
        ->select('tblspecialization.*','tblEmpNeed.*','tblServicesOffered.*','tblEmployee.*')
        ->where('tblempspec.todelete',1)
        ->where('tblEmployee.todelete',1)
        ->where('tblEmployee.status',1)
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->get();
        // dd($getWorker);


        $getTotal = DB::table('tblQuoteHeader')
        ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        ->join('tblmatused','tblmatused.intMUProgID','tblProgressDetailTarget.intProgID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblmatused.intMUMatID')
        ->select(DB::raw('DISTINCT (tblmatused.intMUMatID)'),'tblMaterial.*')
        ->where('tblProgressDetailTarget.status','!=',0)
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->get();

        $getserv =DB::table('tblServicesOffered')
        ->join('tblQuoteDetail','tblQuoteDetail.intSOID','tblServicesOffered.intServiceOffID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblQuoteDetail.strQHID')
        // ->join('tblQuoteHeader','tblQuoteHeader.strConQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblServicesOffered.intServiceOffID','tblServicesOffered.strServiceOffName','tblQuoteHeader.strQuoteID','tblQuoteDetail.intQDID')
        ->where('tblServicesOffered.status',1)  
        ->where('tblServicesOffered.todelete',1)
        ->where('tblQuoteHeader.strQuoteID',$id)     
        ->get();
        // dd($getserv);

        $showOverall = DB::table('tblQuoteHeader')
        ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->leftjoin('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        ->leftjoin('tblProgressDetailActual','tblProgressDetailActual.intProgDAProgDID','tblProgressDetailTarget.intProgID')
        ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intProgDAProgDID=tblProgressDetailTarget.intProgID)')
         ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblQuoteHeader.strQuoteID',$id)
        // ->select( DB::raw("AVG(tblprogressdetailactual.dblProgActualPercent)"))
         ->avg('dblProgActualPercent');
         // dd($showOverall);

         $progh = DB::table('tblQuoteHeader')
        ->join('tblProgressHeader','tblProgressHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblProgressHeader.intProgHID')
         ->where('tblQuoteHeader.strQuoteID',$id)
         ->first();


        return view('layouts.transact.progressmonitoring.indprogressdetail', ['progd'=>$progd,
            'getserv'=>$getserv,'showOverall'=>$showOverall,'getWork'=>$getWork,'getMat'=>$getMat,'getTotal'=>$getTotal,'getEquip'=>$getEquip,'getWorker'=>$getWorker,'getSpec'=>$getSpec,'myId'=>$id,'progh'=>$progh]);
    }
    public function edit($id)
    {
        //
         $ret = DB::table('tblProgressDetailTarget')
        ->leftjoin('tblmatused','tblmatused.intMUProgID','tblProgressDetailTarget.intProgID')
        ->leftjoin('tblMaterial','tblMaterial.intMaterialID','tblmatused.intMUMatID')
        ->leftjoin('tblStocks','tblStocks.intMaterialID','tblMaterial.intMaterialID')
        ->select('tblProgressDetailTarget.*','tblmatused.*','tblStocks.intStocks')
        ->where('tblProgressDetailTarget.intProgID',$id)
        ->get();
        // dd($ret);

        return Response($ret);
    }
    public function findWorker($id)
    {
        $worker = DB::table('tblEmpNeed')
        ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        ->join('tblempspec','tblempspec.intESSpecID','tblspecialization.intSpecID')
        ->join('tblEmployee','tblEmployee.strEmpID','tblempspec.strESEmpID')
        ->select(DB::raw('distinct strEmpID'),'tblEmployee.*','tblspecialization.*')
        ->where('tblempspec.todelete',1)
        ->where('tblEmployee.todelete',1)
        ->where('tblEmployee.status',1)
        ->where('tblempspec.intESSpecID',$id)
        ->get();
        // dd($worker);
        return Response($worker);
    }
    public function findWorkerbyNone()
    {
        $workers = DB::table('tblEmpNeed')
        ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        ->join('tblempspec','tblempspec.intESSpecID','tblspecialization.intSpecID')
        ->join('tblEmployee','tblEmployee.strEmpID','tblempspec.strESEmpID')
        ->select(DB::raw('distinct strEmpID'),'tblEmployee.*','tblspecialization.*')
        ->where('tblempspec.todelete',1)
        ->where('tblEmployee.todelete',1)
        ->where('tblEmployee.status',1)
        ->get();
        return Response($workers);
    }

    public function findStock($id)
    {
      $getMat = DB::table('tblQuoteDetail')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->join('tblMatNeed','tblMatNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblMatNeed.intMaterialID')
        ->leftjoin('tblstockcard','tblmaterial.intMaterialID','tblstockcard.intStockMatID')
        ->select('tblMaterial.strMaterialName','tblMatNeed.*','tblStockCard.*')
        ->whereRaw('tblstockcard.dtmStockDate=(SELECT MAX(tblstockcard.dtmStockDate) from tblstockcard where tblstockcard.intStockMatID=tblmaterial.intMaterialID)')
        ->where('tblMaterial.status',1)
        ->where('tblMaterial.todelete',1)
        ->where('tblQuoteDetail.intQDID',$id)
        ->get();

        // dd($stock);
        return response::json($getMat);
        // return Response($mat);

    }


    public function findSpec($id)
    {
        $spec = DB::table('tblQuoteDetail')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->join('tblEmpNeed','tblEmpNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        ->select('tblspecialization.strSpecDesc','tblEmpNeed.*')
        ->where('tblQuoteDetail.intQDID',$id)
        ->get();
        return response::json($spec);

    }
     public function findEquip($id)
    {
        $equi = DB::table('tblQuoteDetail')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->join('tblEquipNeed','tblEquipNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblEquipment','tblEquipment.intEquipID','tblEquipNeed.intEquipID')
        ->select('tblEquipment.strEquipName','tblEquipNeed.*')
        ->where('tblQuoteDetail.intQDID',$id)
        ->get();
        return response::json($equi);

    }
    public function findWork($id)
    {
        $viewwork = DB::table('tblProgressDetailTarget')
        ->join('tblempused','tblempused.intEUProgID','tblProgressDetailTarget.intProgID')
        ->join('tblEmployee','tblEmployee.strEmpID','tblempused.strEUEmpID')
        ->select('tblEmployee.*')
        ->where('tblProgressDetailTarget.intProgID',$id)
        ->get();
        return response::json($viewwork);

    }
    public function findMat($id)
    {
        $viewmat = DB::table('tblProgressDetailTarget')
        ->join('tblmatused','tblmatused.intMUProgID','tblProgressDetailTarget.intProgID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblmatused.intMUMatID')
        ->select('tblMaterial.strMaterialName','tblmatused.intMUQty')
        ->where('tblProgressDetailTarget.intProgID',$id)
        ->get();
        // dd($viewmat);
        return response::json($viewmat);

    }
    public function findEqui($id)
    {
        $viewequi = DB::table('tblProgressDetailTarget')
        ->join('tblequipused','tblequipused.intEUProgID','tblProgressDetailTarget.intProgID')
        ->join('tblEquipment','tblEquipment.intEquipID','tblequipused.intEUEquipID')
        ->select('tblEquipment.strEquipName')
        ->where('tblProgressDetailTarget.intProgID',$id)
        ->get();
        return response::json($viewequi);

    }
    public function findHistory($id)
    {
        $viewhistory= DB::table('tblProgressDetailTarget')
        ->join('tblProgressDetailActual','tblProgressDetailActual.intProgDAProgDID','tblProgressDetailTarget.intProgID')
        ->select('tblProgressDetailActual.*')
        ->where('tblProgressDetailTarget.intProgID',$id)
        ->get();
        return response::json($viewhistory);

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
        $equip = ProgressDetailTarget::find($id);
        $equip->status = 0;
        $equip->save();
        $i='';
        for ($i=0; $i <count($request->demat) ; $i++) { 
        $sto=Stock::find($request->dematid[$i]);
        $sto->intStocks=($request->stoc[$i]+$request->demat[$i]);
        $sto->save();

        }

        return Response($equip);
    }

     public function indturnover($id)
    {
        $turnover = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.*','tblQuoteIndDetail.*','tblIndividualClient.*')
        ->where('tblClient.status',1)
        ->where('tblClient.todelete',1)
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->where('tblQuoteHeader.status',2)
        ->get();
        // dd($turnover);
        return Response($turnover);

    }
    public function updturnover($id)
    {
        $fin = Quote::find($id);
        $fin->status=3;
        $fin->save();
        

        return Response($fin);
    }
}
