<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
	public function test(){

		$time = '1458033325';
		$this->assign('time',$time);
		$this->display();
	}
	
}