@extends('layouts.transact.main')
@section('head')
<!-- <script>
   function readByAjax()
  {
      $.ajax({
        type : 'get',
        url  : "{{ url('readByAjax13') }}",
        dataType : 'html',
        success:function(data)
        {
            $('.table-responsive').html(data);
        }
      })
  };
    readByAjax();
</script> -->
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
              <!-- @include('layouts.transact.contract.sidebar') -->
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
          <i class="fa fa-wrench"> </i> Contract Transaction<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Transaction</a></li>
        <li><a href="javascript:void(0)">Contract List</a></li>
    </ol>
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>List of Contract</strong></h3>
        </div>  
      <!-- Simple Profile Widgets Row -->
      <div class="block">
          @include('layouts.transact.contract.table')
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