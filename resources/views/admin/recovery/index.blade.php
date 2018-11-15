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
          <th>AID</th>
          <th>文章标题</th>
          <th>修改时间</th>
          <th>创建时间</th>
          <th>操作</th>
        <tbody></tbody>
        <!-- 遍历 -->@foreach($recovery as $k=>$v)
        <tr>
          <td>{{ $v->id}}</td>
          <td>{{ $v->aid}}</td>
          <td>{{ $v->title }}</td>
          <td>{{ $v->updated_at}}</td>
          <td>{{ $v->created_at}}</td>
          <td>
          <form action="/admin/recovery/{{ $v->id }}" method="post" style="display: inline-block;">
                             {{ csrf_field() }}
                            {{ method_field('DELETE') }}
             <input type="submit" value="删除" class="btn btn-info" onclick="return del()">
             </form>
              <a href="/admin/recovery/huifu/{{ $v->aid }}" class="btn btn-info" style="display: inline-block;">恢复</a>
        </tr>@endforeach
        </td>
      </tbody>
    </table>
    <!-- /.card-body -->
         </div>
           <!-- /.card-body -->
  </div>
        <script type="text/javascript">
       function del()
           {
        if(confirm("确定要删除吗？")){
             return true;
             }else{
               return false;
                }  
              }
            </script>     
@endsection