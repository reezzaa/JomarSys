@extends('layouts.transact.main')
@section('head')
<script>
      function readByAjax()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax9') }}",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
              }
            })
        };
        readByAjax();
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
              <ul class="sidebar-nav">
                  <li>
                      <a href="{{ route('dashboard') }}"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
                  </li>
                  <li class="sidebar-header">
                      <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                      <span class="sidebar-header-title">Maintenance</span>
                  </li>
                  
                  <li>
                      <a href="{{ route('serviceOff.index') }}"><i class="gi gi-hand_saw sidebar-nav-icon"></i>Services Offered</a>
                  </li>
                  <li>
                      <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                      <i class="gi gi-group sidebar-nav-icon"></i>Worker</a>
                      <ul>
                          <li>
                              <a href="{{ route('specialization.index')}}">Worker Specialization</a>
                          </li>
                          <li>
                              <a href="{{ route('worker.index') }}">Worker</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                      <i class="fa fa-cubes sidebar-nav-icon"></i>Material</a>
                      <ul>
                          <li>
                              <a href="{{ route('materialclass.index') }}">Material Classification</a>
                          </li>
                          <li>
                              <a href="{{ route('material.index') }}">Material</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                      <i class="gi gi-blacksmith sidebar-nav-icon"></i>Equipment</a>
                      <ul>
                          <li>
                              <a href="{{ route('equiptype.index') }}">Equipment Type</a>
                          </li>
                          <li>
                              <a href="{{ route('equipment.index') }}">Equipment</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="{{ route('deliverytruck.index') }}"><i class="fa fa-truck sidebar-nav-icon"></i>Delivery Truck</a>
                  </li>
                  <li class="sidebar-header">
                      <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                      <span class="sidebar-header-title">Transaction</span>
                  </li>
                  <li class="active">
                      <a href="#" class="active"><i class="gi gi-user sidebar-nav-icon"></i>Client</a>
                  </li>
                  <li>
                              <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                              <i class="gi gi-notes_2 sidebar-nav-icon"></i>Contract</a>
                              <ul>
                                  <li>
                                      <a href="#">Add Contract</a>
                                  </li>
                                  <li>
                                      <a href="#">Contract List</a>
                                  </li>
                              </ul>
                          </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction3</a>
                  </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction4</a>
                  </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction5</a>
                  </li>
                  <li class="sidebar-header">
                      <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                      <span class="sidebar-header-title">Report</span>
                  </li>
                  <li>
                      <a href=""><i class="fa fa-files-o sidebar-nav-icon"></i>Report1</a>
                  </li>
                  <li>
                      <a href=""><i class="fa fa-truck sidebar-nav-icon"></i>Report2</a>
                  </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report3</a>
                  </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report4</a>
                  </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report5</a>
                  </li>
                  <li class="sidebar-header">
                      <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                      <span class="sidebar-header-title">Utilities</span>
                  </li>
                  <li>
                      <a href=""><i class="fa fa-files-o sidebar-nav-icon"></i>Utilities1</a>
                  </li>
                  <li>
                      <a href=""><i class="fa fa-truck sidebar-nav-icon"></i>Utilities2</a>
                  </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities3</a>
                  </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities4</a>
                  </li>
                  <li>
                      <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities5</a>
                  </li>
              </ul>
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
                <i class="fa fa-wrench"> </i> Quote List<br>
            </h4>
          </div>
      </div>
      <ol class="breadcrumb breadcrumb-top">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
          <li><a href="javascript:void(0)">Transaction</a></li>
          <li><a href="javascript:void(0)">Quote</a></li>
          <li><a href="javascript:void(0)">Quotes</a></li>
      </ol>
      <div class="block">
        <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>List of Quote</strong></h3>
        </div>

         <div class="table-responsive">
          <table id="5cols-datatable" class="table table-vcenter table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center"></th>
                <th class="text-center">Quote Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">Services</th>
                <th class="text-center">Controls</th>
              </tr>
            </thead>
            <tbody id="equip-list">
              <tr id="id{{$quote->intQouteID}}">
                  <td class="text-center">
                      <a href="/contract/{{$quote->intQouteID}}"><button class="btn btn-primary"> <span class="gi gi-plus"></span>  Add Contract
                      </button></a>
                  </td>
                  <td class="text-center">
                      {{ $quote->strQuoteName }}
                  </td>
                  <td class="text-center">
                      {{ $quote->datDate }} 
                  </td>
                  <td class="text-center">
                    @foreach($quote->service as $service)
                    <p>{{ $service->strServiceOffName }}</p>
                    @endforeach
                  </td>
                  <td>
                    <div class="text-center">
                      <a href=""><button id="edit_supp" class="btn btn-warning edit_supp" value=""> <span class="gi gi-edit"></span>  Edit
                      </button></a>

                      <button id="del_supp" class="btn btn-danger delete_supp" value="{{$quote->intQouteID}}"><span class="gi gi-delete">  </span>  Delete
                      </button>
                    </div>
                  </td>
                </tr>
            </tbody>
        </table>
        </div>
        <br>
      </div>
@endsection
@section('script')
  <script>$(function(){ TablesDatatables.init(); });</script>

<a class="float" href="{{ url('client/create') }}" data-toggle="tooltip" data-placement="left" title="Add Client">
<i class="fa fa-plus my-float"></i>
  </a> 
@endsection