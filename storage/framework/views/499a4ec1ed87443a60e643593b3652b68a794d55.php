<?php $__env->startSection('head'); ?>
<script>
  draftQuotesAjax();
  function readByAjax()
    {
        var quoteid  = $('#quoteNo').text();
        $.ajax({
          type : 'get',
          url  : '/readServices/'+quoteid,
          dataType : 'html',
          success:function(data)
          {
              $('.table-services').html(data);
              $('[data-toggle="tooltip"]').tooltip();
              if($('#blockShow').hasClass('hidden') == true)
              {
                $('#blockShow').removeClass('hidden');
                $('#blockShow2').removeClass('hidden');
              }
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          }
        })
    }
    function draftQuotesAjax()
    {
        $.ajax({
          type : 'get',
          url  : "<?php echo e(url('draftQuotesAjax')); ?>",
          dataType : 'html',
          success:function(data)
          {
              $('.draftQuotes').html(data);
          }
        })
    }

    function successQuoteDesc()
    {
      $(function(){
        $.bootstrapGrowl('<h4>Success!</h4> <p>Quote Description Saved!</p>', {
          type: 'success',
          allow_dismiss: true
        });
      });
    }

    function errorQuoteDesc()
    {
      $(function(){
        $.bootstrapGrowl('<h4>Error!</h4> <p>Quote Description not Saved!</p>', {
          type: 'danger',
          allow_dismiss: true
        });
      });
    }

    function successQuoteService()
    {
      $(function(){
        $.bootstrapGrowl('<h4>Success!</h4> <p>Service Added to Quote!</p>', {
          type: 'success',
          allow_dismiss: true
        });
      });
    }

    function errorQuoteService()
    {
      $(function(){
        $.bootstrapGrowl('<h4>Error!</h4> <p>Service not added to Quote!</p>', {
          type: 'danger',
          allow_dismiss: true
        });
      });
    }


    function readMaterialAdded()
    {
      var id  = $('#quoteNo').text();
        $.ajax({
          type : 'get',
          url  : '/readMaterialAdded/'+id,
          dataType : 'html',
          success:function(data)
          {
              $('.table-material').html(data);
          }
        })
    }
    function findPrice(val)
    {
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        $('#price').val('');
          var a4;
          $.get('/getMatPrice/' + val, function (data) {
          if(data.length != 0)
          {
            for(a4=0;a4<data.length;a4++)
            {
              $('#price').val(data[a4].dcmMaterialUnitPrice);
            }
          }
        })
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
    }
    function compute(val)
    {
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      $('#cost').val('');
      var price = $('#price').val();
      var qty = val;
      $('#cost').val(price*qty); 
      /////////////////stop top loading//////////
      NProgress.done();
      ///////////////////////////////////////////
    }
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<!-- Main Sidebar -->
  <div id="sidebar">
      <!-- Wrapper for scrolling functionality -->
      <div class="sidebar-scroll">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
              <!-- Brand -->
              <a href="index.html" class="sidebar-brand">
                  <i class="gi gi-flash"></i><strong>JMSESMS</strong>
              </a>
              <!-- END Brand -->

              <!-- User Info -->
              <div class="sidebar-section sidebar-user clearfix">
                  <div class="sidebar-user-avatar">
                      <a href="page_ready_user_profile.html">
                          <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                      </a>
                  </div>
                  <div class="sidebar-user-name">John Sese</div>
                  <div class="sidebar-user-links">
                      <a href="page_ready_user_profile.html" data-toggle="tooltip" title="Profile"><i class="gi gi-user"></i></a>
                      <a href="page_ready_inbox.html" data-toggle="tooltip" title="Messages"><i class="gi gi-envelope"></i></a>
                      <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                      <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" title="Settings"><i class="gi gi-cogwheel"></i></a>
                      <a href="<?php echo e(route('logout')); ?>" data-toggle="tooltip" title="Logout"><i class="gi gi-exit"></i></a>
                  </div>
              </div>
              <!-- END User Info -->

              <!-- Theme Colors -->
              <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
              <ul class="sidebar-section sidebar-themes clearfix">
                <li class="active">
                    <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="<?php echo e(asset('css/themes/blue.css')); ?>" data-toggle="tooltip" title="Blue"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="<?php echo e(asset('css/themes/night.css')); ?>" data-toggle="tooltip" title="Night"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="<?php echo e(asset('css/themes/amethyst.css')); ?>" data-toggle="tooltip" title="Amethyst"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="<?php echo e(asset('css/themes/modern.css')); ?>" data-toggle="tooltip" title="Modern"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="<?php echo e(asset('css/themes/autumn.css')); ?>" data-toggle="tooltip" title="Autumn"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="<?php echo e(asset('css/themes/flatie.css')); ?>" data-toggle="tooltip" title="Flatie"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="<?php echo e(asset('css/themes/spring.css')); ?>" data-toggle="tooltip" title="Spring"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="<?php echo e(asset('css/themes/fancy.css')); ?>" data-toggle="tooltip" title="Fancy"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="<?php echo e(asset('css/themes/fire.css')); ?>" data-toggle="tooltip" title="Fire"></a>
                </li>
              </ul>
              <!-- END Theme Colors -->

              <!-- Sidebar Navigation -->
              <?php echo $__env->make('layouts.dashboard.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <!-- <?php echo $__env->make('layouts.transact.quote.add.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
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
        <i class="fa fa-wrench"> </i> Add Quote<br>
    </h4>
  </div>
</div>
<ol class="breadcrumb breadcrumb-top">
  <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
  <li><a href="javascript:void(0)">Transaction</a></li>
  <li><a href="javascript:void(0)">Quote</a></li>
  <li><a href="">Add Quote</a></li>
</ol>
  <div class="row">
    <div class="col-md-9">
      <div class="block">
        <div class="block-title themed-background">
            <h2 style="color:white;"><strong>Quote No.: <span id="quoteNo"><?php echo e($quoteID); ?></span></strong></h2>
        </div>
        <div class="block">
          <div class="block-title">
            <h3><strong>Quote Description</strong></h3>
          </div>
          <?php echo Form::open(['url'=>'quote', 'id'=>'save-quote','class'=>'form-horizontal']); ?>

            <div class="form-group">
                <div class="col-md-4 col-md-offset-1">
                  <div class="form-group">
                    <?php echo Form::label('client','Client'); ?> <span class="text-danger">*</span>
                    <select id="client" name="client" style="width: 250px;" class="select-chosen" data-placeholder="Select Client">
                      <option></option>
                      <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clients): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($clients->strClientID); ?>"><?php echo e($clients->strCompClientName); ?>

                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </select>  
                  </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                  <div class="form-group">
                    <?php echo Form::label('strQuoteName','Quote Name'); ?> <span class="text-danger">*</span>
                    <?php echo Form::text('strQuoteName', null, ['class'=>'form-control', 'placeholder'=>'Quote Name']); ?>

                  </div>
                </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-9">
                 <?php echo Form::submit('Save Description',['id'=>'submithead','class'=>'btn btn-alt btn-success']); ?>

              </div>
            </div>
          <?php echo Form::close(); ?>

          <div class="clearfix"></div>
        </div>
        <div id="blockShow" class="block hidden">
          <div class="block-title">
            <h3><strong>Services</strong><i id="getQDID" class="hidden"></i></h3>
          </div>
          <div class="col-md-offset-9">
            <a class="btn btn-alt btn-success addservice" data-toggle="modal">Add Service</a>
            <!-- Service Modal -->
            <div id="quote-addservice" class="modal fade add-truck-modal" tabindex="-1" role="dialog" aria-labelledby="AddMatModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="block">
                      <div class="block-title themed-background">
                        <div class="block-options pull-right">
                            <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                        </div>
                        <h3 class="themed-background" style="color:white;"><strong>Add Service to Quote</strong></h3>
                      </div>
                      <?php echo Form::open(['url'=>'service', 'id'=>'save-service','class'=>'form-horizontal']); ?>

                        <div class="form-group">
                          <div>
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                  <?php echo Form::label('service','Service Name'); ?> <span class="text-danger">*</span>
                                  <select id="service" name="service" class="select-chosen" data-placeholder="Select Service">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $serveOff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($service->intServiceOffID); ?>"><?php echo e($service->strServiceOffName); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="col-md-8 col-md-offset-2">
                              <div class="form-group">
                                <?php echo Form::label('strQuoteDesc','Service Description'); ?>

                                <?php echo Form::textarea('strQuoteDesc',null, ['class'=>'form-control','size' => '20x5','placeholder'=>'Service Description']); ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-9">
                            <?php echo Form::submit('Add Service',['id'=>'addservice','class'=>'btn btn-alt btn-success']); ?>

                          </div>
                        </div>
                      <?php echo Form::close(); ?>

                    </div>
                </div>
              </div>
            </div>
            <!-- END Service Modal -->

          </div><br>
          <div class="table-services"></div><br>
        </div>
        <div class="col-md-6 col-md-offset-10 hidden" id="blockShow2">
