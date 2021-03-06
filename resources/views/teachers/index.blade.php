@extends('layouts.index.app') 

@section('index_content')

<th>Id</th>
<th>First name</th>
<th>Last name</th>
<th>Address</th>
<th>Phone</th>
<th>Email</th>
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>

@stop


@push('index_scripts')

	ajax: '{!! route('teachers.data') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'first_name', name: 'first_name' },
		{ data: 'last_name', name: 'last_name' },
		{ data: 'address', name: 'address' },
		{ data: 'phone', name: 'phone' },
		{ data: 'email', name: 'email' },
		{ data: 'created_at', name: 'created_at' },
		{ data: 'updated_at', name: 'updated_at' },
		{ data: 'action', name: 'action', orderable: false, searchable: false}
	]

@endpush