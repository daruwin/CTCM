@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Registro de Salones de clase</div>
<div class="panel-body">

{!! Form::model($classroom,['route'=>['classrooms.update',$classroom],'method'=>'put'])!!}
 {!! Field::text('code') !!}
{!! Field::text('capacity')!!}
{!! Form::submit('Registrar salón') !!}
{!!Form::close()!!}
</div>

</div>

</div>
  </div>
</div>
@endsection

