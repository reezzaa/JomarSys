<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\BD;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Companyutil;
use App\Employeeidutil;
use App\Clientidutil;
use App\Contractidutil;
use App\Invoiceidutil;
use App\Oridutil;
use DB;
use Response;
class UtilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth:operations');
        $this->middleware('auth:budgetdepartment');
        // $this->middleware('auth:projectmanager');

    }

    public function index()
    {
        
        return view('layouts.BD.utilities.index');
    }

    public function companyinfo()
    {
         $utilities = Companyutil::all();
         // dd($utilities);
        return view('layouts.BD.utilities.company.companyinfo',compact('utilities'));

    }
    public function smartcounter()
    {
        $employeeID = Empidutil::all();
        $clientID = Clientidutil::all();
        $contractID = Contractidutil::all();
        $invoiceID = Invoiceidutil::all();
        $orID = Oridutil::all();
        return view('layouts.BD.utilities.smartcounter.smartcounter',compact('employeeID','clientID','contractID','invoiceID','orID'));

    }
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
        return redirect()->route('bdutilities.index');
    }

    public function update(Request $request, $id)
    {
        $utilities = Companyutil::findOrFail($id);
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
        return redirect()->route('bdutilities.index');
    }

    public function storeEmpID(Request $request)
    {
        $formInput = $request->all();
        Employeeidutil::create($formInput);
        \Session::flash('flash_emp_success','Company Information Edited!');
        return redirect()->route('bdutilities.index');
    }
    public function storeClientID(Request $request)
    {
        $formInput = $request->all();
        Clientidutil::create($formInput);
        \Session::flash('flash_client_success','Company Information Edited!');
        return redirect()->route('bdutilities.index');
    }
     public function storeContractID(Request $request)
    {
        $formInput = $request->all();
        Contractidutil::create($formInput);
        return redirect()->route('bdutilities.index');

    }
    public function storeInvoiceID(Request $request)
    {
        $formInput = $request->all();
        Invoiceidutil::create($formInput);
        return redirect()->route('bdutilities.index');

    }
    public function storeOrID(Request $request)
    {
        $formInput = $request->all();
        Oridutil::create($formInput);
        return redirect()->route('bdutilities.index');
        
    }
   
}
