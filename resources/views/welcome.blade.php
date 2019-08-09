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
            {{-- <div class="row justify-content-center mt-5">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ url('page'.$paging[0][0]) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        @foreach($paging as $key => $page)
                        @if($key!=0 && $key!=array_key_last($paging))
                        <li class="{{ $active[$key] }}"><a class="page-link" href="{{ url('page'.$page[0]) }}">{{ $page[1] }}</a></li>
                        @endif
                        @endforeach
                        <li class="page-item">
                            <a class="page-link" href="{{ url('page'.end($paging)[0]) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>--}}

        </div>
    </div>
</div>

@endsection