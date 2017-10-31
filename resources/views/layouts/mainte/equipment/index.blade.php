@extends('layouts.mainte.main')
@section('head')
<script>
  function readByAjax()
    {
        $.ajax({
          type : 'get',
          url  : "{{ url('readByAjax4') }}",
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
              
              <!-- @include('layouts.mainte.equipment.sidebar') -->
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
            <i class="fa fa-wrench"> </i> Equipment Maintenance<br>
        </h4>
      </div>
  </div>
  <ol class="breadcrumb breadcrumb-top">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Maintenance</a></li>
      <li><a href="javascript:void(0)">Equipment</a></li>
      <li><a href="">Equipment</a></li>
  </ol>

  <div class="block">

  <div id="addequip_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                      <div class="block">
                        <div class="block-title themed-background">
                          <div class="block-options pull-right">
                              <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                          </div>
                          <h3 class="themed-background" style="color:white;"><strong>Add Equipment</strong></h3>
                        </div>
                        {!! Form::open(['url'=>'equipment', 'method'=>'POST', 'id'=>'frm-insert']) !!}
                         @include('layouts.mainte.equipment.form')
                      	{!! Form::close() !!}
                        <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
        </div>

	<div class="table-responsive">
	</div>
	<br>
</div>
@endsection

@section('addbtn')
<a class="float"  data-toggle="tooltip" data-placement="left" title="Add Equipment">
    <i class="fa fa-plus my-float"></i></a>
@endsection

@section('script')
<script>
    $(document).ready(function(){
       var selfName = '';
        var className = '';
        var id='';
        var url = "/equipment";
         $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }); 

          /////////////////////////////////////////////////////
          //clear on focus
          $('#equipname').focus(function(){
            $('span#duplicate').hide();
           });
          $('#equiptype').focus(function(){
            $('span#duplicate4').hide();
           });
           $('#equipmodel').focus(function(){
            $('span#duplicate2').hide();
           });
           $('#equipweight').focus(function(){
            $('span#duplicate3').hide();
           });
           
           ////////////////////////////////////////////////////////
          //reset field
          $('.float').click(function(){
            $('html,body').animate({
                scrollTop: 0
            }, 500);
            $('#frm-insert').trigger("reset");
            $('span#duplicate').hide();
            $('span#duplicate4').hide();
            $('span#duplicate2').hide();
            $('span#duplicate3').hide();
            $('#addequip_modal').modal('show');
          });
          //////////////////////////////////////////////////////////////
         //insert data
        $('#frm-insert').on('submit', function(e){
          $('span#duplicate').hide();
          $('span#duplicate2').hide();
          $('span#duplicate3').hide();
          $('span#duplicate4').hide();
          e.preventDefault();
          if($('#equiptype').val() != null)
          {
            if($('#equipname').val().trim() != "")
            {
              if($('#equipmodel').val().trim() != "")
              {
                if($('#equipweight').val().trim() != "")
                {
                  var ddata = {
                    strEquipName: $('#equipname').val(),
                    intTypeID: $('#equiptype').val(),
                    strEquipModel: $('#equipmodel').val(),
                    dblEquipWeight: $('#equipweight').val()
                  }
                  $.ajax({
                    type : 'post',
                    url  : url,
                    data : ddata,
                    dataType: 'json',
                    success:function(data){
                      readByAjax();
                      swal("Success","Equipment Added!", "success");
                      $(".modal").modal('hide');
                    },
                    error:function(data){
                       $('span#duplicate1').text("Duplicate Equipment Info");
                       $('span#duplicate1').show();
                    }
                  })
                }
                else
                {
                  $('span#duplicate3').text("Fill up required");
                  $('span#duplicate3').show();
                }
              }
              else
              {
                $('span#duplicate2').text("Fill up required");
                $('span#duplicate2').show();
              }
            }
            else
            {
              $('span#duplicate').text("Fill up required");
              $('span#duplicate').show();
            }
          }
          else
          {
              $('span#duplicate4').text("Select Equipment Type");
              $('span#duplicate4').show();
          }
          e.stopPropagation();
        });

         //get edit data
        $(this).on('click','.edit_supp', function(){
            $('span#duplicates').hide();
            $('span#duplicates2').hide();
            var classID = $(this).val();
            id = classID;
            $.get(url + '/' + classID + '/edit', function (data) {
                  $('#equipID').val(data.intEquipID);
                  $('#equipnames').val(data.strEquipName);
                  $('#equiptypes > option[value="'+ data.intTypeID +'"]').prop('selected', true);
                  selfName = $('#equipnames').val();
                  className = $('#equiptypes').val();
                  $('#edit_modal').modal('show');
              })
        });


      //update edit data
      $(this).on('submit' ,function(e){
         $('span#duplicates').hide();
         $('span#duplicates2').hide();
          e.preventDefault();
          var formData = {
                equipID: $('#equipID').val(),
                strEquipName: $('#equipnames').val(),
                intTypeID : $('#equiptypes').val(),
                dcmEquipRentalPrice : $('#prices').val()
          }
          if($('#equiptypes').val() != "")
          {
            if($('#equipnames').val() != "")
            {
              if(selfName == $('#equipnames').val() && className == $('#equiptypes').val())
              {
                swal("Info", "Same Equipment Infromation", "info");
              }
              else
              {
                var mod_url = url+'/'+id;
                $.ajax({
                  type : 'put',
                  url  : mod_url,
                  data : formData,
                  dataType: 'json',
                  success:function(data){
                    readByAjax();
                    $(".modal").modal('hide');
                    swal("Success","Equipment Edited!", "success");
                  },
                  error:function(data){
                     $('span#duplicates2').text("Duplicate Equipment Name");
                     $('span#duplicates2').show();
                  }
                })
              }
            }
            else
            {
              $('span#duplicates2').text("Fill up required");
              $('span#duplicates2').show();
            }
          }
          else
          {
              $('span#duplicates').text("Select Equipment Type");
              $('span#duplicates').show();
          }
           e.stopPropagation();
        }); 

        //status listen edit
        $(this).on('change','#status',function(e){ 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         e.preventDefault(); 
         var stat = $(this).val();
         $.ajax({
            url: url + '/checkbox/' + stat,
            type: "PUT",
            success: function (data) {
                //reload
                //location.reload();
                //noreload but glitch
                readByAjax();
            }
        });
         e.stopPropagation();
      });

         //delete get data
       $(this).on('click','#del_supp', function(){
        var classe = $(this).val();
        $.get(url + '/' + classe + '/edit', function (data) {
              $('#deleteID').text(data.intEquipID);
              $('#del_classname').text(data.strEquipName);
              $('#del_modal').modal('show');
          })
        });

       //soft delete
       $(this).on('submit','#frm-del' ,function(e){
            e.preventDefault();
              var mod_url = url+'/'+$('#deleteID').text()+ '/delete';
              console.log(mod_url);
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