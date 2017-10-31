<table id="material-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover" >
  <thead>
    <tr>
      <th class="text-center">Type</th>
      <th class="text-center">Classification</th>
      <th class="text-center">Material Name</th>
      <th class="text-center">UOM</th>
      <th class="text-center">Price</th>
      <th style="width: 60px;" class="text-center"></th>
      <th style="width: 175px;" class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="mat-list">
    <?php $__currentLoopData = $material; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id<?php echo e($u->intMaterialID); ?>">
        <td class="text-center">
           <?php echo e($u->strMatTypeName); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->strMatClassName); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->strMaterialName); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->strDetailUOMText); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->dcmMaterialUnitPrice); ?>

        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            <?php if(($u->status)==1): ?>
                  <p hidden>1</p>
              <?php else: ?>
                  <p hidden>0</p> 
              <?php endif; ?>
            <input name="status" id="status" type="checkbox" value="<?php echo e($u->intMaterialID); ?>" 
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
            <button id="view_supp" class="btn btn-alt btn-info view_supp" value = "<?php echo e($u->intMaterialID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span>
            </button>
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "<?php echo e($u->intMaterialID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            <button id="del_supp" class="btn btn-alt btn-danger del_supp" value="<?php echo e($u->intMaterialID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <span class="gi gi-bin"></span>
            </button>
          </div>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table> 

<div id="view_modal" class="modal fade view_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
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
          <div class="col-md-4">
          </div>
        </div>
        
        <div id="clearfix"></div>
      </div>
    </div>
  </div>
</div> 

<div id="editmat_modal" class="modal fade editmat_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="block">
        <div class="block-title themed-background">
          <div class="block-options pull-right">
              <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="themed-background" style="color:white;"><strong id="nameheader">Edit Material</strong></h3>
        </div>
        <?php echo Form::open(['url'=>'material', 'method'=>'PATCH', 'id'=>'form-validation', 'class' => 'form-horizontal']); ?>

          <?php echo $__env->make('layouts.mainte.material.formedit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo Form::close(); ?>

        <div id="clearfix"></div>
      </div>
    </div>
  </div>
</div> 

<script>$(function(){ TablesDatatables.init(); });</script>