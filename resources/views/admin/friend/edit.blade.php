@extends('admin.layout.index')

@section('content')
	<div class="card card-warning">
      	<div class="card-header">
        	<h3 class="card-title">{{ $title or ''}}</h3>
      	</div>
      	<!-- /.card-header -->
      	<!-- 修改用户 -->
      	<form class="mws-form" action="/admin/friend/{{ $friend->id }}" method="post" enctype="multipart/form-data">
      		{{ csrf_field() }}
      		{{ method_field('PUT') }}
	        <div class="card-body">
	          	<div class="form-group">
	            	<label for="exampleInputEmail1">友情链接标题</label>
	            	<input type="name" class="form-control" name="name" value="{{ $friend -> name }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputPassword1">友情链接地址</label>
	            	<input type="url" class="form-control" name="url" value="{{ $friend -> url }}">
	          	</div>
	          	<div class="form-group">
	            	<label for="exampleInputFile">友情链接标志</label>
	            	<div class="input-group">
	            <div class="custom-file">
	                <input type="file" class="custom-file-input" name="pic">
	                <label class="custom-file-label" for="exampleInputFile"></label>
	            </div>
	            </div>
	        </div>
	        
	        <!-- 修改用户结束 -->

	        <div class="card-footer">
	          	<button type="submit" class="btn btn-primary">确认修改</button>
	        </div>
      	</form>
    </div>
@endsection