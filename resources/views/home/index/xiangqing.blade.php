<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>view-黑色时间轴个人博客模板</title>
<meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />
<link href="/r/css/styles.css" rel="stylesheet">
<link href="/r/css/view.css" rel="stylesheet">
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
  <div class="blogs">
    <div id="index_view">
      <h2 class="t_nav"><a href="/">网站首页</a>
      <h1 class="c_titile">{{$articles->title}}</h1>
      <p class="box">发布时间：{{$articles->created_at}}<span></span></p>
      <ul>
        <?php 
               $a = $articles['content'];
               $a = ltrim($a,'<p>');
               $a = rtrim($a,'</p>');
               echo $a;


             ?>
      </ul>
      <div class="share"> 
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="bds_t163"></a> <a class="shareCount"></a> </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
        <script type="text/javascript" id="bdshell_js"></script> 
        <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
        <!-- Baidu Button END --> 
      </div>
      <div class="otherlink">
        
      </div>
    </div>
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