@extends('layouts.transact.main')
@section('head')
<script>
  function findByRepClient(val)
  {
       $('#project').empty().trigger('chosen:updated');
        // $('#materialClass').val('').trigger('chosen:updated');
        var opt;
        var a;
        var newSelect = document.getElementById("project");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
          $.get('/findByRepClient/'+val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>No Project/s matches the filter!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
            else
            {
               $(function(){
                $.bootstrapGrowl('<h4>Project/s Found!</h4>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });
              for(a=0;a<data.length;a++)
              {
                opt = new Option(data[a].strQuoteName,data[a].id);
                newSelect.appendChild(opt);
              }
              $('#project').trigger('chosen:updated');
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
        
  };
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
              <!-- @include('layouts.reports.delivery.sidebar') -->
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
          <i class="gi gi-address_book"> </i> References of Billing Report<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Reports</a></li>
        <li><a href="javascript:void(0)">References of Billing Report</a></li>
    </ol>
      
      <!-- Simple Profile Widgets Row -->
      <div class="block">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>References of Billing Report Generation</strong></h3>
        </div>  


            {{ Form::open(['target' => '_blank','url'=>'/references']) }}
               <div class="row">
                <div class="col-sm-4 ">
                  <label for="quotation">Filter by: <strong>Client</strong></label>
                  <select id="client" name="client" class="select-chosen" onchange="findByRepClient(this.value)" data-placeholder="">
                  <option value=""></option>
                     @foreach($clients as $clients)
                      <option value="{{ $clients->strClientID }}">{{ $clients->strCompClientName }}
                      </option>
                      @endforeach 

                    </select>
                </div>
                  <div class="form-group">
                      <div class="col-sm-8">
                  <div>
                        <label for="quotation">Choose Project </label> 
                        <select name="project" id="project" class='form-control' data-placeholder='Choose'>
                      <option value=""></option>
                      </select> 
                     
                  </div><br> 
                </div>
                    </div>
                  </div>
                  <br><br>
                <fieldset class="form-group">
              <div class="col-md-offset-9">
                 {!! Form::submit('Generate',['id'=>'submit','class'=>'btn btn-alt btn-success']) !!}
              </div>
            </fieldset>
              {{ Form::close() }}
          <br>
      </div>

@endsection

@section('script')
  <script >
    // $(function(){ FormsValidation.init(); });
     $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });



     

    });
  </script>


@endsection