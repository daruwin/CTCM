@extends('layouts.index.app') 

@section('index_content')

<th>Id</th>
<th>Code</th>
<th>Capacity</th>
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>

@stop

@push('index_scripts')

	ajax: '{!! route('classrooms.data') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'code', name: 'code' },
		{ data: 'capacity', name: 'capacity' },
		{ data: 'created_at', name: 'created_at' },
		{ data: 'updated_at', name: 'updated_at' },
		{ data: 'action', name: 'action', orderable: false, searchable: false}
	]

@endpush