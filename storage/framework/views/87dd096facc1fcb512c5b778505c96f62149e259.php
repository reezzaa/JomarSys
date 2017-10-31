<?php $__env->startSection('head'); ?>
<script>
   function readByAjax()
    {
        $.ajax({
          type : 'get',
          url  : "<?php echo e(url('readByAjax6')); ?>",
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
              <!-- <?php echo $__env->make('layouts.mainte.deliverytruck.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
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
            <i class="fa fa-wrench"> </i> Delivery Truck Maintenance<br>
        </h4>
      </div>
  </div>
  <ol class="breadcrumb breadcrumb-top">
      <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Maintenance</a></li>
      <li><a href="javascript:void(0)">Delivery Truck</a></li>
  </ol>

  <div class="block">
    <div id="addTruck_modal" class="modal fade add-truck-modal" tabindex="-1" role="dialog" aria-labelledby="AddMatModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="block">
              <div class="block-title themed-background">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white;"><strong>Add Delivery Truck</strong></h3>
              </div>
              
               <?php echo Form::open(['url'=>'deliverytruck', 'method'=>'POST', 'id'=>'frm-insert']); ?>

                 <div class="form-group">
                    <label for="plateno">Plate Number</label>
                     <?php echo Form::text('plateno',null ,['id'=>'plateno','placeholder'=>'eg. ABC 1234', 'class' => 'form-control', 'maxlength'=>'8']); ?>

                     <span id="duplicate" class="help-block animation-slideDown">
                      Duplicate Material Name
                      </span>
                      <script>
                      $('#plateno').mask('SSS 0000', {
                          'translation': {
                              S: {pattern: /[A-Za-z]/},
                              0: {pattern: /[0-9]/}
                          }, 
                          onKeyPress: function (value, event) {
                                event.currentTarget.value = value.toUpperCase();
                            }
                        });
                      </script>
                  </div>
                  <div class="form-group">
                    <label for="vin">Vehicle Identification Number (VIN)</label>
                    <?php echo Form::text('vin',null ,['id'=>'vin','placeholder'=>'17 character VIN', 'class' => 'form-control', 'maxlength'=>'17']); ?>

                     <span id="duplicate2" class="help-block animation-slideDown">
                    Duplicate Material Name
                    </span>
                    <script>
                     $('#vin').mask('SSSSSSSSSSSSSSSSS', {
                          'translation': {
                              S: {pattern: /[A-Za-z0-9]/}
                          }, 
                          onKeyPress: function (value, event) {
                                event.currentTarget.value = value.toUpperCase();
                            }
                        });
                     </script>
                  </div>
                  <div class="form-group">
                    <label for="netcap">Net Capacity (in Kg)</label>
                     <?php echo Form::text('netcap',null ,['id'=>'netcap','placeholder'=>'Net Capacity', 'class' => 'form-control', 'maxlength'=>'10']); ?>

                    <span id="duplicate3" class="help-block animation-slideDown">
                    Duplicate Material Name
                    </span>
                    <script>
                      $('#netcap').numeric({
                          decimalSeparator: ".",
                          maxDecimalPlaces : 2,
                          allowMinus:   false
                      });
                    </script>
                  </div>
                  <div class="form-group">
                    <label for="weight">Gross Weight (in Tonage)</label>
                    <?php echo Form::text('weight',null ,['id'=>'weight','placeholder'=>'Gross Weight', 'class' => 'form-control', 'maxlength'=>'10']); ?>

                    <script>
                      $('#weight').numeric({
                          decimalSeparator: ".",
                          maxDecimalPlaces : 2,
                          allowMinus:   false
                      });
                    </script>
                    <span id="duplicate4" class="help-block animation-slideDown">
                    Duplicate Material Name
                    </span>
                  </div>
                  
                <div class="pull-right">
                  <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel
                  </button>
                  <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add
                  </button>
                </div>
                <div class="clearfix"></div>
              <?php echo Form::close(); ?>

            </div>
        </div>
      </div>
    </div>

    <div class="table-responsive">
    </div><br>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('addbtn'); ?>
<a class="float"  data-toggle="tooltip" data-placement="left" title="Add Delivery Truck">
    <i class="fa fa-plus my-float"></i></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    $(document).ready(function(){
      var selfName = '';
      var className = '';
      var cap = '';
      var weig = '';
      var id='';
      var url = "/deliverytruck";
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }); 
       ///mask
        /////////////////////////////////////////////////////
      //clear on focus
      $('#plateno').focus(function(){
        $('span#duplicate').hide();
       });
       $('#vin').focus(function(){
        $('span#duplicate2').hide();
       });
       $('#netcap').focus(function(){
        $('span#duplicate3').hide();
       });
       $('#weight').focus(function(){
        $('span#duplicate4').hide();
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
          $('#addTruck_modal').modal('show');
        });

        $('#frm-insert').on('submit', function(e){
        $('span#duplicate').hide();
        $('span#duplicate2').hide();
        e.preventDefault();
        if($('#plateno').val() != "")
        {
          if($('#plateno').val().length >= 7)
          {
            if($('#vin').val() != "")
            {
              if($('#vin').val().length == 17)
              {
                if($('#netcap').val() != "")
                {
                  var netcap = Number($('#netcap').val());
                   if(netcap != 0)
                    {
                      if($('#weight').val() != "")
                      {
                        var weight = Number($('#weight').val());
                        if(weight != 0)
                        {
                          /////////////////start top loading//////////
                          NProgress.start();
                          ///////////////////////////////////////////
                          var ddata = {
                            strDeliTruckPlateNo: $('#plateno').val(),
                            strDeliTruckVINNo: $('#vin').val(),
                            dblDeliTruckCapacity: netcap,
                            dblDeliTruckGrossWeight: weight
                          } 
                          $.ajax({
                            type : 'post',
                            url  : url,
                            data : ddata,
                            dataType: 'json',
                            success:function(data){
                              readByAjax();
                              $(".modal").modal('hide');
                              swal("Success","Delivery Truck Added!", "success");
                            },
                            error:function(data){
                              /////////////////stop top loading//////////
                              NProgress.done();
                              ///////////////////////////////////////////
                               $('span#duplicate').text("Duplicate Truck");
                               $('span#duplicate').show();
                            }
                          })
                        }
                        else
                        {
                            $('span#duplicate4').text("Invalid Weight");
                            $('span#duplicate4').show();
                        }
                      }
                      else
                      {
                          $('span#duplicate4').text("Fill up required");
                          $('span#duplicate4').show();
                      }
                    }
                    else
                    {
                        $('span#duplicate3').text("Invalid Net Capacity");
                        $('span#duplicate3').show();
                    }
                  
                  
                }
                else
                {
                    $('span#duplicate3').text("Fill up required");
                    $('span#duplicate3').show();
                }

              }
              else
              {
                  $('span#duplicate2').text("VIN should contain 17 characters");
                  $('span#duplicate2').show();
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
            $('span#duplicate').text("Invalid Plate Number");
            $('span#duplicate').show();
          }
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
          $('span#duplicates').hide();
          $('span#duplicates2').hide();
          $('span#duplicates3').hide();
          $('span#duplicates4').hide();
          var classID = $(this).val();
          id = classID;
          $.get(url + '/' + classID + '/edit', function (data) {
                $('#truckID').val(data.intDeliTruckID);
                $('#platenos').val(data.strDeliTruckPlateNo);
                $('#vins').val(data.strDeliTruckVINNo);
                $('#netcaps').val(data.dblDeliTruckCapacity);
                $('#weights').val(data.dblDeliTruckGrossWeight);
                selfName = $('#platenos').val();
                className = $('#vins').val();
                cap = $('#netcaps').val();
                weig = $('#weights').val();
                $('#editTruck_modal').modal('show');
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
            })
      });

       //update edit data
      $(this).on('submit' ,function(e){
        
         $('span#duplicates').hide();
         $('span#duplicates2').hide();
         $('span#duplicates3').hide();
         $('span#duplicates4').hide();
          e.preventDefault();
          
          if($('#platenos').val() != "")
        {
          if($('#platenos').val().length >= 7)
          {
            if($('#vins').val() != "")
            {
              if($('#vins').val().length == 17)
              {
                if($('#netcaps').val() != "")
                {
                  var netcap = Number($('#netcaps').val());
                   if(netcap != 0)
                    {
                      if($('#weights').val() != "")
                      {
                        var weight = Number($('#weights').val());
                        if(weight != 0)
                        {
                          if(selfName == $('#platenos').val() && className == $('#vins').val() && cap == $('#netcaps').val() && weig == $('#weights').val() )
                          {
                            swal("Info", "Same Delivery Truck Information", "info");
                          }
                          else
                          { 
                            /////////////////start top loading//////////
                            NProgress.start();
                            ///////////////////////////////////////////
                            var formData = {
                                    truckID: $('#truckID').val(),
                                    strDeliTruckPlateNo: $('#platenos').val(),
                                    strDeliTruckVINNo : $('#vins').val(),
                                    dblDeliTruckCapacity : $('#netcaps').val(),
                                    dblDeliTruckGrossWeight : $('#weights').val()
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
                                swal("Success","Material Edited!", "success");
                              },
                              error:function(data){
                                  /////////////////stop top loading//////////
                                  NProgress.done();
                                  ///////////////////////////////////////////
                                 $('span#duplicates2').text("Duplicate Material Name");
                                 $('span#duplicates2').show();
                              }
                            })
                          }
                        }
                        else
                        {
                            $('span#duplicates4').text("Invalid Weight");
                            $('span#duplicates4').show();
                        }
                      }
                      else
                      {
                          $('span#duplicates4').text("Fill up required");
                          $('span#duplicates4').show();
                      }
                    }
                    else
                    {
                        $('span#duplicates3').text("Invalid Net Capacity");
                        $('span#duplicates3').show();
                    }
                  
                  
                }
                else
                {
                    $('span#duplicates3').text("Fill up required");
                    $('span#duplicates3').show();
                }

              }
              else
              {
                  $('span#duplicates2').text("VIN should contain 17 characters");
                  $('span#duplicates2').show();
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
            $('span#duplicates').text("Invalid Plate Number");
            $('span#duplicates').show();
          }
        }
        else
        {
          $('span#duplicates').text("Fill up required");
          $('span#duplicates').show();
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
              readByAjax();
          }
      });
       e.stopPropagation();
    });

       //delete get data
     $(this).on('click','#del_supp', function(){
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      var classe = $(this).val();
      $.get(url + '/' + classe + '/edit', function (data) {
            $('#deleteID').text(data.intDeliTruckID);
            $('#del_classname').text(data.strDeliTruckPlateNo);
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mainte.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>