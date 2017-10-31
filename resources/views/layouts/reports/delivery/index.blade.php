@extends('layouts.mainte.main')
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
          <i class="gi gi-address_book"> </i> Delivery Report<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Reports</a></li>
        <li><a href="javascript:void(0)">Delivery Report</a></li>
    </ol>
      
      <!-- Simple Profile Widgets Row -->
      <div class="block">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>Delivery Report Generation</strong></h3>
        </div>  
            {{ Form::open(['target' => '_blank','url'=>'/delivery_report']) }}
               <div class="row">
                  <div class="form-group">
                      <div class="col-md-7 col-md-offset-2">
                      <label class="control-label text-center">Select Date Range</label> 
                        <div >
                           <div class="input-group" data-date-format="yyyy-mm-dd">
                              <input type="date" id="datStart" name="datStart" class="form-control text-center " placeholder="From">
                              <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                              <input type="date" id="datEnd" name="datEnd" class="form-control text-center " placeholder="Through">
                          </div>
                       </div>
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