@extends('layouts.index.app') 

@section('index_content')

<th>Id</th>
<th>First name</th>
<th>Last name</th>
<th>DNI</th>
<th>Phone</th>
<th>Email</th>
<th>Action</th>

@stop

@push('index_scripts')
	ajax: '{!! route('applicants.data') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'first_name', name: 'first_name' },
		{ data: 'last_name', name: 'last_name' },
		{{-- Para renderizar una columna full name
		{ data: 'full_name', 
		  render:function ( data, type, row ) {                        
                return row.first_name+' '+row.last_name;
            }},
         --}}
		{ data: 'dni', name: 'dni' },
		{ data: 'phone', name: 'phone' },
		{ data: 'email', name: 'email' },
		{ data: 'action', name: 'action', orderable: false, searchable: false}
	
	]
@endpush