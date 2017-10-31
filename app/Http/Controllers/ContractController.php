<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractRequest;
use Illuminate\Http\Request;
use App\Client;
use App\CompanyClient;
use App\Quote;
use App\QuoteConDetail;
use App\Contract;
use App\ProgressBilling;
use App\DownPaymentTrans;
use App\GetAmount;
use App\GetDP;
use Response;
use DB;

class ContractController extends Controller
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
        $client = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.*','tblClient.strClientType')
            ->where('tblClient.todelete','=',1)
            ->get();
        
         $qoute =DB::table('tblQuoteHeader')
         ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
         ->select('tblQuoteHeader.strQuoteName','tblQuoteHeader.strQuoteID','tblQuoteHeader.*')
         ->where('tblQuoteHeader.status',1)
         ->where('tblClient.strClientType','Company Client')
        ->get();



        $downpayment = DB::table('tblDownpayment')
        ->select('tblDownpayment.intDownID','tblDownpayment.intDownValue')
        ->get();
        $tax = DB::table('tblTax')
        ->select('tblTax.intTaxID','tblTax.intTaxValue')
        ->get();
        $recoupment = DB::table('tblRecoupment')
        ->select('tblRecoupment.intRecID','tblRecoupment.intRecValue')
        ->get();
        $retention = DB::table('tblRetention')
        ->select('tblRetention.intRetID','tblRetention.intRetValue')
        ->get();
        return view('layouts.transact.contract.contractadd.index',['qoute'=> $qoute, 'client'=>$client,'downpayment'=>$downpayment,'recoupment'=>$recoupment,'retention'=>$retention,'tax'=>$tax]);
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
    public function getContractPattern()
    {
        $id = DB::table('tblContractIDUtil')->get();
        foreach($id as $id)
        {
            return $id->strContractIDUtil;
            // dd($id);
        }
    }

    public function getLastPattern()
    {
        $id = DB::table('tblContract')
        ->select('tblContract.strContractID')
        ->orderBy('tblContract.strContractID','desc')
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
        $scanEmp = Contract::all();
        if($scanEmp->count() == 0)
        {
            $splitID = $this->Splits($this->getContractPattern());
            $incrementedID = $this->Incremented($splitID);
            $contractID = $incrementedID;
            return $contractID;
        }
        else
        {
            $splitID = $this->Splits($this->getLastPattern());
            $incrementedID = $this->Incremented($splitID);
            $contractID = $incrementedID;
            return $contractID;
        }

    }
    
    public function store(CreateContractRequest $request)
    {
        $cost = QuoteConDetail::find($request->quotation);

        $contractID = $this->getID();
           
           Contract::insert([
                'strContractID'=>$contractID,
                'strConQuoteID'=>$request->quotation,
                'intDownpaymentID'=>$request->down,
                'dblProgOverall'=>0,
                'status'=>0,
                'todelete'=>1
                ]);
           $d = ($cost->dblProjCost *$request->downvalue)/100;

           $down = new DownPaymentTrans();
           $down->strDPContractID = $contractID;
           $down->dcmDPAmount=$d;
           $down->status=0;
           $down->intDPTaxID=$request->tax;
           $down->save();

           $tax='';
           $fin = '';

           $tax = $d * ($request->taxvalue)/100;
           $fin = $d-$tax;

           $getDP = new GetDP();
           $getDP->DownP_id=$down->id;
           $getDP->initialtax = $fin;
           $getDP->taxValue=$tax;
           $getDP->save();

           $i = "";
           $lastvalue=0;
           $initial = "";
           $comret ="";
           $comrec = "";
           $final="";
           $getlastvalue=0;
           $initPB='';
           $taxPB='';
           $amount=$cost->dblProjCost;
           for($i = 0;$i < count($request->progress);$i++)
           {
                $var = new ProgressBilling();
                $var->strPBContractID=$contractID;
                $var->intPBValue=$request->progress[$i];
                $var->intPBRecID=$request->rec;
                $var->intPBRetID=$request->ret;
                $var->intPBTaxID=$request->tax;
                $var->status=0;
                    //computation

                    $getlastvalue=($request->progress[$i]-$lastvalue);
                    $initial=($amount*$getlastvalue)/100;
                    $comrec=($d*$getlastvalue)/100;
                    $comret=($initial*$request->retvalue)/100;  
                    $final= $initial-($comret+$comrec);
                    $taxPB = ($final * $request->taxvalue)/100;
                    $initPB = $final-$taxPB;
                    $lastvalue=$request->progress[$i];

                $var->dblPBAmount=$final;
                $var->save();
                $getamt = new GetAmount();
                $getamt->PB_id = $var->intPBID;
                $getamt->recValue=$comrec;
                $getamt->retValue=$comret;
                $getamt->initial=$initial;
                $getamt->initialtax = $initPB;
                $getamt->taxValue = $taxPB;
                $getamt->save();
           }
           //for 100% progress billing
                $var = new ProgressBilling();
                $var->strPBContractID=$contractID;
                $var->intPBValue=100;
                $var->intPBRecID=$request->rec;
                $var->intPBRetID=$request->ret;
                $var->intPBTaxID=$request->tax;
                $var->status=0;
                    //computation

                    $getlastvalue=(100-$lastvalue);
                    $initial=($amount*$getlastvalue)/100;
                    $comrec=($d*$getlastvalue)/100;
                    $comret=($initial*$request->retvalue)/100;  
                    $final= $initial-($comret+$comrec);
                    $taxPB = ($final * $request->taxvalue)/100;
                    $initPB = $final-$taxPB;
                    $lastvalue=100;

                $var->dblPBAmount=$final;
                $var->save();
                $getamt = new GetAmount();
                $getamt->PB_id = $var->intPBID;
                $getamt->recValue=$comrec;
                $getamt->retValue=$comret;
                $getamt->initial=$initial;
                $getamt->initialtax = $initPB;
                $getamt->taxValue = $taxPB;
                $getamt->save();

           $updquote = Quote::find($request->quotation);
           $updquote->status=2;
           $updquote->save();
           
        \Session::flash('flash_add_success','Contract Added!');
        return redirect('contractlist');

           //dapak sese di ko na alam gagawin hahahhahahahha tae hahahhaaa
               
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findByClient($id)
    {
        $clien = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->select('tblQuoteHeader.strQuoteID','tblQuoteHeader.strQuoteName')
        ->where('tblQuoteHeader.status',1)
        ->where('tblClient.strClientID',$id)
        ->get();
        return Response($clien);
    }
    public function findClientByNone()
    {
         $clients = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->select('tblQuoteHeader.strQuoteID','tblQuoteHeader.strQuoteName')
        ->where('tblQuoteHeader.status',1)
        ->get();
        return Response($clients);
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
}
