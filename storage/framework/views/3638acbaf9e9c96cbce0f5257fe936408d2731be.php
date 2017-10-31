<table id="" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Equipment Name</th>
      <th class="text-center">Rental Price</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Unit Cost </th>
    </tr>
  </thead>
  <tbody id="client-list">
   <?php $__currentLoopData = $quoteEquip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quoteEquip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center">
            <?php echo e($quoteEquip->strEquipName); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteEquip->dcmUnitPrice); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteEquip->intQty); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteEquip->dcmUnitCost); ?>

        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>