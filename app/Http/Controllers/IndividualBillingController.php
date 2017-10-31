<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use App\ServiceInvoiceHeader;
use App\ServiceInvoiceDetail;
use Carbon\carbon;
use App\Payment;
use App\PurchaseOrder;
use App\ProgressHeader;
use App\Quote;
use Config;


class IndividualBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $countbill = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.*','tblQuoteHeader.status as constatus','tblIndividualClient.*')
        ->where('tblQuoteHeader.status',"!=",3)
        ->where('tblQuoteHeader.status',"!=",0)
        ->where('tblClient.status',1)
        ->where('tblClient.todelete',1)
        // ->where('tblServiceInvoiceHeader.status',0)
        ->count();

        $countcollect = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.*','tblQuoteHeader.status as constatus','tblIndividualClient.*','tblServiceInvoiceHeader.*','tblServiceInvoiceHeader.status as serstatus')
        ->where('tblQuoteHeader.status',"!=",3)
        ->where('tblQuoteHeader.status',"!=",0)
        ->where('tblClient.status',1)
        ->where('tblClient.todelete',1)
        ->count();

        return view('layouts.transact.billing.individual.index',['countbill'=>$countbill,'countcollect'=>$countcollect]);

    }

   public function readByAjax()
    {
        $inv = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.*','tblQuoteHeader.status as constatus','tblIndividualClient.*')
        ->where('tblQuoteHeader.status',"!=",3)
        ->where('tblQuoteHeader.status',"!=",0)
        ->where('tblClient.status',1)
        ->where('tblClient.todelete',1)
        // ->where('tblServiceInvoiceHeader.status',0)
        ->get();
        return view('layouts.transact.billing.individual.table',['inv'=>$inv]);
    }
    public function readByAjax2()
    {
        $getcollect = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.*','tblQuoteHeader.status as constatus','tblIndividualClient.*','tblServiceInvoiceHeader.*','tblServiceInvoiceHeader.status as serstatus')
        ->where('tblQuoteHeader.status',"!=",3)
        ->where('tblQuoteHeader.status',"!=",0)
        ->where('tblClient.status',1)
        ->where('tblClient.todelete',1)
        ->get();

        return view('layouts.transact.billing.individual.tabled',['getcollect'=>$getcollect]);


    }

 public function getEmpPattern()
    {
        $id = DB::table('tblInvoiceIDUtil')->get();
        foreach($id as $id)
        {
            return $id->strInvoiceIDUtil;
        }
    }

    public function getLastPattern()
    {
        $id = DB::table('tblServiceInvoiceHeader')
        ->select('tblServiceInvoiceHeader.strServInvHID')
        ->orderBy('tblServiceInvoiceHeader.strServInvHID','desc')
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
        $scanEmp = ServiceInvoiceHeader::all();
        if($scanEmp->count() == 0)
        {
            $splitID = $this->Splits($this->getEmpPattern());
            $incrementedID = $this->Incremented($splitID);
            $invoiceid = $incrementedID;
            return $invoiceid;
        }
        else
        {
            $splitID = $this->Splits($this->getLastPattern());
            $incrementedID = $this->Incremented($splitID);
            $invoiceid = $incrementedID;
            return $invoiceid;
        }

    }
    public function store(Request $request)
    {
        //
        $invoiceid = $this->getID();

            $Targ =Carbon::now();
            $getTarg = Carbon::parse($Targ);

            if($request->desc=='days')
            {
                 $getTarg->addDays($request->term);
                $bill = new ServiceInvoiceHeader();
                $bill->strServInvHID=$invoiceid;
                $bill->strQuoteID=$request->quoteid;
                $bill->datServInvHDate=Carbon::now();
                $bill->status=0;
                $bill->datDueDate=$getTarg;
                $bill->save();
            }
            elseif($request->desc=='month')
            {
                if($request->term==1)
                {
                    $getTarg->addMonth();
                    $bill = new ServiceInvoiceHeader();
                    $bill->strServInvHID=$invoiceid;
                    $bill->strQuoteID=$request->quoteid;
                    $bill->datServInvHDate=Carbon::now();
                    $bill->status=0;
                    $bill->datDueDate=$getTarg;
                    $bill->save();

                }
                elseif($request->term>1)
                {
                    $getTarg->addMonths($request->term);
                    $bill = new ServiceInvoiceHeader();
                    $bill->strServInvHID=$invoiceid;
                    $bill->strQuoteID=$request->quoteid;
                    $bill->datServInvHDate=Carbon::now();
                    $bill->status=0;
                    $bill->datDueDate=$getTarg;
                    $bill->save();
                }
            }
            elseif($request->desc=='year')
            {
                if($request->term==1)
                {
                    $getTarg->addYear();
                    $bill = new ServiceInvoiceHeader();
                    $bill->strServInvHID=$invoiceid;
                    $bill->strQuoteID=$request->quoteid;
                    $bill->datServInvHDate=Carbon::now();
                    $bill->status=0;
                    $bill->datDueDate=$getTarg;
                    $bill->save();

                }
                elseif($request->term>1)
                {
                    $getTarg->addYears($request->term);
                    $bill = new ServiceInvoiceHeader();
                    $bill->strServInvHID=$invoiceid;
                    $bill->strQuoteID=$request->quoteid;
                    $bill->datServInvHDate=Carbon::now();
                    $bill->status=0;
                    $bill->datDueDate=$getTarg;
                    $bill->save();
                }
            }

                $billdetail= new ServiceInvoiceDetail();
                $billdetail->strServInvHDID=$invoiceid;
                $billdetail->dblServInvDCost=$request->amount;
                $billdetail->save();    

                return redirect(route('pdf.showind',$invoiceid));


    }
         public function getORPattern()
    {
        $id = DB::table('tblOrIDUtil')->get();
        foreach($id as $id)
        {
            return $id->strOrIDUtil;
        }
    }

    public function getLastORPattern()
    {
        $id = DB::table('tblPayment')
        ->select('tblPayment.strORNumber')
        ->orderBy('tblPayment.strORNumber','desc')
        ->first();
        foreach($id as $id)
        {
            return $id;
            // dd($id);
        }
    }

    public function getIDOR()
    {
        $scanEmp = Payment::all();
        if($scanEmp->count() == 0)
        {
            $splitID = $this->Splits($this->getORPattern());
            $incrementedID = $this->Incremented($splitID);
            $orid = $incrementedID;
            return $orid;
        }
        else
        {
            $splitID = $this->Splits($this->getLastORPattern());
            $incrementedID = $this->Incremented($splitID);
            $orid = $incrementedID;
            return $orid;
        }

    }

