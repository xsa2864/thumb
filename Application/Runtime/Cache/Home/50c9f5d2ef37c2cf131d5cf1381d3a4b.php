<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>登录</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <link href="http://g.tbcdn.cn/sj/wqui/1.0.0/css/sui.min.css" rel="stylesheet">

  <script type="text/javascript" src="http://g.tbcdn.cn/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.tbcdn.cn/sj/wqui/1.0.0/js/sui.min.js"></script>

  <link href="/thumb/Public/wqui/assets/css/animate.css" rel="stylesheet">
  <link href="/thumb/Public/wqui/assets/css/docs.css" rel="stylesheet">
  <link href="/thumb/Public/wqui/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <style type="text/css">
  body{background-color: #efefef;}
  .login{

  }
  </style>
</head>
<body>

  <form class="sui-form form-horizontal" >
    <div class="control-group">
      <label for="username" class="control-label">账户：</label>
      <div class="controls">
        <input type="text" id="username" placeholder="账户">
      </div>
    </div>
    <div class="control-group">
      <label for="password" class="control-label">密码：</label>
      <div class="controls"><input type="password" id="password" placeholder="密码"></div>
    </div>
    <div class="control-group">
      <label class="control-label"></label>
      <div class="controls"></div>
      <label data-toggle="checkbox" class="checkbox-pretty inline">
        <input type="checkbox" name="remember-me"><span>记住我</span>
      </label>
    </div>
    <div class="control-group">
      <label class="control-label"></label>
      <div class="controls">
        <button type="button" id="btn_login" class="sui-btn btn-primary">登录</button>
      </div>
    </div>
  </form>
<script type="text/javascript">
  $("#btn_login").click(function(){
    var username = $("#username").val();
    var password = $("#password").val();
    $.ajax({
      url:"<?php echo U('Login/login');?>",
      type:'post',
      data:{username:username,password:password},
      dataType:'json',
      success:function(data){
        if(data.code == 1){
          location.href="<?php echo U('Goods/index');?>";
        }else{
          alert(data.msg);
        }
      }
    })
  })
</script>
</body>
</html>