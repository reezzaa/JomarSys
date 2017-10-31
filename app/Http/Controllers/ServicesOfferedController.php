<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesOffered;
use Response;
class ServicesOfferedController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function index()
    {
        $serveCheck = ServicesOffered::where('status','=',1)->where('todelete','=',1)->get();
        
        return view('layouts.mainte.services.index', compact('serveCheck'));
    }

    public function readByAjax()
    {
    	 $serve = ServicesOffered::where('todelete','=',1)
        ->get();

    	return view('layouts.mainte.services.table', compact('serve'));
    }

    public function store(Request $request)
    {
        $serveAdd = ServicesOffered::where('strServiceOffName', '=', $request->strServiceOffName )
            ->where('todelete','=',1)
            ->get();
        if($serveAdd->count() == 0)
        {
            ServicesOffered::insert(['strServiceOffName'=>$request->strServiceOffName,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($serveAdd);
        }
    }

    public function edit($serveID)
    {
        $servee = ServicesOffered::find($serveID);
        return Response($servee);
    }

    public function update(Request $request, $serveID)
    {
        $servename = ServicesOffered::where('strServiceOffName', '=', $request->strServiceOffName )
                ->where('todelete','=',1)
                ->get();
        if($servename->count() == 0)
        {
            $updserve = ServicesOffered::find($serveID);
            $updserve->strServiceOffName = $request->strServiceOffName;
            $updserve->save();
            return Response($updserve);
        } 
    }
    
    public function checkbox($id)
    {
        $serve = ServicesOffered::find($id);
        if ($serve->status) {
            $serve->status=0;
        }
        else{
            $serve->status=1;
        }
        $serve->save();
    }

    public function delete($serveID)
    {
        $serve = ServicesOffered::find($serveID);
        $serve->todelete = 0;
        $serve->save();
        return Response($serve);
    }
}
