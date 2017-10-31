<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompClientRequest;
use Illuminate\Http\Request;
use App\CompanyClient;
use App\Client;
use DB;
class CompanyClientController extends Controller
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
        $clients = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.*','tblClient.strClientType')
            ->orderby('tblCompanyClient.strCompClientID')
            ->where('tblClient.todelete','=',1)
            ->get();
        return view('layouts.transact.client.company.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.transact.client.addcompany.index');
    }

    public function getEmpPattern()
    {
        $id = DB::table('tblClientIDUtil')->get();
        foreach($id as $id)
        {
            return $id->strClientIDUtil;
        }
    }

    public function getLastPattern()
    {
        $id = Client::orderBy('strClientID','desc')->first();
        return $id->strClientID;
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
        $scanEmp = Client::all();
        if($scanEmp->count() == 0)
        {
            $splitID = $this->Splits($this->getEmpPattern());
            $incrementedID = $this->Incremented($splitID);
            $clientID = $incrementedID;
            return $clientID;
        }
        else
        {
            $splitID = $this->Splits($this->getLastPattern());
            $incrementedID = $this->Incremented($splitID);
            $clientID = $incrementedID;
            return $clientID;
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompClientRequest $request)
    {
        $clientID = $this->getID();
        
        $formInput = $request->except('strCompClientImage','strCompClientID');
        //image upload
        $image = $request->strCompClientImage;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['strCompClientImage']=$imageName;
        }
        Client::insert([
            'strClientID'=>$clientID,
            'strClientType'=>'Company Client',
            'todelete'=>1,
            'status'=>1
            ]);
        $formInput['strCompClientID'] = $clientID;
        CompanyClient::create($formInput);
        \Session::flash('flash_add_success','Company Information Added!');
        return redirect('newcompclient');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = CompanyClient::join('tblClient', 'tblCompanyClient.strCompClientID', '=', 'tblClient.strClientID')
            ->select('tblCompanyClient.*','tblClient.*')
            ->where('tblClient.todelete','=',1)
            ->where('tblClient.strClientID','=',$id)
            ->get();

        $contract=DB::table('tblClient')
        ->join('tblQuoteHeader','tblQuoteHeader.strClientID','tblClient.strClientID')
        ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblContract','tblContract.strConQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblCO','tblCO.strCOContractID','tblContract.strContractID')
        ->select('tblQuoteHeader.*','tblQuoteConDetail.*','tblCO.*','tblContract.status as cstat','tblContract.*')
        ->where('tblQuoteHeader.strClientID',$id)
        ->get();
        foreach ($contract as $c) {
        $c->dblProjCost=number_format($c->dblProjCost,2);
            
        }
        return view('layouts.transact.client.company.client', compact('client','contract'));
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
        $matclass = Client::find($id);
        $matclass->todelete = 0;
        $matclass->save();
        \Session::flash('flash_delete_success','Company Information Added!');
        return redirect('newcompclient');
    }
}
