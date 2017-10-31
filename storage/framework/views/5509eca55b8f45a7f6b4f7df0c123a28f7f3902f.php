<?php $__env->startSection('head'); ?>
<script>
  var pathname = window.location.pathname;
  var lastPart = pathname.split("/").pop();
    function readMaterial()
    {
        $.ajax({
          type : 'get',
          url  : '/readMaterial/'+lastPart,
          dataType : 'html',
          success:function(data)
          {
              $('.table-material').html(data);
              $('[data-toggle="tooltip"]').tooltip();
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          }
        })
    }

    function readEquipment()
    {
        $.ajax({
          type : 'get',
          url  : '/readEquipment/'+lastPart,
          dataType : 'html',
          success:function(data)
          {
              $('.table-equipment').html(data);
              $('[data-toggle="tooltip"]').tooltip();
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          }
        })
    }

    function readWorker()
    {
        $.ajax({
          type : 'get',
          url  : '/readWorker/'+lastPart,
          dataType : 'html',
          success:function(data)
          {
              $('.table-worker').html(data);
              $('[data-toggle="tooltip"]').tooltip();
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
          }
        })
    }

    function findMatbyClass(val)
      {
        $('#material').empty().trigger('chosen:updated');
        $('#uom').val('').trigger('chosen:updated');
        var opt;
        var a;
        var newSelect = document.getElementById("material");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        if($('#materialClass').val() == "")
        {
          $.get('/findMatbyNone', function (data) {
           $(function(){
            $.bootstrapGrowl('<h4>Materials Found!</h4> <p>Materials matches the filter!</p>', {
              type: 'info',
              allow_dismiss: true
            });
          });
          for(a=0;a<data.length;a++)
          {
            opt = new Option(data[a].strMaterialName,data[a].intMaterialID);
            newSelect.appendChild(opt);
          }
          $('#material').trigger('chosen:updated');
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
          })
        }
        else
        {
          $.get('/findMatbyClass/' + val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>No Material matches the filter!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              $('#price').val('0');
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
            else
            {
               $(function(){
                $.bootstrapGrowl('<h4>Materials Found!</h4> <p>Materials matches the filter!</p>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });
              for(a=0;a<data.length;a++)
              {
                opt = new Option(data[a].strMaterialName,data[a].intMaterialID);
                newSelect.appendChild(opt);
              }
              $('#material').trigger('chosen:updated');
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
              findPrice(data[0].intMaterialID);
            }
          })
        }
      }

    function findMatbyUOM(val)
      {
        $('#material').empty().trigger('chosen:updated');
        $('#materialClass').val('').trigger('chosen:updated');
        var opt;
        var a;
        var newSelect = document.getElementById("material");
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        if($('#uom').val() == "")
        {
          $.get('/findMatbyNone', function (data) {
           $(function(){
            $.bootstrapGrowl('<h4>Materials Found!</h4> <p>Materials matches the filter!</p>', {
              type: 'info',
              allow_dismiss: true
            });
          });
          for(a=0;a<data.length;a++)
          {
            opt = new Option(data[a].strMaterialName,data[a].intMaterialID);
            newSelect.appendChild(opt);
          }
          $('#material').trigger('chosen:updated');
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
          })
        }
        else
        {
          $.get('/findMatbyUOM/' + val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>No Material matches the filter!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              $('#price').val('0');
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
            else
            {
               $(function(){
                $.bootstrapGrowl('<h4>Materials Found!</h4> <p>Materials matches the filter!</p>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });
              for(a=0;a<data.length;a++)
              {
                opt = new Option(data[a].strMaterialName,data[a].intMaterialID);
                newSelect.appendChild(opt);
              }
              $('#material').trigger('chosen:updated');
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
              findPrice(data[0].intMaterialID);
            }
          })
        }
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
      var cost = price*qty;
      var newcost = (Math.round((cost * 1000)/10)/100).toFixed(2);
      $('#cost').val(newcost); 
      /////////////////stop top loading//////////
      NProgress.done();
      ///////////////////////////////////////////
    }

    function compute2(val)
    {
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      $('#equipcost').val('');
      var price = $('#equipprice').val();
      var qty =  $('#equipqty').val();
      var cost = price*qty;
      var newcost = (Math.round((cost * 1000)/10)/100).toFixed(2);
      $('#equipcost').val(newcost); 
      /////////////////stop top loading//////////
      NProgress.done();
      ///////////////////////////////////////////
    }

    function compute3(val)
    {
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      $('#workercost').val('');
      var rate = $('#rate').val();
      var hour = $('#hour').val();
      var qty =  $('#workerqty').val();
      var cost = rate*hour*qty;
      var newcost = (Math.round((cost * 1000)/10)/100).toFixed(2);
      $('#workercost').val(newcost); 
      /////////////////stop top loading//////////
      NProgress.done();
      ///////////////////////////////////////////
    }

    readMaterial();
    readEquipment();
    readWorker();
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
        <i class="fa fa-wrench"> </i> Add Resource to Quotation<br>
    </h4>
  </div>
</div>
<?php $__currentLoopData = $quoteD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quoteD): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<ol class="breadcrumb breadcrumb-top">
  <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
  <li><a href="javascript:void(0)">Transaction</a></li>
  <li><a href="javascript:void(0)">Quote</a></li>
  <li><a href="/quotedetail/<?php echo e($quoteD->strQHID); ?>">Add Quote</a></li>
  <li><a href="">Add Resource</a></li>
</ol>

<div class="block full">
    <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white;"><strong>Add Resource</strong></h3>
    </div>
    <div class="block-section">
      <!-- Quote Info -->
          <div class="col-md-offset-1">
            <h5><strong>Quotation ID:</strong> <?php echo e($quoteD->strQHID); ?></h5>
            <i id="putQDID" class="hidden"><?php echo e($quoteD->intQDID); ?></i>
          </div>
          <div class="col-md-offset-1">
            <h5><strong>Service Name:</strong> <?php echo e($quoteD->strServiceOffName); ?></h5>
          </div>
          <hr>

          <div class="block">
            <div class="block-title themed-background-night">
              <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-primary addmatBtn" data-placement="top" data-toggle="tooltip" title="Add Material"><i class="fa fa-plus"></i></a>
              </div>
              <h3 style="color:white;"><strong>Material</strong></h3>
            </div>

            <div id="addmat_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Add Material</strong></h3>
                    </div>
                    <?php echo Form::open(['url'=>'addmaterial', 'method'=>'POST', 'id'=>'save-material']); ?>

                      <div class="row">
                        <div class="col-md-offset-1">
                          <span class="fa fa-filter"> </span>  Filter by:
                        </div><br>
                        <div class="col-md-5 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="materialClass">Classification</label>
                              <select id="materialClass" name="materialClass" onchange="findMatbyClass(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Classification">
                                <option></option>
                                <option value=""></option>
                                <?php $__currentLoopData = $materialClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materialClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($materialClass->intMatClassID); ?>"><?php echo e($materialClass->strMatClassName); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <div>
                              <label for="uom">Unit of Measurement</label>
                              <select id="uom" name="uom" onchange="findMatbyUOM(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by UOM">
                                <option></option>
                                <option value=""></option>
                                <?php $__currentLoopData = $uom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($uom->intDetailUOMID); ?>"><?php echo e($uom->strDetailUOMText); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="material">Material</label> <span class="text-danger">*</span>
                              <select id="material" name="material" onchange="findPrice(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Select Material">
                                <option></option>
                                <?php $__currentLoopData = $material; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($material->intMaterialID); ?>"><?php echo e($material->strMaterialName); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <div>
                              <label for="price">Price</label>
                              <?php echo Form::text('text',null ,['id'=>'price','placeholder'=>'0', 'class' => 'form-control', 'maxlength'=>'30','disabled'=>'disabled']); ?>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                          <div class="form-group">
                            <div>
                              <label for="materialqty">Quantity</label> <span class="text-danger">*</span>
                              <?php echo Form::text('number',null ,['id'=>'materialqty','placeholder'=>'Qty', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute(this.value)']); ?>

                            </div>
                          </div>
                        </div>
                         <div class="col-md-4">
                          <div class="form-group">
                            <div>
                              <label for="cost">Unit Cost</label>
                              <input type="text" class="form-control" id="cost" disabled="disabled">  
                            </div>
                            <input id="intQDID" hidden>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-3 col-md-offset-9">
                            <?php echo Form::submit('Add',['id'=>'addservice','class'=>'btn btn-alt btn-success']); ?>

                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    <?php echo Form::close(); ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="table-material"></div><br>
          </div>

          <div class="block">
            <div class="block-title themed-background-night">
              <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-primary addequipBtn" data-placement="top" data-toggle="tooltip" title="Add Equipment"><i class="fa fa-plus"></i></a>
              </div>
              <h3 style="color:white;"><strong>Equipment</strong></h3>
            </div>
            <div id="addequip_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Add Equipment</strong></h3>
                    </div>
                    <?php echo Form::open(['url'=>'addequipment', 'method'=>'POST', 'id'=>'save-equipment']); ?>

                      <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="equipname">Equipment Name</label> <span class="text-danger">*</span>
                              <select id="equipname" name="equipname" onchange="find(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Select Material">
                                <option></option>
                                <option value=""></option>
                                <?php $__currentLoopData = $equip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($equip->intEquipID); ?>"><?php echo e($equip->strEquipName); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <div>
                              <label for="equipprice">Rental Price</label> <span class="text-danger">*</span>
                              <?php echo Form::text('text',null ,['id'=>'equipprice','placeholder'=>'0', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute2(this.value)']); ?>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                          <div class="form-group">
                            <div>
                              <label for="equipqty">Quantity</label> <span class="text-danger">*</span>
                              <?php echo Form::text('number',null ,['id'=>'equipqty','placeholder'=>'Qty', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute2(this.value)']); ?>

                            </div>
                          </div>
                        </div>
                         <div class="col-md-4">
                          <div class="form-group">
                            <div>
                              <label for="equipcost">Unit Cost</label>
                              <input type="text" class="form-control" id="equipcost" disabled="disabled">  
                            </div>
                            <input id="intQDID" hidden>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-3 col-md-offset-9">
                            <?php echo Form::submit('Add',['id'=>'addservice','class'=>'btn btn-alt btn-success']); ?>

                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    <?php echo Form::close(); ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="table-equipment"></div><br>
          </div>


          <div class="block">
            <div class="block-title themed-background-night">
              <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-primary addworkerBtn" data-placement="top" data-toggle="tooltip" title="Add Worker"><i class="fa fa-plus"></i></a>
              </div>
              <h3 style="color:white;"><strong>Worker</strong></h3>
            </div>
            <div id="addworker_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Add Labor Cost</strong></h3>
                    </div>
                    <?php echo Form::open(['url'=>'addworker', 'method'=>'POST', 'id'=>'save-worker']); ?>

                      <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="specname">Specialization Name</label> <span class="text-danger">*</span>
                              <select id="specname" name="specname" style="width: 250px;" class="select-chosen" data-placeholder="Select Material">
                                <option></option>
                                <option value=""></option>
                                <?php $__currentLoopData = $spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($spec->intSpecID); ?>"><?php echo e($spec->strSpecDesc); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="rate">Rate</label> <span class="text-danger">*</span>
                              <?php echo Form::text('number',null ,['id'=>'rate','placeholder'=>'0', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute3(this.value)']); ?>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <div>
                              <label for="rate">Hour</label> <span class="text-danger">*</span>
                              <?php echo Form::text('number',null ,['id'=>'hour','placeholder'=>'0', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute3(this.value)']); ?>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                          <div class="form-group">
                            <div>
                              <label for="workerqty">Quantity</label> <span class="text-danger">*</span>
                              <?php echo Form::text('number',null ,['id'=>'workerqty','placeholder'=>'Qty', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute3(this.value)']); ?>

                            </div>
                          </div>
                        </div>
                         <div class="col-md-4">
                          <div class="form-group">
                            <div>
                              <label for="workercost">Total Labor Cost</label>
                              <input type="text" class="form-control" id="workercost" disabled="disabled">  
                            </div>
                            <input id="intQDID" hidden>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-3 col-md-offset-9">
                            <?php echo Form::submit('Add',['id'=>'addservice','class'=>'btn btn-alt btn-success']); ?>

                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    <?php echo Form::close(); ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="table-worker"></div><br>
          </div>
    </div>
    
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 
    //AddBtn matModal reset
    $('.addmatBtn').click(function(){
      $('.select-chosen').val('').trigger('chosen:updated');
      $('#save-material').trigger('reset');
      $('#addmat_modal').modal('show');
    });

    $('.addequipBtn').click(function(){
      $('.select-chosen').val('').trigger('chosen:updated');
      $('#save-equipment').trigger('reset');
      $('#addequip_modal').modal('show');
    });

    $('.addworkerBtn').click(function(){
      $('.select-chosen').val('').trigger('chosen:updated');
      $('#save-worker').trigger('reset');
      $('#addworker_modal').modal('show');
    });


    //addmaterial
    $('#save-material').on('submit', function(e){
      e.preventDefault();
      var ddata = {
              intQDID: lastPart,
              intMaterialID: $('#material').val(),
              intQty: $('#materialqty').val(),
              dcmUnitCost: $('#cost').val()
          };
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
        $.ajax({
            type : 'POST',
            url  : '/addMatQuote',
            data : ddata,
            dataType: 'json',
            success:function(data){
              readMaterial();
              $(".modal").modal('hide');
              swal("Success","Material Added to Quote!", "success");
            },
            error:function(data){
              $(function(){
                $.bootstrapGrowl('<h4>Error!</h4> <p>Material not added to Quote!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
         e.stopPropagation();
      });
  
      //addequipment
      $('#save-equipment').on('submit', function(e){
      e.preventDefault();
      var ddata = {
              intQDID: lastPart,
              intEquipID: $('#equipname').val(),
              dcmUnitPrice: $('#equipprice').val(),
              intQty: $('#equipqty').val(),
              dcmUnitCost: $('#equipcost').val()
          };
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
        $.ajax({
            type : 'POST',
            url  : '/addEquipQuote',
            data : ddata,
            dataType: 'json',
            success:function(data){
              readEquipment();
              $(".modal").modal('hide');
              swal("Success","Equipment Added to Quote!", "success");
            },
            error:function(data){
              $(function(){
                $.bootstrapGrowl('<h4>Error!</h4> <p>Equipment not added to Quote!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
         e.stopPropagation();
      });

      //addworker
      $('#save-worker').on('submit', function(e){
      e.preventDefault();
      var ddata = {
              intQDID: lastPart,
              intSpecID: $('#specname').val(),
              dcmrate: $('#rate').val(),
              dcmhour: $('#hour').val(),
              intQty: $('#workerqty').val(),
              dcmTotLaborCost: $('#workercost').val()
          };
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
        $.ajax({
            type : 'POST',
            url  : '/addWorkerQuote',
            data : ddata,
            dataType: 'json',
            success:function(data){
              readWorker();
              $(".modal").modal('hide');
              swal("Success","Worker Specialization Added to Quote!", "success");
            },
            error:function(data){
              $(function(){
                $.bootstrapGrowl('<h4>Error!</h4> <p>Worker Specialization not added to Quote!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
         e.stopPropagation();
      });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>