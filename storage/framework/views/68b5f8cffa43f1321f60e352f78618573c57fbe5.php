<!-- dependencyJson -->
<div class="form-group col-md-12 checklist_dependency"  data-entity ="<?php echo e($field['field_unique_name']); ?>" <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>>
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::inc.field_translatable_icon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php
        $entity_model = $crud->getModel();

        //short name for dependency fields
        $primary_dependency = $field['subfields']['primary'];
        $secondary_dependency = $field['subfields']['secondary'];


        //all items with relation
        $dependencies = $primary_dependency['model']::with($primary_dependency['entity_secondary'])->get();

        $dependencyArray = [];

        //convert dependency array to simple matrix ( prymary id as key and array with secondaries id )
        foreach ($dependencies as $primary) {
            $dependencyArray[$primary->id] = [];
            foreach ($primary->{$primary_dependency['entity_secondary']} as $secondary) {
                $dependencyArray[$primary->id][] = $secondary->id;
            }
        }

      //for update form, get initial state of the entity
      if( isset($id) && $id ){

        //get entity with relations for primary dependency
        $entity_dependencies = $entity_model->with($primary_dependency['entity'])
          ->with($primary_dependency['entity'].'.'.$primary_dependency['entity_secondary'])
          ->find($id);

            $secondaries_from_primary = [];

            //convert relation in array
            $primary_array = $entity_dependencies->{$primary_dependency['entity']}->toArray();

            $secondary_ids = [];

            //create secondary dependency from primary relation, used to check what chekbox must be check from second checklist
            if (old($primary_dependency['name'])) {
                foreach (old($primary_dependency['name']) as $primary_item) {
                    foreach ($dependencyArray[$primary_item] as $second_item) {
                        $secondary_ids[$second_item] = $second_item;
                    }
                }
            } else { //create dependecies from relation if not from validate error
                foreach ($primary_array as $primary_item) {
                    foreach ($primary_item[$secondary_dependency['entity']] as $second_item) {
                        $secondary_ids[$second_item['id']] = $second_item['id'];
                    }
                }
            }
        }

        //json encode of dependency matrix
        $dependencyJson = json_encode($dependencyArray);
    ?>
    <script>
        var  <?php echo e($field['field_unique_name']); ?> = <?php echo $dependencyJson; ?>;
    </script>

    <div class="row" >

        <div class="col-xs-12">
            <label><?php echo $primary_dependency['label']; ?></label>
        </div>

        <div class="hidden_fields_primary" data-name = "<?php echo e($primary_dependency['name']); ?>">
        <?php if(isset($field['value'])): ?>
            <?php if(old($primary_dependency['name'])): ?>
                <?php $__currentLoopData = old($primary_dependency['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="primary_hidden" name="<?php echo e($primary_dependency['name']); ?>[]" value="<?php echo e($item); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php $__currentLoopData = $field['value'][0]->pluck('id', 'id')->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="primary_hidden" name="<?php echo e($primary_dependency['name']); ?>[]" value="<?php echo e($item); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          <?php endif; ?>
        </div>

    <?php $__currentLoopData = $primary_dependency['model']::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $connected_entity_entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-<?php echo e(isset($primary_dependency['number_columns']) ? intval(12/$primary_dependency['number_columns']) : '4'); ?>">
            <div class="checkbox">
                <label>
                    <input type="checkbox"
                        data-id = "<?php echo e($connected_entity_entry->id); ?>"
                        class = 'primary_list'
                        <?php $__currentLoopData = $primary_dependency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(is_string($attribute) && $attribute != 'value'): ?>
                                <?php if($attribute=='name'): ?>
                                <?php echo e($attribute); ?>="<?php echo e($value); ?>_show[]"
                                <?php else: ?>
                                <?php echo e($attribute); ?>="<?php echo e($value); ?>"
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        value="<?php echo e($connected_entity_entry->id); ?>"

                        <?php if( ( isset($field['value']) && is_array($field['value']) && in_array($connected_entity_entry->id, $field['value'][0]->pluck('id', 'id')->toArray())) || ( old($primary_dependency["name"]) && in_array($connected_entity_entry->id, old( $primary_dependency["name"])) ) ): ?>
                        checked = "checked"
                        <?php endif; ?> >
                        <?php echo e($connected_entity_entry->{$primary_dependency['attribute']}); ?>

                </label>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <label><?php echo $secondary_dependency['label']; ?></label>
        </div>

        <div class="hidden_fields_secondary" data-name="<?php echo e($secondary_dependency['name']); ?>">
          <?php if(isset($field['value'])): ?>
            <?php if(old($secondary_dependency['name'])): ?>
              <?php $__currentLoopData = old($secondary_dependency['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="secondary_hidden" name="<?php echo e($secondary_dependency['name']); ?>[]" value="<?php echo e($item); ?>">
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <?php $__currentLoopData = $field['value'][1]->pluck('id', 'id')->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="secondary_hidden" name="<?php echo e($secondary_dependency['name']); ?>[]" value="<?php echo e($item); ?>">
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          <?php endif; ?>
        </div>

        <?php $__currentLoopData = $secondary_dependency['model']::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $connected_entity_entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-<?php echo e(isset($secondary_dependency['number_columns']) ? intval(12/$secondary_dependency['number_columns']) : '4'); ?>">
                <div class="checkbox">
                    <label>
                    <input type="checkbox"
                        class = 'secondary_list'
                        data-id = "<?php echo e($connected_entity_entry->id); ?>"
                        <?php $__currentLoopData = $secondary_dependency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(is_string($attribute) && $attribute != 'value'): ?>
                              <?php if($attribute=='name'): ?>
                                <?php echo e($attribute); ?>="<?php echo e($value); ?>_show[]"
                              <?php else: ?>
                                <?php echo e($attribute); ?>="<?php echo e($value); ?>"
                              <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         value="<?php echo e($connected_entity_entry->id); ?>"

                        <?php if( ( isset($field['value']) && is_array($field['value']) && (  in_array($connected_entity_entry->id, $field['value'][1]->pluck('id', 'id')->toArray()) || isset( $secondary_ids[$connected_entity_entry->id])) || ( old($secondary_dependency['name']) &&   in_array($connected_entity_entry->id, old($secondary_dependency['name'])) ))): ?>
                             checked = "checked"
                             <?php if(isset( $secondary_ids[$connected_entity_entry->id])): ?>
                              disabled = disabled
                             <?php endif; ?>
                        <?php endif; ?> > <?php echo e($connected_entity_entry->{$secondary_dependency['attribute']}); ?>

                    </label>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>

  </div>




<?php if($crud->checkIfFieldIsFirstOfItsType($field, $fields)): ?>

    
    <?php $__env->startPush('crud_fields_styles'); ?>
    <?php $__env->stopPush(); ?>

    
    <?php $__env->startPush('crud_fields_scripts'); ?>
    <!-- include checklist_dependency js-->
    <script>
      jQuery(document).ready(function($) {

        $('.checklist_dependency').each(function(index, item){

          var unique_name = $(this).data('entity');
          var dependencyJson = window[unique_name];

          var thisField = $(this);
          thisField.find('.primary_list').change(function(){

            var idCurrent = $(this).data('id');
            if($(this).is(':checked')){

              //add hidden field with this value
              var nameInput = thisField.find('.hidden_fields_primary').data('name');
              var inputToAdd = $('<input type="hidden" class="primary_hidden" name="'+nameInput+'[]" value="'+idCurrent+'">');

              thisField.find('.hidden_fields_primary').append(inputToAdd);

              $.each(dependencyJson[idCurrent], function(key, value){
                //check and disable secondies checkbox
                thisField.find('input.secondary_list[value="'+value+'"]').prop( "checked", true );
                thisField.find('input.secondary_list[value="'+value+'"]').prop( "disabled", true );
                //remove hidden fields with secondary dependency if was setted
                var hidden = thisField.find('input.secondary_hidden[value="'+value+'"]');
                if(hidden)
                  hidden.remove();
              });

            }else{
              //remove hidden field with this value
              thisField.find('input.primary_hidden[value="'+idCurrent+'"]').remove();

              // uncheck and active secondary checkboxs if are not in other selected primary.

              var secondary = dependencyJson[idCurrent];

              var selected = [];
              thisField.find('input.primary_hidden').each(function (index, input){
                selected.push( $(this).val() );
              });

              $.each(secondary, function(index, secondaryItem){
                var ok = 1;

                $.each(selected, function(index2, selectedItem){
                  if( dependencyJson[selectedItem].indexOf(secondaryItem) != -1 ){
                    ok =0;
                  }
                });

                if(ok){
                  thisField.find('input.secondary_list[value="'+secondaryItem+'"]').prop('checked', false);
                  thisField.find('input.secondary_list[value="'+secondaryItem+'"]').prop('disabled', false);
                }
              });

            }
          });


          thisField.find('.secondary_list').click(function(){

            var idCurrent = $(this).data('id');
            if($(this).is(':checked')){
              //add hidden field with this value
              var nameInput = thisField.find('.hidden_fields_secondary').data('name');
              var inputToAdd = $('<input type="hidden" class="secondary_hidden" name="'+nameInput+'[]" value="'+idCurrent+'">');

              thisField.find('.hidden_fields_secondary').append(inputToAdd);

            }else{
              //remove hidden field with this value
              thisField.find('input.secondary_hidden[value="'+idCurrent+'"]').remove();
            }
          });

        });
      });
    </script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>


