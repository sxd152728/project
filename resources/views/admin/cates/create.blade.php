@extends('admin.layout.index');

@section('content')
<div class="card card-primary">
    <form role="form" action="/admin/cates" method="post">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;"></div>
            </div>
        </div>{{ csrf_field() }}
        <!-- text input -->
        <div class="form-group">
            <label>分区名称</label>
            <input type="text" class="form-control" name="cname"></div>
        <!-- select -->
        <div class="form-group">
            <label>所属类别</label>
            <select class="form-control" name="pid">
                <option value="0">--请选择--</option>@foreach($cates as $k=>$v)
                <option value="{{ $v->id }}">{{ $v->cname }}</option>@endforeach</select></div>
        <!-- radio -->
        <div class="form-group">
            <label>分区状态</label>
            <select class="form-control" name="status">
                <option value="1" checked>--激活--</option>
                <option value="2">--未激活--</option></select>
        </div>
        <div class="card-footer">
            <button type="submit" value="提交" class="btn btn-primary">提交</button>
            <button type="reset" value="重置" class="btn">重置</button></div>
    </form>
</div>
@endsection