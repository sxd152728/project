@extends('admin.layout.index');

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">{{ $title or ''}}</font></font>
        </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="/admin/article" method="post">{{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">所属用户</font></font>
                </label>
                <div class="form-group">
                    <select class="form-control" name="cid" style="width: 55%;">@foreach($user as $k=>$v)
                        <option value="{{ $v->id }}">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ $v->uname }}</font></font>
                        </option>@endforeach</select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">所属板块</font></font>
                </label>
                <div class="form-group">
                    <select class="form-control" name="uid" style="width: 55%;">@foreach($cates as $k=>$v)
                        <option value="{{ $v->id }}">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ $v->cname }}</font></font>
                        </option>@endforeach</select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">文章标题</font></font>
                </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title"></div>
            <div class="form-group">
                <label for="exampleInputPassword1">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">作者</font></font>
                </label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="author"></div>
            <div class="form-group">
                <label for="exampleInputPassword1">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">内容</font></font>
                </label>
                <script id="container" name="content" type="text/plain"></script></div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">提交</font></font>
                </button>
            </div>
        </div>
    </form>
</div>
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">var ue = UE.getEditor('container', {
        toolbars: [['fullscreen', 'source', 'undo', 'redo', 'bold', 'simpleupload', 'insertimage']]
    });</script>
            
@endsection