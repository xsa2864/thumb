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
		$action = I("action",'');

		$data['code'] = 0;
		$data['msg'] = "操作失败!";

		if($action == 'add'){
			$data['name'] = I("name",'');
			$data['level'] = I("level",'');
			$data['pid'] = I("pid",'');
			$data['seq']  = I("seq",'');
			
			if(M('category')->data($data)->add()){
				$data['code'] = 1;
				$data['msg'] = "执行成功!";
			}
		}elseif($action == "edit"){
			$cat_id = I("cat_id",0);
			$data['name'] = I("name",'');
			$data['level'] = I("level",'');
			$data['pid'] = I("pid",'');
			$data['seq']  = I("seq",'');

			if(M('category')->where("cat_id='$cat_id'")->save($data)){
				$data['code'] = 1;
				$data['msg'] = "执行成功!";
			}
		}
		echo json_encode($data);
	}

	// 获取分类信息
	public function getInfo(){
		$cat_id = I('cat_id',0);
		$action = I('action','');

		$data['code'] = 0;
		$data['msg'] = "查询失败!";

		if($action == 'getInfo'){
			$data = M('category')->where("cat_id='$cat_id'")->find();
			$data['code'] = 1;
			$data['msg'] = "查询成功!";
		}
		echo json_encode($data);
	}
	
	// 删除商品
	public function del(){
		$cat_id = I('cat_id',0);
		$action = I('action','');

		$data['code'] = 0;
		$data['msg'] = "删除失败!";

		if($action == 'del'){
			if(M('category')->where("cat_id='$cat_id'")->delete()){
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
	Static Public function getParents($cate,$cat_id=0){
		if (!is_array ($cate)){
			return false;
		}
		$arr=array();
		foreach ($cate as $v){
			if ($cat_id == $v['pid']){
				$v['child'] = self::getParents($cate,$v['cat_id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}
}