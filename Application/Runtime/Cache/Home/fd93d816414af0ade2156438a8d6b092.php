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
    <li class="active">分类列表</li>
</ul>

<button class="sui-btn btn-primary" onclick="cate_add()">添加分类</button>
<button id="J_addsuppliers" data-toggle="modal" data-target="#J_addsuppliersDialog" data-width="large" data-backdrop="static" style="display: none">添加分类</button>


<table class="sui-table">
  <thead>
    <tr>
      <th>#</th>
      <th>分类名称</th>
      <th>分类等级</th>
      <th>上级分类</th>
      <th>排序</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  	<?php if(is_array($tree)): $k = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="c_<?php echo ($k); ?>">
      <td><?php echo ($k); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><?php echo ($vo["level"]); ?></td>
      <td>顶级分类</td>
      <td><?php echo ($vo["seq"]); ?></td>
      <td>
        <a href="javascript:cate_add('<?php echo ($vo["name"]); ?>',<?php echo ($vo["pid"]); ?>,<?php echo ($vo["cat_id"]); ?>)">添加</a>
        <a href="javascript:cate_edit(<?php echo ($vo["cat_id"]); ?>,'<?php echo ($vo["name"]); ?>')">编辑</a>
        <a href="javascript:del(<?php echo ($vo["cat_id"]); ?>,'c_<?php echo ($k); ?>');">删除</a>
      </td>
    </tr>   
        <?php if(is_array($vo["child"])): $ck = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($ck % 2 );++$ck;?><tr id="c_<?php echo ($k); echo ($ck); ?>">
           <td></td>
           <td><?php echo ($child["name"]); ?></td>
           <td><?php echo ($child["level"]); ?></td>
           <td><?php echo ($vo["name"]); ?></td>
           <td><?php echo ($child["seq"]); ?></td>
           <td>
             <!-- <a href="javascript:cate_add('<?php echo ($vo["name"]); ?>',<?php echo ($child["pid"]); ?>,<?php echo ($child["cat_id"]); ?>)">添加</a> -->
             <a href="javascript:cate_edit(<?php echo ($child["cat_id"]); ?>,'<?php echo ($vo["name"]); ?>')">编辑</a>
             <a href="javascript:del(<?php echo ($child["cat_id"]); ?>,'c_<?php echo ($k); echo ($ck); ?>');">删除</a>
           </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>




<div id="J_addsuppliersDialog" tabindex="-1" role="dialog" class="sui-modal hide fade" data-addsupplierurl="http://" data-getsuppliersurl="http://xxx">

  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
              <h4 id="myModalLabel" class="modal-title">添加分类</h4>
          </div>
          <div class="modal-body sui-form form-horizontal">
              <table class="sui-table table-bordered-simple">
                <thead>
                    <tr>
                        <th>分类名称</th>
                        <th>分类等级</th>
                        <th>上级分类</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="name" id="name" /></td>
                        <td><input type="text" name="level" id="level" /></td>
                        <td>
                          <span id="pid_name"></span>
                          <input type="hidden" name="pid" id="pid" />
                        </td>
                        <td><input type="text" name="seq" id="seq" /></td>
                        <td data-supplierid="111">
                            <input type="hidden" name="action" id="action" />
                            <input type="hidden" name="cat_id" id="cat_id" />
                            <button class="sui-btn btn-small J_addOneSupplier">保存</button>
                        </td>
                    </tr>
                </tbody>
              </table>
          </div>
      </div>
  </div>
</div>


<script>  
  $(".J_addOneSupplier").click(function(){
    var name = $("#name").val();
    var level = $("#level").val();
    var pid = $("#pid").val();
    var seq = $("#seq").val();
    var action = $("#action").val();
    var cat_id = $("#cat_id").val();
    $.ajax({
        url:"<?php echo U('Category/edit');?>",
        type:'post',
        data:{action:action,name:name,level:level,pid:pid,seq:seq,cat_id:cat_id},
        dataType:'json',
        success:function(data){
            if(data.code == 1){
               location.replace(location.href);
            }else{
              alert(data.msg);
            }
        }
    });
  });

  // 添加分类
  function cate_add(name,pid,cat_id){
    $("#myModalLabel").html("添加分类");
    $("#name").val('');
    $("#level").val(0);
    $("#seq").val(0);
    $("#action").val('add');
    $("#pid").val(cat_id);

    if(pid == 0){
      $("#pid_name").html("顶级分类");
    }else if(name!=null){
      $("#pid_name").html(name);
    }

    $('#J_addsuppliers').click();
  }

  // 编辑分类
  function cate_edit(cat_id,name){
    $("#myModalLabel").html("编辑分类");

    $.ajax({
      url:"<?php echo U('Category/getInfo');?>",
      type:'post',
      data:{action:'getInfo',cat_id:cat_id},
      dataType:'json',
      success:function(data){
        if(data.code == 1){
            $("#name").val(data.name);
            $("#level").val(data.level);
            $("#pid_name").html(name);
            $("#pid").val(data.pid);
            $("#cat_id").val(data.cat_id);
            $("#seq").val(data.seq);
            if(data.pid == 0){
              $("#pid_name").html("顶级分类");
            }
        }else{
            aler(data.msg);
        }
      }
    });
    $("#action").val('edit');
    $('#J_addsuppliers').click();
  }

  function del(cat_id,id){
    if(confirm("确定删除!")){
        $.ajax({
            url:"<?php echo U('Category/del');?>",
            type:'post',
            data:{action:'del',cat_id:cat_id},
            dataType:'json',
            success:function(data){
              if(data.code == 1){
                alert(data.msg);
                $("#"+id).attr("style","display:none");
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