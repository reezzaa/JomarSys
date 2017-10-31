<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllController extends Controller
{
     public function addproject()
    {
    	return view('layouts.trans.project.addproject');
    }
    public function receiveproj()
    {
    	return view('layouts.trans.project.receive');
    }
    public function billing()
    {
    	return view('layouts.trans.bill.billing');
    }
    public function billingdetail()
    {
    	return view('layouts.trans.bill.billingdetail');
    }
    public function payment()
    {
    	return view('layouts.trans.bill.payment');
    }
    public function progressdetails()
    {
    	return view('layouts.trans.progress.progressdetails');
    }
    public function progressmonitoring()
    {
    	return view('layouts.trans.progress.progressmonitoring');
    }
}
