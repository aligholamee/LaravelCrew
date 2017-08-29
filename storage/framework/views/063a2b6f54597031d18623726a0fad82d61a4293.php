<?php $__env->startSection('header'); ?>
	<section class="content-header">
	  <h1>
	    <?php echo e(trans('backpack::crud.edit')); ?> <span><?php echo e($crud->entity_name); ?></span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo e(url(config('backpack.base.route_prefix'),'dashboard')); ?>"><?php echo e(trans('backpack::crud.admin')); ?></a></li>
	    <li><a href="<?php echo e(url($crud->route)); ?>" class="text-capitalize"><?php echo e($crud->entity_name_plural); ?></a></li>
	    <li class="active"><?php echo e(trans('backpack::crud.edit')); ?></li>
	  </ol>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<!-- Default box -->
		<?php if($crud->hasAccess('list')): ?>
			<a href="<?php echo e(url($crud->route)); ?>"><i class="fa fa-angle-double-left"></i> <?php echo e(trans('backpack::crud.back_to_all')); ?> <span><?php echo e($crud->entity_name_plural); ?></span></a><br><br>
		<?php endif; ?>

		<?php echo $__env->make('crud::inc.grouped_errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		  <?php echo Form::open(array('url' => $crud->route.'/'.$entry->getKey(), 'method' => 'put', 'files'=>$crud->hasUploadFields('update', $entry->getKey()))); ?>

		  <div class="box">
		    <div class="box-header with-border">
		    	<?php if($crud->model->translationEnabled()): ?>
			    	<!-- Single button -->
					<div class="btn-group pull-right">
					  <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <?php echo e(trans('backpack::crud.language')); ?>: <?php echo e($crud->model->getAvailableLocales()[$crud->request->input('locale')?$crud->request->input('locale'):App::getLocale()]); ?> <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu">
					  	<?php $__currentLoopData = $crud->model->getAvailableLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  	<li><a href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>?locale=<?php echo e($key); ?>"><?php echo e($locale); ?></a></li>
					  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  </ul>
					</div>
					<h3 class="box-title" style="line-height: 30px;"><?php echo e(trans('backpack::crud.edit')); ?></h3>
				<?php else: ?>
					<h3 class="box-title"><?php echo e(trans('backpack::crud.edit')); ?></h3>
				<?php endif; ?>
		    </div>
		    <div class="box-body row">
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      <?php if(view()->exists('vendor.backpack.crud.form_content')): ?>
		      	<?php echo $__env->make('vendor.backpack.crud.form_content', ['fields' => $fields, 'action' => 'edit'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		      <?php else: ?>
		      	<?php echo $__env->make('crud::form_content', ['fields' => $fields, 'action' => 'edit'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		      <?php endif; ?>
		    </div><!-- /.box-body -->

            <div class="box-footer">

                <?php echo $__env->make('crud::inc.form_save_buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
		  <?php echo Form::close(); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backpack::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>