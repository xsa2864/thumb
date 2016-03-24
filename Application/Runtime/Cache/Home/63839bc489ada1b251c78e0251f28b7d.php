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
        	
<br>
<ul class="sui-breadcrumb">
    <li><a href="#">首页</a></li>
    <li class="active">商品列表</li>
</ul>
<p>
  <a href="<?php echo U('Goods/edit',array('action'=>'add'));?>" class="sui-btn btn-info"><i class="sui-icon icon-touch-plus"></i>添加商品</a>
</p>

<form class="sui-form" action="<?php echo U('Goods/search');?>" method="post">  
  <div class="input-control">
    <input type="text" placeholder="请输入商品ID" name="goods_id" value="<?php echo ($search_id); ?>">
    
  </div>
  <button class="sui-btn btn-primary" type="submit">搜索</button>
</form>

<table class="sui-table table-bordered">
  <thead>
    <tr>
      <th>商品编号</th>
      <th>品名</th>
      <th>商品名称</th>
      <th>价格</th>
      <th>数量</th>
      <th>数量单位</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  	<?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
      <td><?php echo ($vo["goods_id"]); ?></td>
      <td><?php echo ($vo["brand"]); ?></td>
      <td><?php echo ($vo["goodsname"]); ?></td>
      <td><?php echo ($vo["price"]); ?></td>
      <td><?php echo ($vo["qty"]); ?></td>
      <td><?php echo ($vo["unit"]); ?></td>
      <td>
        <a href="<?php echo U('Goods/edit',array('action'=>'edit','goods_id'=>$vo['goods_id']));?>">编辑</a>
        <a href="javascript:del(<?php echo ($vo["goods_id"]); ?>,<?php echo ($k); ?>)">删除</a>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>

<script type="text/javascript">
  function del(goods_id,id){
    if(confirm("确定删除!")){
        $.ajax({
            url:"<?php echo U('Goods/del');?>",
            type:'post',
            data:{action:'del',goods_id:goods_id},
            dataType:'json',
            success:function(data){
              if(data.code == 1){
                alert(data.msg);
                $("tbody tr:nth-child("+id+")").attr("style","display:none");
              }else{
                alert(data.msg);
              }          
            }
        })
    }
  }
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