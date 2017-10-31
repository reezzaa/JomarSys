<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ServicesOffered;
use App\Client;
use App\CompanyClient;
use App\IndividualClient;
use App\QuoteDetail;
use App\Material;
use App\Quote;
use App\MatNeed;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function readByAjax($id)
    {
       $qdserve = QuoteDetail::join('tblQuoteHeader', 'tblQuoteDetail.strQHID', '=', 'tblQuoteHeader.strQuoteID')
            ->join('tblServicesOffered', 'tblQuoteDetail.intSOID', '=', 'tblServicesOffered.intServiceOffID')
            ->select('tblQuoteDetail.*','tblServicesOffered.*')
            ->where('tblQuoteDetail.strQHID', '=', $id)
            ->get();
        $mats = Material::where('status',1)->where('todelete',1)->get();
        return view('layouts.transact.quote.add.tableservices', ['qdserve'=>$qdserve,'mats'=>$mats]);
    }

    public function showService()
    {
        $serveOff=ServicesOffered::where('todelete',1)->where('status',1)->get();
        return view('layouts.transact.quote.add.services', ['serveOff'=>$serveOff]);
    }

    public function draftQuotesAjax()
    {
        $draftQuotes = Quote::where('status','=',0)
        ->orderBy('datQuoteDate','desc')
        ->get();
        return view('layouts.transact.quote.add.draft', ['draftQuotes'=>$draftQuotes]);
    }

    public function getQuotePattern()
    {
        $id = DB::table('tblQuoteIDUtil')->get();
        foreach($id as $id)
        {
            return $id->strQuoteIDUtil;
        }
    }

    public function getLastPattern()
    {
        $id = Quote::orderBy('strQuoteID','desc')->first();
        return $id->strQuoteID;
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
        $scanEmp = Quote::all();
        if($scanEmp->count() == 0)
        {
            $splitID = $this->Splits($this->getQuotePattern());
            $incrementedID = $this->Incremented($splitID);
            $quoteID = $incrementedID;
            return $quoteID;
        }
        else
        {
            $splitID = $this->Splits($this->getLastPattern());
            $incrementedID = $this->Incremented($splitID);
            $quoteID = $incrementedID;
            return $quoteID;
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quoteID = $this->getID();
        $clients = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.strCompClientName','tblClient.strClientID')
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get();
        $indclients = IndividualClient::join('tblClient', 'tblIndividualClient.strIndClientID', '=', 'tblClient.strClientID')
            ->select('tblIndividualClient.*','tblClient.strClientID')
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.status','=',1)
            ->get();
        $serveOff = ServicesOffered::where('status',1)->where('todelete',1)->get();

        $quoteDraft = Quote::where('status','0')->get();
        return view('layouts.transact.quote.add.index', ['clients'=> $clients,'indclients'=>$indclients, 'quoteID'=>$quoteID, 'serveOff'=>$serveOff, 'quoteDraft'=>$quoteDraft]);
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
        $quote = Quote::insertGetId([
                    'strQuoteID'=>$request->strQuoteID,
                    'strQuoteName'=>$request->strQuoteName,
                    'strClientID'=>$request->strClientID,
                    'datQuoteDate'=>$request->datQuoteDate,
                    'status'=> $request->status
                    ]);
      
        return Response($quote);
    }

    public function header(Request $request)
    {
        $head = Quote::insertGetId(['strQuoteName'=>$request->strQuoteName,
                    'strClientID'=>$request->strClientID,
                    'datQuoteDate'=>$request->datQuoteDate,
                    'status'=> $request->status
                    ]);
        return Response($head);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client=Client::findOrFail($id);
        $serveOff=ServicesOffered::get();
        $quote=Quote::where('strClientID',$id)->where('status',0)->get();
        $quoteID=Quote::where('strClientID',$id)->get();
        return view('layouts.transact.quote.create',compact('serveOff','client','material','quote', 'quoteID'));
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
        $quote = Quote::findOrFail($id);
        $quote->strQuoteName = $request->strQuoteName;
        $quote->datQuoteDate = $request->datQuoteDate;
        $quote->save();
        return Response($quote);
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

    public function addservice()
    {
        $detail = QuoteDetail::insertGetId(['intQHID'=>$request->intQHID,
                    'intSOID'=>$request->intSOID
                    ]);
        return Response($detail);
    }
}
