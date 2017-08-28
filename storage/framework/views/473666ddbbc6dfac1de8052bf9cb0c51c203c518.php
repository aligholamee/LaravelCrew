<?php if(isset($field['attributes'])): ?>
    <?php $__currentLoopData = $field['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<?php if(is_string($attribute)): ?>
        <?php echo e($attribute); ?>="<?php echo e($value); ?>"
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(!isset($field['attributes']['class'])): ?>
    	<?php if(isset($default_class)): ?>
    		class="<?php echo e($default_class); ?>"
    	<?php else: ?>
    		class="form-control"
    	<?php endif; ?>
    <?php endif; ?>
<?php else: ?>
	<?php if(isset($default_class)): ?>
		class="<?php echo e($default_class); ?>"
	<?php else: ?>
		class="form-control"
	<?php endif; ?>
<?php endif; ?>