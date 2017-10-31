@extends('layouts.transact.main')
@section('head')

@endsection
@section('sidebar')
  <!-- Main Sidebar -->
  <div id="sidebar">
      <!-- Wrapper for scrolling functionality -->
      <div class="sidebar-scroll">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
              <!-- Icon for user -->
              @include('layouts.headers.usericon')
              <!-- Sidebar Navigation -->
              @include('layouts.dashboard.sidebar')
              
              <!-- @include('layouts.transact.contract.sidebar') -->
              <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
@endsection

@section('content')
  <div class="content-header">
    <div class="header-section">
      <h4>
          <i class="fa fa-wrench"> </i> Contract Transaction<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Transaction</a></li>
        <li><a href="/contractlist">Contract List</a></li>
        <li><a href="javascript:void(0)">View Contract</a></li>

    </ol>
    @foreach($var as $v)
       <div class="block full">
          <div class="block-title themed-background">
          <!-- @foreach($var as $v) -->
          <h3 class="themed-background" style="color:white;"><strong>{{$v->strQuoteName}}</strong></h3>
          </div>
           <div class="block-section">
              <!-- Company Info -->
              <div class="col-md-offset-5">
                    <a href="{{url('images', $v->strCompClientImage)}}" data-toggle="lightbox-image">
                      <img src="{{url('images', $v->strCompClientImage)}}" alt="company_logo" style="width:145px;">
                    </a>
                  </div><hr>
                  <div class="col-md-offset-8">
                     <h5><strong>Quotation ID: <a href="">{{$v->strQuoteID}}</a></strong> </h5>
                  </div>
                  <div class="col-md-offset-1">
                    <h5 ><strong>Client Name: </strong> <a href="/newcompclient/{{$v->strCompClientID}}">{{$v->strCompClientName}}</a></h5>

                  </div>
                  
            </div>
            <hr>
            @endforeach
            <div class="block">
            <div class="block-title">
              <h3><strong>Progress Billing & Collection</strong></h3>
            </div>
            <!-- @endforeach -->
              <!-- Contract List -->
     <div class="row">
       <div class="col-md-4">
          <table class="table table-vcenter table-striped table-bordered table-hover">        
          <thead>
   
              <tr>
                <th class="text-center">Status</th>
                <th class="text-center">Progress</th>
                <th class="text-center">Price</th>
            </tr>
          </thead>
          <tbody >
          <tr>
                  <td class="text-center">
                           @if(($showDown->downstatus)==0)
                           <h5 style="color: #D64F40;font-weight: bold;"> Unpaid</h5>
                            @elseif(($showDown->downstatus)==1)
                            <h5 style="color: #18A15E;font-weight: bold;"> Paid</h5>
                            @elseif(($showDown->downstatus)==2)
                            <h5 style="color: #E28E00;font-weight: bold;"> for billing</h5>
                          @endif
                         </td>
                  <td class="text-center">
                           <h5>{{$showDown->intDownValue}}% Downpayment</h5>
                  </td>
                   <td class="text-center">
                           <h5>₱ {{$showDown->dcmDPAmount}}</h5>
                         </td>        
          </tr>
           @foreach($table as $t)
            <tr>
                 <td class="text-center">
                           @if(($t->status)==0)
                           <h5 style="color: #D64F40;font-weight: bold;"> Unpaid</h5>
                            @elseif(($t->status)==1)
                            <h5 style="color: #18A15E;font-weight: bold;"> Paid</h5>
                            @elseif(($t->status)==2)
                            <h5 style="color: #E28E00;font-weight: bold;"> for billing</h5>
                          @endif
                         </td>
                <td class="text-center">
                    <h5>{{ $t->intPBValue }} % Progress Billing</h5>
                </td>
                <td class="text-center">
                           <h5 id="sub">₱ {{$t->dblPBAmount}} </h5>
                         </td>
              </tr>
      @endforeach

          </tbody>
        </table>
          </div>
          <div class="col-md-8">
            <table class="table table-vcenter table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                            <th class="text-center">Invoice No</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Change</th>
                            <th class="text-center">Due Date</th>
                            <th class="text-center">Date of Payment</th> 
                            <th class="text-center">OR No.</th> 

                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                      @foreach($getdata as $getdata)

                         <td class="text-center">
                           <h5>{{$getdata->strServInvHID}}</h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ {{$getdata->dblPaymentCost}}</h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ {{$getdata->dblPaymentChange}}</h5>
                         </td>
                         <td class="text-center">
                           <h5> {{\Carbon\Carbon::parse($getdata->datDueDate)->toFormattedDateString()}}</h5>
                         </td>
                         <td class="text-center">
                           <h5>{{\Carbon\Carbon::parse($getdata->datPaymentDateIssued)->toFormattedDateString()}}</h5>
                         </td>
                         <td class="text-center">
                           <h5>{{$getdata->strORNumber}}</h5>
                         </td>                           
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
          </div>
       </div>
     </div>
      <div class="block">
            <div class="block-title">
              <h3><strong>Progress Monitoring</strong></h3>
            </div>
              <!-- Contract List -->
     <div class="row">
       <div class="col-md-12">
          <table  class="table table-vcenter table-striped table-bordered table-hover">
              <thead>
                 <tr>
                 <th class="text-center" style="width: 300px;"><b>Service</b></th>
                 <th class="text-center"><b>Activity</b></th>
                 <th class="text-center" ><b>Starting Date</b></th>
                 <th class="text-center" ><b>Due Date</b></th>
                 <th class="text-center" style="width: 50px;"></th>
                 <th class="text-center" style="width: 120px;"><b>Status</b></th>
                 <th class="text-center" style="width: 50px"><b></b></th>

               </tr>
              </thead>
              <tbody>
                 
              </tbody>
             
             </table> 
          </div>
         
       </div>
     </div>
           <div class="block">
            <div class="block-title">
              <h3><strong>Delivery</strong></h3>
            </div>
              <!-- Contract List -->
     <div class="row">
      <div class="col-md-12">
          <table id="5cols-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
     <tr>
      <th class="text-center"> Person-in-charge</th>
      <th class="text-center">Delivery Date</th>
      <th class="text-center">Location</th>
      <th class="text-center">Remarks</th>
      <th class="text-center">Status</th>
      <th class="text-center" style="width: 50px"><b></b></th>

    </tr>
  </thead>
  <tbody id="project-list">
       

    @foreach($delitable as $dt)
        <tr>
        <td class="text-center"> {{ $dt->strEmpFirstName }} {{ $dt->strEmpMiddleName }} {{ $dt->strEmpLastName }}</td>
        <td class="text-center"> {{\Carbon\Carbon::parse($dt->datDeliveryHDate)->toFormattedDateString()}}</td>
        <td class="text-center">{{$dt->strDelAddress}} {{$dt->strDelCity}}, {{$dt->strDelProvince}} </td>
        <td class="text-center">{{$dt->strDeliveryHRemarks}}</td>
        <td class="text-center">
           @if($dt->status==1)
                   <span class="label label-info"> Finished</span>

                 @else
                   <span class="label label-warning"> Pending</span>
                  @endif
        </td>
        <td class="text-center">
           <button class="btn btn-alt btn-info" id="viewdel" value="{{$dt->strDeliveryHID}}" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span> </button>
        </td>



      </tr>
    @endforeach
