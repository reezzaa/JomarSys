<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use App\Project;
use Response;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::join('tblClient','tblContract.intContClientID','=','tblClient.intClientID')
        ->select('tblContract.*','tblClient.strClientName')
        ->where('tblClient.status','=',1)
        ->where('tblClient.todelete','=',1)
        ->get();
        return view('layouts.transaction.project.project',['contracts'=> $contracts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectAdd = Project::where('strProjectContractNo','=',$request->strProjectContractNo)
            ->where('strProjectName','=',$request->strProjectName)
            ->where('todelete','=',1)
            ->get();

        // $contractAdd = Project::where('strProjectContractNo','=',$request->strProjectContractNo)
        //     ->get();

        if($projectAdd->count() == 0)
        {
            Project::insert([
                'strProjectContractNo'=>$request->strProjectContractNo,
                'strProjectName'=>$request->strProjectName,
                'strProjectDesc'=>$request->strProjectDesc,
                'datProjectStart'=>$request->datProjectStart,
                'datProjectEnd'=>$request->datProjectEnd,
                'strProjectStatus'=>$request->strProjectStatus,
                'todelete'=>1
                ]);
            return Response($projectAdd);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
