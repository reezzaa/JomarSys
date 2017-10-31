<table id="matClass-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Material Type</th>
      <th class="text-center">Material Classification</th>
      <th style="width: 60px;" class="text-center"></th>
      <th style="width: 200px;" class="text-center">Controls</th>
    </tr>
  </thead>
   <tbody id="matclass-list">
    <?php $__currentLoopData = $matclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id<?php echo e($u->intMatClassID); ?>">
        <td class="text-center">
            <?php echo e($u->strMatTypeName); ?>

        </td>
        <td class="text-center">
            <?php echo e($u->strMatClassName); ?>

        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            <?php if(($u->status)==1): ?>
                  <p hidden>1</p>
              <?php else: ?>
                  <p hidden>0</p> 
              <?php endif; ?>
            <input name="status" id="status" type="checkbox" value="<?php echo e($u->intMatClassID); ?>" 
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
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "<?php echo e($u->intMatClassID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            <button id="del_supp" class="btn btn-alt btn-danger del_supp" value="<?php echo e($u->intMatClassID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <span class="gi gi-bin"></span>
            </button>
          </div>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>        
<div class="text-center">
     <div id="edit_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
             <div class="block-title themed-background">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white;"><strong>Edit Material Classification</strong></h3>
              </div>

              <?php echo Form::open(['url'=>'materialclass','method'=>'PUT','id'=>'frm-upd']); ?>

                <div class="form-group">
                  <label for="mattypes">Material Type <span class="text-danger">*</span> </label>
                  <?php echo Form::select('mattypes', $mattype, null,  ['id'=>'mattypes','class'=>'form-control', 'placeholder'=>'']); ?>

                  <span id="duplicates" class="help-block animation-slideDown">
                    Duplicate Material Classification
                  </span>
              </div>
                <div class="form-group">
                  <label for="strMaterialClassname">Material Classification Name <span class="text-danger">*</span> </label>
                  <?php echo Form::text('strMaterialClassname' , null,['id'=>'strMaterialClassname', 'class'=>'form-control', 'maxLength'=>'30']); ?>

                  <span id="duplicates2" class="help-block animation-slideDown">
                  Duplicate Material Classification Name
                  </span>
                  <script>
                      $('#strMaterialClassname').alphanum({
                          allow :    '-,.()/', // Specify characters to allow
                        });
                  </script>
                  </div>
                <br>
                <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                  <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span> Save Changes</button>
                </div>
                <div class="clearfix"></div>
                <script>
                  $('#strMaterialClassname').focus(function(){
                        $('span#duplicate').hide();
                       });
                </script>
                <?php echo Form::close(); ?>

          </div>
        </div>
      </div>
    </div> 
  </div>
  
  <div class="text-center">
    <div id="del_modal" class="modal fade del_modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
            <div class="block-title themed-background">
              <div class="block-options pull-right">
                  <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
              </div>
              <h3 class="themed-background" style="color:white;"><strong>Delete Material Classification</strong></h3>
            </div>
             <?php echo Form::open(['url'=>'materialclass','method'=>'PUT','id'=>'frm-del']); ?>

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