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
            <span class="card-title"><strong>{{ $title[0] }}</strong></span>


            <div class="fav-btn">
                <span href="" class="favme dashicons dashicons-heart"></span>
            </div>


        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <a href="#" title="See covers">
                        <img class="rounded" width="100%" src="https://mangadex.org{{ $image[0] }}">
                    </a>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="row m-0 py-1 px-0">
                        <div class="col-lg-3 col-xl-2 strong">Alt name(s):</div>
                        <div class="col-lg-9 col-xl-10">
                            <ul class="list-inline m-0">
                                @for($i=0 ; $i < count($altTitleCount) ; $i++) <li class="list-inline-item"><span class="fa fa-book fa-fw " aria-hidden="true"></span> {{ $altTitle[$i] }}</li>
                                    @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="row m-0 py-1 px-0 border-top">
                        <div class="col-lg-3 col-xl-2 strong">Author:</div>
                        <div class="col-lg-9 col-xl-10"> {{ $author }} </div>
                    </div>
                    <div class="row m-0 py-1 px-0 border-top">
                        <div class="col-lg-3 col-xl-2 strong">Artist:</div>
                        <div class="col-lg-9 col-xl-10">{{ $artist }}</div>
                    </div>
                    <div class="row m-0 py-1 px-0 border-top">
                        <div class="col-lg-3 col-xl-2 strong">Demographic:</div>
                        <div class="col-lg-9 col-xl-10"><span class="badge badge-secondary">{{ $demographic }}</span></div>
                    </div>
                    <div class="row m-0 py-1 px-0 border-top">
                        <div class="col-lg-3 col-xl-2 strong">Genre:</div>
                        <div class="col-lg-9 col-xl-10">{{ str_replace(' ',', ',$genre) }}</div>
                    </div>

                    <div class="row m-0 py-1 px-0 border-top">
                        <div class="col-lg-3 col-xl-2 strong">Pub. status:</div>
                        <div class="col-lg-9 col-xl-10">{{$status}}</div>
                    </div>

                    <div class="row m-0 py-1 px-0 border-top">
                        <div class="col-lg-3 col-xl-2 strong">Description:</div>
                        <div class="col-lg-9 col-xl-10">{{$description}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <span class="card-title"><strong>Chapters</strong></span>
        </div>
        <div class="card-body">
            @foreach($chapters as $chapter)
            <div class="row m-0 py-1 px-0 border-top">
                <div class="col-lg-5 col-xl-4 strong"><a href="{{ url('read',$chapter[1]) }}">{{ $chapter[0] }}</a></div>
            </div>
            @endforeach
        </div>
    </div>


    @endsection
    @section('script')
    <script>
        // Favorite Button - Heart
        $('.favme').click(function() {
            $(this).toggleClass('active');
            if ($('.favme').hasClass('active')) {
                $.ajax({
                    url: '/favourite',
                    type: 'POST',
                    data: {
                        '_token': $('meta[name=csrf-token]').attr('content'),
                        userID: "{{ Auth::user()->id }}",
                        title: "{{ $title[0] }}",
                        image: "https://mangadex.org{{ $image[0] }}",
                        link: "{{ $url }}"
                    }
                });
            }

        });
    </script>
    @endsection