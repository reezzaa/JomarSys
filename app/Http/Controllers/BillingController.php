<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use App\ServiceInvoiceHeader;
use App\ServiceInvoiceDetail;
use Carbon\carbon;
use App\DownPaymentTrans;
use App\ProgressBilling;
use App\Payment;
use App\Contract;
use App\ContractOrder;
use App\ProgressHeader;
use Config;
use PDF;




class BillingController extends Controller
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
        $countbill = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
        ->select('tblContract.*','tblCompanyClient.*','tblQuoteHeader.strQuoteName','tblContract.status as constatus')
        ->where('tblContract.todelete','=',1)
        ->where('tblClient.todelete','=',1)
        ->where('tblClient.status','=',1)
        ->where('tblContract.status','!=',3)
        ->count();

        $countcollect = DB::table('tblContract')
        // ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
        ->select('tblContract.*',/*'tblServiceInvoiceHeader.*',*/'tblCompanyClient.*','tblQuoteHeader.*')
        ->where('tblContract.todelete','=',1)
        ->where('tblClient.todelete','=',1)
        ->where('tblClient.status','=',1)
        ->where('tblContract.status','!=',3)
        ->count();

        return view('layouts.transact.billing.company.index',['countbill'=>$countbill,'countcollect'=>$countcollect]);
    }
    public function readByAjax()
    {
        $getcontract = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
        ->select('tblContract.*','tblCompanyClient.*','tblQuoteHeader.strQuoteName','tblContract.status as constatus')
        ->where('tblContract.todelete','=',1)
        ->where('tblClient.todelete','=',1)
        ->where('tblClient.status','=',1)
        ->where('tblContract.status','!=',3)
        ->get();

        return view('layouts.transact.billing.company.table',['getcontract'=>$getcontract]);

    }
    public function readByAjax2()
    {
        $getcollect = DB::table('tblContract')
        // ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient', 'tblCompanyClient.strCompClientID', 'tblClient.strClientID')
        ->select('tblContract.*',/*'tblServiceInvoiceHeader.*',*/'tblCompanyClient.*','tblQuoteHeader.*')
        ->where('tblContract.todelete','=',1)
        ->where('tblClient.todelete','=',1)
        ->where('tblClient.status','=',1)
        ->where('tblContract.status','!=',3)
        ->get();

        return view('layouts.transact.billing.company.table2',['getcollect'=>$getcollect]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                $bill->strServInvHProjID=$request->invoice;
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
                    $bill->strServInvHProjID=$request->invoice;
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
                    $bill->strServInvHProjID=$request->invoice;
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
                    $bill->strServInvHProjID=$request->invoice;
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
                    $bill->strServInvHProjID=$request->invoice;
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

                if(($request->mode)=="Downpayment")
                {
                    $down = DownPaymentTrans::find($request->getID);
                    $down->status=2;
                    $down->save();
                }
                else
                {
                    $prog = ProgressBilling::find($request->getID);
                    $prog->status=2;
                    $prog->save();
                }

               

                return redirect(route('pdf.show',$invoiceid));

       
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

            if(($request->mode)=="Downpayment")
            {
                $collect = new Payment();
                $collect->strORNumber=$orid;
                $collect->dblPaymentCost=$request->paymentcost;
                $collect->datPaymentDateIssued=Carbon::now(Config::get('app.timezone'));
                $collect->txtPaymentRemarks=$request->remarks;
                $collect->strPaymentServInvHID=$request->invno;
                $collect->dblPaymentChange=$request->changed;
                $collect->save();

                $updproj = Contract::find($request->getId);
                $updproj->status=1;
                $updproj->save();
                
                $co = new ContractOrder();
                $co->strCOContractID=$request->getId;
                $co->strCONumber='CO#'.$request->conumber;
                $co->datCODate=Carbon::now(Config::get('app.timezone'));
                $co->save();

                $updinvoice = ServiceInvoiceHeader::find($request->invno);
                $updinvoice->status=1;
                $updinvoice->save();

                $upddown = DownPaymentTrans::find($request->getId2);
                $upddown->status=1;
                $upddown->save();
            }
            else
            {
                $collect = new Payment();
                $collect->strORNumber=$orid;
                $collect->dblPaymentCost=$request->paymentcost;
                $collect->datPaymentDateIssued=Carbon::now(Config::get('app.timezone'));
                $collect->txtPaymentRemarks=$request->remarks;
                $collect->strPaymentServInvHID=$request->invno;
                $collect->dblPaymentChange=$request->changed;
                $collect->save();

                $updinvoice = ServiceInvoiceHeader::find($request->invno);
                $updinvoice->status=1;
                $updinvoice->save();

                $updprog = ProgressBilling::find($request->getId2);
                $updprog->status=1;
                $updprog->save();  
            }

        return redirect(route('pdf.orcomp',$orid));
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showThis($id)
    {
        $collectdown = DB::table('tblContract')
        ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblServiceInvoiceDetail.*', 'tblDownP.*','tblDownP.status as dstatus')
        ->where('tblContract.strContractID',$id)
        ->where('tblContract.todelete','=',1)
        ->where('tblServiceInvoiceHeader.status',0)
        ->where('tblDownP.status',"!=",1)
        ->orderby('tblServiceInvoiceHeader.datServInvHDate','DESC')
        ->first();

        $collectprog=DB::table('tblContract')
        ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
        ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblServiceInvoiceDetail.*','tblProgressBill.*','tblProgressBill.status as pbstatus')
        ->where('tblContract.strContractID',$id)
        ->where('tblContract.todelete','=',1)
        ->where('tblServiceInvoiceHeader.status',0)
        ->where('tblDownP.status',"=",1)
        ->where('tblProgressBill.status',"!=",1)
        ->orderby('tblServiceInvoiceHeader.datServInvHDate','DESC')
        ->orderby('tblProgressBill.intPBValue','ASC')
        ->first();

        $data = 0;

        if(count($collectdown)== 0)
        {
            return response::json($collectprog);
        }
        else if (count($collectprog)==0)
        {
            return response::json($collectdown);

        }




        // dd($collectdown);
        // return response::json($collectdown);
    }
    public function show($id)
    {
        //
        $table=DB::table('tblContract')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
            ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
            ->join('tblRetention','tblRetention.intRetID','tblProgressBill.intPBRetID')
            ->join('tblRecoupment','tblRecoupment.intRecID','tblProgressBill.intPBRecID')
            ->join('tblTax','tblTax.intTaxID','tblProgressBill.intPBTaxID')
            ->join('tblGetAmount','tblGetAmount.PB_id','tblProgressBill.intPBID')
            ->select('tblContract.*','tblProgressBill.*','tblDownP.*','tblProgressBill.status as pbstatus','tblRetention.*','tblRecoupment.*','tblGetAmount.*')
            ->where('tblContract.strContractID',$id)
            ->where('tblContract.todelete','=',1)
            ->orderby('tblProgressBill.intPBValue','ASC')
            ->get();

         $showDown=DB::table('tblContract')
            ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
            ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
            ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
            ->join('tblTax','tblTax.intTaxID','tblDownP.intDPTaxID')
            ->join('tblGetDP','tblGetDP.DownP_id','tblDownP.id')
            ->select('tblDownP.*','tblDownP.status as downstatus','tblDownpayment.*','tblContract.*','tblGetDP.*','tblQuoteConDetail.*')
            ->where('tblContract.strContractID',$id)
            ->where('tblContract.todelete','=',1)
            // ->where('tblDownP.status',0)
            ->first();

        $getTerms = DB::table('tblQuoteConDetail')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblQuoteConDetail.strQuoteID')
        ->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblQuoteConDetail.intTerm','tblQuoteConDetail.strTermDate')
        ->where('tblContract.strContractID',$id)
        ->get();

        $showDown->dblProjCost=number_format($showDown->dblProjCost,2);
            $showDown->dcmDPAmount=number_format($showDown->dcmDPAmount,2);
            $showDown->initialtax=number_format($showDown->initialtax,2);
            $showDown->taxValue=number_format($showDown->taxValue,2);

        foreach ($table as $t) 
        {
            $t->initial=number_format($t->initial,2);
            $t->recValue=number_format($t->recValue,2);
            $t->retValue=number_format($t->retValue,2);
            $t->dblPBAmount=number_format($t->dblPBAmount,2);
            $t->initialtax=number_format($t->initialtax,2);
            $t->taxValue=number_format($t->taxValue,2);

        }

// dd($due);
        return view('layouts.transact.billing.company.show',['table'=> $table,'showDown'=>$showDown,'getTerms'=>$getTerms]);

       
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
        $com=DB::table('tblContract')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
            ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
            ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
            ->select('tblDownP.dcmDPAmount as amount1','tblDownpayment.intDownValue as progress1','tblDownP.id','tblDownP.status','tblServiceInvoiceHeader.datDueDate')
            ->where('tblContract.strContractID',$id)
            ->where('tblContract.todelete','=',1)
            ->where('tblDownP.status',"!=",1)
            ->first();
         

         $showPB=DB::table('tblContract')
            ->join('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
            // ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
            ->join('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
            // ->join('tblProgressHeader','tblProgressHeader.strProgHProjID','tblContract.strContractID')
            ->leftjoin('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
            // ->leftjoin('tblProgressDetailTarget','tblProgressDetailTarget.intProgDProgHID','tblProgressHeader.intProgHID')
            ->select('tblProgressBill.intPBValue as progress','tblProgressBill.dblPBAmount as amount','tblProgressBill.intPBID','tblProgressBill.status','tblContract.dblProgOverall as overall','tblServiceInvoiceHeader.datDueDate')
            ->where('tblContract.strContractID',$id)
            ->where('tblContract.todelete','=',1)
            ->where('tblDownP.status',1)
            ->where('tblProgressBill.status',"!=",1)
            ->orderby('tblProgressBill.intPBValue','ASC')
            ->first();

        if(count($com)== 0)
        {
            // dd($showPB);
            // $showPB->dblPBAmount=number_format($t->dblPBAmount,2);

            return response::json($showPB);

        }
        else
        {
            // $com->dcmDPAmount=number_format($t->dcmDPAmount,2);

            return response::json($com);
        }    

    }

    public function turnover($id)
    {
        $turnover = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->select('tblContract.*','tblQuoteHeader.*','tblQuoteConDetail.*','tblCompanyClient.*')
        ->where('tblContract.todelete',1)
        ->where('tblContract.status',1)
        ->where('tblClient.status',1)
        ->where('tblClient.todelete',1)
        ->where('tblContract.strContractID',$id)
        ->where('tblQuoteHeader.status',2)
        ->get();



        return response::json($turnover);

    }
    public function showCollect($id)
    {
        $getdata = DB::table('tblContract')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->join('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblServiceInvoiceDetail.*')
        ->where('tblContract.todelete',1)
        ->where('tblContract.status','!=',3)
        ->where('tblContract.strContractID',$id)
        ->get();

        foreach($getdata as $getdat)
        {
            $getdat->dblPaymentCost=number_format($getdat->dblPaymentCost,2);
            $getdat->dblServInvDCost=number_format($getdat->dblServInvDCost,2);
            $getdat->dblPaymentChange=number_format($getdat->dblPaymentChange,2);
        }

        return view('layouts.transact.billing.company.collect',['getdata'=>$getdata,'myId'=>$id]);
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
        $close = Contract::find($id);
        $close->status=3;
        $close->save();

        return response::json($close);

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
