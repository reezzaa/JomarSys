@extends('layouts.O.mainte.mainte_main')
@section('head')
<script>
  function readByAjax()
    {
        $.ajax({
          type : 'get',
          url  : "{{ url('o/readByAjax5') }}",
          dataType : 'html',
          success:function(data)
          {
              $('.table-responsive').html(data);
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
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
              <!-- Icon for user -->
              @include('layouts.O.usericon')
              <!-- Sidebar Navigation -->
              @include('layouts.O.sidebar')
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
              <i class="fa fa-wrench"> </i>Services Offered Maintenance<br>
          </h4>
        </div>
    </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('o.home') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Maintenance</a></li>
        <li><a href="">Services Offered</a></li>
    </ol>
  
       <div class="block">
          
           <div class="table-responsive">
           </div>
          <br>
        </div>
@endsection

@section('addbtn')
 <a href="{{ route('serviceOff.create')}}" class="float"  data-toggle="tooltip" data-placement="left" title="Add Service">
    <i class="fa fa-plus my-float"></i>
  </a>
@endsection

@section('script')
 <script>
    $(document).ready(function(){
    var selfName = '';
    var id='';
    var url = "serviceOff";
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
       //status listen edit
      $(this).on('change','#status',function(e){ 
       /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
       e.preventDefault(); 
       var stat = $(this).val();
       $.ajax({
          url: 'serviceOff/checkbox' + '/' + stat,
          type: "PUT",
          success: function (data) {
              readByAjax();
          }
      });
       e.stopPropagation();
    });

    //delete get data
     $(this).on('click','.del_supp', function(){
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      var classe = $(this).val();
      $.get(url + '/' + classe + '/edit', function (data) {
            $('#deleteID').text(data.id);
            $('#del_classname').text(data.ServiceOffName);
            $('#del_modal').modal('show');
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
        })
      });

     //soft delete
     $(this).on('submit','#frm-del' ,function(e){
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
          e.preventDefault();
            var mod_url = url+'/'+$('#deleteID').text()+ '/delete';
            var data = $('#del_classname').text();
            $.ajax({
              type : 'put',
              url  : mod_url,
              data : data,
              dataType: 'json',
              success:function(data){
                readByAjax();
                $(".modal").modal('hide');
                swal("Deleted!", "", "success");
              }
            })
           e.stopPropagation();
        }); 
      });  
     
  </script>
@endsection