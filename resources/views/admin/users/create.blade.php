@extends('admin.layout.index');

@section('content')
	<div class="card card-primary">
      	<div class="card-header">
        	<h3 class="card-title">{{ $title or ''}}</h3>
      	</div>
      	<!-- /.card-header -->
      	<!-- 添加用户 -->
      	<form class="mws-form" action="/admin/users" method="post" enctype="multipart/form-data">
      		{{ csrf_field() }}
	        <div class="card-body">
	          	<div class="form-group">
	            	<label for="exampleInputEmail1">用户名</label>
	            	<input type="uname" class="form-control" placeholder="请输入您的用户名" name="uname" value="{{ old('uname') }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputPassword1">密码</label>
	            	<input type="password" class="form-control" placeholder="请输入您的密码" name="password" value="">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputPassword1">确认密码</label>
	            	<input type="password" class="form-control" placeholder="请再次输入您的密码" name="repassword" value="">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputPassword1">手机号</label>
	            	<input type="phone" class="form-control" placeholder="请输入您的手机号" name="phone" value="{{ old('phone') }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputPassword1">邮箱</label>
	            	<input type="email" class="form-control" placeholder="请输入您的邮箱" name="email" value="{{ old('email') }}">
	          	</div>
	          	<div class="form-group">
					<label for="exampleInputPassword1">头像</label>
		          	<div class="input-group">
	    				<div class="custom-file">
	        			<input type="file" class="custom-file-input" id="exampleInputFile" name="pic">
	        				<label class="custom-file-label" for="exampleInputFile">请选择您的头像
				        </label>
				    </div>
					</div>
		        </div>
		        <div class="form-group">
	          		<button type="submit" class="btn btn-primary">添加</button>
	          		<button type="reset" class="btn btn-info">重置</button>
	        	</div>
	        </div>
	        
	        <!-- /.card-body -->

	        
      	</form>
    </div>
@endsection