@if ($crud->hasAccess('update'))
	@if (!$crud->model->translationEnabled())
			<!-- Single edit button -->
			<a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> {{ trans('backpack::crud.edit') }}</a>
		@if ($crud->entity_name == 'House')
			<a href="{{ url(config('backpack.base.route_prefix'), 'Door') }}?house_uuid={{$entry->uuid}}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Manage Doors </a>
		@endif 	
		@if ($crud->entity_name == 'Door')
		<a href="{{ url(config('backpack.base.route_prefix'), 'Token') }}?door_uuid={{$entry->uuid}}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Generate Token </a>
		@endif
		
	@else
	<!-- Edit button group -->
	<div class="btn-group">
	  <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> {{ trans('backpack::crud.edit') }}</a>
	  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <span class="caret"></span>
	    <span class="sr-only">Toggle Dropdown</span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
  	    <li class="dropdown-header">{{ trans('backpack::crud.edit_translations') }}:</li>
	  	@foreach ($crud->model->getAvailableLocales() as $key => $locale)
		  	<li><a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}?locale={{ $key }}">{{ $locale }}</a></li>
	  	@endforeach
	  </ul>
	</div>

	@endif
@endif