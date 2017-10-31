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
              <?php echo $__env->make('layouts.utilities.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php if(Session::has('flash_add_success')): ?>
  <script>
  $(function(){
    $.bootstrapGrowl('<h4>Success!</h4> <p>Company Information Added!</p>', {
      type: 'success',
      allow_dismiss: true
    });
  });
   </script>
  <?php elseif(Session::has('flash_edit_success')): ?>
  <script>
  $(function(){
    $.bootstrapGrowl('<h4>Success!</h4> <p>Company Information Edited!</p>', {
      type: 'success',
      allow_dismiss: true
    });
  });
   </script>
  <?php endif; ?>
  <div class="content-header">
      <div class="header-section">
        <h4>
            <i class="fa fa-cogs"> </i> Manage Utilities<br>
        </h4>
      </div>
  </div>
  <ol class="breadcrumb breadcrumb-top">
      <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Utilities</a></li>
  </ol>

  <div class="block full">
    <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white;"><strong>System Utilities</strong></h3>
    </div>
    <?php $__empty_1 = true; $__currentLoopData = $utilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utilities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="block-content">
      <div class="row">
        <div class="col-md-6">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-primary editCompInfo" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                        <!-- Modal Edit -->
                        <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="block">
                                  <div class="block-title themed-background">
                                    <div class="block-options pull-right">
                                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                                    </div>
                                    <h3 class="themed-background" style="color:white;"><strong>Edit Company Information</strong></h3>
                                  </div>
                                  <?php echo Form::model($utilities,['action'=>['UtilitiesController@update', $utilities->intCompanyUtilID], 'id'=>'save-computil','class'=>'form-horizontal', 'method'=>'PATCH', 'files' => true]); ?>

                                    <?php echo $__env->make('layouts.utilities.company.form2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                          <?php echo Form::submit('Submit',['class'=>'btn btn-alt btn-success']); ?>

                                          <?php echo Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']); ?>

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                <?php echo Form::close(); ?>

                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <h2>Company Information</h2>
                </div>
                <!-- END Form Elements Title -->
                <p class="well well-sm">
                    <strong>Company Logo</strong> <br>
                        <img src="<?php echo e(url('images', $utilities->strCompanyLogo)); ?>" style="width:80px;" class="col-md-offset-3">
                </p>
                <p class="well well-sm">
                    <strong>Company Name</strong> <br>
                    <?php echo e($utilities->strCompanyName); ?>

                </p>
                <p class="well well-sm">
                    <strong>Registered TIN</strong> <br>
                    <?php echo e($utilities->strCompanyTIN); ?>

                </p>
                <p class="well well-sm">
                    <strong>General Manager</strong> <br>
                    <?php echo e($utilities->strGeneralManagerName); ?>

                </p>
                <p class="well well-sm">
                    <strong>Company Email</strong> <br>
                    <?php echo e($utilities->strCompanyEmail); ?>

                </p>
                <p class="well well-sm">
                    <strong>Address</strong> <br>
                    <?php echo e($utilities->strCompanyAddress); ?>

                </p>
            </div>
            <!-- END Basic Form Elements Block -->
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="block-content">
      <div class="row">
        <div class="col-md-6">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2>Company Information</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <?php echo Form::open(['url'=>'utilities', 'id'=>'save-computil','class'=>'form-horizontal', 'method'=>'POST', 'files' => true]); ?>

                    <?php echo $__env->make('layouts.utilities.company.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                          <?php echo Form::submit('Submit',['class'=>'btn btn-alt btn-success']); ?>

                          <?php echo Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']); ?>

                        </div>
                    </div>
                <?php echo Form::close(); ?>

                <!-- END Basic Form Elements Content -->
            </div>
            <!-- END Basic Form Elements Block -->
        </div>
    <?php endif; ?> 
    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <h2><strong>Smart Counter</strong> Values</h2>
            </div>
            <!-- END Horizontal Form Title -->
            <!-- Horizontal Form Content -->
            <?php $__empty_1 = true; $__currentLoopData = $employeeID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">Employee No.
                  </td>
                  <td class="text-center">
                      <?php echo e($employeeID->strEmpIDUtil); ?>

                  </td>
                </tr>
              </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <?php echo Form::open(['action'=>'UtilitiesController@storeEmpID', 'id'=>'save-empNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']); ?>

                  <div class="form-group">
                      <?php echo Form::label('strEmpIDUtil','Employee No.',array('class'=>'col-md-3 control-label')); ?>

                      <div class="col-md-5">
                          <?php echo Form::text('strEmpIDUtil',null, array('class'=>'form-control','placeholder'=>'Employee No.')); ?>

                      </div>
                      <div class="col-md-4">
                          <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                          <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                      </div>
                  </div>
              <?php echo Form::close(); ?>

            <?php endif; ?>

            <?php $__empty_1 = true; $__currentLoopData = $clientID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">Client No.
                  </td>
                  <td class="text-center">
                      <?php echo e($clientID->strClientIDUtil); ?>

                  </td>
                </tr>
              </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo Form::open(['action'=>'UtilitiesController@storeClientID', 'id'=>'save-clientNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']); ?>

                    <div class="form-group">
                        <?php echo Form::label('strClientIDUtil','Client No.',array('class'=>'col-md-3 control-label')); ?>

                        <div class="col-md-5">
                            <?php echo Form::text('strClientIDUtil',null, array('class'=>'form-control','placeholder'=>'Client No.')); ?>

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                            <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                        </div>
                    </div>
                <?php echo Form::close(); ?>

            <?php endif; ?>   

            <?php $__empty_1 = true; $__currentLoopData = $quoteID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quoteID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">Quote No.
                  </td>
                  <td class="text-center">
                      <?php echo e($quoteID->strQuoteIDUtil); ?>

                  </td>
                </tr>
              </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo Form::open(['action'=>'UtilitiesController@storeQuoteID', 'id'=>'save-quoteNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']); ?>

                    <div class="form-group">
                        <?php echo Form::label('strQuoteIDUtil','Quote No.',array('class'=>'col-md-3 control-label')); ?>

                        <div class="col-md-5">
                            <?php echo Form::text('strQuoteIDUtil',null, array('class'=>'form-control','placeholder'=>'Quote No.')); ?>

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                            <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                        </div>
                    </div>
                <?php echo Form::close(); ?>

            <?php endif; ?>  

            <?php $__empty_1 = true; $__currentLoopData = $contractID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">Contract No.
                  </td>
                  <td class="text-center">
                      <?php echo e($contractID->strContractIDUtil); ?>

                  </td>
                </tr>
              </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo Form::open(['action'=>'UtilitiesController@storeContractID', 'id'=>'save-contractNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']); ?>

                    <div class="form-group">
                        <?php echo Form::label('strContractIDUtil','Contract No.',array('class'=>'col-md-3 control-label')); ?>

                        <div class="col-md-5">
                            <?php echo Form::text('strContractIDUtil',null, array('class'=>'form-control','placeholder'=>'Contract No.')); ?>

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                            <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                        </div>
                    </div>
                <?php echo Form::close(); ?>

            <?php endif; ?>  


            <?php $__empty_1 = true; $__currentLoopData = $invoiceID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoiceID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">Invoice No.
                  </td>
                  <td class="text-center">
                      <?php echo e($invoiceID->strInvoiceIDUtil); ?>

                  </td>
                </tr>
              </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo Form::open(['action'=>'UtilitiesController@storeInvoiceID', 'id'=>'save-invoiceNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']); ?>

                    <div class="form-group">
                        <?php echo Form::label('strInvoiceIDUtil','Invoice No.',array('class'=>'col-md-3 control-label')); ?>

                        <div class="col-md-5">
                            <?php echo Form::text('strInvoiceIDUtil',null, array('class'=>'form-control','placeholder'=>'Invoice No.')); ?>

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                            <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                        </div>
                    </div>
                <?php echo Form::close(); ?>

            <?php endif; ?> 
            <?php $__empty_1 = true; $__currentLoopData = $orID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">OR No.
                  </td>
                  <td class="text-center">
                      <?php echo e($orID->strOrIDUtil); ?>

                  </td>
                </tr>
              </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo Form::open(['action'=>'UtilitiesController@storeOrID', 'id'=>'save-orNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']); ?>

                    <div class="form-group">
                        <?php echo Form::label('strOrIDUtil','Or No.',array('class'=>'col-md-3 control-label')); ?>

                        <div class="col-md-5">
                            <?php echo Form::text('strOrIDUtil',null, array('class'=>'form-control','placeholder'=>'Or No.')); ?>

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                            <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                        </div>
                    </div>
                <?php echo Form::close(); ?>

            <?php endif; ?> 

            <?php $__empty_1 = true; $__currentLoopData = $deliveryID; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <table class="table table-vcenter table-striped table-condensed table-hover">
              <tbody>
                <tr>
                  <td class="text-center">Delivery No.
                  </td>
                  <td class="text-center">
                      <?php echo e($deliveryID->strDeliveryIDUtil); ?>

                  </td>
                </tr>
              </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo Form::open(['action'=>'UtilitiesController@storeDeliveryID', 'id'=>'save-deliveryNoSC','class'=>'form-horizontal form-bordered', 'method'=>'POST']); ?>

                    <div class="form-group">
                        <?php echo Form::label('strDeliveryIDUtil','Delivery No.',array('class'=>'col-md-3 control-label')); ?>

                        <div class="col-md-5">
                            <?php echo Form::text('strDeliveryIDUtil',null, array('class'=>'form-control','placeholder'=>'Delivery No.')); ?>

                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-alt btn-info"><span class="fa fa-check"></span></button>
                            <button type="reset" class="btn btn-alt btn-warning"><span class="gi gi-restart"></span></button>
                        </div>
                    </div>
                <?php echo Form::close(); ?>

            <?php endif; ?>  
            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
    </div>
    </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $(document).ready( function() {

     $('.editCompInfo').click(function(){
        $('html,body').animate({
            scrollTop: 0
        }, 500);
        $('#edit_modal').modal('show');
      });

     ////
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        document.getElementById("img-upload").removeAttribute("class");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#strCompanyLogo").change(function(){
        readURL(this);
    });   
  });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.utilities.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>