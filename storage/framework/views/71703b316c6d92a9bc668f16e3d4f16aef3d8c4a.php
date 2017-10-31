<table id="5col-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
     <tr>
      <th class="text-center">Project Name</th>
      <th class="text-center">Client Name</th>
      <th class="text-center">CO Number</th>
      <th class="text-center">Status</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="project-list">
    <?php $__currentLoopData = $prog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr >

      <td class="text-center">
        <?php echo e($p->strQuoteName); ?>

      </td>
      <td class="text-center">
        <?php echo e($p->strCompClientName); ?>

      </td>
      <td class="text-center">
       <?php echo e($p->strCONumber); ?> 
      </td>
       <td class="text-center">
         <?php if($p->status==1): ?>
         <label class="label label-info"> Ongoing</label>
         <?php else: ?>
         <label class="label label-warning"> For Billing</label>
         <?php endif; ?>
      </td>
      <td class="text-center">
         <a href="<?php echo e(route('progressmonitoring.show',$p->strContractID)); ?>"><button id="edit_supp" class="btn btn-info btn-alt edit_supp" value="<?php echo e($p->strContractID); ?>"> <span class="gi gi-eye_open"></span>  View</button></a>
         <!-- <input type="hidden" id="phId" value="{{$p->strContractID}]"> -->
    </td>
    
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>

</table>


        
            <script>$(function(){ TablesDatatables.init(); });</script>