<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<p>欢迎使用 <b>ThinkPHP</b>！</p>','utf-8');
    }

    public function op_thumb(){
    	$user_id = I('user_id',0);
    	$data = I('data','',false);
    	$time = I('time',0);
    	$code = I('code',0);

    	$return_msg['Result'] = "F";
		$return_msg['ResultMsg'] = "fail";
		$return_msg['Content'] = "null";

    	// 校验
		$rs = $this->check_code($user_id,$time,$data,$code);
		if($rs != 1){
			$return_msg['ResultMsg'] = $rs;
			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
  			exit;
		}

		$pr_arr = json_decode($data,true);
  		if(!isset($pr_arr['action'])){
  			$return_msg['ResultMsg'] = "请指明动作";
  			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
  			exit;
  		}
  		$action = $pr_arr['action'];

  		if($action == 'get_goods_info'){
  			
  			$data = $this->get_goods_info($pr_arr['goods_id']);  			
  			$return_msg['Content'] = $data;
  			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);

  		}elseif($action == 'get_goods_info'){

  		}
    }

    // 商品查询api
    public function get_goods_info($goods_id){       	
    	$data = M('goods')->where("goods_id='".$goods_id."'")->find();
    	echo $data;
    }

    // 生成订单api
    public function mk_orders(){

    	$user_id = I('user_id',0);
    	$data = I('data','',false);
    	$time = I('time',0);
    	$code = I('code',0);

    	$return_msg['Result'] = "F";
		$return_msg['ResultMsg'] = "fail";
		$return_msg['Content'] = "null";

    	// 校验
		$rs = $this->check_code($user_id,$time,$data,$code);
		if($rs != 1){
			$return_msg['ResultMsg'] = $rs;
			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
  			exit;
		}

		// 用于判断明细是否插入成功
    	$mk_status = 0;    	

  		$pr_arr = json_decode($data,true);
  		if(!isset($pr_arr['items'])){
  			$return_msg['ResultMsg'] = "没有商品明细";
  			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
  			exit;
  		}
  		$orders = M('orders');
  		// 生成订单
  		$arr['OrderId'] = isset($pr_arr['orderid']) ? $pr_arr['orderid']:'';

  		$ch_rs = $orders->where("orderid='".$pr_arr['orderid']."'")->find();

  		if($ch_rs){
  			$return_msg['ResultMsg'] = "订单号已经存在";
			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
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
				echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
				exit;
			}
		}    	
		echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
		exit;
    }

    // 订单明细api
    public function get_orders_info(){

    	$user_id = I('user_id',0);
    	$data = I('data','',false);
    	$time = I('time',0);
    	$code = I('code',0);

    	$return_msg['Result'] = "F";
		$return_msg['ResultMsg'] = "fail";
		$return_msg['Content'] = "null";

    	// 校验
		$rs = $this->check_code($user_id,$time,$data,$code);
		if($rs != 1){
			$return_msg['ResultMsg'] = $rs;
			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
  			exit;
		}

  		$pr_arr = json_decode($data,true);
  		if(!isset($pr_arr['orderid'])){
  			$return_msg['ResultMsg'] = "没有订单号";
  			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
  			exit;
  		}

    	$sql = "SELECT * FROM th_orders tos LEFT JOIN th_orders_info toi ON toi.OrderId=tos.OrderId WHERE tos.OrderId='".$pr_arr['orderid']."' ";
    	$data = M()->query($sql);
    	
    	if(empty($data)){
    		$return_msg['ResultMsg'] = "没有查到订单信息";
  			echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
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
    	echo json_encode($return_msg,JSON_UNESCAPED_UNICODE);
    }

    /*取消订单api*/
    public function cancel_order(){
    	$OrderId = I('OrderId','20160310');
		$AppSecret = I('AppSecret','test123456');
		$format = I('format','json');
		$data['Status'] = 2;
		if($format=='json'){
			if(M('orders')->where("OrderId='$OrderId' and AppSecret='$AppSecret'")->save($data)){
				$arr['Result'] = "T";
				$arr['ResultMsg'] = "取消订单成功";
			}else{
				$arr['Result'] = "F";
				$arr['ResultMsg'] = "取消订单失败";
			}
			echo json_encode($arr,JSON_UNESCAPED_UNICODE);
		}else{
			if(M('orders')->where("OrderId='$OrderId' and AppSecret='$AppSecret'")->save($data)){
				$arr['Result'] = "T";
				$arr['ResultMsg'] = "取消订单成功";
			}else{
				$arr['Result'] = "F";
				$arr['ResultMsg'] = "取消订单失败";
			}
			echo $this->make_xml($arr);
		}
    }

    /*生成xml格式的数据*/
    public function make_xml($arr){
    	$doc = new \DOMDocument('1.0', 'utf-8');  // 声明版本和编码 
		$doc->formatOutput = true; 
		 
		$r = $doc->createElement("Message"); 
		$doc->appendChild($r); 		
		$b = $doc->createElement("Header"); 

		foreach ($arr as $key => $value) {
			$name = $doc->createElement("$key"); 
			$name->appendChild($doc->createTextNode($value)); 
			$b->appendChild($name); 
		}		

		$r->appendChild($b); 
		 
		echo $doc->saveXML(); 
    }

    /*获取订单状态*/
    public function order_status(){
    	echo "<meta charset=utf-8>";
    	$OrderId = I('OrderId','20160310');
		$AppSecret = I('AppSecret','test123456');
		$format = I('format','json');
		$StatusCode = array("-1"=>"未发送","0"=>"未申报","1"=>"已申报","2"=>"单证放行","3"=>"单证未通过","4"=>"货物放行","5"=>"查验未通过","gj1"=>"国检已申报","gj2"=>"国检抽检","gj3"=>"国检放行","gj4"=>"国检未通过","9"=>"已关闭");
		$arr['Result'] = "F";
		$arr['ResultMsg'] = "fail";

		$info = M('orders')->field('status,logisticsno')->where("OrderId='$OrderId' and AppSecret='$AppSecret'")->find();

		if($format=='json'){
			if(!empty($info)){
				$arr['Result'] = "T";
				$arr['ResultMsg'] = "success";
				$arr['StatusCode'] = $info['status'];
				$arr['StatusName'] = $StatusCode[$info['status']];
				$arr['LogisticsNo'] = $info['logisticsno'];
			}
			echo json_encode($arr,JSON_UNESCAPED_UNICODE);
		}else{
			if(!empty($info)){
				$arr['Result'] = "T";
				$arr['ResultMsg'] = "success";
				$arr['StatusCode'] = $info['status'];
				$arr['StatusName'] = $StatusCode[$info['status']];
				$arr['LogisticsNo'] = $info['logisticsno'];
			}			
			echo $this->make_xml($arr);
		}

    }


    //获取加密串
    public function get_sign_str($params='') {
    	$AppSecret = 'test123456';
    	$data = M('users')->where("AppSecret='$AppSecret'")->select();
    	$params['AppSecret'] = $AppSecret;

    	$checktime =  $data[0]['validitytime']+$data[0]['checktime'];

    	if($checktime<time()){
    		return "fail";
    	}
    	
        ksort($params);
        $paramStr = serialize($params).'fx.seabuy.com';
        return md5($paramStr);
	}

	/*
	*判断code是否合法
	* 0 不合法 1 合法 2 过期 3 缺少key 4 参数有问题
	**/
	public function check_code($user_id=0,$time=0,$data='',$code=''){	
		if(empty($data)||empty($code)){
			return "参数有问题";
		}
		
		$key = M('users')->where("user_id='".$user_id."'")->getField('key');
		if(empty($key)){
			return "缺少key";
		}

		$str = $user_id.$time.$data['data'];
		$check_code = md5($data);

		if($code == $check_code){
			if($t>time()-5000){
				return 2;	//认证时间过期了
			}
			return 1;	//检测合法
		}		
		return "不合法";	//检测不合法
	}

}