@extends('layouts.transact.main')
@section('head')
<script>
  function readByAjax()
    {
      var id  = $('#quoteNo').text();
        $.ajax({
          type : 'get',
          url  : '/readServices/'+id,
          dataType : 'html',
          success:function(data)
          {
              $('.table-responsive').html(data);
          }
        })
    }
    function readMaterialAdded()
    {
      var id  = $('#quoteNo').text();
        $.ajax({
          type : 'get',
          url  : '/readMaterialAdded/'+id,
          dataType : 'html',
          success:function(data)
          {
              $('.table-material').html(data);
          }
        })
    }
    function addMaterial()
    {
        $('#add_modal').modal('show');
    }
    function findPrice(val)
    {
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $('#price').val('');
          var a4;
          $.get('/getMatPrice/' + val, function (data) {
          if(data.length != 0)
          {
            for(a4=0;a4<data.length;a4++)
            {
              $('#price').val(data[a4].dcmMaterialUnitPrice);
            }
          }
        })
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
    }
    function compute(val)
    {
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      $('#cost').val('');
      var price = $('#price').val();
      var qty = val;
      $('#cost').val(price*qty); 
      /////////////////stop top loading//////////
      NProgress.done();
      ///////////////////////////////////////////
    }
</script>
@endsection
@section('sidebar')
<!-- Main Sidebar -->
  <div id="sidebar">
      <!-- Wrapper for scrolling functionality -->
      <div class="sidebar-scroll">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
              <!-- Brand -->
              <a href="index.html" class="sidebar-brand">
                  <i class="gi gi-flash"></i><strong>JMSESMS</strong>
              </a>
              <!-- END Brand -->

              <!-- User Info -->
              <div class="sidebar-section sidebar-user clearfix">
                  <div class="sidebar-user-avatar">
                      <a href="page_ready_user_profile.html">
                          <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                      </a>
                  </div>
                  <div class="sidebar-user-name">John Sese</div>
                  <div class="sidebar-user-links">
                      <a href="page_ready_user_profile.html" data-toggle="tooltip" title="Profile"><i class="gi gi-user"></i></a>
                      <a href="page_ready_inbox.html" data-toggle="tooltip" title="Messages"><i class="gi gi-envelope"></i></a>
                      <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                      <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" title="Settings"><i class="gi gi-cogwheel"></i></a>
                      <a href="{{ route('logout') }}" data-toggle="tooltip" title="Logout"><i class="gi gi-exit"></i></a>
                  </div>
              </div>
              <!-- END User Info -->

              <!-- Theme Colors -->
              <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
              <ul class="sidebar-section sidebar-themes clearfix">
                <li class="active">
                    <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="{{asset('css/themes/blue.css')}}" data-toggle="tooltip" title="Blue"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="{{asset('css/themes/night.css')}}" data-toggle="tooltip" title="Night"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="{{asset('css/themes/amethyst.css')}}" data-toggle="tooltip" title="Amethyst"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="{{asset('css/themes/modern.css')}}" data-toggle="tooltip" title="Modern"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="{{asset('css/themes/autumn.css')}}" data-toggle="tooltip" title="Autumn"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="{{asset('css/themes/flatie.css')}}" data-toggle="tooltip" title="Flatie"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="{{asset('css/themes/spring.css')}}" data-toggle="tooltip" title="Spring"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="{{asset('css/themes/fancy.css')}}" data-toggle="tooltip" title="Fancy"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="{{asset('css/themes/fire.css')}}" data-toggle="tooltip" title="Fire"></a>
                </li>
              </ul>
              <!-- END Theme Colors -->

              <!-- Sidebar Navigation -->
              @include('layouts.transact.quote.add.sidebar')
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
        <i class="fa fa-wrench"> </i>Add Quote<br>
    </h4>
  </div>
</div>
<ol class="breadcrumb breadcrumb-top">
  <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
  <li><a href="javascript:void(0)">Transaction</a></li>
  <li><a href="javascript:void(0)">Quote</a></li>
  <li><a href="">Add Quote</a></li>
</ol>
 <div class="form-horizontal form-bordered">
  <div class="form-group">
    <div class="col-md-3">
      <div class="block">
         <div class="block-title themed-background">
          <h3 class="themed-background" style="color:white"><strong>Quote Creation</strong></h3>
        </div>
        <ul class="nav nav-pills nav-stacked" id="myTab" role="tablist">
            <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#qh" role="tab"><strong>Quote Description</strong></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#qd" role="tab"><strong>Quote Detail</strong></a></li>
        </ul>
        <br><br>
      </div>
    </div>
    <div class="col-md-9">
      <div class="block">
        <div class="block-title themed-background">
          <div class="block-options pull-right">
              <h2 style="color:white;"><strong>Quote No.: <span id="quoteNo">{{$quoteID}}</span></strong></h2>
          </div>
          <h3 class="themed-background" style="color:white"><strong>Quote</strong></h3>
        </div>
        <div class="tab-content">
          <div class="tab-pane active" id="qh" role="tabpanel">
            {!! Form::open(['url'=>'quote', 'id'=>'save-quote','class'=>'form-horizontal form-bordered']) !!}
              <div class="form-group">
                <div>
                  <div class="col-md-5 col-md-offset-1">
                    <div class="form-group">
                      {!! Form::label('client','Client') !!} <span class="text-danger">*</span>
                      <select id="client" name="client" style="width: 250px;" class="select-chosen" data-placeholder="Select Client">
                        <option></option>
                        @foreach($clients as $clients)
                        <option value="{{ $clients->strClientID }}">{{ $clients->strCompClientName }}
                        </option>
                        @endforeach  
                      </select>  
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      {!! Form::label('strQuoteName','Quote Name') !!} <span class="text-danger">*</span>
                      {!! Form::text('strQuoteName', null, ['class'=>'form-control', 'placeholder'=>'Quote Name']) !!}
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-offset-9">
                   {!! Form::submit('Save',['id'=>'submithead','class'=>'btn btn-alt btn-success']) !!}
                </div>
              </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
            <br>
          </div>
          <div class="tab-pane" id="qd" role="tabpanel">
            {!! Form::open(['url'=>'service', 'id'=>'save-service','class'=>'form-horizontal form-bordered']) !!}
              <div class="form-group">
                <div>
                  <div class="col-md-8 col-md-offset-2">
                      <div class="form-group">
                        {!! Form::label('service','Service Name',array('class'=>'label_ttl')) !!}
                        <select id="service"  name="service" style="width: 250px;" class="select-chosen" data-placeholder="Select Service">
                          <option></option>
                          @foreach($serveOff as $service)
                          <option value="{{ $service->intServiceOffID }}">{{ $service->strServiceOffName }}
                          </option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                      {!! Form::label('strQuoteDesc','Service Description') !!}
                      {!! Form::textarea('strQuoteDesc',null, ['class'=>'form-control','size' => '20x5','placeholder'=>'Service Description']) !!}
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                 <div class="col-md-offset-10">
                     {!! Form::submit('Add',['id'=>'addservice','class'=>'btn btn-alt btn-success']) !!}
                  </div>
              </div>
            {!! Form::close() !!}
            <div class="table-responsive"></div>
