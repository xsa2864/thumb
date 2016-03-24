<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title><?php echo ($title); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <link href="http://g.tbcdn.cn/sj/wqui/1.0.0/css/sui.min.css" rel="stylesheet">
  <script type="text/javascript" src="http://g.tbcdn.cn/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.tbcdn.cn/sj/wqui/1.0.0/js/sui.min.js"></script>

  <link href="/thumb/Public/wqui/assets/css/animate.css" rel="stylesheet">
  <link href="/thumb/Public/wqui/.package/css/sui.css" rel="stylesheet">
  <link href="/thumb/Public/wqui/assets/css/docs.css" rel="stylesheet">
  <link href="/thumb/Public/wqui/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link rel="shortcut icon" href="">

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
    ga('create', 'UA-50817062-1', 'taobao.org');
    ga('send', 'pageview');
  </script>
  <!--[if lt IE 9]><script src="assets/js/html5shiv.js"></script><![endif]-->
  <style type="text/css">
  form{width:100px;}
  </style>
</head>
<body>
<div class="sui-navbar navbar-inverse navbar-fixed-top">
   <div class="navbar-inner">
     <div class="sui-container">
    	<a href="./index.html" class="sui-brand">
    		<i class="sui-icon icon-github-alt">&nbsp;</i>WQUI
    	</a>
       <ul class="sui-nav">
         <li><a href="#">首页</a></li>
         <li class="active"><a href="#">组件库</a></li>
         <li><a href="#">案例</a></li>
         <li><a href="#">教程</a></li>
         <li><a href="#">下载</a></li>
         <li><a href="#">关于</a></li>
       </ul>
     </div>
   </div>
</div>

<div class="sui-layout">
    <div class="sidebar">
            <ul class="sui-nav nav-tabs nav-stacked nav-xlarge docs-sidenav">
              <li class="active"><a href="#"><i class="sui-icon icon-globe">&nbsp;</i>全局样式</a>
              </li>
              <li><a><i class="sui-icon icon-magic">&nbsp;</i>基础css<i class="sui-icon icon-angle-down pull-right"></i></a>
                <ul class="sui-nav nav-tabs nav-stacked">
                  <li><a href="#">按钮</a></li>
                  <li><a href="#">表单</a></li>
                  <li><a href="#">图标</a></li>
                  <li><a href="#">表格</a></li>
                </ul>
              </li>
              <li>
              	<a>
              		<i class="sui-icon icon-picture">&nbsp;</i>
              		css组件<i class="sui-icon icon-angle-down pull-right"></i>
              	</a>
                <ul class="sui-nav nav-tabs nav-stacked">
                  <li><a href="#">提示消息</a></li>
                  <li><a href="#">步骤条</a></li>
                  <li><a href="#">标签页</a></li>
                  <li><a href="#">面包屑</a></li>
                  <li><a href="#">分页器</a></li>
                  <li><a href="#">下拉菜单</a></li>
                  <li><a href="#">选框</a></li>
                  <li><a href="#">进度条</a></li>
                  <li><a href="#">Loading</a></li>
                </ul>
              </li>
              <li>
              	<a>
              		<i class="sui-icon icon-shopping-cart">&nbsp;</i>
              		js组件<i class="sui-icon icon-angle-down pull-right"></i>
              	</a>
                <ul class="sui-nav nav-tabs nav-stacked">
                  <li><a href="#">对话框</a></li>
                  <li><a href="#">tooltip</a></li>
                  <li><a href="#">标签页</a></li>
                  <li><a href="#">分页器</a></li>
                  <li><a href="#">下拉菜单</a></li>
                  <li><a href="#">级联选择</a></li>
                  <li><a href="#">datetimepicker</a></li>
                </ul>
              </li>
            </ul>
            <script type="text/javascript">var disqus_identifier = 'disqus-id-dropdown-js';</script>
    </div>
    <div class="content">
        <div class="content-inner">
        	
	
          <h1>全局样式</h1>
          <h2 class="sui-page-header">设计规范</h2>
          <div class="docs-description"></div>
          <ul class="demo-operations clearfix">
            <li><a href="#">下载psd文件</a></li>
          </ul>
          <h2 class="sui-page-header">开发者文档</h2>
          <h2>1. 基础字体和颜色</h2>
          <ul class="sui-nav nav-tabs nav-large">
            <li class="active"><a href="#demo1" data-toggle="tab">示例</a></li>
            <li><a href="#code1" data-toggle="tab">代码</a></li>
            <li><a href="#doc1" data-toggle="tab">文档</a></li>
          </ul>
          <div class="tab-content">
            <div id="demo1" class="tab-pane active">
              <div class="bs-docs-example">
                <p>
                  段落
                  基础字体：12px, #333, 微软雅黑
                  基础行高: 18px
                </p>
                <h1>粗体标题一</h1>
                <h2>粗体标题二</h2>
                <h3>粗体标题三</h3>
                <h4>粗体标题四</h4>
                <h5>粗体标题五</h5>
                <h1 class="sui-normal">标题一</h1>
                <h2 class="sui-normal">标题二</h2>
                <h3 class="sui-normal">标题三</h3>
                <h4 class="sui-normal">标题四</h4>
                <h5 class="sui-normal">标题五</h5>
                <p><a href="#">链接颜色</a></p>
              </div>
            </div>
            <div id="code1" class="tab-pane">
              <pre data-target="#demo1&gt;div" class="prettyprint linenums"></pre>
            </div>
            <div id="doc1" class="tab-pane"></div>
          </div>
          <ul class="demo-operations clearfix">
            <li><a href="javascript:void(0)" data-target="#demo1&gt;div" class="copy-btn">复制代码</a></li>
          </ul>
          <div id="disqus_thread"></div>
          <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'sui-alibaba'; // required: replace example with your forum shortname
            
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
          </script><a href="http://disqus.com" class="dsq-brlink">comments powered by<span class="logo-disqus">Disqus</span></a>
       

			
	<div class="footer">
    	<ul class="unstyled">
    	  <li>@time 2016.03.17</li>
    	  <li>@author 建站中</li>
    	</ul>
    </div>
			
        </div>
    </div>
</div>

    <script src="/thumb/Public/wqui/assets/js/google-code-prettify/prettify.js"></script>
    <script src="/thumb/Public/wqui/assets/zeroclipboard/ZeroClipboard.js"></script>
    <script src="/thumb/Public/wqui/assets/js/application.js"></script>

</body>
</html>