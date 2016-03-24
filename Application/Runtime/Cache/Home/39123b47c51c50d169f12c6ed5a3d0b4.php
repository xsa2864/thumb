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
    <li><a href="<?php echo U('Money/index');?>">资金列表</a></li>
    <li class="active">资金明细</li>
</ul>

<h3 style="border-bottom: 2px solid #bbb;">订单详情</h3>
<div><label>交易号 : <?php echo ($data["or_trade_code"]); ?>|  <?php echo ($data["log_status"]); ?></label></div>
<br>
订单信息
<table class="sui-table table-bordered">
  <thead>
    <tr>     
      <th>名称</th>
      <th>订单号</th>
      <th>对方</th>
      <th>支付方式</th>
      <th>终端</th>
    </tr>
  </thead>
  <?php if(!empty($data["or_orderid"])): ?><tbody>   
      <tr>
        <td><?php echo ($data["or_orderid"]); ?></td>
        <td><?php echo ($data["or_orderid"]); ?></td>
        <td><?php echo ($data["or_orderid"]); ?></td>   
      </tr>
    </tbody><?php endif; ?>
</table>

资金信息
<table class="sui-table table-bordered">
  <thead>
    <tr>     
      <th>订单金额</th>
      <th>优惠</th>
      <th>实付金额</th>
    </tr>
  </thead>
  <?php if(!empty($data["or_goodsamount"])): ?><tbody>   
      <tr>
        <td><?php echo ($data["or_goodsamount"]); ?></td>
        <td>-<?php echo ($data["discount"]); ?></td>
        <td>=<?php echo ($data["or_goodsamount"]); ?></td>   
      </tr>
    </tbody><?php endif; ?>
</table>

退款信息
<table class="sui-table table-bordered">
  <thead>
    <tr>     
      <th>退款时间</th>
      <th>退款单号</th>
      <th>退款金额</th>
      <th>备注</th>
    </tr>
  </thead>
  <?php if($data["or_status"] >= 2): ?><tbody>   
      <tr>
        <td><?php echo ($data["or_goodsamount"]); ?></td>
        <td><?php echo ($data["discount"]); ?></td>
        <td><?php echo ($data["or_goodsamount"]); ?></td>   
      </tr>
    </tbody><?php endif; ?>
</table>

动作流程
<table class="sui-table table-bordered">
  <thead>
    <tr>     
      <th>流程</th>
      <th>时间</th>
      <th>金额</th>
    </tr>
  </thead>
  <tbody>   
    <tr>
      <td>创建</td>
      <td><?php echo (date("Y-m-d H:i:s",$data["or_addtime"])); ?></td>
      <td><?php echo ($data["log_money"]); ?></td>   
    </tr>
    <tr>
      <td>支付</td>
      <td><?php echo (date("Y-m-d H:i:s",$data["or_paytime"])); ?></td>
      <td><?php echo ($data["log_money"]); ?></td>   
    </tr>
    <tr>
      <td>交易完成</td>
      <td><?php echo (date("Y-m-d H:i:s",$data["log_addtime"])); ?></td>
      <td><?php echo ($data["log_money"]); ?></td>   
    </tr>
  </tbody>
</table>


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