@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="/charge/store">
                @csrf
                <div class="dropdown">
                    <select class="form-control" id="id" name="id">
                        @foreach($users as $user)
                        <tr>
                            <option value={{ $user->id }}> {{  $user->name }} </option>
                        </tr>
                        @endforeach
                    </select>
                    <input type="text" name="deposit">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            <hr>
        </div>
        <div class="col-md-8">
            <h1>履歴</h1>
            <select class="form-control" id="history" name="id">
                @foreach($users as $user)
                <tr>
                    <option value={{ $user->id }}> {{  $user->name }} </option>
                </tr>
                @endforeach
            </select>
            <div id="history-list">
            </div>
        </div>
    </div>
</div>

<script>
$(function(){
    $('#history').change(function(){
        var value = $(this).val();

        var request = $.ajax({
            type: 'GET',
            url: '/ajax/chargeController/' + value,
            timeout: 3000
        });

        request.done(function(data){
            console.log(data);
        });

        request.fail(function(){
            console.log("error");
        })
    });
});

</script>

@endsection
