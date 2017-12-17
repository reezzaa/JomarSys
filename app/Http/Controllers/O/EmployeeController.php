<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\O;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Employee;
use App\EmpSpec;
use App\Specialization;
use Response;
class EmployeeController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:operations');
    }


    public function index()
    {
        $employee = Employee::where('status','=',1)->where('todelete','=',1)->get();
        
        return view('layouts.O.mainte.employee.index', compact('employee'));
    }
    
    public function readByAjax()
    {
        $employ = Employee::where('todelete',1)->get();
        $special = Specialization::where('status','=',1)->where('todelete','=',1)->get();
        return view('layouts.O.mainte.employee.table', compact('employ','special'));
    }

    public function store(Request $request)
    {
        if($request->EmpMname == "")
        {
             $equipAdd = Employee::where('EmpLname', '=', $request->EmpLname)
            ->where('EmpMname', '=', ' ')
            ->where('EmpFname', '=', $request->EmpFname)
            ->where('todelete','=',1)
            ->get();

            if($equipAdd->count() == 0)
            {
                Employee::insert(['strEmpLname'=>$request->EmpLname,
                    'EmpMname'=>'',
                    'EmpFname'=>$request->EmpFname,
                    'EmpEmail'=>$request->EmpEmail,
                    'EmpContactNo'=>$request->EmpContactNo,
                    'EmpCity'=>$request->EmpCity,
                    'EmpProvince'=>$request->EmpProvince,
                    'EmpSpecID'=>$request->specss,
                    'todelete'=>1,
                    'status'=>1
                    ]);
                 return Response($equipAdd);
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
                Employee::insert(['EmpLname'=>$request->EmpLname,
                    'EmpMname'=>$request->EmpMname,
                    'EmpFname'=>$request->EmpFname,
                    'EmpEmail'=>$request->EmpEmail,
                    'EmpContactNo'=>$request->EmpContactNo,
                    'EmpCity'=>$request->EmpCity,
                    'EmpProvince'=>$request->EmpProvince,
                    'EmpSpecID'=>$request->specss,
                    'todelete'=>1,
                    'status'=>1
                    ]);
                 return Response($equipAdd);
             }
        }
       
    }
    public function edit($empID)
    {
        $equipe = Employee::find($empID);
        return Response($equipe);
    }

    public function editSpec($id)
    {
        $specs = Specialization::join('tblEmpSpec','tblSpecialization.id','tblEmpSpec.SpecID')
                ->select('tblSpecialization.*')
                ->where('tblEmpSpec.EmpID',$id)
                ->where('tblEmpSpec.todelete',1)
                ->get();
        return Response($specs);
    }

    public function show($id)
    {
        $empSrch = Employee::find($id);
        return Response($empSrch);
    }

    public function update(Request $request, $empID)
    {
        if($request->EmpMname == "")
        {
             $equipAdd = Employee::where('EmpLname', '=', $request->EmpLname)
            ->where('EmpMname', '=', ' ')
            ->where('EmpFname', '=', $request->EmpFname)
            ->where('todelete', '=', 1)
            ->get();

            $equipAddccc = Employee::where('id','=', $empID)
            ->where('EmpLname', '=', $request->EmpLname)
            ->where('EmpMname', '=', ' ')
            ->where('EmpFname', '=', $request->EmpFname)
            ->get();
            if($equipAdd->count() == 0)
            {
                $updequip = Employee::find($empID);
                $updequip->EmpLname = $request->EmpLname;
                $updequip->EmpFname = $request->EmpFname;
                $updequip->EmpMname = "";
                $updequip->EmpEmail = $request->EmpEmail;
                $updequip->EmpContactNo = $request->EmpContactNo;
                $updequip->EmpCity = $request->EmpCity;
                $updequip->EmpProvince = $request->EmpProvince;
                $updequip->save();

                $spec = $request->array;
                //delete the spec first
                $del = EmpSpec::where('EmpID',$empID)->pluck('id');
                foreach ($del as $key => $value) {
                    $update = EmpSpec::find($value);
                    $update->todelete = 0;
                    $update->save();
                }
                //add spec
                foreach ($spec as $key => $value) {
                    $specadd = EmpSpec::insert([
                        'EmpID'=>$empID,
                        'SpecID'=>$value,
                        'todelete'=>1
                        ]);
                }
                return Response($updequip);
            }
            else if($equipAddccc->count() != 0)
            {
                $updequip = Employee::find($empID);
                $updequip->EmpLname = $request->EmpLname;
                $updequip->EmpFname = $request->EmpFname;
                $updequip->EmpMname = "";
                $updequip->EmpEmail = $request->EmpEmail;
                $updequip->EmpContactNo = $request->EmpContactNo;
                $updequip->EmpCity = $request->EmpCity;
                $updequip->EmpProvince = $request->EmpProvince;
                $updequip->save();

                $spec = $request->array;
                //delete the spec first
                $del = EmpSpec::where('id',$empID)->pluck('id');
                foreach ($del as $key => $value) {
                    $update = EmpSpec::find($value);
                    $update->todelete = 0;
                    $update->save();
                }
                //add spec
                foreach ($spec as $key => $value) {
                    $specadd = EmpSpec::insert([
                        'EmpID'=>$empID,
                        'SpecID'=>$value,
                        'todelete'=>1
                        ]);
                }

                return Response($updequip);
            }
        }
        else
        {
            $equipAdd = Employee::where('EmpLname', '=', $request->EmpLname)
            ->where('EmpMname', '=', $request->EmpMname)
            ->where('EmpFname', '=', $request->EmpFname)
            ->where('todelete', '=', 1)
            ->get();


            $equipAddccc = Employee::where('id','=', $empID)
            ->where('EmpLname', '=', $request->EmpLname)
            ->where('EmpMname', '=', $request->EmpMname)
            ->where('EmpFname', '=', $request->EmpFname)
            ->get();

            if($equipAdd->count() == 0)
            {
                $updequip = Employee::find($empID);
                $updequip->EmpLname = $request->EmpLname;
                $updequip->EmpMname = $request->EmpMname;
                $updequip->EmpFname = $request->EmpFname;
                $updequip->EmpEmail = $request->EmpEmail;
                $updequip->EmpContactNo = $request->EmpContactNo;
                $updequip->EmpCity = $request->EmpCity;
                $updequip->EmpProvince = $request->EmpProvince;
                $updequip->save();

                $spec = $request->array;
                //delete the spec first
                $del = EmpSpec::where('EmpID',$empID)->pluck('id');
                foreach ($del as $key => $value) {
                    $update = EmpSpec::find($value);
                    $update->todelete = 0;
                    $update->save();
                }
                //add spec
                foreach ($spec as $key => $value) {
                    $specadd = EmpSpec::insert([
                        'EmpID'=>$empID,
                        'SpecID'=>$value,
                        'todelete'=>1
                        ]);
                }

                return Response($updequip);
            }
             else if($equipAddccc->count() != 0)
            {
                $updequip = Employee::find($empID);
                $updequip->EmpLname = $request->EmpLname;
                $updequip->EmpMname = $request->EmpMname;
                $updequip->EmpFname = $request->EmpFname;
                $updequip->EmpEmail = $request->EmpEmail;
                $updequip->EmpContactNo = $request->EmpContactNo;
                $updequip->EmpCity = $request->EmpCity;
                $updequip->EmpProvince = $request->EmpProvince;
                $updequip->save();

                $spec = $request->array;
                $del = EmpSpec::where('id',$empID)->pluck('id');
                //delete the spec first
                $del = EmpSpec::where('id',$empID)->pluck('id');
                foreach ($del as $key => $value) {
                    $update = EmpSpec::find($value);
                    $update->todelete = 0;
                    $update->save();
                }
                //add spec
                foreach ($spec as $key => $value) {
                    $specadd = EmpSpec::insert([
                        'EmpID'=>$empID,
                        'SpecID'=>$value,
                        'todelete'=>1
                        ]);
                }

                return Response($updequip);
            }
        }
    }
     public function checkbox($id)
    {
        $equip = Employee::find($id);
        if ($equip->status) {
            $equip->status=0;
        }
        else{
            $equip->status=1;
        }
        $equip->save();
    }

    public function delete($equipID)
    {
        $equip = Employee::find($equipID);
        $equip->todelete = 0;
        $equip->save();
        return Response($equip);
    }
}
