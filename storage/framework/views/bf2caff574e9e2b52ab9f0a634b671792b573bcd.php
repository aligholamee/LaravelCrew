<?php if($crud->hasAccess('delete')): ?>
	<a href="<?php echo e(url($crud->route.'/'.$entry->getKey())); ?>" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-trash"></i> <?php echo e(trans('backpack::crud.delete')); ?></a>
<?php endif; ?>