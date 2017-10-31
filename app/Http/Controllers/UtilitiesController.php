<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyUtil;
use App\EmployeeIDUtil;
use App\ClientIDUtil;
use App\QuoteIDUtil;
use App\ContractIDUtil;
use App\InvoiceIDUtil;
use App\OrIDUtil;
use App\DeliveryIDUtil;

use DB;

class UtilitiesController extends Controller
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
        $employeeID = DB::table('tblEmpIDUtil')->get();
        $clientID = DB::table('tblClientIDUtil')->get();
        $quoteID = DB::table('tblQuoteIDUtil')->get();
        $contractID = DB::table('tblContractIDUtil')->get();
        $invoiceID = DB::table('tblInvoiceIDUtil')->get();
        $orID = DB::table('tblOrIDUtil')->get();
        $deliveryID = DB::table('tblDeliveryIDUtil')->get();
        $utilities = CompanyUtil::all();
        return view('layouts.utilities.company.index',compact('utilities','employeeID','clientID','quoteID','contractID','invoiceID','orID','deliveryID'));
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
        $formInput = $request->except('strCompanyLogo');
        //image upload
        $image = $request->strCompanyLogo;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['strCompanyLogo']=$imageName;
        }
        CompanyUtil::create($formInput);
        \Session::flash('flash_add_success','Company Information Added!');
        return redirect('utilities');
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
        $utilities = CompanyUtil::findOrFail($id);
        if($utilities)
        {
            //image upload
            $formInput = $request->except('strCompanyLogo');
            //image upload
            $image = $request->strCompanyLogo;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('images',$imageName);
                $formInput['strCompanyLogo']=$imageName;
            }
            $utilities->update($formInput);
        }
        \Session::flash('flash_edit_success','Company Information Edited!');
        return redirect('utilities');
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

    public function storeEmpID(Request $request)
    {
        $formInput = $request->all();
        EmployeeIDUtil::create($formInput);
        return redirect('utilities');
    }
    public function storeClientID(Request $request)
    {
        $formInput = $request->all();
        ClientIDUtil::create($formInput);
        return redirect('utilities');
    }
    public function storeQuoteID(Request $request)
    {
        $formInput = $request->all();
        QuoteIDUtil::create($formInput);
        return redirect('utilities');
    }
    public function storeContractID(Request $request)
    {
        $formInput = $request->all();
        ContractIDUtil::create($formInput);
        return redirect('utilities');
    }
    public function storeInvoiceID(Request $request)
    {
        $formInput = $request->all();
        InvoiceIDUtil::create($formInput);
        return redirect('utilities');
    }
    public function storeOrID(Request $request)
    {
        $formInput = $request->all();
        OrIDUtil::create($formInput);
        return redirect('utilities');
    }
    public function storeDeliveryID(Request $request)
    {
        $formInput = $request->all();
        DeliveryIDUtil::create($formInput);
        return redirect('utilities');
    }
}
