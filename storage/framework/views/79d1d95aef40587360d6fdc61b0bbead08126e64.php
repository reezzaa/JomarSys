<table id="client-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center"></th>
      <th class="text-center">ID</th>
      <th class="text-center">Logo</th>
      <th class="text-center">Company Name</th>
      <th class="text-center">Client's Representative</th>
      <th class="text-center">Location</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="client-list">
     <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="strCompClientID">
        <td class="text-center">
           <a href="javascript:void(0)"><button class="btn btn-alt btn-sm btn-primary"><span class="hi hi-plus"> </span> Quote</button></a>
        </td>
        <td class="text-center">
            <?php echo e($client->strCompClientID); ?>

        </td>
        <td class="text-center">
            <img src="<?php echo e(url('images', $client->strCompClientImage)); ?>" style="width:80px;">
        </td>
        <td class="text-center">
            <?php echo e($client->strCompClientName); ?>

        </td>
        <td class="text-center">
            <?php echo e($client->strCompClientRepresentative); ?><br>
            <i><?php echo e($client->strCompClientPosition); ?></i>
        </td>
        <td class="text-center">
             <?php echo e($client->strCompClientCity); ?>,  <?php echo e($client->strCompClientProv); ?>

        </td>
        <td>
          <div class="text-center">
            <a href="/newcompclient/<?php echo e($client->strCompClientID); ?>"><button class="btn btn-alt btn-info" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span></button></a>
            <a href="/newcompclient/<?php echo e($client->strCompClientID); ?>/edit"><button class="btn btn-alt btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Edit"> <span class="gi gi-pencil"></span></button></a>
            <?php echo e(Form::open(array('url'=>'newcompclient/'.$client->strCompClientID))); ?>

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