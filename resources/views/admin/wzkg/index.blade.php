@extends('admin.layout.index');

@section('content')
	  <div class="card card-primary">
  <form action="/admin/wzkg" method="post">
  	{{ csrf_field() }}
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
 
            <div class="form-group">
         <div class="form-group">
            <ul class="form-group">
            <li><input type="radio" name="kg" value="1" id="s1"> <label for="s1">开启网站</label></li>
            <li><input type="radio" name="kg" value="2" id="s2"> <label for="s2">关闭网站</label></li>
                    </ul>
                </div>

            </div>
  <!-- /.card-header -->
        <button type="submit" class="btn btn-primary">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">提交</font></font>
        </button>
        </div>
         </form>
@endsection