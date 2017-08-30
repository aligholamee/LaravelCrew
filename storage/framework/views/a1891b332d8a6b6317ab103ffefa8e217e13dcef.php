<!-- select -->

<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >

    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::inc.field_translatable_icon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php $entity_model = $crud->model; ?>
    <select
        name="<?php echo e($field['name']); ?>"
        <?php echo $__env->make('crud::inc.field_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        >

        <?php if($entity_model::isColumnNullable($field['name'])): ?>
            <option value="">-</option>
        <?php endif; ?>

            <?php if(isset($field['model'])): ?>
                <?php $__currentLoopData = $field['model']::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $connected_entity_entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($connected_entity_entry->getKey()); ?>"

                        <?php if( ( old($field['name']) && old($field['name']) == $connected_entity_entry->getKey() ) || (!old($field['name']) && isset($field['value']) && $connected_entity_entry->getKey()==$field['value'])): ?>

                             selected
                        <?php endif; ?>
                    ><?php echo e($connected_entity_entry->{$field['attribute']}); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
    </select>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>

</div>