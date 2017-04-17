@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Classrooms - Show Details</div>

				<div class="panel-body">
					id: {{ $classroom->id }}<br>
					code: {{ $classroom->code }}<br>
					capacity: {{ $classroom->capacity }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection