<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<p>欢迎使用 <b>ThinkPHP</b>！</p>','utf-8');
    }

    public function op_thumb(){
    	echo "<meta charset=utf-8>";
    	$user_id = I('user_id',0);
    	$data = I('data','',false);
    	$time = I('time',0);
    	$key = I('key','');
    	$code = I('code',0);

    	$return_msg['Result'] = "F";
		$return_msg['ResultMsg'] = "fail";
		$return_msg['Content'] = "null";

    	// 校验
		$rs = $this->check_code($user_id,$time,$data,$code,$key);

		if(!isset($rs['Result'])){		
			
  			isset($rs['ResultMsg']) ? $return_msg['ResultMsg'] = $rs['ResultMsg'] : '';  			
			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
  			exit;
		}
		// 解析
		$pr_arr = json_decode($data,true);
  		if(!isset($pr_arr['action'])){
  			$return_msg['ResultMsg'] = "请指明动作";
  			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
  			exit;
  		}

  		$action = $pr_arr['action'];
  		$orderid = isset($pr_arr['orderid'])?$pr_arr['orderid']:'';

  		if($action == 'get_goods_info'){
  			// 获取商品信息
  			$a_data = $this->get_goods_info($pr_arr['goods_id']);  			

  		}elseif($action == 'get_goods'){
  			// 获取分页商品信息
  			$a_data = $this->get_goods($pr_arr);
  			
  		}elseif($action == 'mk_orders'){
  			// 生成订单
  			$a_data = $this->mk_orders($pr_arr,$user_id);
  			
  		}elseif($action == "get_orders_info"){
  			// 获取订单信息
  			$a_data = $this->get_orders_info($orderid,$user_id);
  		
  		}elseif($action == "cancel_order"){
  			// 取消订单
			$a_data = $this->cancel_order($orderid,$user_id);
			
  		}elseif($action == "order_status"){
  			// 获取订单状态
  			$a_data = $this->order_status($orderid,$user_id);
  			
  		}
  		isset($a_data['Result']) ? $return_msg['Result'] = $a_data['Result'] : '';
  		isset($a_data['ResultMsg']) ? $return_msg['ResultMsg'] = $a_data['ResultMsg'] : '';
  		isset($a_data['Content']) ? $return_msg['Content'] = $a_data['Content'] : '';
  		echo json_encode($return_msg,JSON_UNESCAPED_UNICODE); 		

    }

    // 根据商品id查询
    public function get_goods_info($goods_id=''){ 

    	if($goods_id!=''){
	    	// $return_msg['Content'] = M('goods')->where("goods_id='".$goods_id."'")->find();
	    	$sql = "SELECT * FROM th_goods gs LEFT JOIN th_goods_photos gps ON gps.goods_id=gs.goods_id
					WHERE gs.goods_id='$goods_id'";
			$data = M()->query($sql);
			$return_msg['Content'] = $data[0];
			
	    	if(!empty($return_msg['Content'])){
	    		$return_msg['Result'] = "T";
				$return_msg['ResultMsg'] = "success";
	    		return $return_msg;
	    	}  	
    	}

		$return_msg['Content'] = "没有查到商品";
    	return $return_msg;
    	
    }

    // 分页商品查询
    public function get_goods($arr){ 

    	if(isset($arr['page'])){
    		$return_msg['Content'] = M('goods')->limit($arr['page'],$arr['num'])->select();
    		if(!empty($return_msg['Content'])){
	    		$return_msg['Result'] = "T";
				$return_msg['ResultMsg'] = "success";
	    		return $return_msg;
	    	}  	
    	}

		$return_msg['Content'] = "没有查到商品";
    	return $return_msg;
    	
    }

    // 生成订单api
    public function mk_orders($pr_arr,$user_id){

		// 用于判断明细是否插入成功
    	$mk_status = 0;    	

  		$orders = M('orders');
  		// 生成订单
  		$arr['OrderId'] = isset($pr_arr['orderid']) ? $pr_arr['orderid']:'';

  		$ch_rs = $orders->where("orderid='".$pr_arr['orderid']."'")->find();

  		if($ch_rs){
  			$return_msg['ResultMsg'] = "订单号已经存在";
			return $return_msg;
  			exit;
  		}

  		$arr['user_id'] = $user_id;  		
  		$arr['RealName'] = isset($pr_arr['realname']) ? $pr_arr['realname']:'';
  		$arr['mobile'] = isset($pr_arr['mobile']) ? $pr_arr['mobile']:'';
  		$arr['address'] = isset($pr_arr['address']) ? $pr_arr['address']:'';
  		$arr['AddTime'] = time();

  		$result = M('orders')->data($arr)->add();

  		if($result){
  			// 插入订单明细
			for($i=0;$i<count($pr_arr['items']);$i++){
				$goods_id = $pr_arr['items'][$i]['goods_id'];
				$qty = $pr_arr['items'][$i]['qty'];
				$ch_data = M('goods')->where("goods_id='$goods_id'")->find();
				$ch_arr['ord_id'] = $result;
				$ch_arr['OrderId'] = $pr_arr['orderid'];
				$ch_arr['goods_id'] = $ch_data['goods_id'];
				$ch_arr['GoodsName'] = $ch_data['goodsname'];
				$ch_arr['Qty'] = $qty;
				$ch_arr['Price'] = $ch_data['price'];
				$ch_arr['Unit'] = $ch_data['unit'];
				
				if(M('orders_info')->data($ch_arr)->add()){
					$mk_status++;
				}
			}
			if($mk_status == count($pr_arr['items'])){
				$return_msg['Result'] = "T";
				$return_msg['ResultMsg'] = "success";			
				return $return_msg;
				exit;
			}
		}    	
		return $return_msg;
		exit;
    }

    // 订单明细api
    public function get_orders_info($orderid,$user_id){

    	$sql = "SELECT * FROM th_orders tos LEFT JOIN th_orders_info toi ON toi.OrderId=tos.OrderId WHERE tos.OrderId='".$orderid."' and tos.user_id='$user_id' ";
    	$data = M()->query($sql);
    	
    	if(empty($data)){
    		$return_msg['ResultMsg'] = "没有查到订单信息";
  			return $return_msg;
  			exit;
    	}

    	for($i=0;$i<count($data);$i++){
    		$item['items'][$i]['orderid'] = $data[$i]['orderid'];
    		$item['items'][$i]['goodsname'] = $data[$i]['goodsname'];
    		$item['items'][$i]['qty'] = $data[$i]['qty'];
    		$item['items'][$i]['price'] = $data[$i]['price'];
    		$item['items'][$i]['unit'] = $data[$i]['unit'];
    		$item['items'][$i]['goods_id'] = $data[$i]['goods_id'];
    		$item['items'][$i]['PostFee'] = $data[$i]['PostFee'];
    	}
    	unset($data[0]['orderid']);
    	unset($data[0]['goodsname']);
    	unset($data[0]['qty']);
    	unset($data[0]['price']);

		$return_msg['Content'] = array_merge($data[0],$item);
		$return_msg['Result'] = "T";
		$return_msg['ResultMsg'] = "success";
    	return $return_msg;
    }

    /*取消订单api*/
    public function cancel_order($orderid,$user_id){
    	
		$data['Status'] = 2;
		
		if(M('orders')->where("OrderId='$orderid' and user_id='$user_id'")->save($data)){
			$return_msg['Result'] = "T";
			$return_msg['ResultMsg'] = "取消订单成功";
		}else{
			$return_msg['Result'] = "F";
			$return_msg['ResultMsg'] = "取消订单失败";
		}
		return $return_msg;
		
    }


    /*获取订单状态*/
    public function order_status($orderid,$user_id){

		$StatusCode = array("-1"=>"未发送","0"=>"未申报","1"=>"已申报","2"=>"单证放行","3"=>"单证未通过","4"=>"货物放行","5"=>"查验未通过","gj1"=>"国检已申报","gj2"=>"国检抽检","gj3"=>"国检放行","gj4"=>"国检未通过","9"=>"已关闭");

		$info = M('orders')->field('status,logisticsno')->where("OrderId='$orderid' and user_id='$user_id'")->find();

		if(!empty($info)){
			$return_msg['Result'] = "T";
			$return_msg['ResultMsg'] = "success";
			$return_msg['Content'] = $StatusCode[$info['status']];
			return $return_msg;
		}

		$return_msg['ResultMsg'] = "未查询到内容";
		return $return_msg;
    }


	/*
	*判断code是否合法
	* 0 不合法 1 合法 2 过期 3 缺少key 4 参数有问题
	**/
	public function check_code($user_id=0,$time=0,$data='',$code='',$key=''){	
		if(empty($data)||empty($code)){
			$return_msg['ResultMsg'] = "参数有问题";
			return $return_msg;
		}
		
		$check_key = M('users')->where("user_id='".$user_id."'")->getField('key');

		if($check_key != $key){

			$return_msg['ResultMsg'] = "key有问题";
			return $return_msg;
		}

		$str = $user_id.$data.$time.$key;
		$check_code = md5($str);

		if($code == $check_code){
			if($t>time()-5000){
				$return_msg['ResultMsg'] = "认证时间过期了";
				return $return_msg;				
			}
			$return_msg['Result'] = true;
			return $return_msg;	//检测合法
		}		
		
		//检测不合法
		$return_msg['ResultMsg'] = "不合法$check_code";
		return $return_msg;
	}

}