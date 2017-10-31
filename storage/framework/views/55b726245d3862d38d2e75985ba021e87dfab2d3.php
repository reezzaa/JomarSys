<table id="" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Specialization Name</th>
      <th class="text-center">Labor Cost</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Total Labor Cost</th>
    </tr>
  </thead>
  <tbody id="client-list">
     <?php $__currentLoopData = $workspec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workerspec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center">
            <?php echo e($workerspec->strSpecDesc); ?>

        </td>
        <td class="text-center">
            <?php echo e($workerspec->dcmLaborCost); ?>

        </td>
        <td class="text-center">
            <?php echo e($workerspec->intQty); ?>

        </td>
        <td class="text-center">
            <?php echo e($workerspec->dcmTotLaborCost); ?>

        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>