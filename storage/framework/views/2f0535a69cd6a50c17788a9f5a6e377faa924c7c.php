<?php if($crud->reorder): ?>
	<?php if($crud->hasAccess('reorder')): ?>
	  <a href="<?php echo e(url($crud->route.'/reorder')); ?>" class="btn btn-default ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-arrows"></i> <?php echo e(trans('backpack::crud.reorder')); ?> <?php echo e($crud->entity_name_plural); ?></span></a>
	<?php endif; ?>
<?php endif; ?>