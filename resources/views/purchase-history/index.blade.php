@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($histories as $data)
                <h3 style="font-color:red">
                    {{ $data['date'] }}
                </h3>
                <div class="table-responsive">
                <table class="table table-bordered table table-striped">
                    <tr style="background-color:lime">
                        <th>カプセル</th>
                        <th>個数</th>
                        <th>金額</th>
                    </tr>
                    
                    @foreach($data['purchase'] as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->sum_quantity }}</td>
                        <td>{{ $detail->price}}</td>
                    </tr>
                    @endforeach
                 </table>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script type="text/javascript">
 $(function() {
     console.log("aaa");
    $("*").css('color','blue');
  // jQueryの処理
});
</script>
@endsection
