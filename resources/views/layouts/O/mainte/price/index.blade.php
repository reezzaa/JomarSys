@extends('layouts.O.mainte.mainte_main')
@section('head')
<script>
  function readByAjax()
    {

        $.ajax({
          type : 'get',
          url  : "{{ url('o/readByAjax16') }}",
          dataType : 'html',
          success:function(data)
          {$('.tab-pane').empty();
              $('.mat').html(data);
              $('[data-toggle="tooltip"]').tooltip();
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          }
        })
    };
    // function readByAjax2()
    // {
    //     $.ajax({
    //       type : 'get',
    //       url  : "{{ url('o/readByAjax17') }}",
    //       dataType : 'html',
    //       success:function(data)
    //       {
    //         $('.tab-pane').empty();
    //           $('.spec').html(data);
    //           $('[data-toggle="tooltip"]').tooltip();
    //           /////////////////stop top loading//////////
    //           NProgress.done();
    //           ///////////////////////////////////////////
    //       }
    //     })
    // };
    function readByAjax3()
    {
        $.ajax({
          type : 'get',
          url  : "{{ url('o/readByAjax18') }}",
          dataType : 'html',
          success:function(data)
          {
            $('.tab-pane').empty();
              $('.equip').html(data);
              $('[data-toggle="tooltip"]').tooltip();
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          }
        })
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
            <i class="fa fa-wrench"> </i> Price Maintenance<br>
        </h4>
      </div>
  </div>
  <ol class="breadcrumb breadcrumb-top">
      <li><a href="{{ route('o.home') }}"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Maintenance</a></li>
      <li><a>Price</a></li>
  </ol>
    <div class="block">
      <ul class="nav nav-tabs push" data-toggle="tabs">
          <li class="active"><a href="#tabs-material" onclick="readByAjax()">Material</a></li>
          <!-- <li><a href="#tabs-spec" onclick="readByAjax2()" >Specialization</a></li> -->
          <li><a href="#tabs-equipment" onclick="readByAjax3()">Equipment</a></li>
<!--   <li><a href="#tabs-messages" data-toggle="tooltip" title="Messages"><i class="fa fa-envelope-o"></i></a></li><li><a href="#tabs-settings" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a></li> -->
    </ul>
    <div class="tab-content">
     <div class="tab-pane active mat" id="tabs-material">
      </div>
     <!-- <div class="tab-pane spec" id="tabs-spec">
      </div> -->
    <div class="tab-pane equip" id="tabs-equipment">
      </div>
 <!--   <div class="tab-pane" id="example-tabs-messages">Messages..</div>
        <div class="tab-pane" id="example-tabs-settings">Settings..</div> -->
    </div>
    </div>
    
    <br>
@endsection


@section('script')

  <script>
    $(document).ready(function(){
    var selfName = '';
    var id='';
    var url = "price";
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////  
    readByAjax();



      //get edit data MATERIAL
      $(this).on('click','.edit_supp', function(){
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
          $('span#duplicate').hide();
          var classID = $(this).val();
          matid = classID;
          $.get(url + '/' + classID + '/edit', function (data) {
                for (var i = 0; i<data.length; i++) 
                {
                  $('#matname').text("Edit "+data[i].MaterialName+" Price");
                  $('#matprice').val(data[i].MaterialUnitPrice);
                   selfName =   $('#matprice').val();
                }
                $('#edit_modal').modal('show');
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
            })
      });

      //update edit data
      $(this).on('submit','#frm-mat-upd', function(e){
        
         $('span#duplicate').hide();
          e.preventDefault();
          
          if($('#matprice').val() != "")
          {
            if(selfName == $('#matprice').val())
            {
              swal("Info", "Same Material Price", "info");
            }
            else
            {
              var formData = {
                MaterialUnitPrice: $('#matprice').val()
              }
              /////////////////start top loading//////////
              NProgress.start();
              ///////////////////////////////////////////
              var mod_url = url+'/'+matid; 
              $.ajax({
                type : 'put',
                url  : mod_url,
                data : formData,
                dataType: 'json',
                success:function(data){
                  readByAjax();
                  $(".modal").modal('hide');
                  swal("Success","Material Price Edited!", "success");
                },
                error:function(data){
                  /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
                   $('span#duplicate').text("Error");
                   $('span#duplicate').show();
                }
              })
            }
          }
          else
          {
            $('span#duplicate').text("Fill up required");
            $('span#duplicate').show();
          }
           e.stopPropagation();
        }); 

      //get edit data EQUIPMENT
      $(this).on('click','.edit_supp', function(){
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
          $('span#duplicate').hide();
          var classID = $(this).val();
          equipid = classID;
          $.get(url + '/' + classID , function (data) {
                for (var i = 0; i<data.length; i++) 
                {
                  $('#equipname').text("Edit "+data[i].EquipName+" Rental Price");
                  $('#equipprice').val(data[i].EquipPrice);
                   selfName =   $('#equipprice').val();
                }
                $('#edit_equip_modal').modal('show');
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
            })
      });

      //update edit data
      $(this).on('submit','#frm-equip-upd', function(e){
        
         $('span#duplicate').hide();
          e.preventDefault();
          
          if($('#equipprice').val() != "")
          {
            if(selfName == $('#specprice').val())
            {
              swal("Info", "Same Equipment Rental Price", "info");
            }
            else
            {
              var formData = {
                EquipPrice: $('#equipprice').val()
              }
              /////////////////start top loading//////////
              NProgress.start();
              ///////////////////////////////////////////
              var mod_url = url+'/equip/'+equipid; 
              $.ajax({
                type : 'put',
                url  : mod_url,
                data : formData,
                dataType: 'json',
                success:function(data){
                  readByAjax3();
                  $(".modal").modal('hide');
                  swal("Success","Equipment Rental Price Edited!", "success");
                },
                error:function(data){
                  /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
                   $('span#duplicate').text("Error");
                   $('span#duplicate').show();
                }
              })
            }
          }
          else
          {
            $('span#duplicate').text("Fill up required");
            $('span#duplicate').show();
          }
           e.stopPropagation();
        }); 

    
  });
  </script>
@endsection