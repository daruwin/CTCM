@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Formulario de postulación</div>
<div class="panel-body">
{!! Form::model($applicant,['route'=>['applicants.update',$applicant],'method'=>'put'])!!}
{!! Field::text('first_name') !!}
{!! Field::text('last_name')!!}
{!! Field::text('dni') !!}
{!! Field::text('phone')!!}
{!! Field::email('email') !!}
{!! Form::submit('Postular') !!}
{!!Form::close()!!}

</div>

</div>

</div>
  </div>
</div>
@endsection
