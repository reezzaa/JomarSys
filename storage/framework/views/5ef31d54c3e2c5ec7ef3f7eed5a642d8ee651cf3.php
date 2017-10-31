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
              <!-- <?php echo $__env->make('layouts.transact.client.addindividual.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
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
                <i class="fa fa-wrench"> </i> Client Transaction<br>
            </h4>
          </div>
      </div>
      <ol class="breadcrumb breadcrumb-top">
          <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
          <li><a href="javascript:void(0)">Transaction</a></li>
          <li><a href="javascript:void(0)">Client</a></li>
          <li><a href="javascript:void(0)">Add Client</a></li>
          <li><a href="">Individual Client</a></li>
      </ol>
        <div class="block">
          <div class="block-title themed-background">
          <h3 class="themed-background" style="color:white;"><strong>Creation of Client</strong></h3>
          </div>
          <?php echo Form::open(['url'=>'newindclient', 'id'=>'save-client','class'=>'form-horizontal form-bordered']); ?>

              <?php echo $__env->make('layouts.transact.client.addindividual.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <div class="form-group">
                <div class="col-md-offset-10">
                  <?php echo Form::submit('Add Client',['class'=>'btn btn-alt btn-success']); ?>

                  <?php echo Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']); ?>

                </div>
              </div>
          <?php echo Form::close(); ?>

        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="<?php echo e(asset('vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
<?php echo JsValidator::formRequest('App\Http\Requests\CreateIndClientRequest', '#save-client');; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>