<?php
namespace Home\Controller;
use Think\Controller;

class CategoryController extends Controller {

	public function index(){
		$data = M('category')->select();	
		$tree = $this->getParents($data);

		$this->assign('tree',$tree);		
		$this->display();
	}
	// 增删改查
	public function edit(){
		$id = I("id");
		$re_msg['code'] = 0;
		$re_msg['msg'] = "操作失败!";

		$data = I();
		unset($data['id']);
		$category = M('category');
		if($id){			
			$result = $category->where("id='$id'")->save($data);
		}else{
			$result = $category->data($data)->add();			
		}
		if($result){
			$re_msg['code'] = 1;
			$re_msg['msg'] = "执行成功!";
		}
		echo json_encode($re_msg);
	}

	// 获取分类信息
	public function getInfo(){
		$id = I('id',0);
		$action = I('action','');

		$data['code'] = 0;
		$data['msg'] = "查询失败!";

		if($action == 'getInfo'){
			$data = M('category')->where("id='$id'")->find();
			$data['code'] = 1;
			$data['msg'] = "查询成功!";
		}
		echo json_encode($data);
	}
	
	// 删除商品
	public function del(){
		$id = I('id',0);
		$action = I('action','');

		$data['code'] = 0;
		$data['msg'] = "删除失败!";

		if($action == 'del'){
			if(M('category')->where("id='$id'")->delete()){
				$data['code'] = 1;
				$data['msg'] = "删除成功!";
				echo json_encode($data);
				exit;
			}
		}
		echo json_encode($data);
		exit;	
	}

	//递归方法
	Static Public function getParents($cate,$parent_id=0){
		if (!is_array ($cate)){
			return false;
		}
		$arr=array();
		foreach ($cate as $v){
			if ($parent_id == $v['parent_id']){
				$v['child'] = self::getParents($cate,$v['id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}
}