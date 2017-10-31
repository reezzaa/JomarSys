<table id="5col-datatable" class="table table-vcenter table-striped table-bordered table-hover">
				  <thead>
				      <tr>
				      	  <th class="text-center">Contract No.</th>
					      <th class="text-center">Client Name</th>
					      <th class="text-center">Project Name</th>
					      <th class="text-center">Status</th>
					      <th class="text-center">Controls</th>
				    </tr>
				  </thead>
				  <tbody id="client-list">
				   <!--  -->
				   <?php $__currentLoopData = $getcontract; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   <tr>
				        <td class="text-center">
				            <?php echo e($inv->strContractID); ?>

				        </td>
				        <td class="text-center">
				            <?php echo e($inv->strCompClientName); ?>

				        </td>
				        <td class="text-center">
				            <?php echo e($inv->strQuoteName); ?>

				        </td>
				        <td class="text-center">
				        <?php if(($inv->constatus)==0): ?>
				        	<label class="label label-warning"> Pending</label>
				        <?php elseif(($inv->constatus)==1): ?>
				        	<label class="label label-info"> Ongoing</label>
				        <?php endif; ?>
				        </td>
				      	<td class="text-center">
				        	<a href="billing/<?php echo e($inv->strContractID); ?>"><button class="btn btn-alt btn-info" id="viewinvoice" value="<?php echo e($inv->strContractID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span></button></a>
				      	</td>

				       
				      </tr>
				   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </tbody>
				</table>
<script>$(function(){ TablesDatatables.init(); });</script>
           
				