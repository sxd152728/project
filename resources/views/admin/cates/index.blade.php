@extends('admin.layout.index');

@section('content')

<div class="col-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $title or '' }}</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>分区名称</th>
                        <th>属性分类ID</th>
                        <th>分区路径</th>
                        <th>分区状态</th>
                        <th>操作</th></tr>
                    <tr>@foreach($cates as $k=>$v)
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->cname }}</td>
                        <td>{{ $v->pid }}</td>
                        <td>{{ $v->path }}</td>
                        <td>{{ $v->status == 1 ?'激活' : '未激活'}}</td>
                        <td>
                            <a href="/admin/cates/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                            <form action="/admin/cates/{{ $v->id }}" method="post" style="display: inline-block;">{{ csrf_field() }} {{ method_field('DELETE')}}
                                <input type="submit" value="删除" class="btn btn-danger"></form></td>
                    </tr>@endforeach</tbody>
            </table>
        </div>
        <div class=".pagination">{!! $cates->appends($request)->render() !!}</div>
        <!-- /.card-body --></div>
    <!-- /.card --></div>

@endsection