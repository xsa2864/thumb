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
    <li><a href="<?php echo U('Order/index');?>">订单列表</a></li>
    <li class="active">查看</li>
</ul>

<form class="sui-form sui-row-fluid form-horizontal" id="filterForm" action="" method="post">
      <div class="span4">
        <div class="control-group">
          <label class="control-label" for="input004">订单号：</label>
          <label for="input002"> <?php echo ($orders["orderid"]); ?> </label>    
        </div>
        <div class="control-group">
          <label class="control-label" for="input001">创建时间：</label>
          <label for="input002"> <?php echo (date("Y-m-d H:i:s",$orders["addtime"])); ?> </label>          
        </div>
        <div class="control-group">
          <label class="control-label" for="input003">成交时间：</label>
          <label for="input002"> <?php echo (date("Y-m-d H:i:s",$orders["paytime"])); ?> </label>
        </div>
      </div>
      <div class="span4">
        <div class="control-group">
          <label class="control-label" for="input005">收件人姓名：</label>
          <label for="input002"> <?php echo ($orders["realname"]); ?> </label>
        </div>
        <div class="control-group">
          <label class="control-label" for="input006">收件人电话：</label>
          <label for="input002"> <?php echo ($orders["mobile"]); ?> </label>
        </div>
        <div class="control-group">
          <label class="control-label" for="input007">收件人地址：</label>
          <label for="input002"> <?php echo ($orders["address"]); ?> </label>
        </div>
      </div>
      <div class="span4">
        <div class="control-group">
          <label class="control-label" for="select001">待定：</label>
          <label for="input002"> 待定 </label>
        </div>
        <div class="control-group">
          <label class="control-label" for="select002">待定：</label>
          <label for="input002"> 待定 </label>
        </div>
        <div class="control-group">
          <label class="control-label" for="select003">订单状态：</label>
          <label for="input003"> 
            <?php if($orders["status"] == 1): ?>已付款
              <else if condition="$orders.status eq 2">
              申请退货
              <else if condition="$orders.status eq 3">
              已退款
              <?php else: ?>
              未付款<?php endif; ?> 
          </label>
        </div>
      </div>
</form>

<table class="sui-table sui-table-nobody">
  <thead>
    <tr>
      <th width="8%">
        <label class="checkbox"><input type="checkbox" name="">全选</label>
      </th>
      <th class="center" width="22%">商品</th>
      <th class="center" width="10%">零售价(元)
          <i class="sui-glyphicon glyphicon-question-sign sui-text-warning" title="就是零售的价格..."></i></th>
      <th class="center" width="10%">付款金额(元)</th>
      <th class="center" width="10%">数量</th>
      <th class="center" width="10%">操作</th>
      <th class="center" width="10%">分销商</th>
      <th class="center" width="10%">实收款(元)</th>
      <th class="center" width="10%">采购状态/操作</th>
    </tr>
  </thead>
</table>
<table class="sui-table sui-table-bordered">
  <thead>
    <tr>
      <th colspan="9" class="sui-muted">
        <label class="checkbox pull-left">
          <input type="checkbox" name=""> 2) 
          <span class="sui-label sui-label-important">经销</span>
          分销流水号：212500 订单编号：<?php echo ($orders["orderid"]); ?> 收货人：未免 
          <i class="sui-glyphicon glyphicon-filter"></i>
        </label>
        <span class="pull-right">成交时间：<?php echo (date("Y-m-d H:i:s",$orders["paytime"])); ?> 
          <i class="sui-glyphicon glyphicon-flag"></i>
        </span>
      </th>
    </tr>
  </thead>

  <tbody> 
    <?php if(is_array($orders_info)): $k = 0; $__LIST__ = $orders_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
        <td colspan="2" width="30%">
          <div class="typographic clearfix">
            <img src="<?php echo ($vo["img"]); ?>" alt="">
            <span>
              <a href=""><?php echo ($vo["goodsname"]); ?> <i class="sui-glyphicon glyphicon-ok-sign"></i></a>
              <br>商家编号：<?php echo ($vo["goods_id"]); ?>
            </span>
          </div>
        </td>
        <td class="center left-con" width="10%">122.00</td>
        <td class="center left-con" width="10%"><?php echo ($vo["price"]); ?></td>
        <td class="center left-con" width="10%"><?php echo ($vo["qty"]); ?></td>
        <td class="center left-con" width="10%"><a href=""></a></td>

        <?php if($k == 1): ?><td class="center" width="10%" rowspan="<?php echo ($count); ?>">
             <a href="">yexue</a><br>
           </td>
           <td class="center" width="10%" rowspan="<?php echo ($count); ?>">
             <span class="sui-text-warning price"><?php echo ($orders["goodsamount"]); ?></span><br>
             <span class="sui-muted">
                <?php if($orders["postfree"] == 0): ?>(供应商包邮)<?php else: ?>(供应商不包邮)<?php endif; ?>
             </span>
             <br>
           </td>
           <td class="center" width="10%" rowspan="<?php echo ($count); ?>">
              
             付款信息待确认，待发货<hr>
             <a href="" class="sui-btn btn-primary">确认发货</a><br>             
           </td><?php endif; ?>

      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>


<script type="text/javascript">
  function del(user_id,id){
    if(confirm("确定删除!")){
        $.ajax({
            url:"<?php echo U('Member/del');?>",
            type:'post',
            data:{action:'del',user_id:user_id},
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