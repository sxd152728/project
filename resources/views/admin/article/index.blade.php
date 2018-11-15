@extends('admin.layout.index');

@section('content')
<div class="card card-primary">
    <form action="/admin/article" method="get">
        <div class="card-header">
            <h3 class="card-title">{{ $title or '' }}</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control float-right" placeholder="ID搜素">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>发表人</th>
                    <th>所属板块</th>
                    <th>文章标题</th>
                    <th>文章作者</th>
                    <th>添加时间</th>
                    <th>修改时间</th>
                    <th>操作</th></tr>
                <tbody></tbody>
                <!-- 遍历 -->@foreach($articles as $k=>$v)
                <tr>
                    <td>{{ $v->id}}</td>
                    <td>{{ $v->user['uname']}}</td>
                    <td>{{ $v->cates['cname'] }}</td>
                    <td>{{ $v->title}}</td>
                    <td>{{ $v->author}}</td>
                    <td>{{ $v->updated_at}}</td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        <a href="/admin/article/{{ $v->id }}" class="btn btn-info">查看内容</a>
                        <a href="/admin/article/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        <a href="/admin/recovery/delete/{{ $v->id }}" class="btn btn-danger" style="display: inline-block;">回收站</a>
                        </td>
                </tr>@endforeach</tbody>
        </table>
        <!-- /.card-body -->
        <div class=".pagination">{!! $articles->appends($request)->render() !!}</div></div>
    <!-- /.card-body --></div>
@endsection