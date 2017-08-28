@if ($crud->hasAccess('create'))
	@if($crud->entity_name == 'Door')
	<a href="{{ url($crud->route.'/create') }}?house_uuid=$_GET['house_uuid']" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> {{ trans('backpack::crud.add') }} {{ $crud->entity_name }}</span></a>
	@else
	<a href="{{ url($crud->route.'/create') }}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> {{ trans('backpack::crud.add') }} {{ $crud->entity_name }}</span></a>
	@endif
@endif