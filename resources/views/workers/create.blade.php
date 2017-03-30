@extends(layouts.app')

@section('content')
<div class="container">
  <div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Registro del personal CTIC</div>
<div class="panel-body">
{!! Form::open(['url'=>'workers'])!!}
 {!! Field::text('first_name') !!}
{!! Field::text('last_name')!!}
{!! Field::text('address') !!}
{!! Field::text('phone')!!}
{!! Field::email('email') !!}
{!! Form::submit('Bienvenido!') !!}
{!!Form::close()!!}

</div>

</div>

</div>
  </div>
</div>
@endsection





