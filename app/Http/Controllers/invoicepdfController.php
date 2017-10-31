<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Carbon\carbon;

class invoicepdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       
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
        //
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
        $company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();

        $message= DB::table('tblServiceInvoiceHeader')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->join('tblContract','tblContract.strContractID','tblServiceInvoiceHeader.strServInvHProjID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->leftjoin('tblCO','tblCO.strCOContractID','tblContract.strContractID')
        ->join('tblDownpayment','tblDownpayment.intDownID','tblContract.intDownpaymentID')
        ->leftjoin('tblDownP','tblDownP.strDPContractID','tblContract.strContractID')
        ->leftjoin('tblGetDP','tblGetDP.DownP_id','tblDownP.id')
        ->select('tblCompanyClient.*','tblServiceInvoiceHeader.*','tblServiceInvoiceDetail.dblServInvDCost','tblQuoteHeader.strQuoteName','tblDownpayment.intDownValue','tblDownP.dcmDPAmount','tblGetDP.*','tblQuoteConDetail.*')
        ->where('tblDownP.status',2)
        ->where('tblServiceInvoiceHeader.strServInvHID',$id)
        ->first();
        
        $message1= DB::table('tblServiceInvoiceHeader')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->join('tblContract','tblContract.strContractID','tblServiceInvoiceHeader.strServInvHProjID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblQuoteConDetail','tblQuoteConDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->leftjoin('tblCO','tblCO.strCOContractID','tblContract.strContractID')
        ->leftjoin('tblProgressBill','tblProgressBill.strPBContractID','tblContract.strContractID')
        ->leftjoin('tblGetAmount','tblGetAmount.PB_id','tblProgressBill.intPBID')
        ->select('tblCompanyClient.*','tblServiceInvoiceHeader.*','tblServiceInvoiceDetail.dblServInvDCost','tblQuoteHeader.strQuoteName','tblProgressBill.*','tblGetAmount.*','tblQuoteConDetail.*','tblCO.strCONumber')
        ->where('tblProgressBill.status',2)
        ->where('tblServiceInvoiceHeader.status','!=',1)
        ->where('tblServiceInvoiceHeader.strServInvHID',$id)
        ->orderby('tblProgressBill.intPBValue','ASC')
        ->first();
        // dd($message);
        if(count($message)==0)
        {
        $pdf = PDF::loadView('sampPDF.samp3',compact('message1','company'));
        }
        else
        {
        $pdf = PDF::loadView('sampPDF.samp',compact('message','company'));
        }
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream(); //pang stream as in sa buong page is pdf lang

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showind($id)
    {
         $company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();

        $indmessage= DB::table('tblServiceInvoiceHeader')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblServiceInvoiceHeader.strQuoteID')
        ->join('tblQuoteIndDetail','tblQuoteIndDetail.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->leftjoin('tblPO','tblPO.strQuoteID','tblQuoteHeader.strQuoteID')
        ->select('tblIndividualClient.*','tblServiceInvoiceHeader.*','tblServiceInvoiceDetail.dblServInvDCost','tblQuoteHeader.strQuoteName','tblQuoteIndDetail.*')
        ->where('tblServiceInvoiceHeader.strServInvHID',$id)
        ->first();
        
        $pdf = PDF::loadView('sampPDF.indsamp',compact('indmessage','company'));
        
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream(); //pang stream as in sa buong page is pdf lang
    }
    public function orcomp($id)
    {
        //
         $company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();
        $or = DB::table('tblContract')
        ->join('tblQuoteHeader','tblQuoteHeader.strQuoteID','tblContract.strConQuoteID')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strServInvHProjID','tblContract.strContractID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->join('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblCompanyClient.*','tblQuoteHeader.*','tblServiceInvoiceDetail.*')
        ->where('tblContract.todelete',1)
        ->where('tblPayment.strORNumber',$id)
        ->first();
        // dd($or);

         $pdf = PDF::loadView('sampPDF.or',compact('company','or'));

        
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream(); 
    }
        public function orind($id)
    {
        //
         $company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();

        $orind = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblIndividualClient','tblIndividualClient.strIndClientID','tblClient.strClientID')
        ->join('tblServiceInvoiceHeader','tblServiceInvoiceHeader.strQuoteID','tblQuoteHeader.strQuoteID')
        ->join('tblServiceInvoiceDetail','tblServiceInvoiceDetail.strServInvHDID','tblServiceInvoiceHeader.strServInvHID')
        ->join('tblPayment','tblPayment.strPaymentServInvHID','tblServiceInvoiceHeader.strServInvHID')
        ->select('tblServiceInvoiceHeader.*','tblPayment.*','tblIndividualClient.*','tblQuoteHeader.*','tblServiceInvoiceDetail.*')
        ->where('tblPayment.strORNumber',$id)
        ->first();
        // dd($orind);

         $pdf = PDF::loadView('sampPDF.orind',compact('company','orind'));

        
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream(); 
    }

    public function quotation(Request $request)
    {
         $company = DB::table('tblCompanyUtil')
        ->select('tblCompanyUtil.*')
        ->first();
        $id = $request->id;

        $date = Carbon::today();

        $quoteheader = DB::table('tblQuoteHeader')
        ->join('tblClient','tblClient.strClientID','tblQuoteHeader.strClientID')
        ->join('tblCompanyClient','tblCompanyClient.strCompClientID','tblClient.strClientID')
        ->select('tblQuoteHeader.*','tblCompanyClient.*')
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        // ->where('tblQuoteHeader.status',1)
        ->first();
        // dd($quoteheader);

        $scope = DB::table('tblQuoteHeader')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblServicesOffered','tblServicesOffered.intServiceOffID','tblQuoteDetail.intSOID')
        ->select('tblServicesOffered.*')
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        // ->where('tblQuoteHeader.status',1)
        ->get();

        $labor = DB::table('tblQuoteHeader')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblEmpNeed','tblEmpNeed.intQDID','tblEmpNeed.intQDID')
        ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        ->groupby('tblEmpNeed.dcmrate','tblEmpNeed.intQty','tblEmpNeed.dcmTotLaborCost','tblEmpNeed.dcmhour','tblspecialization.strSpecDesc')
        ->select('tblEmpNeed.dcmrate','tblEmpNeed.intQty','tblEmpNeed.dcmTotLaborCost','tblEmpNeed.dcmhour','tblspecialization.strSpecDesc',DB::raw('SUM(tblEmpNeed.dcmTotLaborCost) as total_labor'))
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        ->get();
        $totlabor = DB::table('tblQuoteHeader')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblEmpNeed','tblEmpNeed.intQDID','tblEmpNeed.intQDID')
        ->join('tblspecialization','tblspecialization.intSpecID','tblEmpNeed.intSpecID')
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        ->sum('tblEmpNeed.dcmTotLaborCost');
        $mate = DB::table('tblQuoteHeader')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblMatNeed','tblMatNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblMatNeed.intMaterialID')
        ->join('tblDetailUOM','tblDetailUOM.intDetailUOMID','tblMaterial.intMatUOM')
        ->groupby('tblMatNeed.intQty','tblMatNeed.dcmUnitCost','tblMaterial.strMaterialName','tblMaterial.dcmMaterialUnitPrice','tblDetailUOM.strUOMUnitSymbol')
        ->select('tblMatNeed.intQty','tblMatNeed.dcmUnitCost','tblMaterial.dcmMaterialUnitPrice','tblMaterial.strMaterialName','tblDetailUOM.strUOMUnitSymbol',DB::raw('SUM(tblMatNeed.dcmUnitCost) as total_mate'))
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        ->get();

        $totmate = DB::table('tblQuoteHeader')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblMatNeed','tblMatNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblMaterial','tblMaterial.intMaterialID','tblMatNeed.intMaterialID')
        ->join('tblDetailUOM','tblDetailUOM.intDetailUOMID','tblMaterial.intMatUOM')
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        ->sum('tblMatNeed.dcmUnitCost');

        $equi = DB::table('tblQuoteHeader')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblEquipNeed','tblEquipNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblEquipment','tblEquipment.intEquipID','tblEquipNeed.intEquipID')
        ->groupby('tblEquipNeed.dcmUnitPrice','tblEquipNeed.intQty','tblEquipNeed.dcmUnitCost','tblEquipment.strEquipName')
        ->select('tblEquipNeed.dcmUnitPrice','tblEquipNeed.intQty','tblEquipNeed.dcmUnitCost','tblEquipment.strEquipName',DB::raw('SUM(tblEquipNeed.dcmUnitCost) as total_equip'))
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        ->get();
        $totequi = DB::table('tblQuoteHeader')
        ->join('tblQuoteDetail','tblQuoteDetail.strQHID','tblQuoteHeader.strQuoteID')
        ->join('tblEquipNeed','tblEquipNeed.intQDID','tblQuoteDetail.intQDID')
        ->join('tblEquipment','tblEquipment.intEquipID','tblEquipNeed.intEquipID')
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        ->sum('tblEquipNeed.dcmUnitCost');
        // dd($equi);

        $additional = DB::table('tblQuoteHeader')
        ->join('tblQuoteAdditional','tblQuoteAdditional.strQuoteID','tblQuoteHeader.strQuoteID')
        ->groupby('tblQuoteAdditional.strQAdesc','tblQuoteAdditional.dblQAamt')
        ->select('tblQuoteAdditional.dblQAamt','tblQuoteAdditional.strQAdesc',DB::raw('SUM(tblQuoteAdditional.dblQAamt) as total_fee'))
        ->where('tblQuoteHeader.strQuoteID',$request->id)
        ->get();
        $total='';
                    foreach ($equi as $eq) {
                        foreach ($mate as $mat) {
                           if($eq->intQDID==$mat->intQDID)
                           {
                             $total = $equi->total_equip + $mate->total_mate;
                             break;
                           }
                        }
                    }
                    // $total = $equi->total_equip + $mate->total_mate;

        

        $initial = $request->initial2;
        $taxvalue = $request->taxvalue2;
        $final = $request->final2;
        $null='';



        $pdf = PDF::loadView('sampPDF.quotation',compact('company','quoteheader','scope','labor','mate','id','equi','additional','total','quotecon','date','initial','taxvalue','final','null','totmate','totequi','totlabor'));        
        $pdfName="myPDF.pdf";
        $location=public_path("docs/$pdfName");
        $pdf->save($location); //pang save sa existing location go mame peg ko alabyuu
        return $pdf->stream(); 
    }


}
