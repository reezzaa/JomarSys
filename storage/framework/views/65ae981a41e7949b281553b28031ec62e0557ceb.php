<?php $__env->startSection('head'); ?>
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
              <!-- <?php echo $__env->make('layouts.reports.delivery.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
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
          <i class="gi gi-address_book"> </i> Collection Report<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Reports</a></li>
        <li><a href="javascript:void(0)">Collection Report</a></li>
    </ol>
      
      <!-- Simple Profile Widgets Row -->
      <div class="block">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>Collection Report Generation</strong></h3>
        </div>  
            <?php echo e(Form::open(['target' => '_blank','url'=>'/overall_collection'])); ?>

               <div class="row">
                  <div class="form-group">
                      <div class="col-md-7 col-md-offset-2">
                      <label class="control-label text-center">Select Date Range</label> 
                        <div >
                           <div class="input-group" data-date-format="yyyy-mm-dd">
                              <input type="date" id="datStart" name="datStart" class="form-control text-center " placeholder="From">
                              <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                              <input type="date" id="datEnd" name="datEnd" class="form-control text-center " placeholder="Through">
                          </div>
                       </div>
                      </div>
                    </div>
                  </div>
                  <br><br>
                <fieldset class="form-group">
              <div class="col-md-offset-9">
                 <?php echo Form::submit('Generate',['id'=>'submit','class'=>'btn btn-alt btn-success']); ?>

              </div>
            </fieldset>
              <?php echo e(Form::close()); ?>

          <br>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script >
    // $(function(){ FormsValidation.init(); });
     $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });



     

    });
  </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mainte.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>