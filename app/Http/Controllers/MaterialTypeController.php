<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaterialType;
use Response;

class MaterialTypeController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function index()
    {
        $mattypeCheck = MaterialType::where('status','=',1)->where('todelete','=',1)
            ->get();
        return view('layouts.mainte.materialtype.index', compact('mattypeCheck'));
    }

    public function readByAjax()
    {
        $mattype = MaterialType::where('todelete','=',1)
        ->get();
        
        return view('layouts.mainte.materialtype.table', compact('mattype'));
    }
    

    public function store(Request $request)
    {
        $classnameAdd = MaterialType::where('strMatTypeName', '=', $request->strMatTypeName )
            ->where('todelete','=',1)
            ->get();
        if($classnameAdd->count() == 0)
        {
            MaterialType::insert(['strMatTypeName'=>$request->strMatTypeName,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($classnameAdd);
        }
    }
    
    public function edit($id)
    {
        $matclasse = MaterialType::find($id);
        return Response($matclasse);
    }

    public function update(Request $request, $id)
    {
        $classname = MaterialType::where('strMatTypeName', '=', $request->strMatTypeName )
                ->where('todelete','=',1)
                ->get();
        if($classname->count() == 0)
        {
            $updclass = MaterialType::find($id);
            $updclass->strMatTypeName = $request->strMatTypeName;
            $updclass->save();
            return Response($updclass);
        } 
    }

    public function checkbox($id)
    {
        $matclass = MaterialType::find($id);
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
        $matclass = MaterialType::find($id);
        $matclass->todelete = 0;
        $matclass->save();
        return Response($matclass);
    }
}
