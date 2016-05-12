<?php
namespace Home\Controller;
use Think\Controller;
class AuthController extends Controller {
	// 权限组
	public function index(){
		$auth_rule = M("auth_group");
        $list = $auth_rule->select();
        $this->assign("list",$list);
        $this->display();
	}	
	
    // 删除权限组
    public function group_edit(){
        $id = I('id');
        $checked = array();
        $this->link = "添加";
        if($id){
            $auth_rule = M("auth_group");
            $info = $auth_rule->where("id='$id'")->find();
            $this->assign("info",$info);
    
            $checked = explode(',', $info['rules']);
            $this->link = "编辑";
        }

        $auth_rule = M("auth_rule");
        $list = $auth_rule->select();
        $tree = $this->get_arr($list,0,$checked);
        $this->assign("tree",$tree);
        $this->display();      
    }
    // 删除权限组
    public function group_del(){
        $id = I('id');

        $re_msg['code'] = 0;
        $re_msg['msg'] = "删除失败!";

        $auth_rule = M("auth_group");
        if($auth_rule->where("id='$id'")->delete()){
            $re_msg['code'] = 1;
            $re_msg['msg'] = "删除成功!";
        }
        echo json_encode($re_msg);
    }

    // 权限规则
    public function auth_rule(){
        $auth_rule = M("auth_rule");
        $list = $auth_rule->select();
        $tree = $this->get_arr($list);
        $this->assign("list",$tree);
        $this->display();
    }
    //根据id获取规则信息
    public function auth_one_rule(){
        $id = I('id');
        $auth_rule = M("auth_rule");
        $result = $auth_rule->where("id='$id'")->find();
        echo json_encode($result);
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

        $re_msg['code'] = 0;
        $re_msg['msg'] = "删除失败!";

        if($id){
        	$result = $auth_rule->where("id='$id'")->save($data);
        }else{
        	$result = $auth_rule->data($data)->add();
        }
        if($result){
            $re_msg['code'] = 1;
            $re_msg['msg'] = "操作成功!";
        }
        echo json_encode($re_msg);        
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