</tbody>
</table>
      </div>
       
       </div>
     </div>
        </div>
        <div id="view_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block full container-fluid">
            <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>View Activity</strong></h3>
                  </div>   
                <div class="row">
                <div class="col-md-offset-1">
                      <h4><i class="gi gi-construction_cone"></i> Workers:</h4> 
                    <div class="col-md-5 col-md-offset-1" id="special">
                   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-offset-1">
                  <h4><i class="fa fa-cube"></i> Materials: </h4>
                  <div class="col-md-5 col-md-offset-1" id="special1">
                   
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-offset-1">
                  <h4><i class="gi gi-blacksmith"></i> Equipments: </h4>
                  <div class="col-md-5 col-md-offset-1" id="special2">
                   
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-offset-1">
                  <h4><strong>Update History</strong></h4>
                  </div>
                  <div class="col-md-6 col-md-offset-1" id="his">
                    <br>
                  </div>
                </div>
              </div>     
        </div>
      </div>
    </div>
    <div id="viewdel_modal" class="modal fade view_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="block">
        <div class="block-title themed-background">
          <div class="block-options pull-right">
              <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="themed-background" style="color:white;"><strong id="nameheader">View Delivery</strong></h3>
        </div>

        <div class="row">
          <div class="col-md-offset-1">
                <h4><i class="gi gi-cargo"></i> Materials:</h4> 
              <div class="col-md-5 col-md-offset-1" id="specialm">
             
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-1">
            <h4><i class="fa fa-truck"></i> Delivery Trucks: </h4>
            <div class="col-md-5 col-md-offset-1" id="special1m">
             
            </div>
          </div>
        </div>
        
        <div id="clearfix"></div>
      </div>
    </div>
  </div>
</div> 


@endsection

@section('script')
<!-- <script>$(function(){ TablesDatatables.init(); });</script> -->

  <script >
    // $(function(){ FormsValidation.init(); });

     $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
            $(this).on('click','#view_this', function(){
          var classID = $(this).val();
          var a,b=0;

         /////////////////top loading//////////
          NProgress.start();
          /////////////////////////////////////
          $.ajax({
          type : 'get',
          url  : '/findWork/'+classID,
          dataType: 'json',
          success:function(data){
            for(a=0;a<data.length;a++)
            {
                document.getElementById("special").innerHTML += '<li>'+ data[a].strEmpFirstName +' '+data[a].strEmpMiddleName+' '+data[a].strEmpLastName+'</li><br>';

            }
          }
          });
           $.get('/findMat/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("special1").innerHTML += '<li>'+ data[a].intMUQty+' '+data[a].strMaterialName +'</li><br>';

            }
          });
            $.get('/findEqui/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("special2").innerHTML += '<li>'+ data[a].strEquipName+'</li><br>';

            }
          });
        $.get('/findHistory/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("his").innerHTML += '<li>'+ data[a].dblProgActualPercent+'% on '+data[a].datProgDActualDate +'</li><br>';

            }
              $('#view_modal').modal('show');
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
          });
          $('#special').empty();
          $('#special1').empty();
          $('#special2').empty();
          $('#his').empty();


      });
             $(this).on('click','#viewdel', function(){
          var classID = $(this).val();
          var DelID = '';
          var a,b=0;

         /////////////////top loading//////////
          NProgress.start();
          /////////////////////////////////////
          $.ajax({
          type : 'get',
          url  : '/findTruck/'+classID,
          dataType: 'json',
          success:function(data){
            for(a=0;a<data.length;a++)
            {
                document.getElementById("special1m").innerHTML += '<li>'+ data[a].strDeliTruckPlateNo +'</li><br>';



            }
          }
          });
        $.get('/findMatD/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("specialm").innerHTML += '<li>'+ data[a].intDeliDQty+' '+data[a].strMaterialName +'</li><br>';

            }
              $('#viewdel_modal').modal('show');
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
          });
         $('#special').empty();
          $('#special1').empty();
          $('#special2').empty();                  
      });







     

    });
  </script>


@endsection