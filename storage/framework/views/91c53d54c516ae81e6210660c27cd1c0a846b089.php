<table id="detailuom-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Based UOM</th>
      <th class="text-center">Detailed UOM Name</th>
      <th class="text-center">Symbol</th>
      <th style="width: 60px;" class="text-center"></th>
      <th style="width: 200px;" class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="equip-list">
    <?php $__currentLoopData = $detailuom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id<?php echo e($u->intDetailUOMID); ?>">
        <td class="text-center">
            <?php echo e($u->strGroupUOMText); ?> 
        </td>
        <td class="text-center">
            <?php echo e($u->strDetailUOMText); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->strUOMUnitSymbol); ?>

        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            <?php if(($u->status)==1): ?>
                  <p hidden>1</p>
              <?php else: ?>
                  <p hidden>0</p> 
              <?php endif; ?>
            <input name="status" id="status" type="checkbox" value="<?php echo e($u->intDetailUOMID); ?>" 
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
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "<?php echo e($u->intDetailUOMID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            <button id="del_supp" class="btn btn-alt btn-danger del_supp" value="<?php echo e($u->intDetailUOMID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <span class="gi gi-bin"></span>
            </button>
          </div>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<div>
      <div id="edit_modal" class="modal fade edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
             <div class="block-title themed-background">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white;"><strong>Edit Detail UOM</strong></h3>
              </div>

               <?php echo Form::open(['url'=>'detailuomeasure','method'=>'PUT','id'=>'frm-update']); ?>

              <div class="form-group">
                  <label for="groupuomnames">Based UOM</label>
                  <?php echo Form::select('groupuomnames', $groupuom, null,  ['id'=>'groupuomnames','class'=>'form-control', 'placeholder'=>'']); ?>

                  <span id="duplicates" class="help-block animation-slideDown">
                    Duplicate Material Classification
                  </span>
              </div>
              <div class="form-group">
                  <label for="detailuomnames">Detail UOM Name</label>
                  <?php echo Form::text('detailuomnames',null,['id'=>'detailuomnames', 'class'=>'form-control', 'maxLength'=>'30']); ?>

                  <span id="duplicates2" class="help-block animation-slideDown">
                        Duplicate Material Name
                  </span>
                  <script>
                    $('#detailuomnames').alphanum({
                        allow :    '-,.()/', // Specify characters to allow
                      });
                  </script>
                </div>
                <div class="form-group">
                  <label for="uomsymbols">UOM Symbol</label>
                  <?php echo Form::text('uomsymbols',null ,['id'=>'uomsymbols','class' => 'form-control']); ?>

                  <span id="duplicates3" class="help-block animation-slideDown">
                  Duplicate Material Name
                  </span>
                </div>
                <div class="pull-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span> Save Changes</button>
              </div>
              <div class="clearfix"></div>
              <script>
                  $('#groupuomnames').focus(function(){
                      $('span#duplicates').hide();
                     });
                  $('#detailuomnames').focus(function(){
                      $('span#duplicates2').hide();
                     });
                  $('#uomsymbols').focus(function(){
                      $('span#duplicates3').hide();
                     });
                </script>
              <?php echo Form::close(); ?>

        </div>
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
            <h3 class="themed-background" style="color:white;"><strong>Delete Detail UOM</strong></h3>
          </div>
             <?php echo Form::open(['url'=>'detailuomeasure','method'=>'PUT','id'=>'frm-del']); ?>

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
<script>$(function(){ TablesDatatables.init(); });</script>