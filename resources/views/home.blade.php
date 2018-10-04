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
     @can('system-only') {{-- �V�X�e���Ǘ��Ҍ����݂̂ɕ\������� --}}
      system
    @elsecan('admin-higher')�@{{-- �Ǘ��Ҍ����ȏ�ɕ\������� --}}
      admin
    @elsecan('user-higher') {{-- ��ʌ����ȏ�ɕ\������� --}}
      user
    @endcan
</nav>
 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
