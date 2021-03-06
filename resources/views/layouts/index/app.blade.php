@extends('layouts.app') 

@push('styles')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

@endpush

@section('content')

<table class="table table-bordered" id="index-table">
	<thead>
		<tr>
			@yield('index_content')
		</tr>
	</thead>
</table>

@stop


@push('scripts')

<!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->
<script>
$(function() {
	$('#index-table').DataTable({
		processing: true,
		serverSide: true,
		
		@stack('index_scripts')
		
	});
});
</script>

@endpush
