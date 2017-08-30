<!-- Simple MDE - Markdown Editor -->
<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::inc.field_translatable_icon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <textarea
    	id="simplemde_<?php echo e($field['name']); ?>"
        name="<?php echo e($field['name']); ?>"
        <?php echo $__env->make('crud::inc.field_attributes', ['default_class' => 'form-control'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    	><?php echo e(old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' ))); ?></textarea>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
</div>





<?php if($crud->checkIfFieldIsFirstOfItsType($field, $fields)): ?>

    
    <?php $__env->startPush('crud_fields_styles'); ?>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <style type="text/css">
        .CodeMirror-fullscreen, .editor-toolbar.fullscreen {
            z-index: 9999 !important;
        }
        .CodeMirror{
        	min-height: auto !important;
        }
        </style>
    <?php $__env->stopPush(); ?>

    
    <?php $__env->startPush('crud_fields_scripts'); ?>
        <script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>

<?php $__env->startPush('crud_fields_scripts'); ?>
<script>
    var simplemde_<?php echo e($field['name']); ?> = new SimpleMDE({
    	element: $("#simplemde_<?php echo e($field['name']); ?>")[0],
    	<?php if(isset($field['simplemdeAttributes'])): ?>
    		<?php $__currentLoopData = $field['simplemdeAttributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<?php echo e($index); ?> : <?php if(is_bool($value)): ?> <?php echo e(($value?'true':'false')); ?> <?php else: ?> <?php echo '"'.$value.'"'; ?> <?php endif; ?>,
    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	<?php endif; ?>
    	<?php echo isset($field['simplemdeAttributesRaw']) ? $field['simplemdeAttributesRaw'] : ""; ?>

    });
    simplemde_<?php echo e($field['name']); ?>.options.minHeight = simplemde_<?php echo e($field['name']); ?>.options.minHeight || "300px";
    simplemde_<?php echo e($field['name']); ?>.codemirror.getScrollerElement().style.minHeight = simplemde_<?php echo e($field['name']); ?>.options.minHeight;
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    	setTimeout(function() { simplemde_<?php echo e($field['name']); ?>.codemirror.refresh(); }, 10);
    });
</script>
<?php $__env->stopPush(); ?>


