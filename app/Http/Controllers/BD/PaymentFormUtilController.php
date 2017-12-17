<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\BD;
use App\Http\Controllers\Controller;

use App\PaymentForm;
use DB;
use Response;
use Illuminate\Http\Request;

class PaymentFormUtilController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:operations');
    }
    public function index()
    {
        $paymentForm = PaymentForm::where('todelete','=',1)->get();
        return view('layouts.O.utilities.paymentform.paymentform',compact('paymentForm'));
    }
    
    public function store(Request $request)
    {
        //
         $pform = PaymentForm::where('FormDesc', $request->desc )
            ->where('todelete','=',1)
            ->get();
        if($pform->count() == 0)
        {
            PaymentForm::insert(['FormDesc'=>$request->desc,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($pform);
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
        $pfedit = PaymentForm::find($id);
        return Response($pfedit);
    }

   public function update(Request $request, $id)
    {
        //
        $updclass = PaymentForm::find($id);
            $updclass->FormDesc = $request->FormDesc;
            $updclass->save();
            return Response($updclass);
    }

    public function checkbox($id)
    {
        $matclass = PaymentForm::find($id);
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
        $matclass = PaymentForm::find($id);
        $matclass->todelete = 0;
        $matclass->save();
        return Response($matclass);
    }
}
