@extends('layouts.mainte.main')
@section('head')

    <script>
      function readByAjax()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax20') }}",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
              }
            })
        };

        function readByAjax2()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax21') }}",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
              }
            })
        };
        
        readByAjax2();

        function findClients(val)
        {
        var select = $('#filter').val();
        $('.table-responsive').html("");
        $('#location').empty().trigger('chosen:updated');
        var newSelect = document.getElementById('location');
        var opt;
        var opt2;
        var a;
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        if(select==1)
        {
          readByAjax();
           $.get('/findLocation', function (data) {
                  opt2 = new Option("");
                    newSelect.appendChild(opt2);
                  for(a=0;a<data.length;a++)
                  {
                    opt = new Option(data[a].strCompClientCity,data[a].strCompClientCity);
                    newSelect.appendChild(opt);
                  }
                  $('#location').trigger('chosen:updated');
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                  })

        
        /////////////////stop top loading//////////
              NProgress.done();
        ///////////////////////////////////////////
        }
        else
        {
          readByAjax2();
           $.get('/findIndLocation', function (data) {
                  opt2 = new Option("");
                    newSelect.appendChild(opt2);
                  for(a=0;a<data.length;a++)
                  {
                    opt = new Option(data[a].strIndClientCity,data[a].strIndClientCity);
                    newSelect.appendChild(opt);
                  }
                  $('#location').trigger('chosen:updated');
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                  })
        /////////////////stop top loading//////////
              NProgress.done();
        ///////////////////////////////////////////
        }
      }

      function findCity(val)
      {
        var select = $('#location').val();
        var filter = $('#filter').val();
        $('.table-responsive').html("");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        if(filter==1)
        {
          $.get('/readByAjax22/'+val, function (data) {
          
                  $('.table-responsive').html(data);
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
          });
        }
        else
        {
          $.get('/readByAjax33/'+val, function (data) {
          
                  $('.table-responsive').html(data);
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
          });
        
        }
        
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
              <!-- @include('layouts.queries.Clients.sidebar') -->
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
                        <i class="gi gi-group"></i> Client Queries<br>
                    </h4>
                  </div>
              </div>
              <ol class="breadcrumb breadcrumb-top">
                  <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                  <li><a href="javascript:void(0)">Queries</a></li>
                  <li><a href="javascript:void(0)">Clients</a></li>    
              </ol>
              <div class="block-title themed-background">
              <h3 class="themed-background" style="color:white"><strong>List of Clients</strong></h3>
              </div>
             <div class="block block-full">
             
                <br>
                  <div class="form-group col-md-offset-7">
                   <label for="" class="col-md-3"> <span class="fa fa-filter"> </span> Filter by: </label>
                    <div class="col-md-3">
                      <select id="filter"  name="filter" onchange="findClients(this.value)"  class="form-control select-chosen filter " data-placeholder="Filter by Type">
                        <option value="2"> Individual</option>
                        <option value="1"> Company</option>
                        </select>
                    </div>
                    <div class="col-md-4" id="here">
                      <select id="location"  name="location" onchange="findCity(this.value)"  class="form-control select-chosen" data-placeholder="Filter by City">
                        <option value=""> </option>
                        @foreach($locai as $locai)
                        <option value="{{$locai->strIndClientCity}}">{{$locai->strIndClientCity}}</option>
                        @endforeach
                        </select>
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
