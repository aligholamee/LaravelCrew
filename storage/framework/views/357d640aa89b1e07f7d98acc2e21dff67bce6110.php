
<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($field['name'] == 'house_uuid'): ?>
        <?php 
        $field['value'] = $_GET['house_uuid'];
         ?>
    <?php endif; ?>
    <?php if($field['name'] == 'user_uuid'): ?>
        <?php 
        $field['value'] = Auth::user()->uuid;
         ?>
    <?php endif; ?>
    <?php if($field['name'] == 'door_uuid'): ?>
        <?php 
        $field['value'] = $_GET['door_uuid'];
         ?>
     <?php endif; ?>
    <?php if($field['name'] == 'Generator_uuid'): ?>
        <?php 
        $field['value'] = Auth::user()->uuid;
         ?>
    <?php endif; ?>
    <!-- load the view from the application if it exists, otherwise load the one in the package -->
    <?php if(view()->exists('vendor.backpack.crud.fields.'.$field['type'])): ?>
        <?php echo $__env->make('vendor.backpack.crud.fields.'.$field['type'], array('field' => $field), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('crud::fields.'.$field['type'], array('field' => $field), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>