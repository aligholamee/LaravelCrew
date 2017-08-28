<?php if($crud->model->translationEnabled()): ?>
<input type="hidden" name="locale" value=<?php echo e($crud->request->input('locale')?$crud->request->input('locale'):App::getLocale()); ?>>
<?php endif; ?>


<?php if($crud->tabsEnabled()): ?>
    <?php echo $__env->make('crud::inc.show_tabbed_fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('crud::inc.show_fields', ['fields' => $fields], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>



<?php $__env->startSection('after_styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/backpack/crud/css/crud.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/backpack/crud/css/form.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/backpack/crud/css/'.$action.'.css')); ?>">

    <!-- CRUD FORM CONTENT - crud_fields_styles stack -->
    <?php echo $__env->yieldPushContent('crud_fields_styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>
    <script src="<?php echo e(asset('vendor/backpack/crud/js/crud.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/backpack/crud/js/form.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/backpack/crud/js/'.$action.'.js')); ?>"></script>

    <!-- CRUD FORM CONTENT - crud_fields_scripts stack -->
    <?php echo $__env->yieldPushContent('crud_fields_scripts'); ?>

    <script>
    jQuery('document').ready(function($){

      // Save button has multiple actions: save and exit, save and edit, save and new
      var saveActions = $('#saveActions'),
      crudForm        = saveActions.parents('form'),
      saveActionField = $('[name="save_action"]');

      saveActions.on('click', '.dropdown-menu a', function(){
          var saveAction = $(this).data('value');
          saveActionField.val( saveAction );
          crudForm.submit();
      });

      // Ctrl+S and Cmd+S trigger Save button click
      $(document).keydown(function(e) {
          if ((e.which == '115' || e.which == '83' ) && (e.ctrlKey || e.metaKey))
          {
              e.preventDefault();
              // alert("Ctrl-s pressed");
              $("button[type=submit]").trigger('click');
              return false;
          }
          return true;
      });

      // Place the focus on the first element in the form
      <?php if( $crud->autoFocusOnFirstField ): ?>
        <?php 
          $focusField = array_first($fields, function($field) {
              return isset($field['auto_focus']) && $field['auto_focus'] == true;
          });
         ?>

        <?php if($focusField): ?>
          window.focusField = $('[name="<?php echo e($focusField['name']); ?>"]').eq(0),
        <?php else: ?>
          var focusField = $('form').find('input, textarea, select').not('[type="hidden"]').eq(0),
        <?php endif; ?>

        fieldOffset = focusField.offset().top,
        scrollTolerance = $(window).height() / 2;

        focusField.trigger('focus');

        if( fieldOffset > scrollTolerance ){
            $('html, body').animate({scrollTop: (fieldOffset - 30)});
        }
      <?php endif; ?>

      // Add inline errors to the DOM
      <?php if($crud->inlineErrorsEnabled() && $errors->any()): ?>

        window.errors = <?php echo json_encode($errors->messages()); ?>;
        // console.error(window.errors);

        $.each(errors, function(property, messages){

            var field = $('[name="' + property + '[]"]').length ?
                        $('[name="' + property + '[]"]') :
                        $('[name="' + property + '"]'),
                container = field.parents('.form-group');

            console.log(field);

            container.addClass('has-error');

            $.each(messages, function(key, msg){
                // highlight the input that errored
                var row = $('<div class="help-block">' + msg + '</div>');
                row.appendTo(container);

                // highlight its parent tab
                <?php if($crud->tabsEnabled()): ?>
                var tab_id = $(container).parent().attr('id');
                $("#form_tabs [aria-controls="+tab_id+"]").addClass('text-red');
                <?php endif; ?>
            });
        });

      <?php endif; ?>

      });
    </script>
<?php $__env->stopSection(); ?>
