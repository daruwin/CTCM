@extends('layouts.charts')
@section('chart')
    {!! Charts::database(App\Applicant::all(), 'area', 'highcharts')
    ->elementLabel("Applications")
    ->dimensions(0,$height)
    ->title('Applications per Month')
    ->responsive(false)
    ->monthFormat('F Y')
    ->lastByMonth(13,true)
    ->render() !!}
@endsection