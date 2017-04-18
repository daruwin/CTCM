@extends('layouts.index.app') 

@section('index_content')

<th>Id</th>
<th>Date</th>
<th>Name</th>

@stop

@push('index_scripts')
	ajax: '{!! route('applicants.dataworkshop') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'date', name: 'date' },
		{ data: 'name', name: 'name' },
	]
@endpush