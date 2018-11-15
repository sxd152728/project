@extends('admin.layout.index');

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title background=blue">
                <font style="vertical-align: ">
                    <font style="color: #007bff; ">{{ $comments->title }}</font></font>
            </h3>
        </div>
        <div class="card-body">
            <p>{!! $comments->content !!}</p>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">页脚</font></font>
        </div>
        <!-- /.card-footer--></div>
    <!-- /.card --></section>
    @endsection