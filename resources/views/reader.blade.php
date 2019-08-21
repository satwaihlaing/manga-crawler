@extends('layouts.app')
@section('css')
<style>
  #image-gallery-2 {
    width: 100%;
    position: relative;
    height: 650px;
    background: #000;
  }

  #image-gallery-2 .image-container {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 50px;
  }

  #image-gallery-2 .prev {
    left: 20px;
  }

  #image-gallery-2 .prev,
  #image-gallery-2 .next {
    position: absolute;
    height: 32px;
    margin-top: -66px;
    top: 50%;
  }

  #image-gallery-2 .next {
    right: 20px;
    cursor: pointer;
  }

  #image-gallery-2 .prev,
  #image-gallery-2 .next {
    position: absolute;
    height: 32px;
    margin-top: -66px;
    top: 50%;
  }
</style>
@endsection
@section('content')
<div class="container">
  <!-- <h1>Viewer with custom title</h1> -->
  <div id="image-gallery-1" class="cf">
    @foreach($files as $file)
    <img src="{{ $file->url }}" data-high-res-src="{{ $file->url }}" alt="" class="gallery-items img-fluid">

    @endforeach

  </div>
</div>
@endsection