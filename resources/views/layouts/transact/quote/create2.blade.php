@extends('layouts.transact.main')
@section('head')
<script>
  var pathname = window.location.pathname;
  var lastPart = pathname.split("/").pop();
  function readByAjax()
    {
        $.ajax({
          type : 'get',
          url  : '/readServices/'+lastPart,
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
                <i class="fa fa-wrench"> </i> Quote Transaction<br>
            </h4>
          </div>
      </div>
      <ol class="breadcrumb breadcrumb-top">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
          <li><a href="javascript:void(0)">Transaction</a></li>
          <li><a href="javascript:void(0)">Quote</a></li>
          <li><a href="javascript:void(0)">Quote</a></li>
      </ol>


       <!-- Interactive Block -->
        <div class="block">
            <!-- Interactive Title -->
            <div class="block-title themed-background">
                <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-hide"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white"><strong>Creation of Quote</strong></h3>
            </div>
            <!-- END Interactive Title -->

            <!-- Interactive Content -->
            <!-- The content you will put inside div.block-content, will be toggled -->
            <div class="block-content">
            @forelse($quote as $quote)
              {!! Form::model($quote, ['method'=>'PATCH', 'action'=>['QuoteController@update', $quote->intQuoteID],'id'=>'update','class'=>'form-horizontal form-bordered']) !!}
                  @include('layouts.transact.quote.form2')
              {!! Form::close() !!}
            @empty
             {!! Form::open(['url'=>'quote', 'id'=>'save-quote','class'=>'form-horizontal form-bordered']) !!}
                  @include('layouts.transact.quote.form')
              {!! Form::close() !!}
            @endforelse
            </div>
            <p class="text-muted">Creation of Quote Header</p>
            <!-- END Interactive Content -->
        </div>
        <!-- END Interactive Block -->
       
         <!-- Interactive Block -->
        <div class="block">
            <!-- Interactive Title -->
            <div class="block-title themed-background">
                <!-- Interactive block controls (initialized in js/app.js -> interactiveBlocks()) -->
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content"><i class="fa fa-arrows-v"></i></a>
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-hide"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white"><strong>Services Acquired</strong></h3>
            </div>
            <!-- END Interactive Title -->

            <!-- Interactive Content -->
            <!-- The content you will put inside div.block-content, will be toggled -->
            <div class="block-content">
              {!! Form::open(['url'=>'quotedetail', 'id'=>'service-quote','class'=>'form-horizontal form-bordered']) !!}
                  @include('layouts.transact.quote.addservice')
                  <div class="form-group">
                    <div class="col-md-offset-11">
                       {!! Form::submit('Add',['class'=>'btn btn-alt btn-success']) !!}
                    </div>
                  </div>
                {!! Form::close() !!}
                <br>
              <div class="table-responsive">

              </div>
              <br>
            </div>
            <p class="text-muted">Services Acquired</p>
            <!-- END Interactive Content -->
        </div>
        <!-- END Interactive Block -->

@endsection
@section('script')
 <script>
    $(document).ready(function(){
      var date = new Date();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }); 
     /////add
      $('#save-quote').on('submit', function(e){
        e.preventDefault();
        var ddata = {
                intClientID: $('#intClientID').val(),
                strQuoteName: $('#strQuoteName').val(),
                datQuoteDate: date.getFullYear()+'/'+(date.getMonth()+1)+'/'+date.getDate(),
                status: 0
            };
          $.ajax({
              type : 'POST',
              url  : 'header',
              data : ddata,
              dataType: 'json',
              success:function(data){
                swal("Success","Quote Header Added!", "success");
                $('#hidden').val(data);
                $('#strQuoteName').prop('readonly', true);
                $('#submithead').prop('disabled', true);
              },
              error:function(data){
                alert("Error Inserting");
              }
            })
           e.stopPropagation();
      });
      ///upd
      $('#update').on('submit', function(e){
        e.preventDefault();
        var ddata = {
                intClientID: $('#intClientID').val(),
                strQuoteName: $('#strQuoteName').val(),
                datQuoteDate: date.getFullYear()+'/'+(date.getMonth()+1)+'/'+date.getDate(),
                status: 0
            };
          $.ajax({
              type : 'PATCH',
              url  : '/quote/'+$('#intClientID').val(),
              data : ddata,
              dataType: 'json',
              success:function(data){
                swal("Success","Quote Header Edited!", "success");
                $('#strQuoteName').prop('readonly', true);
                $('#editsubmithead').prop('disabled', true);
              },
              error:function(data){
                alert("Error Updating");
              }
            })
           e.stopPropagation();
      });
       //add service
      $('#service-quote').on('submit', function(e){
        e.preventDefault();
        var servedata = {
            intQHID: $('#intQuoteID').val(),
            intSOID: $('#service').val()
        };
            $.ajax({
              type : 'post',
              url  : '/quotedetail',
              data : servedata,
              dataType: 'json',
              success:function(data){
                readByAjax();
                swal("Success","Service added to Qoute!", "success");
              },
              error:function(data){
                 alert('Duplicate Service Name');
              }
            })
          e.stopPropagation();
        });
    });
    </script>
 @endsection