<!--           <?php echo Form::open(['url'=>'addquotation', 'method'=>'POST', 'id'=>'save-quotation']); ?>

          <?php echo Form::submit('Finalize Quote',['id'=>'addservice','class'=>'btn btn-info']); ?>

          <?php echo Form::close(); ?> -->
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="col-md-3">
      <h4 class="sub-header"><span class="fa fa-file-text"> </span> Draft Quotations</h4>
      <div class="draftQuotes"></div>
    </div>
  </div>
  


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function(){
    var date;
    date = new Date().toISOString().slice(0,19).replace('T',' ');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 

    //add service button
    $('.addservice').click(function(){
      $('#save-service').trigger("reset");
      $('#quote-addservice').modal('show');
    });

    //add material button
    $(this).on('click','.addmaterial', function(){
      var addmatid = $('.addmaterial').val();
      $('#service-addmaterial').modal('show');
    });


   /////add
   $('#save-quote').on('submit', function(e){
    e.preventDefault();
    /////////////////start top loading//////////
    NProgress.start();
    ///////////////////////////////////////////
    var id = $('span#quoteNo').text();
    var ddata = {
            strQuoteID: $('span#quoteNo').text(),
            strClientID: $('#client').val(),
            strQuoteName: $('#strQuoteName').val(),
            datQuoteDate: date,
            status: 0
        };
      $.ajax({
          type : 'POST',
          url  : '/quote',
          data : ddata,
          dataType: 'json',
          success:function(data){
            draftQuotesAjax();
            successQuoteDesc();
            readByAjax();
          },
          error:function(data){
            errorQuoteDesc();
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
          }
        })
       e.stopPropagation();
    });

   //add service
    $('#save-service').on('submit', function(e){
      e.preventDefault();
      var ddata = {
              strQHID: $('#quoteNo').text(),
              intSOID: $('#service').val()
          };
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
        $.ajax({
            type : 'POST',
            url  : '/quotedetail',
            data : ddata,
            dataType: 'json',
            success:function(data){
              $('#getQDID').text(data);
              readByAjax();
              $(".modal").modal('hide');
              successQuoteService();
              /*$('#serviceName').text($('#service option:selected').text());
               $.get('/getQDID', function (data) {
                $('#intQDID').val(data.intQDID);
              })
              addMaterial();
              */
            },
            error:function(data){
              $(".modal").modal('hide');
              errorQuoteService();
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
         e.stopPropagation();
      });

    //addmaterial
    $('#save-material').on('submit', function(e){
        e.preventDefault();
        var ddata = {
                intQDID: $('#intQDID').val(),
                intMaterialID: $('#material').val(),
                intQty: $('#materialqty').val(),
                dcmUnitCost: $('#cost').val()
            };
          $.ajax({
              type : 'POST',
              url  : '/addMatQuote',
              data : ddata,
              dataType: 'json',
              success:function(data){
                swal("Success","Material Added to Quote!", "success");
                //
                //swal("Success","Service Added!", "success");
              },
              error:function(data){
                alert("Error Inserting");
              }
            })
           e.stopPropagation();
      });
   });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptfooter'); ?>
<script>$(function(){ FormsWizard.init(); });</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>