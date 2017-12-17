<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\BD;
use App\Http\Controllers\Controller;

use App\Tax;
use Response;
use Illuminate\Http\Request;

class TaxUtilController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:operations');
    }
    public function index()
    {
        $tax = Tax::where('todelete','=',1)->get();
        return view('layouts.O.utilities.tax.tax',compact('tax'));
    }
    
    public function store(Request $request)
    {
        //
         $tstore = Tax::where('TaxDesc', $request->desc )
            ->where('todelete','=',1)
            ->get();
        if($tstore->count() == 0)
        {
            Tax::insert(['TaxDesc'=>$request->desc,
            	'TaxValue'=>$request->value,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($tstore);
        }
    }
    public function edit($id)
    {
        //
        $pfedit = Tax::find($id);
        return Response($pfedit);
    }

   public function update(Request $request, $id)
    {
        //
        $updclass = Tax::find($id);
            $updclass->TaxDesc = $request->TaxDesc;
            $updclass->TaxValue = $request->TaxValue;
            $updclass->save();
            return Response($updclass);
    }

    public function checkbox($id)
    {
        $matclass = Tax::find($id);
        if ($matclass->status) {
            $matclass->status=0;
        }
        else{
            $matclass->status=1;
        }
        $matclass->save();
    }

    public function delete($id)
    {
        $matclass = Tax::find($id);
        $matclass->todelete = 0;
        $matclass->save();
        return Response($matclass);
    }
}
