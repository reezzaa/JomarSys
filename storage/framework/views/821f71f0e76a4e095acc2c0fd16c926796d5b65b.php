<?php $__env->startSection('head'); ?>
<script>

function findByClient(val)
  {
       $('#quotation').empty().trigger('chosen:updated');
        // $('#materialClass').val('').trigger('chosen:updated');
        var opt;
        var a;
        var newSelect = document.getElementById("quotation");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        if($('#client').val() == "")
        {
          $.get('/findClientbyNone', function (data) {
           $(function(){
            $.bootstrapGrowl('<h4>Quotation/s Found!</h4>', {
              type: 'info',
              allow_dismiss: true
            });
          });
          for(a=0;a<data.length;a++)
          {
            opt = new Option(data[a].strQuoteName,data[a].strQuoteID);
            newSelect.appendChild(opt);
          }
          $('#quotation').trigger('chosen:updated');
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
          })
        }
        else
        {
          $.get('/findByClient/' + val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>No Quotation matches the filter!</p>', {
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
                $.bootstrapGrowl('<h4>Quotation/s Found!</h4>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });
              for(a=0;a<data.length;a++)
              {
                opt = new Option(data[a].strQuoteName,data[a].strQuoteID);
                newSelect.appendChild(opt);
              }
              $('#quotation').trigger('chosen:updated');
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
        }
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
              <!-- <?php echo $__env->make('layouts.transact.contract.contractadd.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
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
          <i class="fa fa-wrench"> </i> Contract Transaction<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Transaction</a></li>
        <li><a href="javascript:void(0)">Contract</a></li>
    </ol>
      <div class="block">
      <div class="block-title themed-background">
          <h3 style="color: white;"><i class="gi gi-pen animation-floating"></i>  <strong>Contract</strong></h3>
        </div>
      <div class="widget">
          <div class="widget-extra">
          <?php echo $__env->make('layouts.transact.contract.contractadd.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
          
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
<script type="text/javascript" src="<?php echo e(asset('vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
<?php echo JsValidator::formRequest('App\Http\Requests\CreateContractRequest', '#form-contract');; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>