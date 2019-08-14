@extends('layouts.app')

@section('content')
<div class="container">
<!-- <h1>Viewer with custom title</h1> -->
    <div id="galley">
      <ul class="pictures">
          @foreach($pages as $page)
        <li><img src="{{ $url }}/{{ $page }}?t={{ $timeStamp }}" alt="Cuo Na Lake"></li>
        @endforeach
      </ul>
    </div>
</div>
@endsection
