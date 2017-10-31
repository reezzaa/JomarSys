@extends('layouts.transact.main')
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
              <!-- @include('layouts.transact.client.addindividual.sidebar') -->
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
                <i class="fa fa-wrench"> </i> Client Transaction<br>
            </h4>
          </div>
      </div>
      <ol class="breadcrumb breadcrumb-top">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
          <li><a href="javascript:void(0)">Transaction</a></li>
          <li><a href="javascript:void(0)">Client</a></li>
          <li><a href="javascript:void(0)">Add Client</a></li>
          <li><a href="">Individual Client</a></li>
      </ol>
        <div class="block">
          <div class="block-title themed-background">
          <h3 class="themed-background" style="color:white;"><strong>Creation of Client</strong></h3>
          </div>
          {!! Form::open(['url'=>'newindclient', 'id'=>'save-client','class'=>'form-horizontal form-bordered']) !!}
              @include('layouts.transact.client.addindividual.form')
              <div class="form-group">
                <div class="col-md-offset-10">
                  {!! Form::submit('Add Client',['class'=>'btn btn-alt btn-success']) !!}
                  {!! Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']) !!}
                </div>
              </div>
          {!! Form::close() !!}
        </div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\CreateIndClientRequest', '#save-client'); !!}
@endsection