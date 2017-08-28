<?php if($crud->hasAccess('create')): ?>
	<?php if($crud->entity_name == 'Door'): ?>
	<a href="<?php echo e(url($crud->route.'/create')); ?>?house_uuid=$_GET['house_uuid']" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> <?php echo e(trans('backpack::crud.add')); ?> <?php echo e($crud->entity_name); ?></span></a>
	<?php elseif($crud->entity_name == 'Token'): ?>
	<a href="<?php echo e(url($crud->route.'/create')); ?>?door_uuid=$_GET['door_uuid']" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> <?php echo e(trans('backpack::crud.add')); ?> <?php echo e($crud->entity_name); ?></span></a>
	<?php else: ?>
	<a href="<?php echo e(url($crud->route.'/create')); ?>" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> <?php echo e(trans('backpack::crud.add')); ?> <?php echo e($crud->entity_name); ?></span></a>
	<?php endif; ?>
<?php endif; ?>