<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	
	public function login(){
		if(IS_POST){
			$username = I('username','');
			$password = md5(I('password',''));

			$re_msg['code'] = 0;
			$re_msg['msg'] = "登录失败!";
	
			if(M('users')->where("username='$username' and password='$password'")->find()){
				$re_msg['code'] = 1;
				$re_msg['msg'] = "登录成功!";
			}
			echo json_encode($re_msg);
			exit;
		}else{
			$this->display();
		}
	}
	
}