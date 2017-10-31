<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaterialClass;
use App\MaterialCat;
use App\MaterialSCat;
use Response;

class MaterialCatController extends Controller
{
     public function index()
    {
        $matclass = MaterialClass::where('status','=',1)->where('todelete','=',1)
            ->get();
        return view('layouts.mainte.materialcat.index', compact('matclass'));
    }

    public function readByAjax()
    {
        $matcat = MaterialCat::join('tblMaterialClass', 'tblMaterialCategory.intMatClassID', '=', 'tblMaterialClass.intMatClassID')
            ->select('tblMaterialCategory.*','tblMaterialClass.strMatClassName')
            ->orderby('tblMaterialCategory.intMatCatID')
            ->where('tblMaterialCategory.todelete','=',1)
            ->where('tblMaterialClass.todelete','=',1)
            ->where('tblMaterialClass.status','=',1)
            ->get();
        $matsubcat = MaterialSCat::all();
        return view('layouts.mainte.materialcat.table', ['matcat'=>$matcat, 'matclass'=> MaterialClass::where('status','=',1)->where('todelete','=',1)->pluck('strMatClassName', 'intMatClassID'), 'matsubcat'=> $matsubcat]);
    }
    

    public function store(Request $request)
    {
        $matcatAdd = MaterialCat::where('strMatCatName', '=', $request->strMatCatName )
            ->where('todelete','=',1)
            ->get();

        if($matcatAdd->count() == 0)
        {
            $matcatID = MaterialCat::insertGetId(['strMatCatName'=>$request->strMatCatName,
                'intMatClassID'=>$request->intMatClassID,
                'todelete'=>1,
                'status'=>1
                ]);

             	if(!empty($request->strMatSubCatName))
             	{
             		$matsubcatAdd = $request->strMatSubCatName;
             		foreach($matsubcatAdd as $key){
	                $matsubAdd = MaterialSCat::insert([
	                        'intMatCatID'=>$matcatID,
	                        'strMatSubCatName'=>$key
	                        ]);
	                }
	                return Response($matsubcatAdd);
             	}
	        return Response($matcatID);
        }
        return Response($matcatAdd);
    }
    
    public function edit($id)
    {
        $matclasse = MaterialCat::find($id);
        return Response($matclasse);
    }


    public function editSubCat($id)
    {
        $matscat = MaterialSCat::where('intMatCatID','=',$id)->pluck('strMatSubCatName');
        return Response($matscat);
    }

    public function update(Request $request, $id)
    {
        $catname = MaterialCat::where('strMatCatname', '=', $request->strMatCatname )
                ->where('intMatClassID', '=', $request->intMatClassID )
                ->where('todelete','=',1)
                ->get();
        if($catname->count() == 0)
        {
            $updclass = MaterialCat::find($id);
            $updclass->intMatClassID = $request->intMatClassID;
            $updclass->strMatCatName = $request->strMatCatName;
            $updclass->save();

            if(!empty($request->strMatSubCatName))
            {
                $matsubcatAdd = $request->strMatSubCatName;
                $updclass = MaterialSCat::where('intMatCatID',$id);
                foreach($matsubcatAdd as $key){
                    $updclass->strMatSubCatName = $key;
                    $updclass->save();
                }
            }
            return Response($updclass);
        } 
    }

    public function checkbox($id)
    {
        $matclass = MaterialCat::find($id);
        if ($matclass->status) {
            $matclass->status=0;
        }
        else{
            $matclass->status=1;
        }
        $matclass->save();
    }

    public function delete($classID)
    {
        $matclass = MaterialCat::find($classID);
        $matclass->todelete = 0;
        $matclass->save();
        return Response($matclass);
    }
}
