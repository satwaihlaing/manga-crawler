@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/@icon/dashicons/dashicons.css">
<style>
    .fav-btn {
        display: flex;
        height: 100%;
        color: #CBCDCE;
        float: right;
    }

    .active {
        color: #DC3232;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <span class="card-title"> Favourite <i class="dashicons dashicons-heart"></i></span> 
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($bookmarks as $bookmark)
                <div class="col-md-3">
                    <div class="card mt-3">
                        <img class="card-img-top" src="{{ $bookmark->image }}" height="300px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="text-truncate"> <a href="{{ url('detail/'.$bookmark->link) }}">{{ $bookmark->title }}</a></h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection