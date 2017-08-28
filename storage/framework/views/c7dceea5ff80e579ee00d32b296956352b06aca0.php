<div id="saveActions" class="form-group">

    <input type="hidden" name="save_action" value="<?php echo e($saveAction['active']['value']); ?>">

    <div class="btn-group">

        <button type="submit" class="btn btn-success">
            <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
            <span data-value="<?php echo e($saveAction['active']['value']); ?>"><?php echo e($saveAction['active']['label']); ?></span>
        </button>

        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aira-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Save Dropdown</span>
        </button>

        <ul class="dropdown-menu">
            <?php $__currentLoopData = $saveAction['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="javascript:void(0);" data-value="<?php echo e($value); ?>"><?php echo e($label); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </div>

    <a href="<?php echo e(url($crud->route)); ?>" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;<?php echo e(trans('backpack::crud.cancel')); ?></a>
</div>