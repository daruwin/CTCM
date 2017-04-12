@extends('layouts.index.app') 

@section('index_content')

<th>Id</th>
<th>Proposal name</th>
<th>Classroom</th>
<th>Primary topic</th>
<th>Secondary topic</th>
<th>Schedule</th>
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>

@stop


@push('index_scripts')

	ajax: '{!! route('applicants.data') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'name', name: 'name' },
		{ data: 'classroom', name: 'classroom' },
		{ data: 'created_at', name: 'created_at' },
		{ data: 'updated_at', name: 'updated_at' },
		{ data: 'action', name: 'action', orderable: false, searchable: false}
	]

@endpush