@extends('layouts.app')

@section('content')
<div class="carousel" data-flickity='{ "groupCells": true }'>
    @foreach ($capsule as $data)
    <div class="carousel-cell" style="width: 20rem">
        <div class="card">
            <div class="card-body">
                <img class="card-img-top" src="{{asset('images/')}}/{{ $data->img_name}}" alt="Card image cap" style="width:10em " align="left">
                <h4 class="card-title">{{ $data->name}}</h4>
                <div>
                    <p class="card-text">
                        {{ $data->price }}円<br>
                    </p>
                    <a href="/confirm/{{$data->name}}" class="btn btn-primary" style="width:7em" buttom="0" position="absolute">Buy</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
