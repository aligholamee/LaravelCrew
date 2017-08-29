{{-- Show the inputs --}}
@foreach ($fields as $field)
    @if($field['name'] == 'house_uuid')
        @php
        $field['value'] = $_GET['house_uuid'];
        @endphp
    @endif
    @if($field['name'] == 'user_uuid')
        @php
        $field['value'] = Auth::user()->uuid;
        @endphp
    @endif
    @if($field['name'] == 'door_uuid')
        @php
        $field['value'] = $_GET['door_uuid'];
        @endphp
     @endif
    @if($field['name'] == 'generator_uuid')
        @php
        $field['value'] = Auth::user()->uuid;
        @endphp
    @endif
    @if($field['name'] == 'value')
        @php
        $field['value'] = rand(121212,898989);
        @endphp
    @endif
    <!-- load the view from the application if it exists, otherwise load the one in the package -->
    @if(view()->exists('vendor.backpack.crud.fields.'.$field['type']))
        @include('vendor.backpack.crud.fields.'.$field['type'], array('field' => $field))
    @else
        @include('crud::fields.'.$field['type'], array('field' => $field))
    @endif
    
@endforeach

@foreach ($fields as $field)
<div>
    @include('crud::fields.checkbox')   
</div>

@endforeach

