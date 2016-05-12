<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller {
	
	public function index(){
		$data = M('users')->select();
		$this->assign("data",$data);
		$this->display();
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