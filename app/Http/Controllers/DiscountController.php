<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use Response;

class DiscountController extends Controller
{
    public function index()
    {
        return view('layouts.mainte.discount.index');
    }

    public function readByAjax()
    {
        $discount = Discount::where('todelete',1)->get();
        return view('layouts.mainte.discount.table', ['discount'=>$discount]);
    }
    public function store(Request $request)
    {	
    	$discountAdd = Discount::where('strDiscountName', '=', $request->strDiscountName )
            ->where('todelete','=',1)
            ->get();
        if($discountAdd->count() == 0)
        {
            Discount::insert(['strDiscountName'=>$request->strDiscountName,
                'dblDiscountPercent'=>$request->dblDiscountPercent,
                'todelete'=>1,
                'status'=>1
                ]);
            return Response($discountAdd);
        }
    }
    public function edit($id)
    {
        $discount = Discount::find($id);
        return Response($discount);
    }

    public function update(Request $request, $id)
    {
        $upddisc = Discount::find($id);
        $upddisc->strDiscountName = $request->strDiscountName;
        $upddisc->dblDiscountPercent = $request->dblDiscountPercent;
        $upddisc->save();
        return Response($upddisc);
    }
    
    public function checkbox($id)
    {
        $disc = Discount::find($id);
        if ($disc->status) {
            $disc->status=0;
        }
        else{
            $disc->status=1;
        }
        $disc->save();
    }

    public function delete($id)
    {
        $disc = Discount::find($id);
        $disc->todelete = 0;
        $disc->save();
        return Response($disc);
    }
}
