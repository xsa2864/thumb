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
  <link href="/thumb/Public/wqui/assets/css/docs.css" rel="stylesheet">
  <link href="/thumb/Public/wqui/assets/js/google-code-prettify/prettify.css" rel="stylesheet">

</head>
<body>
<div class="sui-navbar navbar-inverse navbar-fixed-top">
   <div class="navbar-inner">
     <div class="sui-container">
    	<a href="#" class="sui-brand">
    		<i class="sui-icon icon-github-alt">&nbsp;</i>THUMB
    	</a>
       <ul class="sui-nav">
         <li><a href="#">待定</a></li>
         <li><a href="#">待定</a></li>
         <li><a href="#">待定</a></li>
         <li><a href="#">待定</a></li>
         <li><a href="#">待定</a></li>
         <li><a href="#">待定</a></li>
       </ul>
     </div>
   </div>
</div>

<div class="sui-layout">
    <div class="sidebar">
        <ul class="sui-nav nav-tabs nav-stacked nav-xlarge docs-sidenav">
          <li><a href="#"><i class="sui-icon icon-globe">&nbsp;</i></a>
          </li>
          <li>
            <a>
              <i class="sui-icon icon-magic">&nbsp;</i>
              商品管理<i class="sui-icon icon-angle-down pull-right"></i>
            </a>
            <ul class="sui-nav nav-tabs nav-stacked">
              <li><a href="<?php echo U('Goods/index');?>">商品列表</a></li>
              <li><a href="<?php echo U('Category/index');?>">分类列表</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
            </ul>
          </li>
          <li>
          	<a>
          		<i class="sui-icon icon-touch-list">&nbsp;</i>
          		订单管理<i class="sui-icon icon-angle-down pull-right"></i>
          	</a>
            <ul class="sui-nav nav-tabs nav-stacked">
              <li><a href="<?php echo U('Order/index');?>">订单列表</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
            </ul>
          </li>
          <li>
          	<a>
          		<i class="sui-icon icon-touch-users2">&nbsp;</i>
          		会员管理<i class="sui-icon icon-angle-down pull-right"></i>
          	</a>
            <ul class="sui-nav nav-tabs nav-stacked">
              <li><a href="<?php echo U('Member/index');?>">会员列表</a></li>
              <li><a href="<?php echo U('Money/index');?>">资金列表</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
              <li><a href="#">待定</a></li>
            </ul>
          </li>
        </ul>
        <script type="text/javascript">var disqus_identifier = 'disqus-id-dropdown-js';</script>
    </div>
    <div class="content">
        <div class="content-inner">
        	
    <link href="/thumb/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">

    <script type="text/javascript" charset="utf-8" src="/thumb/Public/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/thumb/Public/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/thumb/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
    <style type="text/css">
/* 原bs里面的缩略图样式 */
.img-round{border-radius: 3px;display:block;padding:3px;border:1px solid #ccc;position: relative;}
.img-round .upload-label{position: absolute;display:inline-block;padding:5px 0;width:70%;border:1px solid #ccc;left:15%;top:50%;margin-top:-15px;;background-color:#fff;text-align: center;}
  
    </style>
<br>
<ul class="sui-breadcrumb">
    <li><a href="#">首页</a></li>
    <li><a href="<?php echo U('Goods/index');?>">商品管理</a></li>
    <li class="active"><?php echo ($active); ?></li>
</ul>

<form class="sui-form form-horizontal" method="post" action="<?php echo U('Goods/edit');?>" enctype="multipart/form-data" >
  <div class="control-group">
    <label class="control-label">商品名称：</label>
    <div class="controls">
      <input type="text" class="input-xxlarge" name="goodsName" value="<?php echo ($data["goodsname"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">品名：</label>
    <div class="controls">
      <input type="text" class="input-large" name="brand" value="<?php echo ($data["brand"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">分类：</label>
    <div class="controls">
      <span class="sui-dropdown dropdown-bordered select">
        <span class="dropdown-inner">
          <a id="drop4" role="button" data-toggle="dropdown" href="#" class="dropdown-toggle">
            <i class="caret"></i>
            <input type="hidden" name="cat_id" value=<?php echo ((isset($data["cat_id"]) && ($data["cat_id"] !== ""))?($data["cat_id"]):0); ?>>
            <span name="cat_id"><?php echo ((isset($data["name"]) && ($data["name"] !== ""))?($data["name"]):"请选择"); ?></span>
          </a>
            <ul id="menu4" role="menu" aria-labelledby="drop4" class="sui-dropdown-menu">
              <?php if(is_array($level)): $i = 0; $__LIST__ = $level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li role="presentation">
                    <a role="menuitem" tabindex="-1" href="javascript:void(0);" value="<?php echo ($vo["cat_id"]); ?>"><?php echo ($vo["name"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </span>
      </span>      
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">商品编号：</label>
    <div class="controls">
      <input type="text" class="input-large" name="productId" value="<?php echo ($data["productid"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">商品来源：</label>
    <div class="controls">
      <input type="text" class="input-medium" name="goodsFrom" value="<?php echo ($data["goodsfrom"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">数量单位：</label>
    <div class="controls">
      <input type="text" class="input-medium" name="unit" value="<?php echo ($data["unit"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">价格：</label>
    <div class="controls">
      <input type="text" class="input-medium" name="price" value="<?php echo ($data["price"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">商品数量：</label>
    <div class="controls">
      <input type="text" class="input-medium" name="qty" value="<?php echo ($data["qty"]); ?>">
    </div>
  </div>
  <ul class="sui-row-fluid">
    <li class="span2">
      <div class="img-round">
        <img src="http://placehold.it/200x200/f0f0f0/&amp;text=no picture" alt="">
        <label class="upload-label">
          <input class="hide" type="file" name="">
          <i class="sui-icon-plus sui-text-info"></i> 产品全景图
        </label>
      </div>
    </li>
  </ul>

  <div class="control-group">
    <label class="control-label">详细资料：</label>
    <div class="controls">
      <script type="text/plain" id="myEditor" style="width:100%;height:240px;" name="text">
      <?php echo ($data["text"]); ?>
      </script>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <input type="hidden" name="action" value="<?php echo ($action); ?>"></input>
      <input type="hidden" name="goods_id" value="<?php echo ($data["goods_id"]); ?>"></input>
      <button type="submit" class="sui-btn btn-primary">保存</button>
      <button type="reset" class="sui-btn">重置</button>
    </div>
  </div>

</form>
<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
</script>

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

<script type="text/javascript">
  $(document).ready(
    function(){
      // 方法一
      var url = location.href;
      var str = url.substr(url.indexOf('index.php')+10);
      var arr = str.split('/');
      var mat_str = arr[0]+'/'+arr[1]+'/';     
      $(".sidebar>ul>li").each(function(n){
          var n=n+1;
          $(".sidebar>ul>li:nth-child("+n+")>ul>li a").each(function(i){
            var href = $(this).attr("href");
            if(href.indexOf(mat_str)>0){
              $(".sidebar>ul>li:nth-child("+n+")").attr("class","active");
              $(".sidebar>ul>li:nth-child("+n+")>ul>li:nth-child("+(i+1)+")").attr("class","active");
            }
          });
      });     
      // 方法二
      // $(".sidebar>ul>li:nth-child(<?php echo ($path_one); ?>)").attr("class","active");
      // $(".sidebar>ul>li:nth-child(<?php echo ($path_one); ?>)>ul>li:nth-child(<?php echo ($path_two); ?>)").attr("class","active");
    }
  );
</script>
</body>
</html>