public function storeThis(Request $request)
    {
          $orid = $this->getIDOR();
                
                $collect = new Payment();
                $collect->strORNumber=$orid;
                $collect->dblPaymentCost=$request->paymentcost;
                $collect->datPaymentDateIssued=Carbon::now();
                $collect->txtPaymentRemarks=$request->remarks;
                $collect->strPaymentServInvHID=$request->invno;
                $collect->dblPaymentChange=$request->changed;
                $collect->save();

                $updproj = Quote::find($request->quoteid);
                $updproj->status=2;
                $updproj->save();
                
                $co = new PurchaseOrder();
                $co->strQuoteID=$request->quoteid;
                $co->strPONumber='PO#'.$request->ponumber;
                $co->datPODate=Carbon::now(Config::get('app.timezone'));
                $co->save();

                $hehe = new ProgressHeader();
                $hehe->dblProgOverall="0";
                $hehe->datProgDate=Carbon::now(Config::get('app.timezone'));
                $hehe->strQuoteID=$request->quoteid;
                $hehe->status=1;
                $hehe->save();

                $updinvoice = ServiceInvoiceHeader::find($request->invno);
                $updinvoice->status=1;
                $updinvoice->save();

                return redirect(route('pdf.orind',$orid));

            
    }
    public function show($id)
    {
        //
         $indicollect = DB::table('tblQuoteHeader')
        ->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->leftjoin('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->leftjoin('tblPO','tblPO.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.*',"tblQuoteHeader.strQuoteID as qid",'tblQuoteHeader.status as qstatus','tblServiceInvoiceHeader.*','tblServiceInvoiceHeader.status as serstatus','tblIndividualClient.*','tblQuoteIndDetail.*','tblServiceInvoiceDetail.*','tblPayment.*','tblPO.*')
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->get();
        return Response($indicollect);
    }


    public function edit($id)
    {
        //
        $indibill = DB::table('tblQuoteHeader')
        ->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteHeader.*','tblQuoteHeader.status as qstatus','tblServiceInvoiceHeader.*','tblServiceInvoiceHeader.status as serstatus','tblIndividualClient.*','tblQuoteIndDetail.*')
        ->where('tblQuoteHeader.strQuoteID',$id)
        ->get();

        return Response($indibill);
    }
   
}
