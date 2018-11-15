@extends('admin.layout.index');

@section('content')
	<div class="card card-primary">
      	<div class="card-header">
        	<h3 class="card-title">{{ $title or ''}}</h3>
      	</div>
      	<!-- /.card-header -->
      	<!-- 添加用户 -->
      	<form class="mws-form" action="/admin/notice" method="post">
      		{{ csrf_field() }}
	        <div class="card-body">
	          	<div class="form-group">
	            	<label for="exampleInputText1">公告内容</label>
	            	<input type="text" class="form-control" placeholder="请输入您的公告内容" name="notice" value="{{ old('notice') }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputText1">博主名称</label>
	            	<input type="name" class="form-control" placeholder="请输入您的博主名称" name="name" value="{{ old('name') }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputText1">联系方式</label>
	            	<input type="phone" class="form-control" placeholder="请输入您的联系方式" name="phone" value="{{ old('phone') }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputEmail1">电子邮箱</label>
	            	<input type="email" class="form-control" placeholder="请输入您的电子邮箱" name="email" value="{{ old('email') }}">
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