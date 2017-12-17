<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\BD;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\CompanyUtil;



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
        
        return view('layouts.O.utilities.index');
    }

    public function companyinfo()
    {
         $utilities = CompanyUtil::all();
         // dd($utilities);
        return view('layouts.O.utilities.company.companyinfo',compact('utilities'));

    }
    public function smartcounter()
    {
        $employeeID = DB::table('tblEmpIDUtil')->get();
        $clientID = DB::table('tblClientIDUtil')->get();
        return view('layouts.O.utilities.smartcounter.smartcounter',compact('employeeID','clientID'));

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
        return redirect()->route('utilities.index');
    }

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
        return redirect()->route('utilities.index');
    }

    public function storeEmpID(Request $request)
    {
        $formInput = $request->all();
        EmployeeIDUtil::create($formInput);
        \Session::flash('flash_emp_success','Company Information Edited!');
        return redirect()->route('utilities.index');
    }
    public function storeClientID(Request $request)
    {
        $formInput = $request->all();
        ClientIDUtil::create($formInput);
        \Session::flash('flash_client_success','Company Information Edited!');
        return redirect()->route('utilities.index');
    }
   
}
