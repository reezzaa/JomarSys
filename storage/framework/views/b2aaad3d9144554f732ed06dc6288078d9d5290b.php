<?php $__env->startSection('head'); ?>
<script>
  function findByRepClient(val)
  {
       $('#project').empty().trigger('chosen:updated');
        // $('#materialClass').val('').trigger('chosen:updated');
        var opt;
        var a;
        var newSelect = document.getElementById("project");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
          $.get('/findByRepClient/'+val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>No Project/s matches the filter!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
            else
            {
               $(function(){
                $.bootstrapGrowl('<h4>Project/s Found!</h4>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });
              for(a=0;a<data.length;a++)
              {
                opt = new Option(data[a].strQuoteName,data[a].id);
                newSelect.appendChild(opt);
              }
              $('#project').trigger('chosen:updated');
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
        
  };
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
          <i class="gi gi-address_book"> </i> References of Billing Report<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Reports</a></li>
        <li><a href="javascript:void(0)">References of Billing Report</a></li>
    </ol>
      
      <!-- Simple Profile Widgets Row -->
      <div class="block">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>References of Billing Report Generation</strong></h3>
        </div>  


            <?php echo e(Form::open(['target' => '_blank','url'=>'/references'])); ?>

               <div class="row">
                <div class="col-sm-4 ">
                  <label for="quotation">Filter by: <strong>Client</strong></label>
                  <select id="client" name="client" class="select-chosen" onchange="findByRepClient(this.value)" data-placeholder="">
                  <option value=""></option>
                     <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($clients->strClientID); ?>"><?php echo e($clients->strCompClientName); ?>

                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                    </select>
                </div>
                  <div class="form-group">
                      <div class="col-sm-8">
                  <div>
                        <label for="quotation">Choose Project </label> 
                        <select name="project" id="project" class='form-control' data-placeholder='Choose'>
                      <option value=""></option>
                      </select> 
                     
                  </div><br> 
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
<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>