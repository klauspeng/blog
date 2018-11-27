@extends('layouts.nepAdmin')

@section('title', '登陆')
@section('bodyStyle', 'login-bg')

@section('content')
<div class="login layui-anim layui-anim-up">
    <div class="message">管理后台 - @yield('title')</div>
    <div id="darkbannerwrap"></div>
    <form method="post" class="layui-form">
        {{ csrf_field() }}
        <input name="username" placeholder="用户名" type="text" lay-verify="required" class="layui-input">
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码" type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20">
    </form>
</div>
@endsection

@section('js')
<script>
    $(function () {
        layui.use('form', function () {
            var form = layui.form;
            // form.on('submit(login)', function (data) {
            //     // alert(888)
            //     layer.msg(JSON.stringify(data.field), function () {
            //         location.href = 'index.html'
            //     });
            //     return false;
            // });
        });
    })
</script>
@endsection