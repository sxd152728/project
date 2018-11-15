@extends('admin.layout.index');

@section('content')
	<div class="card card-primary">
      	<div class="card-header">
        	<h3 class="card-title">{{ $title or ''}}</h3>
      	</div>
      	<!-- /.card-header -->
      	<!-- 添加用户 -->
      	<form class="mws-form" action="/admin/avdert" method="post" enctype="multipart/form-data">
      		{{ csrf_field() }}
	        <div class="card-body">
	          	<div class="form-group">
	            	<label for="exampleInputPassword1">广告链接</label>
	            	<input type="url" class="form-control" placeholder="请输入您的广告链接" name="url" value="{{ old('url') }}">
	          	</div>
	          	<div class="form-group">
					<label for="exampleInputPassword1">广告图片</label>
		          	<div class="input-group">
	    				<div class="custom-file">
	        			<input type="file" class="custom-file-input" id="exampleInputFile" name="pic">
	        				<label class="custom-file-label" for="exampleInputFile">
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