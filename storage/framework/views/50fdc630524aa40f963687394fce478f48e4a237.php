<!-- view field -->

<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >
  <?php echo $__env->make($field['view'], compact('crud', 'entry', 'field'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
