<?php $__env->startSection('head'); ?>
<script>
   function readWorkers()
    {
        $.ajax({
          type : 'get',
          url  : "<?php echo e(url('dashbWorkers')); ?>",
          dataType : 'html',
          success:function(data)
          {
            if(data.length != 0)
            {
              $('span#dashbWorkers').text(data);
            }
            else
            {
              $('span#dashbWorkers').text(0);
            }
          }
        })
    };

    function readServices()
    {
        $.ajax({
          type : 'get',
          url  : "<?php echo e(url('dashbServices')); ?>",
          dataType : 'html',
          success:function(data)
          {
            if(data.length != 0)
            {
              $('span#dashbServices').text(data);
            }
            else
            {
              $('span#dashbServices').text(0);
            }
          }
        })
    };

    function readTrucks()
    {
        $.ajax({
          type : 'get',
          url  : "<?php echo e(url('dashbTrucks')); ?>",
          dataType : 'html',
          success:function(data)
          {
            if(data.length != 0)
            {
              $('span#dashbTrucks').text(data);
            }
            else
            {
              $('span#dashbTrucks').text(0);
            }
          }
        })
    };

    readWorkers();
    readServices();
    readTrucks();

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
              <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <?php if(Session::has('flash_login_success')): ?>
  <script>
  $(function(){
    $.bootstrapGrowl('<h4>Success!</h4> <p> Successfully login</p>', {
      type: 'success',
      delay: 3000,
      allow_dismiss: true
    });
  });
   </script>
  <?php endif; ?>
  <!-- Dashboard Header -->
  <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
  <div class="content-header content-header-media">
      <div class="header-section">
          <div class="row">
              <!-- Main Title (hidden on small devices for the statistics to fit) -->
              <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                  <h1>Welcome <strong><?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->mname); ?> <?php echo e(Auth::user()->lname); ?></strong><br><small></small></h1>
              </div>
              <!-- END Main Title -->

              <!-- Top Stats -->
                <!-- Nothing to fucking show -->
              <!-- END Top Stats -->
          </div>
      </div>
      <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
      <img src="img/header/dashboard2.jpg" alt="header image" class="animation-pulseSlow">
  </div>
  <!-- END Dashboard Header -->

  <!-- Mini Top Stats Row -->
  <div class="row">
      <div class="col-sm-8 col-lg-4">
          <!-- Widget -->
          <a href="/worker" class="widget widget-hover-effect1">
              <div class="widget-simple">
                  <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                      <i class="gi gi-group"></i>
                  </div>
                  <h3 class="widget-content text-right animation-pullDown">
                      <span id="dashbWorkers"></span> <strong>Workers</strong><br>
                      <small>Worker's Maintenance</small>
                  </h3>
              </div>
          </a>
          <!-- END Widget -->
      </div>
      <div class="col-sm-8 col-lg-4">
          <!-- Widget -->
          <a href="/serviceOff" class="widget widget-hover-effect1">
              <div class="widget-simple">
                  <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                      <i class="gi gi-hand_saw"> </i>
                  </div>
                  <h3 class="widget-content text-right animation-pullDown">
                      <span id="dashbServices"></span> <strong>Services</strong><br>
                      <small>Services Offered</small>
                  </h3>
              </div>
          </a>
          <!-- END Widget -->
      </div>
      <div class="col-sm-8 col-lg-4">
          <!-- Widget -->
          <a href="/deliverytruck" class="widget widget-hover-effect1">
              <div class="widget-simple">
                  <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                      <i class="gi gi-truck"></i>
                  </div>
                  <h3 class="widget-content text-right animation-pullDown">
                      <span id="dashbTrucks"></span> <strong>Delivery Trucks</strong>
                      <small>Delivery Truck </small>
                  </h3>
              </div>
          </a>
          <!-- END Widget -->
      </div>
     
  </div>
  <?php echo $__env->make('layouts.dashboard.topcompclients', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('layouts.dashboard.project', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('layouts.dashboard.billing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
       <div class="row">
    <div class="col-md-10 col-md-offset-1">
          <!-- Widget -->
          <a href="/delivery" class="widget widget-hover-effect1">
              <div class="widget-simple">
                  <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                      <i class="gi gi-cargo"></i>
                  </div>
                  <h3 class="widget-content text-right animation-pullDown">
                      <?php echo e($deli); ?> <strong>Pending Deliveries</strong>
                      
                  </h3>
              </div>
          </a>
          <!-- END Widget -->
      </div>
  </div>

  <!-- END Mini Top Stats Row -->
         
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>