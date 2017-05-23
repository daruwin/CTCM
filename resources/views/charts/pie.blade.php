@extends('layouts.charts')
@section('chart')
    {!! Charts::database(App\Applicant::all(), 'pie', 'highcharts')
    ->dimensions(0,$height)
    ->title('Applications per Workshop')
    ->responsive(false)
    ->groupBy('workshop_name')
    ->render() !!}
@endsection