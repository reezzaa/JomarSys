@extends('layouts.mainte.main')
@section('head')

    <script>
      function readByAjax()
        {
            $.ajax({
              type : 'get',
              url  : "{{ url('readByAjax16') }}",
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
              <!-- Icon for user -->
              @include('layouts.headers.usericon')
              <!-- Sidebar Navigation -->
              @include('layouts.dashboard.sidebar')
              <!-- @include('layouts.transact.delivery.sidebar') -->
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
                        <i class="gi gi-cargo"></i> Delivery Transaction<br>
                    </h4>
                  </div>
              </div>
              <ol class="breadcrumb breadcrumb-top">
                  <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                  <li><a href="javascript:void(0)">Transaction</a></li>
                  <li><a href="javascript:void(0)">Delivery</a></li>    
              </ol>
             <div class="block block-full">
            <div class="block-title themed-background">
              <h3 class="themed-background" style="color:white"><strong>Pending Deliveries</strong></h3>
              </div> 
                <br>

                <div class="table-responsive">
              </div>
              <br>
            </div>
@endsection
@section('addbtn')
<a href="{{route('delivery.create')}}" class="float"  data-toggle="tooltip" data-placement="left" title="Add Delivery">
    <i class="fa fa-plus my-float"></i></a>
@endsection
@section('script')
  <script>
  $(document).ready(function(){
      var id='';
      var url = "/delivery";
       $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 

        //get view data
      $(this).on('click','#viewdel', function(){
          var classID = $(this).val();
          var DelID = '';
          var a,b=0;

         /////////////////top loading//////////
          NProgress.start();
          /////////////////////////////////////
          $.ajax({
          type : 'get',
          url  : '/findTruck/'+classID,
          dataType: 'json',
          success:function(data){
            for(a=0;a<data.length;a++)
            {
                document.getElementById("special1").innerHTML += '<li>'+ data[a].strDeliTruckPlateNo +'</li><br>';
                document.getElementById("special2").innerHTML += '<li>'+ data[a].strDelAddress+" "+data[a].strDelCity+" "+data[a].strDelProvince +'</li><br>';


            }
          }
          });
        $.get('/findMatD/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("special").innerHTML += '<li>'+ data[a].intDeliDQty+' '+data[a].strMaterialName +'</li><br>';

            }
              $('#view_modal').modal('show');
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
          });
         $('#special').empty();
          $('#special1').empty();
          $('#special2').empty();                  
      });
      //get update data
       $(this).on('click','#upddel', function(){
         /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
        var classe = $(this).val();
        // alert(classe);
        $.get('findDel/'+ classe , function (data) {
              $('#delupd').text(data);
              $('#delupdID').val(data);
              $('#upd_modal').modal('show');
              console.log(data);
               /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          })
        });

       $(this).on('submit','#frm-upd' ,function(e){
            e.preventDefault();
             /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
        // var classe = $(this).val();

              var mod_url = 'delivery/'+ $('#delupdID').val();
              // alert(mod_url);
              var data = $('#frm-upd').serialize();
              $.ajax({
                type : 'put',
                url  : mod_url,
                data : data,
                dataType: 'json',
                success:function(data){
                  readByAjax();
                  $(".modal").modal('hide');
                  swal("Delivery Updated!", "", "success");
                   /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                }
              })
             e.stopPropagation();
          }); 


             //delete get data
       $(this).on('click','#deldel', function(){
         /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
        var classe = $(this).val();
        // alert(classe);
        $.get('/delivery/'+ classe + '/edit', function (data) {
              $('#deleteID').text(data);
              $('#delID').val(data);
              $('#del_modal').modal('show');
              console.log(data);
               /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          })
        });

       $(this).on('submit','#frm-del' ,function(e){
            e.preventDefault();
             /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
              var mod_url = url+'/'+$('#delID').val()+ '/delete';
              // alert(mod_url);
              var data = $('#frm-del').serialize();
              $.ajax({
                type : 'put',
                url  : mod_url,
                data : data,
                dataType: 'json',
                success:function(data){
                  readByAjax();
                  $(".modal").modal('hide');
                  swal("Deleted!", "", "success");
                   /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                }
              })
             e.stopPropagation();
          }); 

        }); 

  </script>
@endsection
