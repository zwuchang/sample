@extends('layouts/default')
@section('title', $user->name . '用户信息')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">用户信息</div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="col-md-12">
                    <div class="col-md-offset-2 col-md-8">
                        <section class="user_info">
                            @include('shared.user_info', ['user' => $user])
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
        <table class="table">
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>email</th>
                <th>注册时间</th>
                <th>更新时间</th>
            </tr>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
        </table>
    </div>

@stop