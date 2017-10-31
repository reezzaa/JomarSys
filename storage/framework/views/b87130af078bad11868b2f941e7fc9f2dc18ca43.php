<?php $__env->startSection('head'); ?>
<script>
  function readByAjax()
    {
        $.ajax({
          type : 'get',
          url  : "<?php echo e(url('readByAjax10')); ?>",
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div class="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
          <!-- Icon for user -->
          <?php echo $__env->make('layouts.headers.usericon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <!-- Sidebar Navigation -->
              <?php echo $__env->make('layouts.dashboard.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <!-- <?php echo $__env->make('layouts.mainte.UOM.sbgroup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
          <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-header">
    <div class="header-section">
      <h4>
          <i class="fa fa-wrench"> </i>Based Unit of Measurement Maintenance<br>
      </h4>
    </div>
</div>
<ol class="breadcrumb breadcrumb-top">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
    <li><a href="javascript:void(0)">Maintenance</a></li>
    <li><a href="javascript:void(0)">Unit of Measurement</a></li>
    <li><a href="">Based UOM</a></li>
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
                      <h3 class="themed-background" style="color:white;"><strong>Add Based UOM</strong></h3>
                    </div>

                     <?php echo Form::open(['url'=>'groupuomeasure', 'method'=>'POST', 'id'=>'frm-insert']); ?>

                      <div class="form-group">
                        <label for="groupuomname">
                        Based UOM Name
                        <span class="text-danger">*</span> 
                        </label>
                        <?php echo Form::text('groupuomname',null ,['id'=>'groupuomname','placeholder'=>'Based UOM Name', 'class' => 'form-control', 'maxlength'=>'40']); ?>

                        <span id="duplicate" class="help-block animation-slideDown">
                          Duplicate Material Classification Name
                        </span>
                        <script>
                          $('#groupuomname').alphanum({
                                allow :    '-,.()/', // Specify characters to allow
                              });
                          </script>
                      </div>
                      <div class="pull-right">
                        <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                        <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add</button>
                      </div>
                      <div class="clearfix"></div>
                    <?php echo Form::close(); ?>

                  </div>
                </div>
            </div>
          </div>

          <div class="table-responsive">
          </div>
          <br>
          </div>
        </div>
        <!-- END Page Content -->

        <!-- Footer -->
        <footer class="clearfix">
            <div class="pull-right">
                Crafted with <i class="fa fa-heart text-danger"></i> by <a href="javascript:void(0)">HeartCoded</a>
            </div>
            <div class="pull-left">
                <span>2016-2017</span> &copy; <a href="javascript:void(0)">JMSESMS</a>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Main Container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('addbtn'); ?>
 <a class="float"  data-toggle="tooltip" data-placement="left" title="Add UOM">
    <i class="fa fa-plus my-float"></i>
  </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
       $(document).ready(function(){
          var selfName = '';
          var id='';
          var url = "/groupuomeasure";
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            //hide
            $('#groupuomname').focus(function(){
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
              if($('#groupuomname').val().trim() != "")
                {
                  /////////////////start top loading//////////
                  NProgress.start();
                  ///////////////////////////////////////////
                  var ddata = {
                      strGroupUOMText: $('#groupuomname').val()
                  }
                  $.ajax({
                    type : 'post',
                    url  : url,
                    data : ddata,
                    dataType: 'json',
                    success:function(data){
                      readByAjax();
                      $(".modal").modal('hide');
                      swal("Success","Based UOM Added!", "success");
                    },
                    error:function(data){
                      /////////////////stop top loading//////////
                      NProgress.done();
                      ///////////////////////////////////////////
                       $('span#duplicate').text("Duplicate Based UOM Name");
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
                        $('#groupuomID').val(data.intGroupUOMID);
                        $('#strGroupUOMText').val(data.strGroupUOMText);
                        selfName =   $('#strGroupUOMText').val();
                        $('#edit_modal').modal('show');
                        /////////////////stop top loading//////////
                        NProgress.done();
                        ///////////////////////////////////////////
                    })
              });
              
              //update edit data
              $(this).on('submit', function(e){
                  
                 $('span#duplicate').hide();
                  e.preventDefault();
                  if($('#strGroupUOMText').val() != "")
                  {
                    if(selfName == $('#strGroupUOMText').val())
                    {
                      swal("Info", "Same Based UOM Name", "info");
                    }
                    else
                    {
                      /////////////////start top loading//////////
                      NProgress.start();
                      ///////////////////////////////////////////
                      var formData = {
                        intGroupUOMID: $('#groupuomID').val(),
                        strGroupUOMText: $('#strGroupUOMText').val()
                      }
                      var mod_url = url+'/'+id; 
                      $.ajax({
                        type : 'put',
                        url  : mod_url,
                        data : formData,
                        dataType: 'json',
                        success:function(data){
                          readByAjax();
                          $(".modal").modal('hide');
                          swal("Success","Based UOM Edited!", "success");
                        },
                        error:function(data){
                          /////////////////stop top loading//////////
                          NProgress.done();
                          ///////////////////////////////////////////
                           $('span#duplicate').text("Duplicate Based UOM Name");
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
               /////////////////start top loading//////////
                NProgress.start();
                ///////////////////////////////////////////
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
           $(this).on('click','.del_supp', function(){
            /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
            var classe = $(this).val();
            $.get(url + '/' + classe + '/edit', function (data) {
                  $('#deleteID').text(data.intGroupUOMID);
                  $('#del_classname').text(data.strGroupUOMText);
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mainte.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>