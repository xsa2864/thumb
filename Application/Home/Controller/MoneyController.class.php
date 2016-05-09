<?php
namespace Home\Controller;
use Think\Controller;
class MoneyController extends Controller {
	
	public function index(){

		$p = isset($_GET['p']) ? $_GET['p'] : 1;
		$money_log = M('money_log'); 

		$data = $money_log->order('mon_id desc')->page($p.',20')->select();
		$this->assign('data',$data);// 赋值数据集

		$count = $money_log->count();// 查询满足要求的总记录数

		$Page  = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出

		$this->assign('page',$show);// 赋值分页输出

		$this->display(); // 输出模板
	}
	
	// 查看资金明细
	public function see(){
		$action = I('action','');

		if($action =='see'){
			$mon_id = I('mon_id','');
			$sql = "SELECT ml.money log_money,ml.content log_content,ml.`status` log_status,ml.addTime log_addtime,ml.`condition` log_condition,os.orderId or_orderid,os.addTime or_addtime,os.payTime or_paytime,os.`status` or_status,os.trade_code or_trade_code,os.goodsAmount or_goodsamount,os.discount
				FROM th_money_log ml LEFT JOIN th_orders os ON os.orderId = ml.orderId 
				WHERE ml.mon_id='$mon_id'";
			// $data = M('money_log')->where("mon_id='$mon_id'")->find();
			$data = M('')->query($sql);
			$this->assign("data",$data[0]);

		}
		$this->display("detail");
	}

}