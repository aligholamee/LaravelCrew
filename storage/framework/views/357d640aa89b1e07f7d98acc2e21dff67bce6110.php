
<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- load the view from the application if it exists, otherwise load the one in the package -->
    <?php if(view()->exists('vendor.backpack.crud.fields.'.$field['type'])): ?>
        <?php echo $__env->make('vendor.backpack.crud.fields.'.$field['type'], array('field' => $field), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('crud::fields.'.$field['type'], array('field' => $field), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>