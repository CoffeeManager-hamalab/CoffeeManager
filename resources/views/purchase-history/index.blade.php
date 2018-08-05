@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table>
                <tr>
                    <th>カプセル</th>
                    <th>個数</th>
                    <th>金額</th>
                </tr>
                @foreach ($history as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->sum_quantity }}</td>
                    <td>{{ $data->price * $data->sum_quantity}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
