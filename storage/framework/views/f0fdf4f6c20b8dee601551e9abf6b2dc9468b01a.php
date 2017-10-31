<?php $__env->startSection('head'); ?>

    <script>
      function readByAjax()
        {
            $.ajax({
              type : 'get',
              url  : "<?php echo e(url('readByAjax14')); ?>",
              dataType : 'html',
              success:function(data)
              {
                  $('.table-responsive').html(data);
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
              <!-- <?php echo $__env->make('layouts.transact.progressmonitoring.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
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
                        <i class="fa fa-signal"> </i> Progress Monitoring Transaction<br>
                    </h4>
                  </div>
              </div>
              <ol class="breadcrumb breadcrumb-top">
                  <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
                  <li><a href="javascript:void(0)">Transaction</a></li>
                  <li><a href="javascript:void(0)">Progress Monitoring</a></li>    
              </ol>
             <div class="block block-full">
            <div class="block-title themed-background">
              <h3 class="themed-background" style="color:white"><strong>Progress Monitoring</strong></h3>
              </div> 
                <br>

                <div class="table-responsive">
              </div>
              <br>
            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script>
  $(document).ready(function(){
      var id='';
      var url = "/progressmonitoring";
       $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>