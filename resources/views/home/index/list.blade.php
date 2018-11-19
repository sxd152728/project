<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>Pornhub</title>
<link href="/r/css/styles.css" rel="stylesheet">
<link href="/r/css/animation.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="/r/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="/r/js/jquery.js"></script>
<script type="text/javascript" src="/r/js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header>
  <nav id="nav">
    <ul>
      <li><a href="/" >网站首页</a></li>
      @foreach($cate as $k=>$v)
     <li><a href="/home/list/{{$v->id}}" target="_blank" title="{{$v->cname}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->cname}}</font></font></a></li>
     @endforeach
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
</header>
<!--header end-->
<div id="mainbody">
  <div class="info">
   
  </div>
  <!--info end-->
  <div class="blank"></div>
  <div class="blogs">
    <ul class="bloglist">
       @foreach($articles as $k=>$v)
      <li>
        <div class="arrow_box">
          <div class="ti"></div>
          <!--三角形-->
          <div class="ci"></div>
          <!--圆形-->
          <h2 class="title"><a href="/home/xiangqing/{{$v->id}}" >{{$v->title}}</a></h2>
          <ul class="textinfo">
            
            <p>
            <?php 
               $a = $v['content'];
               $a = ltrim($a,'<p>');
               $a = rtrim($a,'</p>');
               echo $a;


             ?>
            </p>
          </ul>
          <ul class="details">
            
            <li class="icon-time"><a href="#">{{$v->create_at}}</a></li>
          </ul>
        </div>
        <!--arrow_box end--> 
      </li>
      @endforeach
     
    </ul>
    <!--bloglist end-->
    
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->
<footer>
  <div class="footer-mid">
    <div class="links">
      <h2>友情链接</h2>
      <ul>
        <li><a href="/">杨青个人博客</a></li>
        <li><a href="http://www.3dst.com">3DST技术服务中心</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>Copyright 2013 Design by <a href="http://www.yangqq.com">DanceSmile</a></p>
  </div>
</footer>
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->
</body>
</html>