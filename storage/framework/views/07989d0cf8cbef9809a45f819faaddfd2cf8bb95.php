<table  class="table table-vcenter table-striped table-bordered table-hover">
              <thead>
              	 <tr>
                 <th class="text-center" ><b>Service</b></th>
                 <th class="text-center"><b>Progress</b></th>
                 <th class="text-center" style="width: 50px;"></th>
                 <th class="text-center" style="width: 120px;"><b>Status</b></th>
                 <th class="text-center" style="width: 20px; "><b>Controls</b></th>
               </tr>
              </thead>
              <tbody>
              	 <?php $__currentLoopData = $fetch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
                 <td class="text-center"><?php echo e($f->strServiceOffName); ?></td>
                 <td class="text-center">
                   <div class="progress progress-xs progress-striped active" >
                     <div class="progress-bar progress-bar-success " style="width: <?php echo e($f->dblProgActualPercent); ?>%"></div>
                   </div>
             
                 </td>
                 <td class="text-center">
                 <?php if($f->dblProgActualPercent==100): ?>
                 <i class="fa fa-check text-success"></i>
                 <?php else: ?>
                   <span class="label label-default"> <?php echo e($f->dblProgActualPercent); ?>%</span>
                  <?php endif; ?>
                 </td>
                 <td class="text-center">
                 	<?php if(($f->qstatus==1)): ?>
                    <?php if($f->dblProgActualPercent==100): ?>
                    <span class="label label-primary ">Finished</span>
                     <?php else: ?>     
                 	  <span class="label label-primary">On Schedule</span>
                      <?php endif; ?>
                 	<?php elseif($f->qstatus==2): ?>
                 	  <?php if($f->dblProgActualPercent==100): ?>
                    <span class="label label-info ">Finished</span>
                     <?php else: ?>     
                    <span class="label label-info">Ahead</span>
                    <?php endif; ?>
                 	<?php elseif($f->qstatus==3): ?>
                 	  <?php if($f->dblProgActualPercent==100): ?>
                    <span class="label label-danger ">Finished</span>
                     <?php else: ?>     
                    <span class="label label-danger">Delayed</span>
                    <?php endif; ?>
                 	<?php endif; ?>




                 </td>
                 <td class="text-center">
                       
                         <button type="button" id="edit_this" value="<?php echo e($f->intProgID); ?>" class="btn btn-warning butun" data-toggle="tooltip" data-placement="top" title="Edit"><i class="gi gi-pen"></i></button> 
                        
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
             
             </table> 
  <div id="edit_modal" class="modal fade edit-mat-modal" tabindex="-1" role="dialog" aria-labelledby="EditMaterialModal" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="block full container-fluid">
                <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>Update Activity</strong></h3>
                  </div>   
              
                <?php echo Form::open(['url'=>route('progressmonitoring.storeThis','classID'),'method'=>'POST','id'=>'form-validation']); ?>       
                <br>         
             
               <fieldset>
                <div class="form-group">
                <label class=" control-label col-md-5 text-center" for="val_range">Set Progress(<em>percentage</em>)  <span class="text-danger">*</span></label>
                  <div class="col-md-7">
                    <?php echo Form::number('val_range',  null,  ['id'=>'val_range','class'=>'form-control', 'placeholder'=>'Range[0-100]']); ?>

                  </div>
                </div>
               </fieldset><br><hr>                
                <div class="form-group form-actions ">
                 <!--  -->
                 <input type="hidden" id="updId" name="updId">
                 <input type="hidden" id="mydId" name="mydId">
                  <input type="hidden" id="updstat" name="updstat">
                 <input type="hidden" id="updtobe" name="updtobe" >


                 

                <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                  <button type="submit" class="btn btn-primary" ><span class="gi gi-check"></span> Save </button>
                </div>
                <!-- <script>
                  $('#matcats').focus(function(){
                      $('span#duplicates').hide();
                     });
                  $('#matnames').focus(function(){
                      $('span#duplicates2').hide();
                     });
                </script> -->
          </div>

                <?php echo Form::close(); ?>

        </div>
      </div> 
    </div>
 </div>

 <div class="text-center">
   <div id="del_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block full container-fluid">
            <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>Delete Activity</strong></h3>
                  </div>   
             <?php echo Form::open(['url'=>'progressmonitoring','method'=>'PUT','id'=>'frm-del']); ?>

                <p><h4>Remove this activity?</h4>
                </p>
                <p hidden><b id="deleteID"></b></p>
                <p>
                  <h3><b id="del_classname" ></b>?</h3>
                </p>
                <hr>
                <div id="mathere">
                  
                </div>
                <div id="matidhere">
                </div>
                <div id="stochere">
                  
                </div>
               
                <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                  <button type="submit" class="btn btn-danger" ><span class="gi gi-pen"></span>Delete</button>
              </div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div> 
</div>

   <div id="view_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block full container-fluid">
            <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>View Activity</strong></h3>
                  </div>   
                <div class="row">
                <div class="col-md-offset-1">
                      <h4><i class="gi gi-construction_cone"></i> Workers:</h4> 
                    <div class="col-md-5 col-md-offset-1" id="special">
                   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-offset-1">
                  <h4><i class="fa fa-cube"></i> Materials: </h4>
                  <div class="col-md-5 col-md-offset-1" id="special1">
                   
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-offset-1">
                  <h4><i class="gi gi-blacksmith"></i> Equipments: </h4>
                  <div class="col-md-5 col-md-offset-1" id="special2">
                   
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-offset-1">
                  <h4><strong>Update History</strong></h4>
                  </div>
                  <div class="col-md-6 col-md-offset-1" id="his">
                    <br>
                  </div>
                </div>
              </div>     
        </div>
      </div>
    </div>
