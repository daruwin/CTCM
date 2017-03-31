@extends(layouts.app')

@section('content')
<div class="container">
  <div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">Temas Secundarios</div>
<div class="panel-body">
{!! Form::open(['url'=>'secondary_topics'])!!}
 {!! Field::text('name') !!}
{!! Form::submit('Registrar') !!}
{!!Form::close()!!}

</div>

</div>

</div>
  </div>
</div>
@endsection





