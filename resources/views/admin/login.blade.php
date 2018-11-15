<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title or '' }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/d/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/d/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <label>后台登录</label>
  </div>
  <!-- 后台登录表单 -->
  <div class="card">
    <div class="card-body login-card-body">
          @if (session('success'))     
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif
      <form action="/admin/login/verification" method="post">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
          <span class="fa fa-users"></span>
          <input name="uname" class="form-control" placeholder="请输入您的用户名">
        </div>
        <div class="form-group has-feedback">
          <span class="fa fa-lock form-control-feedback"></span>
          <input type="password" name="password" class="form-control" placeholder="请输入您的密码">
        </div><br>
        <div>
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">记住此用户
            </label>
          </div>
        </div><br>
        <!-- 登录按钮 -->
        <div>
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
      </form>
      <br>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">忘记密码?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/d/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/d/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="/d/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
