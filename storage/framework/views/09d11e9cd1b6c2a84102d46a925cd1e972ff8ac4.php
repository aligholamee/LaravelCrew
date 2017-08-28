<?php if($crud->hasAccess('show')): ?>
	<a href="<?php echo e(url($crud->route.'/'.$entry->getKey())); ?>" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> <?php echo e(trans('backpack::crud.preview')); ?></a>
<?php endif; ?>