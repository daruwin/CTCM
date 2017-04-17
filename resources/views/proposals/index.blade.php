@extends('layouts.index.app') 

@section('index_content')

<th>Id</th>
<th>Proposal name</th>
<th>Temary</th> // Link to temaries list
<th>Teacher</th>
<th>Classroom</th>
//<th>Schedules</th> //Link to Schedules list
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>

@stop


@push('index_scripts')

	ajax: '{!! route('applicants.data') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'name', name: 'name' },
		{ data: 'temary_id', name: 'temary_id' },
		{ data: 'teacher_id', name: 'teacher_id' },
		{ data: 'classroom_id', name: 'classroom_id' },
		{ data: 'created_at', name: 'created_at' },
		{ data: 'updated_at', name: 'updated_at' },
		{ data: 'action', name: 'action', orderable: false, searchable: false}
	]

@endpush