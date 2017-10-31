<table id="6cols-datatable" class="table table-vcenter table-striped table-bordered table-hover">
				  <thead>
				      <tr>
				      	  <th class="text-center">Contract No.</th>
					      <th class="text-center">Client Name</th>
					      <th class="text-center">Date Started</th>
					      <th class="text-center">Date Through</th>
					      <th class="text-center">Location</th>
					      <th class="text-center">Contract Amount</th>
					      <th class="text-center">Status</th>
					      <th class="text-center">Controls</th>


				    </tr>
				  </thead>
				  <tbody id="client-list">
				    <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <tr>
				        <td class="text-center">
				            <?php echo e($u->strContractID); ?>

				        </td>
				        <td class="text-center">
				            <?php echo e($u->strCompClientName); ?>

				        </td>
				        <td class="text-center">
        				<?php echo e(\Carbon\Carbon::parse( $u->datProjStart )->toFormattedDateString()); ?>

				        </td>
				        <td class="text-center">
        				<?php echo e(\Carbon\Carbon::parse( $u->datProjEnd )->toFormattedDateString()); ?>

				        </td>
				        <td class="text-center">
				            <?php echo e($u->strContractLocation); ?>

				        </td>
				        <td class="text-center">
				             ₱ <?php echo e($u->dblProjCost); ?>

				        </td>
						<td class="text-center">
				        <?php if(($u->status)==0): ?>
				        	<label class="label label-warning"> Pending</label>
				        <?php elseif(($u->status)==1): ?>
				        	<label class="label label-info"> Ongoing</label>
				        <?php endif; ?>
				      	</td>
				      	<td class="text-center">
				        	<a href="/contractlist/<?php echo e($u->strContractID); ?>"><button class="btn btn-alt btn-info" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span></button></a>
				      	</td>

				       
				      </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </tbody>
				</table>
<script>$(function(){ TablesDatatables.init(); });</script>
				