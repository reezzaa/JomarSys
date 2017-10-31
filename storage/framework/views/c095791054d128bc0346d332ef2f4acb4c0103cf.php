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
              <!-- <?php echo $__env->make('layouts.transact.billing.company.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
              <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white;"><strong>Client</strong></h3>
      </div>
      <ol class="breadcrumb breadcrumb-top">
          <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
          <li><a href="javascript:void(0)">Transaction</a></li>
          <li><a href="javascript:void(0)">Client</a></li>
          <li><a href="javascript:void(0)">Client List</a></li>
          <li><a href="">Company Client</a></li>
      </ol>
      <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="block full">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
            </div>
          <h3 class="themed-background" style="color:white;"><strong><?php echo e($client->strCompClientName); ?></strong></h3>
          </div>
           <div class="block-section">
              <!-- Company Info -->
                  <div class="col-md-offset-5">
                    <a href="<?php echo e(url('images', $client->strCompClientImage)); ?>" data-toggle="lightbox-image">
                      <img src="<?php echo e(url('images', $client->strCompClientImage)); ?>" alt="company_logo" style="width:145px;">
                    </a>
                  </div><hr>
                  <div class="col-md-offset-8">
                    <h5><strong>Company ID:</strong> <?php echo e($client->strCompClientID); ?></h5>
                  </div>
                  <div class="col-md-offset-8">
                    <h5><strong>Registered TIN:</strong> <?php echo e($client->strCompClientTIN); ?></h5>
                  </div>
                  <div class="col-md-offset-1">
                    <h5><strong>Representative:</strong> <?php echo e($client->strCompClientRepresentative); ?></h5>
                    <h5><strong>Position:</strong> <?php echo e($client->strCompClientPosition); ?></h5>
                  </div>
                  <div class="col-md-offset-1">
                    <address>
                        <strong>Address:</strong> <?php echo e($client->strCompClientAddress); ?> <?php echo e($client->strCompClientCity); ?>, <?php echo e($client->strCompClientProv); ?><br>
                        <br>
                        <i class="fa fa-phone"></i> <?php echo e($client->strCompClientContactNo); ?><br>
                        <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)"><?php echo e($client->strCompClientEmail); ?></a>
                    </address>
                  </div>
            </div>
            <hr>
            <div class="block">
            <div class="block-title">
              <h3><strong>Contracts</strong></h3>
            </div>
           <div class="block-section">
              <!-- Contract List -->
                  <div class="table-responsive">
                    <?php echo $__env->make('layouts.transact.client.contract', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  </div>
            </div>
          </div>
        </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>