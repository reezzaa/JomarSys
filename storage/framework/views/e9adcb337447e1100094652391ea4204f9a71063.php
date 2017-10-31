 <table id="6col-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center"></th>
      <th class="text-center">User Name</th>
      <th class="text-center">Name</th>
      <th class="text-center">Email Address</th>
      <th class="text-center" style="width: 50px;"></th>
      <th class="text-center" style="width: 100px;">Controls</th>
    </tr>
  </thead>
  <tbody  id="user-list">
    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id<?php echo e($u->id); ?>">
    <td class="text-center">
        <!-- <?php echo e($u->username); ?> -->
      </td>
     <td class="text-center">
        <?php echo e($u->username); ?>

      </td>
      <td class="text-center">
        <?php echo e($u->fname); ?> <?php echo e($u->mname); ?> <?php echo e($u->lname); ?>

      </td>
       <td class="text-center">
        <?php echo e($u->email); ?> 
      </td>
      <td class="text-center">
        <label class="switch switch-primary">
          <?php if(($u->active)==1): ?>
          <p hidden>1</p>
          <?php else: ?>
          <p hidden>0</p> 
          <?php endif; ?>
          <input name="active" id="active" type="checkbox" value="<?php echo e($u->id); ?>" 
          <?php if(($u->active)==1): ?>
          <?php echo e("checked"); ?>

          <?php else: ?>
          <?php echo e(""); ?> 
          <?php endif; ?>
          >
          <span></span></label>
        </td>
        <td class="text-center">

          <button id="show" class="btn btn-primary show" value="<?php echo e($u->id); ?>"> <span class="gi gi-pen"></span> <em>Accessibility</em>
          </button> 
          
        </div>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

  <div id="useraccess_modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div  class="modal-content">
        <div  class="block full container-fluid">
          <div class="block-title">
            <button class="close" data-dismiss="modal">&times;</button>
            <h3>Update User Access</h3></div>

            <?php echo Form::open(['url'=>'userlevel','method'=>'PUT','id'=>'frm-upd']); ?>

           
            <hr>
            
            <div id="checkboxList">

            </div>
            <hr>
            <div class="pull-right">
              <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
              <button type="submit" id='btnUpdate' class="btn btn-primary" ><span class="gi gi-pen"></span> Save Changes</button>
            </div>
            <script>
              $('#strEquipTypeDesc').focus(function(){
                $('span#duplicate').hide();
              });
            </script>
            <input type="hidden" id="myId" name="myId">
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
          <div class="block full container-fluid">
            <div class="block-title">
              <button class="close" data-dismiss="modal">&times;</button>
              <h3>Delete Equipment Type</h3></div>
              <?php echo Form::open(['url'=>'equiptype','method'=>'PUT','id'=>'frm-del']); ?>

              <p><h4>Are you sure you want to delete</h4>
              </p>
              <p hidden><b id="deleteID"></b></p>
              <p>
                <h3><b id="del_classname" ></b>??</h3>
              </p>
              <hr>
              <div class="pull-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span>Delete</button>
              </div>
              <?php echo Form::close(); ?>

            </div>
          </div>
        </div>
      </div> 
    <script>$(function(){ TablesDatatables.init(); });</script>