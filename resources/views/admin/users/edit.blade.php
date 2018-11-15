@extends('admin.layout.index')

@section('content')
	<div class="card card-warning">
      	<div class="card-header">
        	<h3 class="card-title">{{ $title or ''}}</h3>
      	</div>
      	<!-- /.card-header -->
      	<!-- 修改用户 -->
      	<form class="mws-form" action="/admin/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
      		{{ csrf_field() }}
      		{{ method_field('PUT') }}
	        <div class="card-body">
	          	<div class="form-group">
	            	<label for="exampleInputEmail1">用户名</label>
	            	<input type="uname" class="form-control" name="uname" value="{{ $user -> uname }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputPassword1">手机号</label>
	            	<input type="phone" class="form-control" name="phone" value="{{ $user -> phone }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputPassword1">邮箱</label>
	            	<input type="email" class="form-control" name="email" value="{{ $user -> email }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputFile">头像</label>
	            	<div class="input-group">
	            <div class="custom-file">
	                <input type="file" class="custom-file-input" name="pic">
	                <label class="custom-file-label" for="exampleInputFile"></label>
	            </div>
	            </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">权限</label>
                    <select class="form-control">
                      <option @if($user->power == 1) checked @endif name="power" value="1">普通用户</option>
                      <option @if($user->power == 2) checked @endif name="power" value="2">管理员</option>
                    </select>
                </div>
	        </div>
	        
	        <!-- 修改用户结束 -->

	        <div class="card-footer">
	          	<button type="submit" class="btn btn-primary">确认修改</button>
	        </div>
      	</form>
    </div>
@endsection