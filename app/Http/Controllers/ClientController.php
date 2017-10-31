<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userlevel', ['only' => ['index']]);
    }

    public function index()
    {
        $clients = Client::all();
        return view('layouts.transact.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.transact.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @pphp aearam  \Illuminate\Http\CreateClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $formInput = $request->except('strClientImage');
        //image upload
        $image = $request->strClientImage;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['strClientImage']=$imageName;
        }
        Client::create($formInput);
        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('layouts.transact.client.client', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('layouts.transact.client.edit', compact('client'));
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
        $client = Client::findOrFail($id);
        if($client)
        {
            //image upload
            $formInput = $request->except('strClientImage');
            //image upload
            $image = $request->strClientImage;
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('images',$imageName);
                $formInput['strClientImage']=$imageName;
            }
            $client->update($formInput);
        }
        return redirect('client');
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
