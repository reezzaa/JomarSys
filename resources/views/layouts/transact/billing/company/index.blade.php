@extends('layouts.transact.main')
@section('head')
<script>
   function readByAjax()
  {
    /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
      $.ajax({
        type : 'get',
        url  : "{{ url('readByAjax13') }}",
        dataType : 'html',
        success:function(data)
        {
            $('.table-responsive').html(data);
        }
      })
        /////////////////stop top loading//////////
              NProgress.done();
        ///////////////////////////////////////////
  };
     function readByAjax2()
  {
    /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
      $.ajax({
        type : 'get',
        url  : "{{ url('readByAjax19') }}",
        dataType : 'html',
        success:function(data)
        {
            $('.table-responsive').html(data);
        }
      })
        /////////////////stop top loading//////////
              NProgress.done();
        ///////////////////////////////////////////

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
              <!-- @include('layouts.transact.billing.company.sidebar') -->
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
          <i class="fa fa-wrench"> </i> Billing and Collection Transaction<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Transaction</a></li>
        <li><a href="javascript:void(0)">Billing and Collection</a></li>
    </ol>
       
      <!-- Simple Profile Widgets Row -->
      <div class="col-md-3">
      <br>
        <!-- <div class="btn-group-vertical btn-block text-center">
          <button class="btn btn-alt btn-lg btn-primary "> Billing</button>
          <button class="btn btn-alt btn-lg btn-primary">Collection</button>
        </div> -->
       <div class="block">
       <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"></h3>
        </div> 
          <ul class="nav nav-pills nav-stacked">
          <li>
            <a href="javascript:void(0)" type="button" onclick="readByAjax()"><span class="badge pull-right">{{$countbill}}</span><strong>Billing</strong></a>
          </li>
          <li>
            <a href="javascript:void(0)" type="button" onclick="readByAjax2()"><span class="badge pull-right">{{$countcollect}}</span><strong>Collection</strong></a>
          </li>
        </ul>
        <br>
       </div>
      </div>
     <div class="col-md-9">
        <div class="block block-full">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>Billing and Collection</strong></h3>
        </div>
        <div class="table-responsive">
          
        </div> 
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
    readByAjax();
      

    });
  </script>


@endsection