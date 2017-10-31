<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialization;
use Response;
class SpecializationController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

     public function index()
    {
        $specCheck = Specialization::where('status','=',1)->where('todelete','=',1)->get();
        
        return view('layouts.mainte.specialization.index', compact('specCheck'));
    }

    public function readByAjax()
    {
         $spec = Specialization::where('todelete','=',1)
        ->get();

        return view('layouts.mainte.specialization.table', compact('spec'));
    }

    public function store(Request $request)
    {
        $specdescAdd = Specialization::where('strSpecDesc', '=', $request->strSpecDesc )
            ->where('todelete','=',1)
            ->get();
        if($specdescAdd->count() == 0)
        {
            Specialization::insert(['strSpecDesc'=>$request->strSpecDesc,
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
        $specdesc = Specialization::where('strSpecDesc', '=', $request->strSpecDesc )
                ->where('todelete','=',1)
                ->get();
        if($specdesc->count() == 0)
        {
            $updclass = Specialization::find($specID);
            $updclass->strSpecDesc = $request->strSpecDesc;
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
