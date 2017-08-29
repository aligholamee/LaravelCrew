<!-- CKeditor -->
<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::inc.field_translatable_icon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <textarea
    	id="ckeditor-<?php echo e($field['name']); ?>"
        name="<?php echo e($field['name']); ?>"
        <?php echo $__env->make('crud::inc.field_attributes', ['default_class' => 'form-control ckeditor'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    	><?php echo e(old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' ))); ?></textarea>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
</div>





<?php if($crud->checkIfFieldIsFirstOfItsType($field, $fields)): ?>

    
    <?php $__env->startPush('crud_fields_styles'); ?>
    <?php $__env->stopPush(); ?>

    
    <?php $__env->startPush('crud_fields_scripts'); ?>
        <script src="<?php echo e(asset('vendor/backpack/ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/backpack/ckeditor/adapters/jquery.js')); ?>"></script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>


<?php $__env->startPush('crud_fields_scripts'); ?>
<script>
    jQuery(document).ready(function($) {
        $('textarea[name="<?php echo e($field['name']); ?>"].ckeditor').ckeditor({
            "filebrowserBrowseUrl": "<?php echo e(url(config('backpack.base.route_prefix').'/elfinder/ckeditor')); ?>",
            "extraPlugins" : '<?php echo e(isset($field['extra_plugins']) ? implode(',', $field['extra_plugins']) : 'oembed,widget'); ?>'
        });
    });
</script>
<?php $__env->stopPush(); ?>



