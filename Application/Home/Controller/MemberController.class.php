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

	/*-----------------------------权限部分------------------------------------*/
    // 权限规则
    public function auth_rule(){
        $auth_rule = M("auth_rule");
        $list = $auth_rule->select();
        $tree = $this->get_arr($list);
        $this->assign("list",$tree);
        $this->display();
    }
	// 递归
    static function get_arr($list,$pid=0,$checked){
    	$tree_arr = '';
    	foreach ($list as $key => $value) {
    		if($value['pid'] == $pid){
                if(in_array($value['id'], $checked)){
                    $value['checked'] = 1;
                }else{
                    $value['checked'] = 0;
                }
                $value['child'] = self::get_arr($list,$value['id'],$checked);    
    			$tree_arr[]=$value;
    		}
    	}
    	return $tree_arr;
    }

    // 权限添加
    public function auth_edit(){
        $id = I('id');
        $data = I();
        $auth_rule = M('auth_rule');
        unset($data['id']);
        if($id){
        	$result = $auth_rule->where("id='$id'")->save($data);
        }else{
        	$result = $auth_rule->data($data)->add();
        }
        if($result){
        	$this->success("操作成功!");
        }else{
        	$this->error("操作失败!");
        }
    }

    // 权限规则
    public function auth_del(){
    	$id = I('id');

    	$re_msg['code'] = 0;
    	$re_msg['msg'] = "删除失败!";
        $auth_rule = M("auth_rule");
        if($auth_rule->where("id='$id'")->delete()){
        	$re_msg['code'] = 1;
        	$re_msg['msg'] = "删除成功!";
        }

        echo json_encode($re_msg);
    }
}