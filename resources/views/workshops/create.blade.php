@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Formulario de Workshops</div>
<div class="panel-body">
{!! Form::open(['url'=>'workshops'])!!}
 {!! Field::text('name') !!}
{!! Form::submit('Crear Workshop') !!}
{!!Form::close()!!}

</div>

</div>

</div>
  </div>
</div>
@endsection

