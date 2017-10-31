<?php $__env->startSection('head'); ?>
                    <input type="hidden"  id="tvalue" name="tvalue" value="<?php echo e($tax->intTaxValue); ?>" >

<script>
  draftQuotesAjax();
  var pathname = window.location.pathname;
  var lastPart = pathname.split("/").pop();
  function readByAjax()
    {
        $.ajax({
          type : 'get',
          url  : '/readServices/'+lastPart,
          dataType : 'html',
          success:function(data)
          {
              $('.table-services').html(data);
              $('[data-toggle="tooltip"]').tooltip();
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
      function readAdditional()
    {
        $.ajax({
          type : 'get',
          url  : '/readAdditional/'+lastPart,
          dataType : 'html',
          success:function(data)
          {
              $('.table-additional').html(data);
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          }
        })
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
    function compute()
  {
    $('#subtotal').text(" ");
    $('#withtax').text(" ");
    $('#total').text(" ");
    var vat = $('#tvalue').val();
    // alert(vat);
    var initial='';
      var final='';
      var com='';
      var a='';

    $.get('/compute/'+lastPart, function (data) {
      

      initial= data;
      // alert(initial);
      com= (initial*vat)/100;
      init= parseFloat(initial);
      withTax = parseFloat(com);
      final= (init + withTax);

          $('#subtotal').text(' ₱ '+initial);
          $('#withtax').text(' ₱ '+com);
          $('#total').text(' ₱ '+final);
          $('#taxvalue').val(com);
          $('#final').val(final);
          $('#initial').val(initial);

          
          })
  }
    compute();
    readByAjax();
    readAdditional();
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
<?php $__currentLoopData = $indquote; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indquote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="block full">
    <div class="block-title themed-background">
      <div class="block-options pull-right">
          <a href="" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
      </div>
    <h3 class="themed-background" style="color:white;"><strong>Quotation #: <span id="quoteNo"><?php echo e($indquote->strQuoteID); ?></span></strong></h3>
    </div>
   <div class="block-section">
      <!-- Company Info -->
          <div class="col-md-offset-1">
            <h5><strong>Client ID: <?php echo e($indquote->strIndClientID); ?></strong></h5>
          </div>
          <div class="col-md-offset-1">
            <h5><strong>Client Name: <?php echo e($indquote->strIndClientFName); ?> <?php echo e($indquote->strIndClientMName); ?> <?php echo e($indquote->strIndClientLName); ?></strong></h5>
          </div>
          <div class="col-md-offset-1">
            <?php if($indquote->strQuoteName != ""): ?>
              <h5><strong>Quote Description: <?php echo e($indquote->strQuoteName); ?></strong></h5>
            <?php else: ?>
              <h5><strong>Quote Description: No Description included.</strong></h5>
            <?php endif; ?>
          </div>
    </div>
  <div class="col-md-6 col-md-offset-10">
    <button class="btn btn-info" id="finalquote">Finalize Quote</button>
    <div id="here"></div>
      
    </div>
     <div id="fquote_modal" class="modal fade edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="block">
          <div class="block-title themed-background">
              <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
              </div>
              <h3 class="themed-background" style="color:white;"><strong>Finalize <?php echo e($indquote->strQuoteID); ?></strong></h3>
           </div>
              <?php echo Form::open(['url'=>'addquotation', 'method'=>'POST', 'id'=>'form-validation']); ?>

              <?php echo $__env->make('layouts.transact.quote.add.draft.form2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <input type="hidden"  id="taxvalue" name="taxvalue">
                    <input type="hidden"  id="final" name="final">
                    <input type="hidden"  id="initial" name="initial">
              <input type="hidden" name="id" id="id" value="<?php echo e($indquote->strQuoteID); ?>">
              <div class="form-group">
                  <div class="col-md-offset-9">
                        <?php echo Form::submit('Finalize Quote',['id'=>'addservice','class'=>'btn btn-alt btn-success']); ?>

                        <?php echo Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']); ?>

                  </div>
              </div>
              <?php echo Form::close(); ?>

        </div>
      </div>
    </div> 
  </div>
   <div class="col-md-6">
                            <!-- Basic Wizard Block -->
                            <div class="block">
                                <!-- Basic Wizard Title -->
                                <div class="block-title">
                                    <h2><strong>Basic</strong> Wizard</h2>
                                </div>
                                <!-- END Basic Wizard Title -->

                                <!-- Basic Wizard Content -->
                                <form id="basic-wizard" class="form-horizontal form-bordered">
                                    <!-- First Step -->
                                    <div id="first" class="step">
                                        <!-- Step Info -->
                                        <div class="wizard-steps">
                                            <div class="row">
                                                <div class="col-xs-4 active">
                                                    <span>1. Account</span>
                                                </div>
                                                <div class="col-xs-4">
                                                    <span>2. Personal</span>
                                                </div>
                                                <div class="col-xs-4">
                                                    <span>3. Extras</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step Info -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-username">Username</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-username" name="example-username" class="form-control" placeholder="Your username..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-email">Email</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-email" name="example-email" class="form-control" placeholder="test@example.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-password">Password</label>
                                            <div class="col-md-6">
                                                <input type="password" id="example-password" name="example-password" class="form-control" placeholder="Choose a crazy one..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-password2">Retype Password</label>
                                            <div class="col-md-6">
                                                <input type="password" id="example-password2" name="example-password2" class="form-control" placeholder="..and confirm it!">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END First Step -->

                                    <!-- Second Step -->
                                    <div id="second" class="step">
                                        <!-- Step Info -->
                                        <div class="wizard-steps">
                                            <div class="row">
                                                <div class="col-xs-4 done">
                                                    <span><i class="fa fa-check"></i></span>
                                                </div>
                                                <div class="col-xs-4 active">
                                                    <span>2. Personal</span>
                                                </div>
                                                <div class="col-xs-4">
                                                    <span>3. Extras</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step Info -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-firstname">Firstname</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-firstname" name="example-firstname" class="form-control" placeholder="John..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-lastname">Lastname</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-lastname" name="example-lastname" class="form-control" placeholder="Doe..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-address">Address</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-address" name="example-address" class="form-control" placeholder="Where do you live?">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-city">City</label>
                                            <div class="col-md-6">
                                                <input type="text" id="example-city" name="example-city" class="form-control" placeholder="Which one?">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Second Step -->

                                    <!-- Third Step -->
                                    <div id="third" class="step">
                                        <!-- Step Info -->
                                        <div class="wizard-steps">
                                            <div class="row">
                                                <div class="col-xs-4 done">
                                                    <span><i class="fa fa-check"></i></span>
                                                </div>
                                                <div class="col-xs-4 done">
                                                    <span><i class="fa fa-check"></i></span>
                                                </div>
                                                <div class="col-xs-4 active">
                                                    <span>3. Extras</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step Info -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-bio">Bio</label>
                                            <div class="col-md-8">
                                                <textarea id="example-bio" name="example-bio" rows="5" class="form-control" placeholder="Tell us your story.."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="example-newsletter">Newsletter</label>
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                    <label for="example-newsletter">
                                                        <input type="checkbox" id="example-newsletter" name="example-newsletter"> Sign up
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a></label>
                                            <div class="col-md-6">
                                                <label class="switch switch-primary" for="example-terms">
                                                    <input type="checkbox" id="example-terms" name="example-terms" value="1">
                                                    <span data-toggle="tooltip" title="I agree to the terms!"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Third Step -->

                                    <!-- Form Buttons -->
                                    <div class="form-group form-actions">
                                        <div class="col-md-8 col-md-offset-4">
                                            <input type="reset" class="btn btn-sm btn-warning" id="back" value="Back">
                                            <input type="submit" class="btn btn-sm btn-primary" id="next" value="Next">
                                        </div>
                                    </div>
                                    <!-- END Form Buttons -->
                                </form>
                                <!-- END Basic Wizard Content -->
                            </div>
                            <!-- END Basic Wizard Block -->
                        </div>
    <div class="clearfix"></div>
    <hr>
    <div class="block">
      <div class="block-title">
        <h3><strong>Services</strong><i id="getQDID" class="hidden"></i></h3>
      </div>
      <div class="col-md-offset-10">
        <a class="btn btn-success addservice" data-toggle="modal">Add Service</a>
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

      </div>
      <br>
      <div class="table-services"></div><br>
    </div>
     <hr>
        <div class="block">
      <div class="block-title">
<h3><strong>Additional Fees</strong><i id="getQDID" class="hidden"></i></h3>
      </div>
      <div class="col-md-offset-10">
<a class="btn btn-success addadd" data-toggle="modal">Add</a>
<div id="quote-additional" class="modal fade add-truck-modal" tabindex="-1" role="dialog" aria-labelledby="AddMatModal" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong>Additional Fee/s</strong></h3>
          </div>
          <?php echo Form::open(['url'=>'additional', 'id'=>'save-additional','class'=>'form-horizontal']); ?>

            <div class="form-group">
              <div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                      <?php echo Form::label('additional','Description'); ?> <span class="text-danger">*</span>
                      <?php echo Form::text('addDesc',null, ['class'=>'form-control','maxlength'=>'100','placeholder'=>'Fee Description']); ?>

                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-8 col-md-offset-2">
                  <div class="form-group">
                    <?php echo Form::label('strQuoteDesc','Amount'); ?><span class="text-danger">*</span>
                    <?php echo Form::number('amt',null ,['id'=>'amt','placeholder'=>'Additional Fee', 'class' => 'form-control']); ?>

                  <script>
              $('#amt').numeric({
                  decimalSeparator: ".",
                  maxDecimalPlaces : 2,
                  allowMinus:   false
              });
              </script>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-9">
              <input type="hidden" name="qdid" value="<?php echo e($indquote->strQuoteID); ?>">
                <?php echo Form::submit('Add',['id'=>'addadd','class'=>'btn btn-alt btn-success']); ?>

              </div>
            </div>
          <?php echo Form::close(); ?>

        </div>
    </div>
  </div>
</div>

      </div>
      <br>
      <div class="table-additional"></div><br>
      
    </div>
    <table class="table table-vcenter table-responsive">
      <tr class="active">
  <td colspan="6" class="text-right"><span class="h4"><b>SUBTOTAL</b></span></td>
  <td class="text-right"><span class="h4"><p id="subtotal"></p></span></td>
    </tr>
    <tr class="active">
  <td colspan="6" class="text-right"><span class="h4"><?php echo e($tax->intTaxValue); ?> %  <b>VAT</b></span></td>
  <td class="text-right"><span class="h4"></span><p id="withtax"></p></td>
    </tr>
    <tr class="active">
  <td colspan="6" class="text-right"><span class="h4"><b>TOTAL AMOUNT</b></span></td>
  <td class="text-right"><span class="h4"><p id="total"></p></span></td>
    </tr>
    </table>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  


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
       //add additional button
    $('.addadd').click(function(){
      $('#save-additional').trigger("reset");
      $('#quote-additional').modal('show');
    });
    //add service
    $('#save-additional').on('submit', function(e){
      e.preventDefault();
      var ddata = $('#save-additional').serialize();
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
        $.ajax({
            type : 'POST',
            url  : '/quoteadditional',
            data : ddata,
            dataType: 'json',
            success:function(data){
              $('#getQDID').text(data);
              readAdditional();
              
              compute();
              $(".modal").modal('hide');
              successQuoteService();
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


    //add material button
    $(this).on('click','.addmaterial', function(){
      var addmatid = $('.addmaterial').val();
      $('#service-addmaterial').modal('show');
    });

   //add service
    $('#save-service').on('submit', function(e){
      e.preventDefault();
      var ddata = {
              strQHID: $('#quoteNo').text(),
              intSOID: $('#service').val()
          }
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

    //addquotation
    $('#finalquote').on('click',function(){
      $('html,body').animate({
              scrollTop: 0
          }, 500);
      $('#fquote_modal').modal('show');
    });

    //addquotation
    $('#form-validation').on('submit', function(e){
        var pathname = window.location.pathname;
        var lastPart = pathname.split("/").pop();
        e.preventDefault();
        // var ddata = {
        //         intQHID: lastPart,
        //     };
        var ddata=$('#form-validation').serialize();
        var $form = $(this);
          if(! $form.valid()) return false;
          $.ajax({
              type : 'POST',
              url  : '/finalquote2',
              data : ddata,
              dataType: 'json',
              success:function(data){
                swal("Success","Quote Finalized!", "success");
                $('#finalquote').attr('disabled',true);
                $('#fquote_modal').modal('hide');
                window.location='/individualbilling';
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