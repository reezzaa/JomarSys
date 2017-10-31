@extends('layouts.mainte.main')
@section('head')
<script>
  function readByAjax()
    {
        $.ajax({
          type : 'get',
          url  : "{{ url('readByAjax7') }}",
          dataType : 'html',
          success:function(data)
          {
              $('.table-responsive').html(data);
              $('[data-toggle="tooltip"]').tooltip();
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
            @include('layouts.headers.usericon')
            <!-- Sidebar Navigation -->
              @include('layouts.dashboard.sidebar')
            <!-- @include('layouts.mainte.specialization.sidebar') -->
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
            <i class="fa fa-wrench"> </i> Worker Specialization Maintenance<br>
        </h4>
      </div>
  </div>
  <ol class="breadcrumb breadcrumb-top">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Maintenance</a></li>
      <li><a href="javascript:void(0)">Worker</a></li>
      <li><a href="javascript:void(0)">Worker Specialization</a></li>
  </ol>
  <div class="block">
    <div id="add_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
            <div class="block-title themed-background">
              <div class="block-options pull-right">
                  <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
              </div>
              <h3 class="themed-background" style="color:white;"><strong>Add Specialization</strong></h3>
            </div>

            {!! Form::open(['url'=>'specialization', 'method'=>'POST', 'id'=>'frm-insert']) !!}
              <div class="form-group">
                <div class="col-md-offset-1">
                  <label for="specname">Specialization Name</label>
                </div>
                <div class="col-md-8 col-md-offset-2">
                  {!! Form::text('specname',null ,['id'=>'specname','placeholder'=>'Specialization Name', 'class' => 'form-control', 'maxlength'=>'40']) !!}
                  <span id="duplicate" class="help-block animation-slideDown">
                      Duplicate Material Classification Name
                  </span>
                  <br>
                </div>
                  <script>
                  $('#specname').alphanum({
                    allow :    '-/', // Specify characters to allow
                  });
                  </script>
              </div>
              <div class="pull-right">
                <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add</button>
              </div>
              <div class="clearfix"></div>
            {!! Form::close() !!}
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
  <a class="float"  data-toggle="tooltip" data-placement="left" title="Add Specialization">
    <i class="fa fa-plus my-float"></i>
  </a>
@endsection

@section('script')
  <script>
     $(document).ready(function(){

          var selfName = '';
          var id='';
          var url = "/specialization";
          
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            //hide
            $('#specname').focus(function(){
              $('span#duplicate').hide();
            });  

             $('.float').click(function(){
              $('html,body').animate({
                  scrollTop: 0
              }, 500);
              $('#frm-insert').trigger("reset");
              $('span#duplicate').hide();
              $('#add_modal').modal('show');
            });

            //insert data
            $('#frm-insert').on('submit', function(e){
              $('span#duplicate').hide();
              e.preventDefault();
              if($('#specname').val().trim() != "")
                {
                   /////////////////start top loading//////////
                  NProgress.start();
                  ///////////////////////////////////////////
                  var ddata = {
                      strSpecDesc : $('#specname').val()
                  }
                  $.ajax({
                    type : 'post',
                    url  : url,
                    data : ddata,
                    dataType: 'json',
                    success:function(data){
                      readByAjax();
                      $(".modal").modal('hide');
                      swal("Success","Specialization Added!", "success");
                    },
                    error:function(data){
                      /////////////////stop top loading//////////
                      NProgress.done();
                      ///////////////////////////////////////////
                       $('span#duplicate').text("Duplicate Specialization Name");
                       $('span#duplicate').show();
                    }
                  })
                }
                else
                {
                  $('span#duplicate').text("Fill up required");
                  $('span#duplicate').show();
                }
                e.stopPropagation();
              });

            //get edit data
              $(this).on('click','.edit_supp', function(){
                  $('span#duplicate').hide();
                  var classID = $(this).val();
                  id = classID;
                  /////////////////start top loading//////////
                  NProgress.start();
                  ///////////////////////////////////////////
                  $.get(url + '/' + classID + '/edit', function (data) {
                        $('#specID').val(data.intSpecID);
                        $('#strSpecDesc').val(data.strSpecDesc);
                        selfName = $('#strSpecDesc').val();
                        /////////////////stop top loading//////////
                        NProgress.done();
                        ///////////////////////////////////////////
                        $('#edit_modal').modal('show');
                    })
              });
              
              //update edit data
              $(this).on('submit', function(e){
                 $('span#duplicate').hide();
                  e.preventDefault();
                  if($('#strSpecDesc').val() != "")
                  {
                    if(selfName == $('#strSpecDesc').val())
                    {
                      swal("Info", "Same Specialization Name", "info");
                    }
                    else
                    {
                      var formData = {
                        specID: $('#specID').val(),
                        strSpecDesc: $('#strSpecDesc').val()
                      }
                       /////////////////start top loading//////////
                      NProgress.start();
                      ///////////////////////////////////////////
                      var mod_url = url+'/'+id; 
                      $.ajax({
                        type : 'put',
                        url  : mod_url,
                        data : formData,
                        dataType: 'json',
                        success:function(data){
                          readByAjax();
                          $(".modal").modal('hide');
                          swal("Success","Specialization Edited!", "success");
                        },
                        error:function(data){
                          /////////////////stop top loading//////////
                          NProgress.done();
                          ///////////////////////////////////////////
                           $('span#duplicate').text("Duplicate Specialization Name");
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

              //status listen edit
              $(this).on('change','#status',function(e){ 
              e.preventDefault(); 
              /////////////////start top loading//////////
              NProgress.start();
              ///////////////////////////////////////////
               var stat = $(this).val();
               $.ajax({
                  url: url + '/checkbox/' + stat,
                  type: "PUT",
                  success: function (data) {
                      //reload
                      //location.reload();
                      //noreload but glitch
                      readByAjax();
                      $.bootstrapGrowl('<h4>Success!</h4> <p>Status Changed!</p>', {
                        type: 'success',
                        delay: '1700',
                        allow_dismiss: true
                      });
                  }
              });
               e.stopPropagation();
            });

            //delete get data
           $(this).on('click','.del_supp', function(){
            var classe = $(this).val();
            /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
            $.get(url + '/' + classe + '/edit', function (data) {
                  $('#deleteID').text(data.intSpecID);
                  $('#del_classname').text(data.strSpecDesc);
                  $('#del_modal').modal('show');
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
              })
            });

           //soft delete
           $(this).on('submit','#frm-del' ,function(e){
            e.preventDefault();
            /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
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