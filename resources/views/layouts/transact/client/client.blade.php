@extends('layouts.transact.main')
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
                          <img src="{{asset('img/placeholders/avatars/avatar2.jpg')}}" alt="avatar">
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
              @include('layouts.dashboard.sidebar')
               
              <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
@endsection

@section('content')
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white;"><strong>Client</strong></h3>
      </div>
      <ol class="breadcrumb breadcrumb-top">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
          <li><a href="javascript:void(0)">Transaction</a></li>
          <li><a href="javascript:void(0)">Client</a></li>
          <li><a href="javascript:void(0)">Client</a></li>
      </ol>
        <div class="block full">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="{{$client->intClientID}}/edit" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
            </div>
          <h3 class="themed-background" style="color:white;"><strong>{{ $client->strClientName }}</strong></h3>
          </div>
           <div class="block-section">
              <!-- Company Info -->
                  <div class="col-md-offset-5">
                    <a href="{{url('images', $client->strClientImage)}}" data-toggle="lightbox-image">
                      <img src="{{url('images', $client->strClientImage)}}" alt="company_logo" style="width:145px;">
                    </a>
                  </div><hr>
                  <div class="col-md-offset-8">
                    <h5><strong>Registered TIN:</strong> {{ $client->strClientTIN }}</h5>
                  </div>
                  <div class="col-md-offset-1">
                    <h5><strong>Representative:</strong> {{ $client->strClientContactPerson }}</h5>
                    <h5><strong>Position:</strong> {{ $client->strClientPosition }}</h5>
                  </div>
                  <div class="col-md-offset-1">
                    <address>
                        <strong>Address:</strong> {{ $client->strClientAddress }} {{ $client->strClientCity }}, {{ $client->strClientProv }}<br>
                        <br>
                        <i class="fa fa-phone"></i> {{ $client->strClientContactNo }}<br>
                        <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{ $client->strClientEmail }}</a>
                    </address>
                  </div>
            </div>
            <hr>
            <div class="block">
            <div class="block-title">
              <h3><strong>Contracts</strong></h3>
            </div>
           <div class="block-section">
              <!-- Contract List -->
                  <div class="table-responsive">
                    @include('layouts.transact.client.contract')
                  </div>
            </div>
          </div>
        </div>
         
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\CreateClientRequest', '#save-client'); !!}
@endsection