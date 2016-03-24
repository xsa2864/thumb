<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
	
	public function index(){

		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		$Orders = M('orders'); // 进行分页数据查询 意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$list = $Orders->order('ord_id desc')->page($p.',4')->select();
		$this->assign('list',$list);// 赋值数据集

		$count = $Orders->count();// 查询满足要求的总记录数

		$Page  = new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出

		$this->assign('page',$show);// 赋值分页输出

		$this->display(); // 输出模板
	}
	
	// 编辑信息
	public function edit(){
		$user_id = I('user_id','');
		if(IS_POST){
			$data['userName'] = I('username','');
			$data['key'] = I('key','');
			if(M('users')->where("user_id='$user_id'")->save($data)){
				$this->redirect("Member/index");
			}else{
				$this->error("更新失败!");
			}
		}else{
			$data = M('users')->where("user_id='$user_id'")->find();
			$this->assign('data',$data);

			$this->display();
		}
	}

	// 查看信息
	public function see(){
		$action = I('action','');
		$ord_id = I('ord_id','');
		if($action == 'see'){
			$orders = M('orders')->where("ord_id='$ord_id'")->find();
			$this->assign("orders",$orders);

			$orders_info = M('orders_info')->where("ord_id='$ord_id'")->select();
			$this->assign("orders_info",$orders_info);

			$count = M('orders_info')->where("ord_id='$ord_id'")->count();
			$this->assign("count",$count);
			// print_r($orders_info);
		}

		$this->display();
	}

	// 删除信息
	public function del(){
		$user_id = I('user_id',0);
		
		$re_msg['code'] = 0;
		$re_msg['msg'] = "删除失败!";

		if(IS_POST){
			if(M("users")->where("user_id='$user_id'")->delete()){
				$re_msg['code'] = 1;
				$re_msg['msg'] = "删除成功!";
			}
		}
		echo json_encode($re_msg);
	}
}