<?php if($crud->hasAccess('update')): ?>
	<?php if(!$crud->model->translationEnabled()): ?>
			<!-- Single edit button -->
			<a href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> <?php echo e(trans('backpack::crud.edit')); ?></a>
		<?php if($crud->entity_name == 'House'): ?>
			<a href="<?php echo e(url(config('backpack.base.route_prefix'), 'Door')); ?>?house_uuid=<?php echo e($entry->uuid); ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Manage Doors </a>
		<?php endif; ?> 	
		<?php if($crud->entity_name == 'Door'): ?>
		<a href="<?php echo e(url(config('backpack.base.route_prefix'), 'Token')); ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Manage Tokens </a>
    <?php endif; ?>
	<?php else: ?>
	<!-- Edit button group -->
	<div class="btn-group">
	  <a href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> <?php echo e(trans('backpack::crud.edit')); ?></a>
	  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <span class="caret"></span>
	    <span class="sr-only">Toggle Dropdown</span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
  	    <li class="dropdown-header"><?php echo e(trans('backpack::crud.edit_translations')); ?>:</li>
	  	<?php $__currentLoopData = $crud->model->getAvailableLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  	<li><a href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>?locale=<?php echo e($key); ?>"><?php echo e($locale); ?></a></li>
	  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  </ul>
	</div>

	<?php endif; ?>
<?php endif; ?>