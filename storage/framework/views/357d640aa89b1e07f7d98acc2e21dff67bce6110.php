
<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($field['name'] == 'house_uuid' && array_key_exists('house_uuid', $_GET)): ?>
        <?php 
        $field['value'] = $_GET['house_uuid'];
         ?>
        
    <?php endif; ?>
    <?php if($field['name'] == 'user_uuid'): ?>
        <?php 
        $field['value'] = Auth::user()->uuid;
         ?>
    <?php endif; ?>
    <?php if($field['name'] == 'door_uuid' && array_key_exists('door_uuid', $_GET)): ?>
        <?php 
        $field['value'] = $_GET['door_uuid'];
         ?>
     <?php endif; ?>
    <?php if($field['name'] == 'generator_uuid'): ?>
        <?php 
        $field['value'] = Auth::user()->uuid;
         ?>
    <?php endif; ?>
    <?php if($field['name'] == 'value'): ?>
        <?php 
        $field['value'] = rand(121212,898989);
         ?>
    <?php endif; ?>
    <!-- load the view from the application if it exists, otherwise load the one in the package -->
    <?php if(view()->exists('vendor.backpack.crud.fields.'.$field['type'])): ?>
        <?php echo $__env->make('vendor.backpack.crud.fields.'.$field['type'], array('field' => $field), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('crud::fields.'.$field['type'], array('field' => $field), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
