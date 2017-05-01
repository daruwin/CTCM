@extends('layouts.index.app') 
@section('index_content')
<h3>{{$applicants[0]->first_name}}
	{{$applicants[0]->first_surname}} Applications</h3>
</br>
<div class="col-md-8 col-md-offset-2">
	{!! Form::open(['url' => 'applicants/'.$applicants[0]->document.'/show', 'method' => 'get']) !!}
	<div class="input-group">
		{!! Form::text('search_entry', null, ['class' => 'form-control', 'placeholder' => !empty($search_placeholder) ? $search_placeholder : 'Search for...' ]) !!}
		<span class="input-group-btn">{!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}</span>
	</div>
	{!! Form::close() !!}
</div><br/><br/>
<table class="table table-striped">
	<thead>
	<th>Id</th>
	<th>Workshop</th>
	<th>Application date</th>
	<th>Status</th>
	<th>Action</th>
	</thead>
	<tbody>
	@foreach($applicants as $applicant)
		<tr>
			<th scope="row">{{$applicant->id}}</th>
			<th>{{$applicant->workshop_name}}</th>
			<th>{{$applicant->created_at}}</th>
			<th>{{$applicant->status}}</th>
			<th>
				{{ Form::open([ 'route' => [ 'application.approve', $applicant->id ], 'method'  => 'post','style'=>'display:inline-block' ]) }}
				{{ Form::hidden('id', $applicant->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-thumbs-up">Approve</i>', array('class'=>'btn btn-xs btn-success', 'type'=>'submit')) }}
				{{ Form::close() }}
				{{ Form::open([ 'route' => [ 'application.reject', $applicant->id ], 'method'  => 'post','style'=>'display:inline-block' ]) }}
				{{ Form::hidden('id', $applicant->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-thumbs-down">Reject</i>', array('class'=>'btn btn-xs btn-warning', 'type'=>'submit')) }}
				{{ Form::close() }}
				{{ Form::open([ 'method'  => 'delete', 'route' => [ 'applicants.destroy', $applicant->id ] ,'style'=>'display:inline-block']) }}
				{{ Form::hidden('id', $applicant->id) }}
				{{ Form::button('<i class="glyphicon glyphicon-remove-circle">Delete</i>', array('class'=>'btn btn-xs btn-danger', 'type'=>'submit')) }}
				{{ Form::close() }}
				{{--				
					<a href="../{{$applicant->id}}/state" class="btn btn-xs btn-success">
					<i class="glyphicon glyphicon-thumbs-up"></i>Approve</a>
					<a href="../{{$applicant->id}}/state" class="btn btn-xs btn-warning">
					<i class="glyphicon glyphicon-thumbs-down"></i>Reject</a>
					<a href="../{{$applicant->id}}/show" class="btn btn-xs btn-danger">
					<i class="glyphicon glyphicon-remove-circle"></i>Delete</a>
				--}}
			</th>
		</tr>
	@endforeach
	</tbody>
</table>

@endsection
{{--
@stop

@push('index_scripts')
	ajax: '{!! route('applicants.datashow') !!}',
	columns: [
		{ data: 'id', name: 'id' },
		{ data: 'workshop_name', name: 'workshop_name' },
		{ data: 'created_at', name: 'created_at' },
	]
@endpush--}}
