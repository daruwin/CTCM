@extends('layouts.index.app')

@section('index_content')

  <h2>Application Charts</h2>
	<br/>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Applications per Month</a></li>
    <li><a data-toggle="tab" href="#tab1">Workshops per Applications</a></li>
    <li><a data-toggle="tab" href="#tab2">Workshops Pier</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      @php $chart_height = 300; @endphp
      <div class="card-panel" style="height: {{ $chart_height + 50 }}px">
        <iframe id="area" src="{{ route('chart', ['name' => 'area', 'height' => $chart_height]) }}" height="{{ $chart_height + 50 }}" width="100%" style="width:100%; border:none;"></iframe>
      </div>
      <script>
          $(function() {
              $('#home').click(function() {
                  $('.preloader-wrapper').fadeIn();
                  $('iframe').css('opacity', 0);
                  setTimeout(function() {
                      $('iframe').each(function() {
                          $(this).attr('src', $(this).attr('src'));
                      });
                      $('.preloader-wrapper').fadeOut();
                      setTimeout(function() {
                          $('iframe').animate({
                              opacity: 1,
                          }, 1000);
                      }, 500);
                  }, 500);
              });
          });
      </script>
    </div>

    <div id="tab1" class="tab-pane fade">
      @php $chart_height = 300; @endphp
      <div class="card-panel" style="height: {{ $chart_height + 50 }}px">
        <iframe id="area" src="{{ route('chart', ['name' => 'bars', 'height' => $chart_height]) }}" height="{{ $chart_height + 50 }}" width="100%" style="width:100%; border:none;"></iframe>
      </div>
    </div>
    <div id="tab2" class="tab-pane fade">
      <div class="card-panel" style="height: {{ $chart_height + 50 }}px">
        <iframe id="area" src="{{ route('chart', ['name' => 'pie', 'height' => $chart_height]) }}" height="{{ $chart_height + 50 }}" width="100%" style="width:100%; border:none;"></iframe>
      </div>
    </div>
  </div>
@endsection