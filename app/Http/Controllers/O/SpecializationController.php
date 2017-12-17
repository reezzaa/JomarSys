<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\O;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Specialization;
use Response;
class SpecializationController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:operations');
    }

     public function index()
    {
        $specCheck = Specialization::where('status','=',1)->where('todelete','=',1)->get();
        
        return view('layouts.O.mainte.specialization.index', compact('specCheck'));
    }

    public function readByAjax()
    {
         $spec = Specialization::where('todelete','=',1)
        ->get();
        foreach ($spec as $key ) {
             $key->rpd=number_format($key->rpd,2);
                
            }

        return view('layouts.O.mainte.specialization.table', compact('spec'));
    }

    public function store(Request $request)
    {
        $specdescAdd = Specialization::where('SpecDesc', '=', $request->SpecDesc )
            ->where('todelete','=',1)
            ->get();
        if($specdescAdd->count() == 0)
        {
            Specialization::insert(['SpecDesc'=>$request->SpecDesc,
                'rpd'=>$request->rpd,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($specdescAdd);
        }
    }

    public function edit($specID)
    {
        $spece = Specialization::find($specID);
        return Response($spece);
    }

    public function update(Request $request, $specID)
    {
        $specdesc = Specialization::where('SpecDesc', $request->SpecDesc )
                ->where('todelete','=',1)
                ->get();
        $specdescs = Specialization::where('SpecDesc', $request->SpecDesc )
                ->where('rpd',$request->rpd)
                ->where('todelete','=',1)
                ->get();
        if($specdesc->count() == 0)
        {
            $updclass = Specialization::find($specID);
            $updclass->SpecDesc = $request->SpecDesc;
            $updclass->rpd = $request->rpd;
            $updclass->save();

            return Response($updclass);
        } 
        else if($specdescs->count() == 0)
        {
            $updclass = Specialization::find($specID);
            $updclass->SpecDesc = $request->SpecDesc;
            $updclass->rpd = $request->rpd;
            $updclass->save();

            return Response($updclass);
        } 
        else
        {
            $updclass = Specialization::find($specID);
            $updclass->SpecDesc = $request->SpecDesc;
            $updclass->rpd = $request->rpd;
            $updclass->save();

            return Response($updclass);
        }
    }
    
    public function checkbox($id)
    {
        $equiptype = Specialization::find($id);
        if ($equiptype->status) {
            $equiptype->status=0;
        }
        else{
            $equiptype->status=1;
        }
        $equiptype->save();
    }

    public function delete($specID)
    {
        $equiptype = Specialization::find($specID);
        $equiptype->todelete = 0;
        $equiptype->save();
        return Response($equiptype);
    }

}
