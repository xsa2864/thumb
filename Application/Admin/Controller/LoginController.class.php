<?php 
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	//登录页面
	public function login(){
		$this->display();
	}


	//登录验证
	public function checkLogin(){
		$where['mobile']=I("mobile");
		$where['password']=md5(I("password"));
		$code=I('code');
		$verify=new \Think\Verify();
		if($verify->check($code)){
			$m=M("user");
			$result=$m->where($where)->find();
			$m=null;
			$verify=null;
			if($result){
				session('username',$result['username']);
				session('uid',$result['uid']);
				$this->redirect('Admin/Index/index');
			}else{
				$this->error('账号或密码错误!',U('Admin/Login/login'));
			}
		}else{
			$this->error('验证码错误!',U('Admin/Login/login'));
		}
	}

	//退出
	public function logout(){
		unset($_SESSION['username']);
		unset($_SESSION['uid']);
		$this->success('退出成功!',U('Admin/Login/login'));
	}
}