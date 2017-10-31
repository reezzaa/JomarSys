<table id="services-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th style="width: 175px;" class="text-center"></th>
      <th class="text-center">Services</th>
      <th class="text-center">Service Cost</th>
    </tr>
  </thead>
  <tbody id="service-list">
    <?php $__currentLoopData = $qdserve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="<?php echo e($services->intMatNeedID); ?>">
        <td class="text-center">
          <a href="/newresource/<?php echo e($services->intQDID); ?>">
            <button class="btn btn-alt btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Add Resource">
              <span class="gi gi-plus"></span> Resource
            </button>
          </a>
            
        </td>
        <td class="text-center">
          <?php echo e($services->strServiceOffName); ?>

        </td>
        <td class="text-center">
          <?php echo e($services->dcmQuoteServiceCost); ?>

        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

