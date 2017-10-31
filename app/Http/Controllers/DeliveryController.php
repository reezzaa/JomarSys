<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use App\DeliveryHeader;
use App\DeliveryDetail;
use App\DeliveryDetailT;
use App\DelMaterial;
use App\DeliveryTruck;
use Carbon\carbon;
use Config;


class DeliveryController extends Controller
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

        return view('layouts.transact.delivery.index');

    }
    public function readByAjax()
    {
        $delitable = DB::table('tblContract') 
        ->join('tblDeliveryHeader','tblDeliveryHeader.strDeliveryHProjID','tblContract.strContractID')
        ->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')

        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->select('tblQuoteHeader.strQuoteName','tblDeliveryHeader.*','tblEmployee.*')
        ->where('tblContract.status',1)
        ->where('tblContract.todelete',1)
        ->where('tblDeliveryHeader.todelete',1)
        ->where('tblDeliveryHeader.status',2)
        ->get();
        return view('layouts.transact.delivery.table',['delitable'=>$delitable]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $getProj =DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->select('tblContract.strContractID','tblQuoteHeader.strQuoteName')
        ->where('tblContract.todelete',1)
        ->where('tblContract.status',1)
        ->get();

        $getWorkers=DB::table('tblEmployee')
        ->select('tblEmployee.*')
        ->where('tblEmployee.todelete',1)
        ->where('tblEmployee.status',1)
        ->get();

        $getTrucks = DB::table('tblDeliveryTruck')
        ->select('tblDeliveryTruck.*')
        ->where('tblDeliveryTruck.todelete',1)
        ->where('tblDeliveryTruck.status',1)
        ->where('tblDeliveryTruck.active',0)
        ->get();

        $deliveryid = $this->getID();


        return view('layouts.transact.delivery.create',['getProj'=>$getProj,'getWorkers'=>$getWorkers,'getTrucks'=>$getTrucks,'deliveryid'=>$deliveryid]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getEmpPattern()
    {
        $id = DB::table('tblDeliveryIDUtil')->get();
        foreach($id as $id)
        {
            return $id->strDeliveryIDUtil;
            dd($id);
        }
    }

    public function getLastPattern()
    {
        $id = DB::table('tblDeliveryHeader')
        ->select('tblDeliveryHeader.strDeliveryHID')
        ->orderBy('tblDeliveryHeader.strDeliveryHID','desc')
        ->first();
        foreach($id as $id)
        {
            return $id;
            // dd($id);
        }

    }

    public function Splits($text)
    {
        $returnText = '';
        for ($i = 0; $i < strlen($text)-1; $i++)
        {
            if (ctype_alnum($text[$i]))
            {
                if ((ctype_alpha($text[$i]) && ctype_digit($text[$i+1])) || 
                    (ctype_digit($text[$i]) && ctype_alpha($text[$i+1])) && ctype_alnum($text[$i+1]))
                {
                    $returnText .= $text[$i];
                    $returnText .= ' ';
                }
                else
                {
                    $returnText .= $text[$i];
                }
            }
            else
            {
                if (ctype_alnum($text[$i-1]) && !(ctype_alnum($text[$i+1])))
                {
                    $returnText .= ' ';
                    $returnText .= $text[$i];
                }
                else if (ctype_alnum($text[$i-1]) && (ctype_alnum($text[$i+1])))
                {
                    $returnText .= ' ';
                    $returnText .= $text[$i];
                    $returnText .= ' ';
                }
                else if (!(ctype_alnum($text[$i])) && ctype_alnum($text[$i+1]))
                {
                    $returnText .= $text[$i];
                    $returnText .= ' ';
                }

                else
                {
                    $returnText .= $text[$i];
                }
            }
        }
        $returnText .= $text[(strlen($text))-1];
        return $returnText;
    }  

    public function Incremented($text)
    {
        $returnIncText = '';
        $incrementNext = 0;
        $dont_incrementNext = 0;
        //string to array
        $tokens = explode(' ', $text);
        //array size
        $tokens_size = sizeof($tokens);
        ///
        for ($i=$tokens_size-1; $i >= 0; $i--) { 
            //digit or not
            if(ctype_digit($tokens[$i]) && $dont_incrementNext == 0)
            {
                //string size
                $str_size = strlen($tokens[$i]);
                //increment
                $tokens[$i]++;
                if($incrementNext > 0 && $str_size > strlen($tokens[$i]))
                {
                    $tokens[$i] = str_pad($tokens[$i], $str_size, '0', STR_PAD_LEFT);
                    $dont_incrementNext++;
                    continue;
                }
                //size is smaller may zero sa unahan
                if($incrementNext == '' && $str_size > strlen($tokens[$i]))
                {
                    $tokens[$i] = str_pad($tokens[$i], $str_size, '0', STR_PAD_LEFT);
                    $incrementNext = '';
                    $dont_incrementNext++;
                }
                //equal
                else if($str_size == strlen($tokens[$i]))
                {
                    $tokens[$i] = str_pad($tokens[$i], $str_size, '0', STR_PAD_LEFT);
                    $incrementNext = '';
                    $dont_incrementNext++;
                }
                //size is larger
                else
                {
                    $tokens[$i] = str_pad('', $str_size, '0', STR_PAD_LEFT);
                    $incrementNext++;
                }
            }
        }
        for ($i=0; $i < sizeof($tokens); $i++)
        {
            $returnIncText .= $tokens[$i];
        }
        return $returnIncText;
    }

    public function getID()
    {
        $scanEmp = DeliveryHeader::all();
        if($scanEmp->count() == 0)
        {
            $splitID = $this->Splits($this->getEmpPattern());
            $incrementedID = $this->Incremented($splitID);
            $deliveryid = $incrementedID;
            return $deliveryid;
            // dd($deliveryid);
        }
        else
        {
            $splitID = $this->Splits($this->getLastPattern());
            $incrementedID = $this->Incremented($splitID);
            $deliveryid = $incrementedID;
            return $deliveryid;
            // dd($deliveryid);

        }

    }
    public function store(Request $request)
    {
        //
          $deliveryid = $this->getID();
          // dd($deliveryid);
          $delih = new DeliveryHeader();
          $delih->strDeliveryHID=$deliveryid;
          $delih->datDeliveryHDate=$request->delidate;
          // $delih->dtmDeliveryHActualDate=Carbon::now();
          $delih->strDeliveryHRemarks=$request->remarks;
          $delih->strDeliveryHProjID=$request->proj;
          $delih->strDelEmpID=$request->worker;
          $delih->status = 2;
          $delih->todelete=1;
          $delih->strDelAddress=$request->deladdress;
          $delih->strDelCity=$request->City;
          $delih->strDelProvince=$request->Province;
          $delih->save();

          $y='';
          $i='';
          for($y=0;$y< count($request->truck);$y++)
        {
            $delidt = new DeliveryDetailT();
            $delidt->strDeliTDeliHID=$deliveryid;
            $delidt->intDeliDDelID=$request->truck[$y];
            $delidt->save();

            $delitruck = DeliveryTruck::find($request->truck[$y]);
            $delitruck->active=1;
            $delitruck->save(); 
        }

        for($i=0;$i< count($request->mat);$i++)
        {
            
            if($request->qty[$i]!=null)
            {
            $delid = new DeliveryDetail();
            $delid->strDeliDDeliHID=$deliveryid;
            $delid->intDeliDMatID=$request->mat[$i];
            $delid->intDeliDQty=$request->qty[$i];
            $delid->save();
            }

               
           
        }

        return Response($delih);

    }

     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findDelMat($id)
    {
        $delmat = DB::table('tblContract')
        ->join('tblProgressHeader','tblProgressHeader.strProgHProjID','tblContract.strContractID')
        ->join('tblDelMaterial','tblDelMaterial.intDelProgHID','tblProgressHeader.intProgHID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblDelMaterial.intDelMatID')
        ->join('tblDetailUOM','tblDetailUOM.intDetailUOMID','tblMaterial.intMatUOM')
        ->select(DB::raw('distinct intDelMatID'),'tblMaterial.*','tblDetailUOM.strUOMUnitSymbol')
        ->where('tblContract.strContractID',$id)
        ->get();
        // ->sum('intDelRemainQty');
        // dd($delmat);
        return Response($delmat);
    }
    public function findTruck($id)
    {
        $deltruck = DB::table('tblDeliveryHeader')
        ->join('tblDeliveryDetailT','tblDeliveryDetailT.strDeliTDeliHID','tblDeliveryHeader.strDeliveryHID')
        ->join('tblDeliveryTruck','tblDeliveryTruck.intDeliTruckID','tblDeliveryDetailT.intDeliDDelID')
        ->select('tblDeliveryTruck.*','tblDeliveryHeader.*')
        ->where('tblDeliveryHeader.strDeliveryHID',$id)
        ->get();
        // dd($delmat);
        return Response($deltruck);
    }
    public function findMatD($id)
    {
        $delmat = DB::table('tblDeliveryHeader')
        ->join('tblDeliveryDetail','tblDeliveryDetail.strDeliDDeliHID','tblDeliveryHeader.strDeliveryHID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblDeliveryDetail.intDeliDMatID')
        ->select('tblMaterial.*','tblDeliveryDetail.*')
        ->where('tblDeliveryHeader.strDeliveryHID',$id)
        ->get();
        // dd($delmat);
        return Response($delmat);
    }
    public function findDel($id)
    {
       $del = DB::table('tblDeliveryHeader')
        ->select('tblDeliveryHeader.strDeliveryHID')
        ->where('tblDeliveryHeader.strDeliveryHID',$id)
        ->first();
        foreach ($del as $k ) {
            # code...
        return Response($k);

        }
    }




    public function show($id)
    {
        //
         


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
       $fetch = DB::table('tblDeliveryHeader')
        ->select('tblDeliveryHeader.strDeliveryHID')
        ->where('tblDeliveryHeader.strDeliveryHID',$id)
        ->first();
        foreach ($fetch as $key ) {
            # code...
        return Response($key);

        }
        // dd($del);
        // dd($id);
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
        $upddel = DeliveryHeader::find($id);
        $upddel->status=1;
        $upddel->save();

        $upddeltruck=DB::table('tblDeliveryTruck')
        ->join('tblDeliveryDetailT','tblDeliveryDetailT.intDeliDDelID','tblDeliveryTruck.intDeliTruckID')
        ->select('tblDeliveryTruck.intDeliTruckID')
        ->where('tblDeliveryDetailT.strDeliTDeliHID',$id)
        ->get();
        foreach ($upddeltruck as $key) {
            # code...
            $upd= DeliveryTruck::find($key->intDeliTruckID);
            $upd->active=0;
            $upd->save();
        }

        return Response($upddel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function delete($id)
    {
        $del = DeliveryHeader::find($id);
        $del->todelete = 0;
        $del->save();

        $upddeltr=DB::table('tblDeliveryTruck')
        ->join('tblDeliveryDetailT','tblDeliveryDetailT.intDeliDDelID','tblDeliveryTruck.intDeliTruckID')
        ->select('tblDeliveryTruck.intDeliTruckID')
        ->where('tblDeliveryDetailT.strDeliTDeliHID',$id)
        ->get();
        foreach ($upddeltr as $key) {
            # code...
            $updt= DeliveryTruck::find($key->intDeliTruckID);
            $updt->active=0;
            $updt->save();
           } 
        return Response($del);
    }
}
