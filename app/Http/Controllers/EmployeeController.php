<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\EmpSpec;
use App\Specialization;
use Response;
class EmployeeController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }


    public function index()
    {
        $employee = Employee::where('status','=',1)->where('todelete','=',1)->get();
        
        return view('layouts.mainte.employee.index', compact('employee'));
    }
    
    public function readByAjax()
    {
        $employ = Employee::where('todelete',1)->get();
        $special = Specialization::where('status','=',1)->where('todelete','=',1)->get();
        return view('layouts.mainte.employee.table', compact('employ','special'));
    }

    public function store(Request $request)
    {
        if($request->strEmpMiddleName == "")
        {
             $equipAdd = Employee::where('strEmpLastName', '=', $request->strEmpLastName)
            ->where('strEmpMiddleName', '=', ' ')
            ->where('strEmpFirstName', '=', $request->strEmpFirstName)
            ->where('todelete','=',1)
            ->get();

            if($equipAdd->count() == 0)
            {
                Employee::insert(['strEmpLastName'=>$request->strEmpLastName,
                    'strEmpMiddleName'=>'',
                    'strEmpFirstName'=>$request->strEmpFirstName,
                    'strEmpEmail'=>$request->strEmpEmail,
                    'strEmpContactNo'=>$request->strEmpContactNo,
                    'strEmpCity'=>$request->strEmpCity,
                    'strEmpProvince'=>$request->strEmpProvince,
                    'intEmpSpecID'=>$request->specss,
                    'todelete'=>1,
                    'status'=>1
                    ]);
                 return Response($equipAdd);
             }
        }
        else
        {
            $equipAdd = Employee::where('strEmpLastName', '=', $request->strEmpLastName)
            ->where('strEmpMiddleName', '=', $request->strEmpMiddleName)
            ->where('strEmpFirstName', '=', $request->strEmpFirstName)
            ->where('todelete','=',1)
            ->get();

            if($equipAdd->count() == 0)
            {
                Employee::insert(['strEmpLastName'=>$request->strEmpLastName,
                    'strEmpMiddleName'=>$request->strEmpMiddleName,
                    'strEmpFirstName'=>$request->strEmpFirstName,
                    'strEmpEmail'=>$request->strEmpEmail,
                    'strEmpContactNo'=>$request->strEmpContactNo,
                    'strEmpCity'=>$request->strEmpCity,
                    'strEmpProvince'=>$request->strEmpProvince,
                    'intEmpSpecID'=>$request->specss,
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
        $specs = Specialization::join('tblEmpSpec','tblSpecialization.intSpecID','tblEmpSpec.intESSpecID')
                ->select('tblSpecialization.*')
                ->where('tblEmpSpec.strESEmpID',$id)
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
        if($request->strEmpMiddleName == "")
        {
             $equipAdd = Employee::where('strEmpLastName', '=', $request->strEmpLastName)
            ->where('strEmpMiddleName', '=', ' ')
            ->where('strEmpFirstName', '=', $request->strEmpFirstName)
            ->where('todelete', '=', 1)
            ->get();

            $equipAddccc = Employee::where('strEmpID','=', $empID)
            ->where('strEmpLastName', '=', $request->strEmpLastName)
            ->where('strEmpMiddleName', '=', ' ')
            ->where('strEmpFirstName', '=', $request->strEmpFirstName)
            ->get();
            if($equipAdd->count() == 0)
            {
                $updequip = Employee::find($empID);
                $updequip->strEmpLastName = $request->strEmpLastName;
                $updequip->strEmpFirstName = $request->strEmpFirstName;
                $updequip->strEmpMiddleName = "";
                $updequip->strEmpEmail = $request->strEmpEmail;
                $updequip->strEmpContactNo = $request->strEmpContactNo;
                $updequip->strEmpCity = $request->strEmpCity;
                $updequip->strEmpProvince = $request->strEmpProvince;
                $updequip->save();

                $spec = $request->array;
                //delete the spec first
                $del = EmpSpec::where('strESEmpID',$empID)->pluck('intEmpSpecID');
                foreach ($del as $key => $value) {
                    $update = EmpSpec::find($value);
                    $update->todelete = 0;
                    $update->save();
                }
                //add spec
                foreach ($spec as $key => $value) {
                    $specadd = EmpSpec::insert([
                        'strESEmpID'=>$empID,
                        'intESSpecID'=>$value,
                        'todelete'=>1
                        ]);
                }
                return Response($updequip);
            }
            else if($equipAddccc->count() != 0)
            {
                $updequip = Employee::find($empID);
                $updequip->strEmpLastName = $request->strEmpLastName;
                $updequip->strEmpFirstName = $request->strEmpFirstName;
                $updequip->strEmpMiddleName = "";
                $updequip->strEmpEmail = $request->strEmpEmail;
                $updequip->strEmpContactNo = $request->strEmpContactNo;
                $updequip->strEmpCity = $request->strEmpCity;
                $updequip->strEmpProvince = $request->strEmpProvince;
                $updequip->save();

                $spec = $request->array;
                //delete the spec first
                $del = EmpSpec::where('strESEmpID',$empID)->pluck('intEmpSpecID');
                foreach ($del as $key => $value) {
                    $update = EmpSpec::find($value);
                    $update->todelete = 0;
                    $update->save();
                }
                //add spec
                foreach ($spec as $key => $value) {
                    $specadd = EmpSpec::insert([
                        'strESEmpID'=>$empID,
                        'intESSpecID'=>$value,
                        'todelete'=>1
                        ]);
                }

                return Response($updequip);
            }
        }
        else
        {
            $equipAdd = Employee::where('strEmpLastName', '=', $request->strEmpLastName)
            ->where('strEmpMiddleName', '=', $request->strEmpMiddleName)
            ->where('strEmpFirstName', '=', $request->strEmpFirstName)
            ->where('todelete', '=', 1)
            ->get();


            $equipAddccc = Employee::where('strEmpID','=', $empID)
            ->where('strEmpLastName', '=', $request->strEmpLastName)
            ->where('strEmpMiddleName', '=', $request->strEmpMiddleName)
            ->where('strEmpFirstName', '=', $request->strEmpFirstName)
            ->get();

            if($equipAdd->count() == 0)
            {
                $updequip = Employee::find($empID);
                $updequip->strEmpLastName = $request->strEmpLastName;
                $updequip->strEmpMiddleName = $request->strEmpMiddleName;
                $updequip->strEmpFirstName = $request->strEmpFirstName;
                $updequip->strEmpEmail = $request->strEmpEmail;
                $updequip->strEmpContactNo = $request->strEmpContactNo;
                $updequip->strEmpCity = $request->strEmpCity;
                $updequip->strEmpProvince = $request->strEmpProvince;
                $updequip->save();

                $spec = $request->array;
                //delete the spec first
                $del = EmpSpec::where('strESEmpID',$empID)->pluck('intEmpSpecID');
                foreach ($del as $key => $value) {
                    $update = EmpSpec::find($value);
                    $update->todelete = 0;
                    $update->save();
                }
                //add spec
                foreach ($spec as $key => $value) {
                    $specadd = EmpSpec::insert([
                        'strESEmpID'=>$empID,
                        'intESSpecID'=>$value,
                        'todelete'=>1
                        ]);
                }

                return Response($updequip);
            }
             else if($equipAddccc->count() != 0)
            {
                $updequip = Employee::find($empID);
                $updequip->strEmpLastName = $request->strEmpLastName;
                $updequip->strEmpMiddleName = $request->strEmpMiddleName;
                $updequip->strEmpFirstName = $request->strEmpFirstName;
                $updequip->strEmpEmail = $request->strEmpEmail;
                $updequip->strEmpContactNo = $request->strEmpContactNo;
                $updequip->strEmpCity = $request->strEmpCity;
                $updequip->strEmpProvince = $request->strEmpProvince;
                $updequip->save();

                $spec = $request->array;
                $del = EmpSpec::where('intEmpSpecID',$empID)->pluck('intEmpSpecID');
                //delete the spec first
                $del = EmpSpec::where('strESEmpID',$empID)->pluck('intEmpSpecID');
                foreach ($del as $key => $value) {
                    $update = EmpSpec::find($value);
                    $update->todelete = 0;
                    $update->save();
                }
                //add spec
                foreach ($spec as $key => $value) {
                    $specadd = EmpSpec::insert([
                        'strESEmpID'=>$empID,
                        'intESSpecID'=>$value,
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
