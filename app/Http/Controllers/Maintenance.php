<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Maintenance extends Controller
{
    public function maintenance()
    {
    	return view('layouts.mainte.mainte');
    }
}
