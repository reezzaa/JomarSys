<table id="clientqueries-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Description</th>
      <th class="text-center">Fee</th>
    </tr>
  </thead>
  <tbody id="service-list">
    <?php $__currentLoopData = $re; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $re): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center">
          <?php echo e($re->strQAdesc); ?>

        </td>
        <td class="text-center">
          <?php echo e($re->dblQAamt); ?>

        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

