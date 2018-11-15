@extends('admin.layout.index')

@section('content')
	<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">{{ $title or ''}}</h3></div>
    <!-- /.card-header -->
    <!-- 修改用户 -->
    <form class="mws-form" action="/admin/notice/{{ $notice->id }}" method="post" enctype="multipart/form-data">{{ csrf_field() }} {{ method_field('PUT') }}
        <div class="form-group">
            <label for="exampleInputPassword1">公告内容</label>
            <input type="notice" class="form-control" name="notice" value="{{ $notice -> notice }}"></div>
        <div class="form-group">
            <label for="exampleInputPassword1">博主名称</label>
            <input type="name" class="form-control" name="name" value="{{ $notice -> name }}"></div>
        <div class="form-group">
            <label for="exampleInputPassword1">联系方式</label>
            <input type="phone" class="form-control" name="phone" value="{{ $notice -> phone }}"></div>
        <div class="form-group">
            <label for="exampleInputPassword1">电子邮箱</label>
            <input type="email" class="form-control" name="email" value="{{ $notice -> email }}"></div>
        <!-- 修改用户结束 -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">确认修改</button></div>
    </form>
</div>
@endsection