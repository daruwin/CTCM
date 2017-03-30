@extends(layouts.app')

@section('content')
<div class="container">
  <div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Formulario de Horarios</div>
<div class="panel-body">
{!! Form::open(['url'=>'schedules'])!!}
 {!! Field::text('date') !!}
{!! Field::text('start_time') !!}
{!! Field::text('finish_time') !!}
{!! Form::submit('Definir horarios') !!}
{!!Form::close()!!}

</div>

</div>

</div>
  </div>
</div>
@endsection





