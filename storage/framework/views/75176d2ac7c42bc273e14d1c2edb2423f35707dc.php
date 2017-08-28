<?php if($crud->buttons->where('stack', $stack)->count()): ?>
	<?php $__currentLoopData = $crud->buttons->where('stack', $stack); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  <?php if($button->type == 'model_function'): ?>
		<?php echo $entry->{$button->content}($crud);; ?>

	  <?php else: ?>
		<?php echo $__env->make($button->content, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	  <?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
