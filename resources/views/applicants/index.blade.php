@extends('layouts.index.app') 

@section('index_content')
	<h2>Applicants List</h2>
	<div class="col-md-8 col-md-offset-2">
	{!! Form::open(['url' => 'applicants', 'method' => 'get']) !!}
	<div class="input-group">
		{!! Form::text('search_entry', null, ['class' => 'form-control', 'placeholder' => !empty($search_placeholder) ? $search_placeholder : 'Search for...' ]) !!}
		<span class="input-group-btn">{!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}</span>
	</div>
	{!! Form::close() !!}
	</div>
	<br/><br/>
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>First name</th>
			<th>Last name</th>
			<th>DNI</th>
			<th>Email</th>
			<th>Action</th>
		</thead>
		<tbody>
		@foreach($applicants as $applicant)
			<tr>
				<th scope="row">{{$applicant->id}}</th>
				<th>{{$applicant->first_name}}</th>
				<th>{{$applicant->first_surname}}</th>
				<th>{{$applicant->document}}</th>
				<th>{{$applicant->email}}</th>
				<th><a href="applicants/{{$applicant->id}}/edit" class="btn btn-xs btn-danger">
						<i class="glyphicon glyphicon-edit"></i>Edit</a>
					<a href="applicants/{{$applicant->document}}/show" class="btn btn-xs btn-warning">
						<i class="glyphicon glyphicon-list-alt"></i>Workshops</a></th>
			</tr>
		@endforeach
		</tbody>
	</table>
	@endsection
{{--@stop

@push('index_scripts')
	ajax: '{!! route('applicants.data') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'first_name', name: 'first_name' },
		{ data: 'first_surname', name: 'first_surname' },
		{ data: 'document', name: 'document' },
		{ data: 'email', name: 'email' },
		{ data: 'action', name: 'action', orderable: false, searchable: false}
	]
@endpush
--}}
