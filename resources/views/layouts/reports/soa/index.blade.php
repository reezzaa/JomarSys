@extends('layouts.transact.main')
@section('head')
<script>

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
          <i class="gi gi-paperclip"> </i> Statement of Account Report<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Reports</a></li>
        <li><a href="javascript:void(0)">Statement of Account Report</a></li>
    </ol>
      
      <!-- Simple Profile Widgets Row -->
      <div class="block">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>Statement of Account Report Generation</strong></h3>
        </div>  


            {{ Form::open(['target' => '_blank','url'=>'/soa']) }}
               <div class="row">
                <div class="col-sm-6 col-md-offset-3">
                  <label for="quotation"><strong>Client</strong></label>
                  <select id="client" name="client" class="select-chosen" onchange="findByRepClient(this.value)" data-placeholder="">
                  <option value=""></option>
                     @foreach($clients as $clients)
                      <option value="{{ $clients->strClientID }}">{{ $clients->strCompClientName }}
                      </option>
                      @endforeach 
                    </select>
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