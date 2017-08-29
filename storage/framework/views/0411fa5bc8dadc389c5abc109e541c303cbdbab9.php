
<td data-order="<?php echo e($entry->{$column['name']}); ?>">
    <?php if(!empty($entry->{$column['name']})): ?>
	<?php echo e(Date::parse($entry->{$column['name']})->format(config('backpack.base.default_datetime_format'))); ?>

    <?php endif; ?>
</td>