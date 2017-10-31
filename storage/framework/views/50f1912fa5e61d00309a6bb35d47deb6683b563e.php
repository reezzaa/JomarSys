<table id="specialization-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Specialization Name</th>
      <th style="width: 60px;" class="text-center"></th>
      <th style="width: 200px;" class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center">
            <?php echo e($u->strSpecDesc); ?>

        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            <?php if(($u->status)==1): ?>
                  <p hidden>1</p>
              <?php else: ?>
                  <p hidden>0</p> 
              <?php endif; ?>
            <input name="status" id="status" type="checkbox" value="<?php echo e($u->intSpecID); ?>" 
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
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "<?php echo e($u->intSpecID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            <button id="del_supp" class="btn btn-alt btn-danger del_supp" value="<?php echo e($u->intSpecID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <span class="gi gi-bin"></span>
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
                      <h3 class="themed-background" style="color:white;"><strong>Edit Specialization</strong></h3>
                    </div>

                       <?php echo Form::open(['url'=>'specialization','method'=>'PUT','id'=>'frm-upd']); ?>

                        <div class="form-group">
                          <div class="col-md-offset-1">
                            <label for="strSpecDesc">Specialization Name</label>
                          </div>
                          <div class="col-md-8 col-md-offset-2">
                            <?php echo Form::text('strSpecDesc' , null,['id'=>'strSpecDesc', 'class'=>'form-control', 'maxLength'=>'45']); ?>

                            <span id="duplicate" class="help-block animation-slideDown">
                            Duplicate Material Classification Name
                            </span>
                          <br>
                          </div>
                            <script>
                               $('#strSpecDesc').alphanum({
                                  allow :    '-/', // Specify characters to allow
                                });
                            </script>
                        </div>
                        <div class="pull-right">
                          <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                          <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span> Save Changes</button>
                        </div>
                        <?php echo Form::close(); ?>

                        <div class="clearfix"></div>
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
                      <h3 class="themed-background" style="color:white;"><strong>Delete Specialization</strong></h3>
                    </div>
                     <?php echo Form::open(['url'=>'specialization','method'=>'PUT','id'=>'frm-del']); ?>

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