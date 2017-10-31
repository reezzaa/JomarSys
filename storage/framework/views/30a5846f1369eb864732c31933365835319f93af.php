<table id="contracthistory-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Status</th>
      <th class="text-center">Contract No</th>
      <th class="text-center">Name</th>
      <th class="text-center">Date Started</th>
      <th class="text-center">Date Through</th>
      <th class="text-center">CO#</th>
      <th class="text-center">Contract Amount</th>
      <th class="text-center" style="width: 50px"></th>
    </tr>
  </thead>
  <tbody id="client-list">
     <?php $__currentLoopData = $contract; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
     <td class="text-center">
       <?php if($c->cstat==2): ?>
      <span class="label label-warning ">Pending</span>
       <?php elseif($c->cstat==1): ?>
      <span class="label label-info ">Ongoing</span>
       <?php elseif($c->cstat==3): ?>
      <span class="label label-primary ">Terminated</span>
       <?php endif; ?>
     </td>
     <td class="text-center">
       <?php echo e($c->strContractID); ?>

     </td>
     <td class="text-center">
       <?php echo e($c->strQuoteName); ?>

     </td>
     <td class="text-center">
       <?php echo e(\Carbon\Carbon::parse($c->datProjStart)->toFormattedDateString()); ?>

     </td>
     <td class="text-center">
       <?php echo e(\Carbon\Carbon::parse($c->datProjEnd)->toFormattedDateString()); ?>

     </td>
     <td class="text-center">
       <?php echo e($c->strCONumber); ?>

     </td>
     <td class="text-center">
       ₱ <?php echo e($c->dblProjCost); ?>

     </td>
     <td class="text-center">
                   <a href="/contractlist/<?php echo e($c->strContractID); ?>"><button type="button" id="view_this"  class="btn btn-alt btn-info butun" data-toggle="tooltip" data-placement="top" title="View"><i class="gi gi-eye_open"></i></button> </a> 
      </td>
    </tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>