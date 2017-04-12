@extends(layouts.app')
@section('content')
<div class="container">
  <div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Propuestas</div>
<div class="panel-body">
{!! Form::open(['url'=>'proposals'])!!}
 {!! Field::text('name') !!}
{!! Form::submit('Proponer') !!}
{!!Form::close()!!}
@endsection