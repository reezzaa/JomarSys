<?php

namespace App\Http\Controllers\O;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Specialization;
use App\Employee;
use App\Empspec;
use Response;
use DB;

class AddEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:operations');
    }
    public function index()
    {
        $special = Specialization::where('status','=',1)->where('todelete','=',1)->get();
         return view('layouts.O.mainte.employee.addindex',compact('special'));
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

    public function getEmpPattern()
    {
        $id = DB::table('tblEmpIDUtil')->get();
        foreach($id as $id)
        {
            return $id->strEmpIDUtil;
        }
    }

    public function getLastPattern()
    {
        $id = Employee::orderBy('id','desc')->first();
        return $id->id;
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
        $scanEmp = Employee::all();
        if($scanEmp->count() == 0)
        {
            $splitID = $this->Splits($this->getEmpPattern());
            $incrementedID = $this->Incremented($splitID);
            $employeeID = $incrementedID;
            return $employeeID;
        }
        else
        {
            $splitID = $this->Splits($this->getLastPattern());
            $incrementedID = $this->Incremented($splitID);
            $employeeID = $incrementedID;
            return $employeeID;
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $employeeID = $this->getID();
        if($request->midname == "")
        {
             $midempty = Employee::where('EmpLname', '=', $request->EmpLname)
            ->where('EmpMname', '=', ' ')
            ->where('EmpFname', '=', $request->EmpFname)
            ->where('todelete','=',1)
            ->get();

            if($midempty->count() == 0)
            {
                Employee::insert([
                    'id'=>$employeeID,
                    'EmpLname'=>$request->EmpLname,
                    'EmpMname'=>'',
                    'EmpFname'=>$request->EmpFname,
                    'EmpEmail'=>$request->EmpEmail,
                    'EmpContactNo'=>$request->EmpContactNo,
                    'EmpCity'=>$request->EmpCity,
                    'EmpProvince'=>$request->EmpProvince,
                    'todelete'=>1,
                    'status'=>1
                    ]);
                 $empadds = $request->specs;
                foreach ($empadds as $key => $value) {
                $specadd =EmpSpec::insert([
                        'EmpID'=>$employeeID,
                        'SpecID'=>$value,
                        'todelete'=>1
                        ]);
                }
                \Session::flash('flash_addemp_success','Company Information Added!');
                return redirect()->route('worker.index');
             }
             else
             {
                \Session::flash('flash_addemp_failed','Company Information Added!');
                return redirect()->route('worker.index');
             }
        }
        else
        {
            $equipAdd = Employee::where('EmpLname', '=', $request->EmpLname)
            ->where('EmpMname', '=', $request->EmpMname)
            ->where('EmpFname', '=', $request->EmpFname)
            ->where('todelete','=',1)
            ->get();

            if($equipAdd->count() == 0)
            {
                 
                Employee::insert([
                    'id'=>$employeeID,
                    'EmpLname'=>$request->EmpLname,
                    'EmpMname'=>$request->EmpMname,
                    'EmpFname'=>$request->EmpFname,
                    'EmpEmail'=>$request->EmpEmail,
                    'EmpContactNo'=>$request->EmpContactNo,
                    'EmpCity'=>$request->EmpCity,
                    'EmpProvince'=>$request->EmpProvince,
                    'todelete'=>1,
                    'status'=>1
                    ]);
                $empadds = $request->specs;
                foreach ($empadds as $key => $value) {
                $specadd =EmpSpec::insert([
                        'EmpID'=>$employeeID,
                        'SpecID'=>$value,
                        'todelete'=>1
                        ]);
                }
                \Session::flash('flash_addemp_success','Company Information Added!');
                 return redirect()->route('worker.index');
             }
             else
             {
                \Session::flash('flash_addemp_failed','Company Information Added!');
                return redirect()->route('worker.index');
             }
        }
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
        $employee = Employee::findOrFail($id);
        return view('layouts.O.mainte.employee.edit', compact('employee'));
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
