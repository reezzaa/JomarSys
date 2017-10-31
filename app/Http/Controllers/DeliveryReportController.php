<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use Carbon\Carbon;

class DeliveryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('layouts.reports.delivery.index');
    }

    public function delivery_report(Request $request)
    {
        $from=$request->datStart;
        $to=$request->datEnd;
        $company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();
        $delirep =DB::table('tblContract') 
        ->join('tblDeliveryHeader','tblDeliveryHeader.strDeliveryHProjID','tblContract.strContractID')
        ->join('tblEmployee','tblEmployee.strEmpID','tblDeliveryHeader.strDelEmpID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->select('tblQuoteHeader.strQuoteName','tblDeliveryHeader.*','tblEmployee.*','tblDeliveryHeader.status as dstatus')
        ->where('tblDeliveryHeader.todelete',1)
        ->wherebetween('tblDeliveryHeader.datDeliveryHDate',[$request->datStart,$request->datEnd])
        ->get();
        // dd($delirep);

        $delitruck=DB::table('tblDeliveryHeader')
        ->join('tblDeliveryDetailT','tblDeliveryDetailT.strDeliTDeliHID','tblDeliveryHeader.strDeliveryHID')
        ->join('tblDeliveryTruck','tblDeliveryTruck.intDeliTruckID','tblDeliveryDetailT.intDeliDDelID')
        ->select('tblDeliveryDetailT.*','tblDeliveryTruck.*')
        ->get();
        // dd($delitruck);

        $delimat = DB::table('tblDeliveryHeader')
        ->join('tblDeliveryDetail','tblDeliveryDetail.strDeliDDeliHID','tblDeliveryHeader.strDeliveryHID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblDeliveryDetail.intDeliDMatID')
        ->join('tblDetailUOM','tblDetailUOM.intDetailUOMID','tblMaterial.intMatUOM')
        ->select('tblDeliveryDetail.*','tblMaterial.strMaterialName','tblDetailUOM.strUOMUnitSymbol')
        ->get();

         $pdf = PDF::loadView('layouts.reports.delivery.delivery',compact('company','delirep','delitruck','delimat','from','to'))->setPaper('letter','landscape');        
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream();


    }
}
