<!-- radio -->
<?php 
    $optionPointer = 0;
    $optionValue = old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' ));

    // if the class isn't overwritten, use 'radio'
    if (!isset($field['attributes']['class'])) {
        $field['attributes']['class'] = 'radio';
    }
 ?>

<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >

    <div>
        <label><?php echo $field['label']; ?></label>
        <?php echo $__env->make('crud::inc.field_translatable_icon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <?php if( isset($field['options']) && $field['options'] = (array)$field['options'] ): ?>

        <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ($optionPointer++); ?>

            <?php if( isset($field['inline']) && $field['inline'] ): ?>

            <label class="radio-inline" for="<?php echo e($field['name']); ?>_<?php echo e($optionPointer); ?>">
                <input  type="radio"
                        id="<?php echo e($field['name']); ?>_<?php echo e($optionPointer); ?>"
                        name="<?php echo e($field['name']); ?>"
                        value="<?php echo e($value); ?>"
                        <?php echo $__env->make('crud::inc.field_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo e($optionValue == $value ? ' checked': ''); ?>

                        > <?php echo $label; ?>

            </label>

            <?php else: ?>

            <div class="radio">
                <label for="<?php echo e($field['name']); ?>_<?php echo e($optionPointer); ?>">
                    <input type="radio" id="<?php echo e($field['name']); ?>_<?php echo e($optionPointer); ?>" name="<?php echo e($field['name']); ?>" value="<?php echo e($value); ?>" <?php echo e($optionValue == $value ? ' checked': ''); ?>> <?php echo $label; ?>

                </label>
            </div>

            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>

</div>
