<table id="worker-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Name</th>
      <th class="text-center">Province</th>
      <th class="text-center">City</th>
      <th style="width: 60px;" class="text-center"></th>
      <th style="width: 200px;" class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="emp-list">
    <?php $__currentLoopData = $employ; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id<?php echo e($u->strEmpID); ?>">
        <td class="text-center">
            <?php echo e($u->strEmpID); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->strEmpFirstName); ?> <?php echo e($u->strEmpMiddleName); ?> <?php echo e($u->strEmpLastName); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->strEmpProvince); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->strEmpCity); ?>

        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            <?php if(($u->status)==1): ?>
                  <p hidden>1</p>
              <?php else: ?>
                  <p hidden>0</p> 
              <?php endif; ?>
            <input name="status" id="status" type="checkbox" value="<?php echo e($u->strEmpID); ?>" 
              <?php if(($u->status)==1): ?>
                  <?php echo e("checked"); ?>

              <?php else: ?>
                  <?php echo e(""); ?> 
              <?php endif; ?>
              >
              <span></span></label>
        </td>
        <td>
          <div class="text-center">
            <button id="view_supp" class="btn btn-alt btn-info view_supp" value = "<?php echo e($u->strEmpID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span>
            </button>
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "<?php echo e($u->strEmpID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            <button id="del_supp" class="btn btn-alt btn-danger del_supp" value="<?php echo e($u->strEmpID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <span class="gi gi-bin"></span>
            </button>
          </div>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<div id="viewemp_modal" class="modal fade view_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="block">
        <div class="block-title themed-background">
          <div class="block-options pull-right">
              <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="themed-background" style="color:white;"><strong id="nameheader"></strong></h3>
        </div>

        <div class="row">
          <div class="col-md-offset-1">
            <address>
                <h5><strong>Address:</strong> <span id="address"></span></h5><br>
                <h5><i class="fa fa-phone"></i> <span id="contactno"></span></h5><br>
                <h5><i class="fa fa-envelope-o"></i> <a href="javascript:void(0)"> <span id="email"></span></a></h5>
            </address>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-1">
            <h4><i class="fa fa-thumbs-o-up"></i> Specialization: </h4>
            <div class="col-md-5 col-md-offset-1">
              <div id="special"></div>
            </div>
            <div class="col-md-5">
              <div id="special2"></div>
            </div>
          </div>
        </div>
        
        <div id="clearfix"></div>
      </div>
    </div>
  </div>
</div> 

<div class="text-center">
   <div id="del_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong>Delete Employee</strong></h3>
          </div>
             <?php echo Form::open(['url'=>'worker','method'=>'PUT','id'=>'frm-del']); ?>

                <p><h4>Are you sure you want to delete</h4>
                </p>
                <p hidden><b id="deleteID"></b></p>
                <p>
                  <h3><b id="del_classname" ></b>??</h3>
                </p>
                <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                  <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span>Delete</button>
              </div>
              <div class="clearfix"></div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div> 
</div>


<div class="text-center">
   <div id="empedit_modal" class="modal fade empedit_modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong>Edit Employee Information</strong></h3>
          </div>
            <?php echo Form::open(['url'=>'worker', 'method'=>'PATCH', 'id'=>'form-validation', 'class' => 'form-horizontal form-bordered']); ?>

              <?php echo $__env->make('layouts.mainte.employee.formedit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div> 
</div>

<script>$(function(){ TablesDatatables.init(); });</script>