<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<title>hello</title>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://www.veryhuo.com/uploads/Common/js/jQuery.md5.js"></script>
<script type="text/javascript">
	
</script>
<body>

<form action="<?php echo U('Index/op_thumb');?>" method="post">
<h3>生成订单</h3>
user_id: <input type="text" name="user_id" value="1"/>
data:  	<input type="text" name="data" value='{"action":"mk_orders","orderid":"20160311","realname":"张三","mobile":"15312301238","address":"福州鼓楼","items":[{"goods_id":"1","qty":"2","unit":"个"},{"goods_id":"2","qty":"1","unit":"箱"}]}'/>
time:  	<input type="text" name="time" value="<?php echo ($time); ?>"/>
key:  	<input type="text" name="key" value="test123456"/>
<br>
code:	<input type="text" name="code" value="97a777960c0362d98802cda7b211abce"/>	
<br>
  	<input type="submit" value="Submit" />
</form>


<form action="<?php echo U('Index/op_thumb');?>" method="post">
<h3>订单查询</h3>
user_id: <input type="text" name="user_id" value="1"/>
data:  	<input type="text" name="data" value='{"action":"get_orders_info","orderid":"20160311"}'/>
time:  	<input type="text" name="time" value="<?php echo ($time); ?>"/>
key:  	<input type="text" name="key" value="test123456"/>
<br>
code:	<input type="text" name="code" value="5b0af08195b96251164784e63a82e141"/>	
<br>
  	<input type="submit" value="Submit" />
</form>

<form action="<?php echo U('Index/op_thumb');?>" method="post">
<h3>订单取消</h3>
user_id: <input type="text" name="user_id" value="1"/>
data:  	<input type="text" name="data" value='{"action":"cancel_order","orderid":"20160311"}'/>
time:  	<input type="text" name="time" value="<?php echo ($time); ?>"/>
key:  	<input type="text" name="key" value="test123456"/>
<br>
code:	<input type="text" name="code" value="e832b288dd23eeb8e0e27b762e1f3a7a"/>	
<br>
  	<input type="submit" value="Submit" />
</form>

<form action="<?php echo U('Index/op_thumb');?>" method="post">
<h3>获取订单状态</h3>
user_id: <input type="text" name="user_id" value="1"/>
data:  	<input type="text" name="data" value='{"action":"order_status","orderid":"20160311"}'/>
time:  	<input type="text" name="time" value="<?php echo ($time); ?>"/>
key:  	<input type="text" name="key" value="test123456"/>
<br>
code:	<input type="text" name="code" value="d737bdb6e6c63993ff5c72b0cdcafa29"/>	
<br>
  	<input type="submit" value="Submit" />
</form>

<form action="<?php echo U('Index/op_thumb');?>" method="post">
<h3>查看单个商品</h3>
user_id: <input type="text" name="user_id" value="1"/>
data:  	<input type="text" name="data" value='{"action":"get_goods_info","goods_id":"1"}'/>
time:  	<input type="text" name="time" value="<?php echo ($time); ?>"/>
key:  	<input type="text" name="key" value="test123456"/>
<br>
code:	<input type="text" name="code" value="d0158b80bd9bf3100d3ba409d4e0f22f"/>	
<br>
  	<input type="submit" value="Submit" />
</form>

<form action="<?php echo U('Index/op_thumb');?>" method="post">
<h3>查看多个商品</h3>
user_id: <input type="text" name="user_id" value="1"/>
data:  	<input type="text" name="data" value='{"action":"get_goods","page":"1","num":"20","goods_id":"1"}'/>
time:  	<input type="text" name="time" value="<?php echo ($time); ?>"/>
key:  	<input type="text" name="key" value="test123456"/>
<br>
code:	<input type="text" name="code" value="a9d33b40ba4c85bbaeea8f6c72ab20a0"/>	
<br>
  	<input type="submit" value="Submit" />
</form>


</body>
</html>