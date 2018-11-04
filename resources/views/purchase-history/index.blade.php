@extends('layouts.app')

@section('content')

<body style="background-color:#F5D0A9">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($histories as $data)
                <h3 class="text-danger">
                    {{ $data['date'] }}
                </h3>
                <table class="table table-striped table table-bordered">
                    <tr style="background-color:brown">
                        <th>カプセル</th>
                        <th>個数</th>
                        <th>金額</th>
                    </tr>
                    @foreach($data['purchase'] as $detail)
                    <tr style="background-color:#DF7401">
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

</body>
<script type="text/javascript">
 $(function() {
     console.log("aaa");
    $("*").css('color','blue');
  // jQueryの処理
});
</script>
@endsection
