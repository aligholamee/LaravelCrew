
<?php if($crud->groupedErrorsEnabled() && $errors->any()): ?>
    <div class="callout callout-danger">
        <h4><?php echo e(trans('backpack::crud.please_fix')); ?></h4>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>