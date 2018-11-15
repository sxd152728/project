@extends('admin.layout.index');

@section('content')
<div class="card card-primary">
    <form action="/admin/comments" method="get">
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
                    <th>评论文章标题</th>
                    <th>评论用户</th>
                    <th>添加时间</th>
                    <th>修改时间</th>
                    <th>操作</th></tr>
                <tbody></tbody>
                <!-- 遍历 -->@foreach($comments as $k=>$v)
                <tr>
                    <td>{{ $v->id}}</td>
                    <td>{{ $v->articles['title'] }}</td>
                    <td>{{ $v->user['uname']}}</td>
                    <td>{{ $v->updated_at}}</td>
                    <td>{{ $v->created_at}}</tdcreated_at>
                        <td>
                            <a href="/admin/comments/{{ $v->id }}" class="btn btn-info">查看内容</a>
                            <a href="/admin/comments/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                            <form action="/admin/comments/{{ $v->id }}" method="post" style="display: inline-block;">{{ csrf_field() }} {{ method_field('DELETE') }}
                                <input type="submit" value="删除" class="btn btn-danger"></form></td>
                </tr>@endforeach</tbody>
        </table>
        <!-- /.card-body -->
        <div class=".pagination">{!! $comments->appends($request)->render() !!}</div></div>
</div>
<!-- /.card-body --></div>

@endsection