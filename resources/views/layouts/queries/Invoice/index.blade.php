@extends('layouts.mainte.main')
@section('head')

    <script>
      function readByAjax()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax26') }}",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
              }
            })
        };
        readByAjax();


        function readByAjax2()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax27') }}",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
              }
            })
        };
        function readByAjax3()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax28') }}",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
              }
            })
        };

      function findClient(val)
      {
        $('.table-responsive').html(" ");
        $('#Status').val('').trigger('chosen:updated');
        $('#Project').val('').trigger('chosen:updated');
        $('#datStart').val('').trigger('chosen:updated');


         /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $.get('/findClient/'+val, function (data) {
           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        })

      }

      function findQStat(val)
      {
        $('#client').val('').trigger('chosen:updated');
        $('#Project').val('').trigger('chosen:updated');
        $('#datStart').val('').trigger('chosen:updated');
        $('.table-responsive').html(" ");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        if(val==1)
        {
          readByAjax2();
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        }
        else if(val==2)
        {
           readByAjax3();
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        }
      }
      function findQProj(val)
      {
        $('#Status').val('').trigger('chosen:updated');
        $('#client').val('').trigger('chosen:updated');
        $('#datStart').val('').trigger('chosen:updated');
        $('.table-responsive').html(" ");

         /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $.get('/findQProj/'+val, function (data) {
           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        })

      }
       function findIStartDate(val)
      {
        $('#client').val('').trigger('chosen:updated');
        $('#Status').val('').trigger('chosen:updated');
        $('#Project').val('').trigger('chosen:updated');

        $('.table-responsive').html(" ");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $.get('/findIStartDate/'+val, function (data) {
           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        });
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
              <!-- Icon for user -->
              @include('layouts.headers.usericon')
              <!-- Sidebar Navigation -->
              @include('layouts.dashboard.sidebar')
              <!-- @include('layouts.queries.Invoice.sidebar') -->
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
                        <i class="gi gi-group"></i> Service Invoice Queries<br>
                    </h4>
                  </div>
              </div>
              <ol class="breadcrumb breadcrumb-top">
                  <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                  <li><a href="javascript:void(0)">Queries</a></li>
                  <li><a href="javascript:void(0)">Service Invoice</a></li>    
              </ol>
              <div class="block-title themed-background">
              <h3 class="themed-background" style="color:white"><strong>List of Service Invoice</strong></h3>
              </div>
             <div class="block block-full">
             
                <br>
                    <div class="row">
                        <span class="fa fa-filter col-md-offset-1"> </span>  Filter by:
                        <br><br>
                        <div class="col-md-2 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="mat">Client</label>
                              <select id="client" name="client" onchange="findClient(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Client">
                                <option></option>
                               @foreach($clients as $clients)
                                <option value="{{$clients->strClientID}}">{{$clients->strCompClientName}}</option>
                               @endforeach
                               @foreach($indclients as $indclients)
                                <option value="{{ $indclients->strClientID }}">{{ $indclients->strIndClientFName }} {{ $indclients->strIndClientMName }} {{ $indclients->strIndClientLName }}
                               @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <div>
                              <label for="Status">Status</label>
                              <select id="Status" name="Status" onchange="findQStat(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Status">
                                <option></option>
                                <option value="1">Paid</option>
                                <option value="2">Unpaid</option>                             
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <div>
                              <label for="Status">Project</label>
                              <select id="Project" name="Project" onchange="findQProj(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Project">
                                <option></option>
                               @foreach($getProj as $getProj)
                                <option value="{{$getProj->strContractID}}">{{$getProj->strQuoteName}}</option>
                               @endforeach  
                               @foreach($getProji as $getProji)
                                <option value="{{$getProji->strQuoteID}}">{{$getProji->strQuoteName}}</option>
                               @endforeach                          
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                              <label for="Status">Date</label>
                              <div>
                               <div class="input-group " data-date-format="yyyy-mm-dd">
                        <input type="date" id="datStart" name="datStart" onchange="findIStartDate(this.value)" class="form-control text-center" >
                              </div>
                              
                          </div>
                        </div>
                        </div>
  <br>
<br>                <div class="table-responsive">
                
              </div>
              <br>
            </div>
@endsection

@section('script')
  <script>
  $(document).ready(function(){
      var id='';
      var url = "/";
       $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 
     });


  </script>
@endsection
