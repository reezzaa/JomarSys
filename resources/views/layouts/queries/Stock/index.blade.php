@extends('layouts.mainte.main')
@section('head')

    <script>

      function readByAjax()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax23') }}",
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
              url  : "{{ url('readByAjax24') }}",
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
              url  : "{{ url('readByAjax25') }}",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
              }
            })
        };

      function findMate(val)
      {
        $('#datStart').val('').trigger('chosen:updated');
        $('#Status').val('').trigger('chosen:updated');

        $('.table-responsive').html(" ");

         /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $.get('/findMate/'+val, function (data) {
           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        })

      }

      function findStat(val)
      {
        $('#mat').val('').trigger('chosen:updated');
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

      function findStartDate(val)
      {
        $('#mat').val('').trigger('chosen:updated');
        $('#Status').val('').trigger('chosen:updated');

        $('.table-responsive').html(" ");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $.get('/findStartDate/'+val, function (data) {
           $('.table-responsive').html(data);
           /////////////////stop top loading//////////
           NProgress.done();
          ///////////////////////////////////////////
        })
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
              <!-- @include('layouts.queries.Stock.sidebar') -->
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
                        <i class="gi gi-group"></i> Stock Adjustment Queries<br>
                    </h4>
                  </div>
              </div>
              <ol class="breadcrumb breadcrumb-top">
                  <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                  <li><a href="javascript:void(0)">Queries</a></li>
                  <li><a href="javascript:void(0)">Stock Adjustment</a></li>    
              </ol>
              <div class="block-title themed-background">
              <h3 class="themed-background" style="color:white"><strong>List of Stock Adjustment</strong></h3>
              </div>
             <div class="block block-full">
             
                <br>
                    <div class="row">
                        <span class="fa fa-filter col-md-offset-1"> </span>  Filter by:
                        <br><br>
                        <div class="col-md-2 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="mat">Materials</label>
                              <select id="mat" name="mat" onchange="findMate(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Materials">
                                <option></option>
                                @foreach($getMat as $getMat)
                                <option value="{{$getMat->intMaterialID}}">{{$getMat->strMaterialName}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <div>
                              <label for="Status">Status</label>
                              <select id="Status" name="Status" onchange="findStat(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Status">
                                <option></option>
                                <option value="1">IN</option>
                                <option value="2">OUT</option>                             
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                              <label for="Status">Date</label>
                          <div class="input-group " date-format="yyyy-mm-dd">
                        <input type="date" id="datStart" name="datStart" onchange="findStartDate(this.value)" class="form-control text-center" placeholder="From" >
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
