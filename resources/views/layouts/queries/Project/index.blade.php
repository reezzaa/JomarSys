@extends('layouts.mainte.main')
@section('head')

    <script>
      function readByAjax()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax35') }}",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
              }
            })
        };
        // readByAjax();


      function findbyProject(val)
      {
        $('.table-responsive').html(" ");
        $('#Status').val('').trigger('chosen:updated');
        $('#Project').val('').trigger('chosen:updated');
        $('#datStart').val('').trigger('chosen:updated');


         /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $.get('/readByAjax35/'+val, function (data) {
           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        })

      }

      function findPStat(val)
      {
        $('#proj').val('').trigger('chosen:updated');
        $('#Location').val('').trigger('chosen:updated');
        $('#datStart').val('').trigger('chosen:updated');
        $('.table-responsive').html(" ");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        if(val==1)
        {
          $.get('/byPending/', function (data) {

           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        })
        }
        else if(val==2)
        {
            $.get('/byOngoing/', function (data) {
           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        })
        }
        else
        {
         $.get('/btTerminated/', function (data) {
           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        }) 
        }
      }

       function findPStartDate(val)
      {
        $('#client').val('').trigger('chosen:updated');
        $('#Status').val('').trigger('chosen:updated');
        $('#Project').val('').trigger('chosen:updated');

        $('.table-responsive').html(" ");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $.get('/findPStartDate/'+val, function (data) {
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
                        <i class="gi gi-group"></i> Project Queries<br>
                    </h4>
                  </div>
              </div>
              <ol class="breadcrumb breadcrumb-top">
                  <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                  <li><a href="javascript:void(0)">Queries</a></li>
                  <li><a href="javascript:void(0)">Project</a></li>    
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
                              <select id="client" name="client" onchange="findbyProject(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Client">
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
                              <select id="Status" name="Status" onchange="findPStat(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Status">
                                <option></option>
                                <option value="1">Pending</option>
                                <option value="2">Ongoing</option>
                                <option value="3">Terminated</option>                             

                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                              <label for="Status">Date</label>
                              <div>
                               <div class="input-group " data-date-format="yyyy-mm-dd">
                        <input type="date" id="datStart" name="datStart" onchange="findPStartDate(this.value)" class="form-control text-center" >
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
