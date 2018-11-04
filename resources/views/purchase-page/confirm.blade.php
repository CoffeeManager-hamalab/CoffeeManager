@extends('layouts.app')

@section('content')
    <h1>購入確認</h1>
　
    <div class="alert alert-primary" role="alert">
     <h4> {{ $capsule->name }},{{ $capsule->price }}円</h4>
	<a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary">キャンセル</a>
　　　<form method="post" action="/confirm">
	 {{ csrf_field() }}
	 <input type="hidden" class="form-control" name="id" value="{{ $capsule->id }}">
      <div class="form-group">
        <input type="hidden" class="form-control" id="name" name="capsule_name" value="{{ $capsule->name }}">
      </div>
      <div class="form-group">
	 <input type="hidden" class="form-control" name="price" value="{{ $capsule->price }}">
      </div>
          <button type="submit" class="btn btn-primary">確定</button>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


@endsection
