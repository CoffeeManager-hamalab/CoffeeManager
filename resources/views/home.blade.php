@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!


<nav>
     @can('system-only') {{-- システム管理者権限のみに表示される --}}
      system
    @elsecan('admin-higher')　{{-- 管理者権限以上に表示される --}}
      admin
    @elsecan('user-higher') {{-- 一般権限以上に表示される --}}
      user
    @endcan
</nav>
 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
