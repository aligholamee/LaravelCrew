<?php if($crud->hasAccess('revisions') && count($entry->revisionHistory)): ?>
    <a href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/revisions')); ?>" class="btn btn-xs btn-default"><i class="fa fa-history"></i> <?php echo e(trans('backpack::crud.revisions')); ?></a>
<?php endif; ?>
