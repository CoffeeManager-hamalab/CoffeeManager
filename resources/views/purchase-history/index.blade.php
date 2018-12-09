@extends('layouts.app')
@section('content')


<link href="{{ asset('css/history.css') }}" rel="stylesheet">

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            お支払い金額：{{ $bill }}
        </div>
        <div class="col-md-8">
            @foreach ($histories as $data)
                <h3 class="Date">
                    {{ $data['date'] }}
                </h3>
                <table class="table table table-bordered Element">
                    <tr class="Title">
                        <th>カプセル</th>
                        <th>個数</th>
                        <th>金額</th>
                    </tr>
                    @foreach($data['purchase'] as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->sum_quantity }}</td>
                        <td>{{ $detail->price }}</td>
                    </tr>
                    @endforeach
                </table>
            @endforeach
        </div>
    </div>
</div>

</body>

@endsection
