@extends('layouts.index.app') 

@section('index_content')

<th>Id</th>
<th>Name</th>
<th>Proposal</th>
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>

@stop

@push('index_scripts')

	ajax: '{!! route('classrooms.data') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'name', name: 'name' },
		{ data: 'proposal_id', name: 'proposal_id' },
		{ data: 'created_at', name: 'created_at' },
		{ data: 'updated_at', name: 'updated_at' },
		{ data: 'action', name: 'action', orderable: false, searchable: false}
	]

@endpush