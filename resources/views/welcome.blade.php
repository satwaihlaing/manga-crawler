@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <span class="card-title">New Update</span>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($showsLinkAndName as $key => $value)
                <div class="col-md-3">
                    <div class="card mt-3">
                        <img class="card-img-top" src="https://mangadex.org/{{ $images[$key] }}" height="300px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="text-truncate"> <a href="{{ url('detail'.$value[1]) }}">{{ $value[0] }}</a></h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            

        </div>
    </div>
</div>

@endsection