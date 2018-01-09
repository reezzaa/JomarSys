<?php

namespace App\Http\Controllers\BD;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillingCollectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:budgetdepartment');
    }
    public function index()
    {
        //
        return view('layouts.BD.transact.billing.index');
    }

    public function readByAjax()
    {
        return view('layouts.BD.transact.billing.table');
    }
    public function readByAjax2()
    {
        return view('layouts.BD.transact.billing.table2');
    }
    public function create()
    {
        return view('layouts.BD.transact.billing.byContract.index');
        
    }

  
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
