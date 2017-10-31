<table id="" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Material Name</th>
      <th class="text-center">Material Price</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Unit Cost</th>
    </tr>
  </thead>
  <tbody id="client-list">
     <?php $__currentLoopData = $quoteMat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quoteMat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center">
            <?php echo e($quoteMat->strMaterialName); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteMat->dcmMaterialUnitPrice); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteMat->intQty); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteMat->dcmUnitCost); ?>

        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>