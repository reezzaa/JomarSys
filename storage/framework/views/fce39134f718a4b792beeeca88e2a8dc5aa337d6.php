<table id="indivclient-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center"></th>
      <th class="text-center">ID</th>
      <th class="text-center">First Name</th>
      <th class="text-center">Contact #</th>
      <th class="text-center">TIN</th>
      <th class="text-center">Address</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="client-list">
     <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="<?php echo e($client->strIndClientID); ?>">
        <td class="text-center">
           <a href="quote"><button class="btn btn-alt btn-sm btn-primary"><span class="hi hi-plus"> </span> Quote</button></a>
        </td>
        <td class="text-center">
             <?php echo e($client->strIndClientID); ?>

        </td>
        <td class="text-center">
            <?php echo e($client->strIndClientFName); ?> <?php echo e($client->strIndClientMName); ?> <?php echo e($client->strIndClientLName); ?>

        </td>
        <td class="text-center">
             <?php echo e($client->strIndClientContactNo); ?>

        </td>
         <td class="text-center">
             <?php echo e($client->strIndClientTIN); ?>

        </td>
        <td class="text-center">
             <?php echo e($client->strIndClientAddress); ?> <?php echo e($client->strIndClientCity); ?>, <?php echo e($client->strIndClientProv); ?>

        </td>
        <td>
          <div class="text-center form-inline">
            <button class="btn btn-alt btn-warning"  data-toggle="tooltip" data-placement="top" data-original-title="Edit" value="<?php echo e($client->strIndClientID); ?>"> <span class="gi gi-pencil"></span></button>
            <?php echo e(Form::open(array('url'=>'newindclient/'.$client->strIndClientID))); ?>

              <?php echo e(Form::hidden('_method','DELETE')); ?>

              <button type="submit" class="btn btn-alt btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><span class="gi gi-bin"></span></button>
            <?php echo e(Form::close()); ?>

          </div>
      </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<script>$(function(){ TablesDatatables.init(); });</script>