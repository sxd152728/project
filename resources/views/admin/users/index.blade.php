@extends('admin.layout.index')

@section('content')
	<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">{{ $title or '' }}</h3>
		<div class="card-tools">
			<form action="/admin/users" method="get">
	          	<div class="input-group input-group-sm" style="width: 150px;">
	            	<input type="text" name="search" class="form-control float-right" placeholder="搜索">

	            	<div class="input-group-append">
	              		<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	            	</div>
	          	</div>
          	</form>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                               <th>ID</th>
                               <th>用户名</th>
                               <th>手机号</th>
                               <th>邮箱</th>
                               <th>权限</th>
                               <th>头像</th>
                               <th>注册时间</th>
                               <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($user as $k => $v)
							<tr role="row" class="even">
			                  	<td>{{ $v->id }}</td>
			                  	<td>{{ $v->uname }}</td>
			                  	<td>{{ $v->phone }}</td>
			                  	<td>{{ $v->email }}</td>
			                  	<td>{{ $v->power == 1 ? '普通用户' : '管理员'}}</td>
			                  	<td><img src="{{ $v->pic }}" style="border-radius: 50%; width: 100px;height: 100px;"></td>
			                  	<td>{{ $v->created_at }}</td>
			                  	<td>
			                  		<a href="/admin/users/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
									<form action="/admin/users/{{ $v->id }}" method="post" style="display:inline-block;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="submit" value="删除" class="btn btn-danger">
									</form>
			                  	</td>
			                </tr>
			                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- 分页 -->
      			<div class=".pagination"> 
      				{!! $user->appends($request)->render() !!}
      			</div>
        </div>
    </div>
    <!-- /.card-body --></div>
@endsection