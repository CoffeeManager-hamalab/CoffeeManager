@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($histories as $data)
                <h3>
                    {{ $data['date'] }}
                </h3>
                <table>
                    <tr>
                        <th>カプセル</th>
                        <th>個数</th>
                        <th>金額</th>
                    </tr>
                    @foreach($data['purchase'] as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->sum_quantity }}</td>
                        <td>{{ $detail->price * $detail->sum_quantity}}</td>
                    </tr>
                    @endforeach
                </table>
            @endforeach
        </div>
    </div>
</div>
@endsection
