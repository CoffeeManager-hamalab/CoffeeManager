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
                            <option value={{ $user['id'] }}> {{  $user['name'] }} </option>
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
            <div id="history">
                <h1>履歴</h1>
                <select class="form-control" v-model="selected" @change="getHistory">
                    <option v-for="user in users" v-bind:value="user.id">
                        @{{ user.name }}
                    </option>
                </select>
                <div id="history-list">
                    @{{ selected }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
Vue.prototype.$http = axios;
var app = new Vue({
    el: '#history',
    data: {
        selected: '',
        users: @json($users)
    },
    methods: {
        getHistory: function () {
            this.$http.post('/ajax/chargeController/' + this.selected)
            .then(function(response){

                // 成功したとき
                console.log("success");

            }).catch(function(error){

                // 失敗したとき
                console.log("falied");

            });
        }
    }
});
</script>

@endsection
