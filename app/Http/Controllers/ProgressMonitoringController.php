<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\ProgressHeader;
use App\QuoteDetail;
use App\ProgressDetailActual;
use App\ServiceOffered;
use App\Contract;
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

class ProgressMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function index()
    {
        //
        return view('layouts.transact.progressmonitoring.progress');
    }
    public function readByAjax()
    {
        $prog = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
        ->join('tblCO','tblCO.strCOContractID','tblContract.strContractID')
        ->select('tblContract.strContractID','tblQuoteHeader.strQuoteName','tblCompanyClient.strCompClientName','tblCO.strCONumber','tblContract.status')
        ->where('tblContract.todelete',1)
        ->where('tblClient.todelete',1)
        ->where('tblClient.status',1)
        ->where('tblContract.status',1)
        ->get();


        return view('layouts.transact.progressmonitoring.table', ['prog'=>$prog]);
    }

    public function readByAjax2($id)
    {
        $fetch = DB::table('tblQuoteDetail')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblQuoteDetail.strQHID')
        ->join('tblProgressDetailActual','tblProgressDetailActual.intQDID','tblQuoteDetail.intQDID')
        // ->join('tblQuoteDetail','tblQuoteDetail.intQDID','tblProgressDetailTarget.intProgDPSID')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteDetail.*','tblServicesOffered.strServiceOffName','tblContract.dblProgOverall','tblQuoteDetail.intQDID','tblQuoteDetail.status as qstatus','tblProgressDetailActual.intQDID as intProgID','tblProgressDetailActual.*')
        ->where('tblServicesOffered.status',1)
        ->where('tblServicesOffered.todelete',1)
         ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intQDID=tblQuoteDetail.intQDID)')
         // ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblContract.strContractID',$id)
         // ->orderby('tbl.intProgID','asc')
        ->get();
        // dd($fetch);

       

        return view('layouts.transact.progressmonitoring.tableprogress',['fetch'=>$fetch]);
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
            
                if($request->qty[$x]!=null)
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
        $upd->intQDID=$request->updId;
        $upd->datProgDActualDate=Carbon::now(Config::get('app.timezone'));
        $upd->dblProgActualPercent=$request->val_range;
        $upd->save();

        $getTarg = Carbon::parse($request->updtobe);
        $getToBe = Carbon::parse($request->updtobe)->addDay();
        $getAct = Carbon::parse($upd->datProgDActualDate);
        $great = $getTarg->gt($getAct);//ontime
        $less = $getToBe->lt($getAct);//late
        $those = $getToBe->gt($getAct);
        $these = $getAct->gt($getTarg);
        // dd($request->updtobe);
        if($request->val_range < $request->updstat)
        {
           if($great||($getToBe==$getAct))
           {
            // dd('true');
            $updstatus = QuoteDetail::find($request->updId);
            $updstatus->status = 1;
            $updstatus->save();

           }
           else if($less)
           {
            $updstatus = QuoteDetail::find($request->updId);
            $updstatus->status = 3;
            $updstatus->save();
            // dd('false');
           }

        }
        else if ($request->val_range == $request->updstat)
        {
            if($those && $these)
            {
            $updfin = QuoteDetail::find($request->updId);
            $updfin->status = 1;
            $updfin->save();
            }
            else if($great)
            {
            $updfin = QuoteDetail::find($request->updId);
            $updfin->status = 2;
            $updfin->save();   
            }
            else
            {
            $updfin = QuoteDetail::find($request->updId);
            $updfin->status = 3;
            $updfin->save();
            }
        }
        // dd($upd);

         return redirect(route('progressmonitoring.show',$request->mydId));

    }
    public function storeOA(Request $request)
    {

        $updoa = Contract::find($request->upmyId);
        $updoa->dblProgOverall=$request->overallt;
        $updoa->save();
        // dd($updoa->dblProgOverall);

         return redirect(route('billing.show',$request->upmyId));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progd = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
        // ->join('tblProgressHeader','tblProgressHeader.strProgHProjID','tblContract.strContractID')
        ->select('tblContract.strContractID','tblQuoteHeader.strQuoteName','tblCompanyClient.strCompClientName','tblContract.status','tblQuoteConDetail.*'/*,'tblProgressHeader.intProgHID'*/)
        ->where('tblContract.todelete',1)
        ->where('tblClient.todelete',1)
        ->where('tblContract.status',1)
        ->where('tblContract.strContractID',$id)
        ->get();

        // $getWork = DB::table('tblContract')
        // ->join('tblProgressHeader','tblProgressHeader.strProgHProjID','tblContract.strContractID')
        // ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        // ->join('tblempused','tblempused.intEUProgID','tblProgressDetailTarget.intProgID')
        // ->join('tblEmployee','tblEmployee.strEmpID','tblempused.strEUEmpID')
        // ->select(DB::raw('distinct strEUEmpID'),'tblEmployee.*')
        // ->where('tblContract.strContractID',$id)
        // ->where('tblEmployee.status',1)
        // ->where('tblEmployee.todelete',1)
        // ->where('tblProgressDetailTarget.status','!=',0)
        // ->get();
        // // dd($getWork);

        //  $getMat = DB::table('tblContract')
        // ->join('tblProgressHeader','tblProgressHeader.strProgHProjID','tblContract.strContractID')
        // ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        // ->join('tblmatused','tblmatused.intMUProgID','tblProgressDetailTarget.intProgID')
        // ->join('tblMaterial','tblMaterial.intMaterialID','tblmatused.intMUMatID')
        // ->select('tblMaterial.strMaterialName','tblmatused.*','tblProgressDetailTarget.*')
        // ->where('tblMaterial.status',1)
        // ->where('tblMaterial.todelete',1)
        // ->where('tblContract.strContractID',$id)
        // ->where('tblProgressDetailTarget.status','!=',0)

        // ->get();
        // // dd($getMat);

        // $getEquip = DB::table('tblContract')
        // ->join('tblProgressHeader','tblProgressHeader.strProgHProjID','tblContract.strContractID')
        // ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        // ->join('tblequipused','tblequipused.intEUProgID','tblProgressDetailTarget.intProgID')
        // ->join('tblEquipment','tblEquipment.intEquipID','tblequipused.intEUEquipID')
        // ->select('tblEquipment.*','tblequipused.*','tblProgressDetailTarget.*')
        // ->where('tblEquipment.status',1)
        // ->where('tblEquipment.todelete',1)
        // ->where('tblContract.strContractID',$id)
        // ->where('tblProgressDetailTarget.status','!=',0)        
        // ->get();



        // $getSpec = DB::table('tblContract')
        // ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        // ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        // ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        // ->join('tblEmpNeed','tblEmpNeed.intQDID','tblQuoteDetail.intQDID')
        // ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        // ->select('tblspecialization.*','tblEmpNeed.*','tblServicesOffered.*')
        // ->where('tblContract.strContractID',$id)
        // ->get();

        // $getWorker = DB::table('tblContract')
        // ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        // ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        // ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        // ->join('tblEmpNeed','tblEmpNeed.intQDID','tblQuoteDetail.intQDID')
        // ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        // ->join('tblempspec','tblempspec.intESSpecID','tblspecialization.intSpecID')
        // ->join('tblEmployee','tblEmployee.strEmpID','tblempspec.strESEmpID')
        // ->select('tblspecialization.*','tblEmployee.*','tblEmpNeed.*')
        // ->where('tblempspec.todelete',1)
        // ->where('tblEmployee.todelete',1)
        // ->where('tblEmployee.status',1)
        // ->where('tblContract.strContractID',$id)
        // ->get();
        // // dd($getWorker);


        // $getTotal = DB::table('tblContract')
        // ->join('tblProgressHeader','tblProgressHeader.strProgHProjID','tblContract.strContractID')
        // ->join('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
        // ->join('tblmatused','tblmatused.intMUProgID','tblProgressDetailTarget.intProgID')
        // ->join('tblMaterial','tblMaterial.intMaterialID','tblmatused.intMUMatID')
        // ->select(DB::raw('DISTINCT (tblmatused.intMUMatID)'),'tblMaterial.*')
        // ->where('tblProgressDetailTarget.status','!=',0)
        // ->where('tblContract.strContractID',$id)
        // ->get();

        // $getserv =DB::table('tblServicesOffered')
        // ->join('tblQuoteDetail','tblQuoteDetail.intSOID','tblServicesOffered.intServiceOffID')
        // ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblQuoteDetail.strQHID')
        // ->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
        // ->select('tblServicesOffered.intServiceOffID','tblServicesOffered.strServiceOffName','tblContract.strContractID','tblQuoteDetail.intQDID')
        // ->where('tblServicesOffered.status',1)  
        // ->where('tblServicesOffered.todelete',1)
        // ->where('tblContract.strContractID',$id)     
        // ->get();
        // dd($getserv);
        $coun = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblProgressDetailActual','tblProgressDetailActual.intQDID','tblQuoteDetail.intQDID')
        ->select('tblProgressDetailActual.dblProgActualPercent')
        ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intQDID=tblQuoteDetail.intQDID)')
         // ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblContract.strContractID',$id)
        // ->select( DB::raw("AVG(tblprogressdetailactual.dblProgActualPercent)"))
         ->count();

        $showOverall = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblProgressDetailActual','tblProgressDetailActual.intQDID','tblQuoteDetail.intQDID')
        ->select('tblProgressDetailActual.dblProgActualPercent')
        ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intQDID=tblQuoteDetail.intQDID)')
         // ->where('tblProgressDetailTarget.status',"!=",0)
         ->where('tblContract.strContractID',$id)
        // ->select( DB::raw("AVG(tblprogressdetailactual.dblProgActualPercent)"))
         ->get();
         // dd($showOverall);
         $overall=0;
         foreach ($showOverall as $key) {
            $overall+=$key->dblProgActualPercent;
         }
        $overall = $overall/$coun;
        // dd($overall);
         // dd($overall);

        $check = DB::table('tblContract')
        // ->join('tblContract','tblContract.strContractID','tblProgressHeader.strProgHProjID')
        ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
        ->select('tblProgressBill.status')
        ->where('tblContract.strContractID',$id)
        ->where('tblProgressBill.status',0)
        ->count();
        // dd($check);


        return view('layouts.transact.progressmonitoring.progressdetail', ['progd'=>$progd,
           'overall'=>$overall,'myId'=>$id,'check'=>$check]);
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
        $ret = DB::table('tblProgressDetailActual')
        ->join('tblQuoteDetail','tblQuoteDetail.intQDID','tblProgressDetailActual.intQDID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblQuoteDetail.strQHID')
        ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteDetail.intQDID','tblQuoteConDetail.datProjEnd','tblProgressDetailActual.dblProgActualPercent')
        ->whereRaw('tblProgressDetailActual.datProgDActualDate=(SELECT MAX(tblProgressDetailActual.datProgDActualDate)from tblProgressDetailActual where tblProgressDetailActual.intQDID=tblQuoteDetail.intQDID)')
        ->where('tblProgressDetailActual.intQDID',$id)
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

}
