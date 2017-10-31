<?php $__empty_1 = true; $__currentLoopData = $draftQuotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $draftQuotes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<a href="/quotedetail/<?php echo e($draftQuotes->strQuoteID); ?>" class="widget widget-hover-effect1">
	    <div class="widget-simple">
	        <h4 class="widget-content">
	            <strong><?php echo e($draftQuotes->strQuoteID); ?></strong>
	            <small>Quote Name: <?php echo e($draftQuotes->strQuoteName); ?></small>
	            <small>Date created: <?php echo e($draftQuotes->datQuoteDate); ?></small>
	        </h4>
	    </div>
	</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 	<a href="javascript:void(0)" class="widget widget-hover-effect1">
	    <div class="widget-simple">
	        <h4 class="widget-content">
	            <small>No currently saved Quotation</small>
	        </h4>
	    </div>
	</a>
<?php endif; ?>