<table id="" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Quote #</th>
      <th class="text-center">Client ID</th>
      <th class="text-center">Quote Name</th>
      <th class="text-center">Date Quoted</th>
    </tr>
  </thead>
  <tbody id="client-list">
     <?php $__currentLoopData = $quote; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quoteMat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center">
            <?php echo e($quoteMat->strQuoteID); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteMat->strClientID); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteMat->strQuoteName); ?>

        </td>
        <td class="text-center">
            <?php echo e($quoteMat->datQuoteDate); ?>

        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>