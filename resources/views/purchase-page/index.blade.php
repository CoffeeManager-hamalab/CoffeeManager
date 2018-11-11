@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       	    <div class="card-columns js-flickity">
	      @foreach ($capsule as $data)
    		<div class="card gallery-cell">
   		 <img class="card-img-top" src="{{asset('images/')}}/{{ $data->name}}.jpg" alt="Card image cap" style="width:15em ">
   		   <div class="card-body">
   		    <h4 class="card-title">{{ $data->name}}</h4>
		     <p class="card-text">{{ $data->price }}円</p>
         </div>
           <div class="card-footer">
          <a href="/confirm/{{$data->name}}" class="btn btn-primary" style="width:100%">Buy</a>
           </div>
      </div>
          @endforeach
      </div>
      </div>
  </div>
</div>
