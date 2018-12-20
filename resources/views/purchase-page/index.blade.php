@extends('layouts.app')

@section('content')
<div class="carousel" data-flickity='{ "groupCells": true }'>
    @foreach ($capsule as $data)
    <div class="carousel-cell" style="width: 20rem">
        <div class="card">
            <img class="card-img-top" src="{{asset('images/')}}/{{ $data->name}}.jpg" alt="Card image cap" style="width:15em ">
            <div class="card-body">
                <h4 class="card-title">{{ $data->name}}</h4>
                <p class="card-text">{{ $data->price }}円</p>
            </div>
            <div class="card-footer">
                <a href="/confirm/{{$data->name}}" class="btn btn-primary" style="width:10em">Buy</a>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
