@extends('layouts.mainte.main')
@section('head')
<script>
   function readByAjax()
   {
    $.ajax({
      type : 'get',
      url  : "{{ url('readByAjax17') }}",
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
          <i class="fa fa-wrench"> </i> User Access<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">User Access</a></li>
    </ol>
       
      <!-- Simple Profile Widgets Row -->
      
      <div class="block block-full">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>User Access Settings</strong></h3>
        </div> 
          <br>
          
       <div id="adduser_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="block full container-fluid">
              <div class="block-title">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>Add User</h3>
              </div>
              <!-- {!! Form::open(['url'=>'userlevel', 'method'=>'POST', 'id'=>'frm-insert']) !!} -->
               <form id="form-validation" action="{{ url('contractadd') }}" method="POST">
              {{ csrf_field() }}
              <fieldset class="row">
                 <div class="form-group col-md-4">
                <label for="fname"> First Name <span class="text-danger">*</span> </label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter First Name">
                <span id="duplicate2" class="help-block animation-slideDown">
                  <!-- Duplicate  First name -->
                </span>
                <script>
                  $('#fname').alpha();
                </script>
              </div>
               <div class="form-group col-md-4">
                <label for="mname"> Middle Name </label>
                <input type="text" id="mname" name="mname" class="form-control" placeholder="Enter Middle Name">
                
                <span id="duplicate2" class="help-block animation-slideDown">
                  <!-- Duplicate name -->
                </span>
                <script>
                  $('#name').alpha();
                </script>
              </div>
               <div class="form-group col-md-4">
                <label for="lname"> Last Name <span class="text-danger">*</span> </label>
                <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter Last Name">
                <span id="duplicate2" class="help-block animation-slideDown">
                  <!-- Duplicate  name -->
                </span>
                <script>
                  $('#name').alpha();
                </script>
              </div>
              </fieldset><hr>
               <fieldset>
            <div class="form-group">
              <label for="email" class="col-md-3 text-center">Email address <span class="text-danger">*</span> </label>
             <div class="col-md-9">
                  <input type="text" id="val_email" name="val_email" class="form-control" placeholder="test@example.com">
             </div>
              <span id="duplicate2" class="help-block animation-slideDown">
                Duplicate Email Address 
              </span>
              
            </div>
             </fieldset>
             <hr>
             <fieldset>
                 <div class="form-group">
                <label for="username" class="col-md-3 text-center">User Name <span class="text-danger">*</span> </label>
                <div class="col-md-9">
                  <input type="text" id="val_username" name="val_username" class="form-control" placeholder="Your username..">
                </div>
                <span id="duplicate2" class="help-block animation-slideDown">
                  Duplicate Username 
                </span>
                
              </div>
             </fieldset><br>
            <fieldset>
               <div class="form-group">
               <label for="password" class="col-md-3 text-center">Password <span class="text-danger">*</span> </label>
              <div class="col-md-9">
                 <input type="password" name="val_password" class="form-control " id="val_password" maxlength="30" placeholder="Choose a crazy one..">
              </div>
               <span id="duplicate2" class="help-block animation-slideDown">
                Duplicate password 
              </span>
              
            </div>
            </fieldset><br>
            <fieldset>
               <div class="form-group">
               <label for="confirmpassword" class="col-md-3 text-center">Confirm Password <span class="text-danger">*</span> </label>
              <div class="col-md-9">
                <input type="password" name="val_confirm_password" class="form-control " id="val_confirm_password" maxlength="30" placeholder="and confirm it">
              </div>
               <span id="duplicate2" class="help-block animation-slideDown">
                Duplicate password 
              </span>
              
            </div>
            </fieldset><br>
            


            <div class="pull-right">
              <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
              <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add</button>
            </div>
            <!-- {!! Form::close() !!} -->
            </form>


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
<a class="float"  data-toggle="tooltip" data-placement="left" title="Add User">
    <i class="fa fa-plus my-float"></i></a>
@endsection

@section('script')
  <script >
     $(function(){ FormsValidation.init(); });
    $(document).ready(function(){
      var id='';
      var url = "/userlevel";
  

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); 



          /////////////////////////////////////////////////////
          //clear on focus
          
          $('#username').focus(function(){
            $('span#duplicate2').hide();
          });
          $('#password').focus(function(){
            $('span#duplicate2').hide();
          });
          $('#email').focus(function(){
            $('span#duplicate2').hide();
          });




           ////////////////////////////////////////////////////////
          //reset field
          $('.float').click(function(){
              $('html,body').animate({
                  scrollTop: 0
              }, 500);
              $('#frm-insert').trigger("reset");
              $('span#duplicate').hide();
              $('span#duplicate2').hide();
              $('span#duplicate3').hide();
              $('span#duplicate4').hide();
              $('#adduser_modal').modal('show');
            });

          //////////////////////////////////////////////////////////////
         //insert data
         $('#form-validation').on('submit', function(e){
          e.preventDefault();
          var ddata = $("#form-validation").serialize();
          console.log(ddata);
        var $form = $(this);
        if(! $form.valid()) return false;
        {
          $.ajax({
            type : 'post',
            url  : url,
            data : ddata,
            dataType: 'json',
            success:function(data){
              readByAjax();
              swal("Success","User Added!", "success");
              $(".modal").modal('hide');
            },
            error:function(data){
            }
          })
        }
          
        });
          $(this).on('click','#show', function(){
          var classID = $(this).val();
           $("#myId").val($(this).val()); //needed for update 

          var a,b=0;
          var check = document.getElementById("checkboxList");

         /////////////////top loading//////////
          NProgress.start();
          /////////////////////////////////////
          $.ajax({
          type : 'get',
          url  : url + '/' + classID +"/edit",
          dataType: 'json',
          success:function(data){
            for(a=0;a<data.length;a++)
            {

                if(data[a].is_active)
              {
                c = "checked";
                check.innerHTML+="<tr><td><input "+c+" type='checkbox' id='myCheckbox' name='myCheckbox[]' value='"+data[a].id+"' >   "+ data[a].strUserLDesc+"<br></td></tr>";


              }
              else
              {
                c="";
                check.innerHTML+="<tr><td><input "+c+" type='checkbox' id='myCheckbox' name='myCheckbox[]' value='"+data[a].id+"' >   "+ data[a].strUserLDesc+"<br></td></tr>";
              }

            }
             $('#useraccess_modal').modal('show');

             /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
          }
          });
          
      });
          $(document).on('hidden.bs.modal','#useraccess_modal', function () 
         {
          $('#checkboxList').empty();
        });

     


      //update edit data
      $(this).on('submit' ,'#frm-upd' ,function(e){
        e.preventDefault();
        id=$('#myId').val();
        // alert(id);

        var formData = $('#frm-upd').serialize();
        console.log(formData);
        var mod_url = url+'/'+id;
        $.ajax({
          type : 'PUT',
          url  : mod_url,
          data : formData,
          dataType: 'json',
          success:function(data){
            console.log(data);
            readByAjax();
            $(".modal").modal('hide');
            swal("Success","User Access Edited!", "success");
          },
          error:function(data){

          }
        })
      }); 

        //status listen edit
        $(this).on('change','#active',function(e){ 
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




  });
  </script>


@endsection