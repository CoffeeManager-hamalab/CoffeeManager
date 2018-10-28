@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="/import-history/create">
                @csrf
                <div class="dropdown">
                    <select class="form-control" id="id" name="id">
                        @foreach($capsules as $capsule)
                        <tr>
                            <option value={{ $capsule->id }}> {{  $capsule->name }} </option>
                        </tr>
                        @endforeach
                        <input type="text" name="quantity">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>カプセル名</th>
                        <th>個数</th>
                        <th>追加日時</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $history)
                    <tr>
                        <td>{{ $history->name }}</td>
                        <td>{{ $history->quantity }}</td>
                        <td>{{ $history->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
    $(function(){
        $('.dropdown-menu .dropdown-item').click(function(){
            var visibleItem = $('.dropdown-toggle', $(this).closest('.dropdown'));
            visibleItem.text($(this).attr('value'));
        });
    });
</script>

@endsection
