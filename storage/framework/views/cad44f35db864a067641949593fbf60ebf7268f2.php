<?php $__env->startSection('header'); ?>
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize"><?php echo e($crud->entity_name_plural); ?></span>
	    <small><?php echo e(trans('backpack::crud.all')); ?> <span><?php echo e($crud->entity_name_plural); ?></span> <?php echo e(trans('backpack::crud.in_the_database')); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo e(url(config('backpack.base.route_prefix'), 'dashboard')); ?>"><?php echo e(trans('backpack::crud.admin')); ?></a></li>
	    <li><a href="<?php echo e(url($crud->route)); ?>" class="text-capitalize"><?php echo e($crud->entity_name_plural); ?></a></li>
	    <li class="active"><?php echo e(trans('backpack::crud.list')); ?></li>
	  </ol>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Default box -->
  <div class="row">

    <!-- THE ACTUAL CONTENT -->
    <div class="col-md-12">
      <div class="box">
        <div class="box-header <?php echo e($crud->hasAccess('create')?'with-border':''); ?>">

          <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'top'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <div id="datatable_button_stack" class="pull-right text-right"></div>
        </div>

        <div class="box-body table-responsive">

        
        <?php if($crud->filtersEnabled()): ?>
          <?php echo $__env->make('crud::inc.filters_navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        <table id="crudTable" class="table table-bordered table-striped display">
            <thead>
              <tr>
                <?php if($crud->details_row): ?>
                  <th data-orderable="false"></th> <!-- expand/minimize button column -->
                <?php endif; ?>

                
                <?php $__currentLoopData = $crud->columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th><?php echo e($column['label']); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if( $crud->buttons->where('stack', 'line')->count() ): ?>
                  <th><?php echo e(trans('backpack::crud.actions')); ?></th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>

              <?php if(!$crud->ajaxTable()): ?>
                <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-entry-id="<?php echo e($entry->getKey()); ?>">

                  <?php if($crud->details_row): ?>
                    <?php echo $__env->make('crud::columns.details_row_button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <?php endif; ?>

                  
                  <?php $__currentLoopData = $crud->columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!isset($column['type'])): ?>
                      <?php echo $__env->make('crud::columns.text', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php else: ?>
                      <?php if(view()->exists('vendor.backpack.crud.columns.'.$column['type'])): ?>
                        <?php echo $__env->make('vendor.backpack.crud.columns.'.$column['type'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <?php else: ?>
                        <?php if(view()->exists('crud::columns.'.$column['type'])): ?>
                          <?php echo $__env->make('crud::columns.'.$column['type'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                          <?php echo $__env->make('crud::columns.text', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php if($crud->buttons->where('stack', 'line')->count()): ?>
                    <td>
                      <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'line'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </td>
                  <?php endif; ?>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

            </tbody>
            <tfoot>
              <tr>
                <?php if($crud->details_row): ?>
                  <th></th> <!-- expand/minimize button column -->
                <?php endif; ?>

                
                <?php $__currentLoopData = $crud->columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th><?php echo e($column['label']); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if( $crud->buttons->where('stack', 'line')->count() ): ?>
                  <th><?php echo e(trans('backpack::crud.actions')); ?></th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>

        </div><!-- /.box-body -->

        <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'bottom'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      </div><!-- /.box -->
    </div>

  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_styles'); ?>
  <!-- DATA TABLES -->
  <link href="<?php echo e(asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(asset('vendor/backpack/crud/css/crud.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/backpack/crud/css/form.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/backpack/crud/css/list.css')); ?>">

  <!-- CRUD LIST CONTENT - crud_list_styles stack -->
  <?php echo $__env->yieldPushContent('crud_list_styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>
  	<!-- DATA TABLES SCRIPT -->
    <script src="<?php echo e(asset('vendor/adminlte/plugins/datatables/jquery.dataTables.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('vendor/backpack/crud/js/crud.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/backpack/crud/js/form.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/backpack/crud/js/list.js')); ?>"></script>

    <?php if($crud->exportButtons()): ?>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js" type="text/javascript"></script>
    <?php endif; ?>

    <script src="<?php echo e(asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.js')); ?>" type="text/javascript"></script>

	<script type="text/javascript">
	  jQuery(document).ready(function($) {

      <?php if($crud->exportButtons()): ?>
      var dtButtons = function(buttons){
          var extended = [];
          for(var i = 0; i < buttons.length; i++){
          var item = {
              extend: buttons[i],
              exportOptions: {
              columns: [':visible']
              }
          };
          switch(buttons[i]){
              case 'pdfHtml5':
              item.orientation = 'landscape';
              break;
          }
          extended.push(item);
          }
          return extended;
      }
      <?php endif; ?>

	  	var table = $("#crudTable").DataTable({
        "pageLength": <?php echo e($crud->getDefaultPageLength()); ?>,
        /* Disable initial sort */
        "aaSorting": [],
        "language": {
              "emptyTable":     "<?php echo e(trans('backpack::crud.emptyTable')); ?>",
              "info":           "<?php echo e(trans('backpack::crud.info')); ?>",
              "infoEmpty":      "<?php echo e(trans('backpack::crud.infoEmpty')); ?>",
              "infoFiltered":   "<?php echo e(trans('backpack::crud.infoFiltered')); ?>",
              "infoPostFix":    "<?php echo e(trans('backpack::crud.infoPostFix')); ?>",
              "thousands":      "<?php echo e(trans('backpack::crud.thousands')); ?>",
              "lengthMenu":     "<?php echo e(trans('backpack::crud.lengthMenu')); ?>",
              "loadingRecords": "<?php echo e(trans('backpack::crud.loadingRecords')); ?>",
              "processing":     "<?php echo e(trans('backpack::crud.processing')); ?>",
              "search":         "<?php echo e(trans('backpack::crud.search')); ?>",
              "zeroRecords":    "<?php echo e(trans('backpack::crud.zeroRecords')); ?>",
              "paginate": {
                  "first":      "<?php echo e(trans('backpack::crud.paginate.first')); ?>",
                  "last":       "<?php echo e(trans('backpack::crud.paginate.last')); ?>",
                  "next":       "<?php echo e(trans('backpack::crud.paginate.next')); ?>",
                  "previous":   "<?php echo e(trans('backpack::crud.paginate.previous')); ?>"
              },
              "aria": {
                  "sortAscending":  "<?php echo e(trans('backpack::crud.aria.sortAscending')); ?>",
                  "sortDescending": "<?php echo e(trans('backpack::crud.aria.sortDescending')); ?>"
              },
              "buttons": {
                  "copy":   "<?php echo e(trans('backpack::crud.export.copy')); ?>",
                  "excel":  "<?php echo e(trans('backpack::crud.export.excel')); ?>",
                  "csv":    "<?php echo e(trans('backpack::crud.export.csv')); ?>",
                  "pdf":    "<?php echo e(trans('backpack::crud.export.pdf')); ?>",
                  "print":  "<?php echo e(trans('backpack::crud.export.print')); ?>",
                  "colvis": "<?php echo e(trans('backpack::crud.export.column_visibility')); ?>"
              },
          },

          <?php if($crud->ajaxTable()): ?>
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "<?php echo url($crud->route.'/search').'?'.Request::getQueryString(); ?>",
              "type": "POST"
          },
          <?php endif; ?>

          <?php if($crud->exportButtons()): ?>
          // show the export datatable buttons
          dom: '<"p-l-0 col-md-6"l>B<"p-r-0 col-md-6"f>rt<"col-md-6 p-l-0"i><"col-md-6 p-r-0"p>',
          buttons: dtButtons([
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print',
            'colvis'
          ]),
          <?php endif; ?>
      });

      <?php if($crud->exportButtons()): ?>
      // move the datatable buttons in the top-right corner and make them smaller
      table.buttons().each(function(button) {
        if (button.node.className.indexOf('buttons-columnVisibility') == -1)
        {
          button.node.className = button.node.className + " btn-sm";
        }
      })
      $(".dt-buttons").appendTo($('#datatable_button_stack' ));
      <?php endif; ?>

      $.ajaxPrefilter(function(options, originalOptions, xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-XSRF-TOKEN', token);
          }
      });

      // make the delete button work in the first result page
      register_delete_button_action();

      // make the delete button work on subsequent result pages
      $('#crudTable').on( 'draw.dt',   function () {
         register_delete_button_action();

         <?php if($crud->details_row): ?>
          register_details_row_button_action();
         <?php endif; ?>
      } ).dataTable();

      function register_delete_button_action() {
        $("[data-button-type=delete]").unbind('click');
        // CRUD Delete
        // ask for confirmation before deleting an item
        $("[data-button-type=delete]").click(function(e) {
          e.preventDefault();
          var delete_button = $(this);
          var delete_url = $(this).attr('href');

          if (confirm("<?php echo e(trans('backpack::crud.delete_confirm')); ?>") == true) {
              $.ajax({
                  url: delete_url,
                  type: 'DELETE',
                  success: function(result) {
                      // Show an alert with the result
                      new PNotify({
                          title: "<?php echo e(trans('backpack::crud.delete_confirmation_title')); ?>",
                          text: "<?php echo e(trans('backpack::crud.delete_confirmation_message')); ?>",
                          type: "success"
                      });
                      // delete the row from the table
                      delete_button.parentsUntil('tr').parent().remove();
                  },
                  error: function(result) {
                      // Show an alert with the result
                      new PNotify({
                          title: "<?php echo e(trans('backpack::crud.delete_confirmation_not_title')); ?>",
                          text: "<?php echo e(trans('backpack::crud.delete_confirmation_not_message')); ?>",
                          type: "warning"
                      });
                  }
              });
          } else {
              new PNotify({
                  title: "<?php echo e(trans('backpack::crud.delete_confirmation_not_deleted_title')); ?>",
                  text: "<?php echo e(trans('backpack::crud.delete_confirmation_not_deleted_message')); ?>",
                  type: "info"
              });
          }
        });
      }


      <?php if($crud->details_row): ?>
      function register_details_row_button_action() {
        // var crudTable = $('#crudTable tbody');
        // Remove any previously registered event handlers from draw.dt event callback
        $('#crudTable tbody').off('click', 'td .details-row-button');

        // Make sure the ajaxDatatables rows also have the correct classes
        $('#crudTable tbody td .details-row-button').parent('td')
          .removeClass('details-control').addClass('details-control')
          .removeClass('text-center').addClass('text-center')
          .removeClass('cursor-pointer').addClass('cursor-pointer');

        // Add event listener for opening and closing details
        $('#crudTable tbody td.details-control').on('click', function () {
            var tr = $(this).closest('tr');
            var btn = $(this).find('.details-row-button');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                btn.removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
                $('div.table_row_slider', row.child()).slideUp( function () {
                    row.child.hide();
                    tr.removeClass('shown');
                } );
            }
            else {
                // Open this row
                btn.removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
                // Get the details with ajax
                $.ajax({
                  url: '<?php echo e(url($crud->route)); ?>/'+btn.data('entry-id')+'/details',
                  type: 'GET',
                  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                  // data: {param1: 'value1'},
                })
                .done(function(data) {
                  // console.log("-- success getting table extra details row with AJAX");
                  row.child("<div class='table_row_slider'>" + data + "</div>", 'no-padding').show();
                  tr.addClass('shown');
                  $('div.table_row_slider', row.child()).slideDown();
                  register_delete_button_action();
                })
                .fail(function(data) {
                  // console.log("-- error getting table extra details row with AJAX");
                  row.child("<div class='table_row_slider'><?php echo e(trans('backpack::crud.details_row_loading_error')); ?></div>").show();
                  tr.addClass('shown');
                  $('div.table_row_slider', row.child()).slideDown();
                })
                .always(function(data) {
                  // console.log("-- complete getting table extra details row with AJAX");
                });
            }
        } );
      }

      register_details_row_button_action();
      <?php endif; ?>


	  });
	</script>

  <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
  <?php echo $__env->yieldPushContent('crud_list_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backpack::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>