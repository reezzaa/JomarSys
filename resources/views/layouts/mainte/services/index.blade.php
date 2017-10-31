@extends('layouts.mainte.main')
@section('head')
<script>
  function readByAjax()
    {
        $.ajax({
          type : 'get',
          url  : "{{ url('readByAjax5') }}",
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
              <!-- @include('layouts.mainte.services.sidebar') -->
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
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Maintenance</a></li>
        <li><a href="">Services Offered</a></li>
    </ol>
  
       <div class="block">
          <div id="add_modal" class="modal fade add-service-modal" tabindex="-1" role="dialog" aria-labelledby="AddMatClassModal" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="block">
                  <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>Add Service Offered</strong></h3>
                  </div>
                  
                  {!! Form::open(['url'=>'serviceOff', 'method'=>'POST', 'id'=>'frm-insert']) !!}
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="serveName" > 
                          Service Offered Name
                        </label>
                        {!! Form::text('serveName',null ,['id'=>'serveName','placeholder'=>'Service Offered Name', 'class' => 'form-control', 'maxlength'=>'200'])
                        !!}
                        <script>
                        $('#serveName').alpha({
                            allow :    '-,."/()', // Specify characters to allow
                          });
                        </script>
                        <span id="duplicate" class="help-block animation-slideDown">
                              Duplicate Material Classification Name
                        </span>
                        <br>
                    <div class="pull-right">
                      <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                      <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add
                      </button>
                    </div>
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
 <a class="float"  data-toggle="tooltip" data-placement="left" title="Add Service">
    <i class="fa fa-plus my-float"></i>
  </a>
@endsection

@section('script')
 <script>
    $(document).ready(function(){
    var selfName = '';
    var id='';
    var url = "/serviceOff";
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });  
      //hide
       $('#serveName').focus(function(){
      $('span#duplicate').hide();
     });

      //reset field
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
        if($('#serveName').val().trim() != "")
          {
            var ddata = {
                strServiceOffName: $('#serveName').val()
            }
            /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
            $.ajax({
              type : 'post',
              url  : url,
              data : ddata,
              dataType: 'json',
              success:function(data){
                readByAjax();
                $(".modal").modal('hide');
                swal("Success","Service Offered Added!", "success");                 
              },
              error:function(data){
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
                 $('span#duplicate').text("Duplicate Service Offered Name");
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
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
          $('span#duplicate').hide();
          var classID = $(this).val();
          id = classID;
          $.get(url + '/' + classID + '/edit', function (data) {
                $('#serveID').val(data.intServiceOffID);
                $('#strServiceOffName').val(data.strServiceOffName);
                selfName =   $('#strServiceOffName').val();
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
          
          if($('#strServiceOffName').val() != "")
          {
            if(selfName == $('#strServiceOffName').val())
            {
              swal("Info", "Same Service Offered Name", "info");
            }
            else
            {
              var formData = {
                serveID: $('#serveID').val(),
                strServiceOffName: $('#strServiceOffName').val()
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
                  swal("Success","Service Offered Edited!", "success");
                },
                error:function(data){
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                   $('span#duplicate').text("Duplicate Service Offered Name");
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
      })
       e.stopPropagation();
    });

    //delete get data
     $(this).on('click','.del_supp', function(){
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      var classe = $(this).val();
      $.get(url + '/' + classe + '/edit', function (data) {
            $('#deleteID').text(data.intServiceOffID);
            $('#del_classname').text(data.strServiceOffName);
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