<!--/////////////////////////////////////////////////////////////////////////////////
/////////////ADD MATERIAL MODAL///////////////////
////////////////////////////////////////////////////////-->
            <div id="add_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong><span id="serviceName"></span>: Add Material</strong></h3>
                    </div>
                    {!! Form::open(['url'=>'addmaterial', 'method'=>'POST', 'id'=>'save-material']) !!}
                      <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="material">Material</label> <span class="text-danger">*</span>
                              <select id="material" name="material" onchange="findPrice(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Select Material">
                                <option></option>
                                @foreach($materials as $material)
                                <option value="{{ $material->intMaterialID }}">{{ $material->strMatCatName }}
                                </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <div>
                              <label for="price">Price</label>
                              {!! Form::text('text',null ,['id'=>'price','placeholder'=>'0', 'class' => 'form-control', 'maxlength'=>'30','disabled'=>'disabled']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                          <div class="form-group">
                            <div>
                              <label for="materialqty">Quantity</label> <span class="text-danger">*</span>
                              {!! Form::text('number',null ,['id'=>'materialqty','placeholder'=>'Qty', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute(this.value)']) !!}
                            </div>
                          </div>
                        </div>
                         <div class="col-md-4">
                          <div class="form-group">
                            <div>
                              <label for="cost">Unit Cost</label>
                              <input type="text" class="form-control" id="cost" disabled="disabled">  
                            </div>
                            <input id="intQDID" hidden>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-3 col-md-offset-9">
                            {!! Form::submit('Add',['id'=>'addservice','class'=>'btn btn-alt btn-success']) !!}
                          </div>
                        </div>
                      </div>
                    <div class="clearfix"></div>
                    {!! Form::close() !!}
                    <div class="table-material"></div>
                </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="clearfix"></div>
        <br>
      </div>
    </div>
    </div>
 </div>


@endsection
@section('script')
<script>
$(document).ready(function(){
    var date = new Date();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 

   /////add
   $('#save-quote').on('submit', function(e){
        e.preventDefault();
        var ddata = {
                strQuoteID: $('span#quoteNo').text(),
                strClientID: $('#client').val(),
                strQuoteName: $('#strQuoteName').val(),
                datQuoteDate: date.getFullYear()+'/'+(date.getMonth()+1)+'/'+date.getDate(),
                status: 0
            };
          $.ajax({
              type : 'POST',
              url  : '/quote',
              data : ddata,
              dataType: 'json',
              success:function(data){
                swal("Success","Quote Header Saved!", "success");
                readByAjax();
                $('#myTab a:last').tab('show');
              },
              error:function(data){
                alert("Error Inserting");
              }
            })
           e.stopPropagation();
      });

   //add service
    $('#save-service').on('submit', function(e){
      alert($('#quoteNo').text());
        e.preventDefault();
        var ddata = {
                strQHID: $('#quoteNo').text(),
                intSOID: $('#service').val()
            };
          $.ajax({
              type : 'POST',
              url  : '/quotedetail',
              data : ddata,
              dataType: 'json',
              success:function(data){
                readByAjax();
                $('#serviceName').text($('#service option:selected').text());
                 $.get('/getQDID', function (data) {
                  $('#intQDID').val(data.intQDID);
                })
                addMaterial();
                //swal("Success","Service Added!", "success");
              },
              error:function(data){
                alert("Error Inserting");
              }
            })
           e.stopPropagation();
      });

    //addmaterial
    $('#save-material').on('submit', function(e){
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        e.preventDefault();
        /////////////////stop top loading//////////
        NProgress.done();
        ///////////////////////////////////////////
        var ddata = {
                intQDID: $('#intQDID').val(),
                intMaterialID: $('#material').val(),
                intQty: $('#materialqty').val(),
                dcmUnitCost: $('#cost').val()
            };
          $.ajax({
              type : 'POST',
              url  : '/addMatQuote',
              data : ddata,
              dataType: 'json',
              success:function(data){
                swal("Success","Material Added to Quote!", "success");
                //
                //swal("Success","Service Added!", "success");
              },
              error:function(data){
                alert("Error Inserting");
              }
            })
           e.stopPropagation();
      });
   });
</script>
@endsection
@section('scriptfooter')
<script>$(function(){ FormsWizard.init(); });</script>
@endsection