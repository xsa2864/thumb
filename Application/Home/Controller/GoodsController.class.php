<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
	
	public function index(){
		$data = M('goods')->select();

		$this->assign('data',$data);

		$this->display();
	}
	
	// 商品编辑
	public function edit(){

		$goods_id = I('goods_id',0);
		$action = I('action','');

		if(IS_POST){

			$p_action = I('action','');
			if($p_action == 'save'){
				$data = I();
				$data['text'] = I('text','',false);
				$data['addTime'] = time();
				if(M('goods')->data($data)->add()){
					$this->redirect('Goods/index');
				}else{
					$this->error('操作失败!');
				}

			}elseif($p_action == 'update'){
				$data = I();
				$data['text'] = I('text','',false);
				$p_goods_id = I('goods_id',0);
				$data['addTime'] = time();
				if(M('goods')->where("goods_id='$p_goods_id'")->save($data)){
					$this->redirect('Goods/index');
				}else{
					$this->error('操作失败!');
				}
			}

		}else{			
			$level = M('category')->where("parent_id=0")->select();
			$this->assign('level',$level);

			if($action == "add"){
				$this->assign('action',"save");
				$this->assign('active',"添加");
				$this->display();	
			}elseif($action == "edit"){
				$sql = "SELECT * FROM th_goods g LEFT JOIN th_category c ON g.cat_id=c.id WHERE g.goods_id='$goods_id'";
				$data = M()->query($sql);
				// $data = M('goods')->where("goods_id='$goods_id'")->select();
				$this->assign('data',$data[0]);
				$this->assign('action',"update");
				$this->assign('active',"编辑");
				$this->display();			
			}
		}
	}
	// 查询商品
	public function search(){
		$goods_id = I("goods_id",'');
		if($goods_id != ''){
			$this->search_id=$goods_id;
			$data = M("goods")->where("goods_id='$goods_id'")->select();
		}else{
			$data = M('goods')->select();
			$this->assign('data',$data);
		}
		$this->assign("data",$data);
		$this->display("index");
	}

	// 删除商品
	public function del(){
		$goods_id = I('cat_id',0);
		$action = I('action','');

		$re_msg['code'] = 0;
		$re_msg['msg'] = "删除失败!";

		if($action == 'del'){
			if(M('goods')->where("goods_id='$goods_id'")->delete()){
				$re_msg['code'] = 1;
				$re_msg['msg'] = "删除成功!";
				echo json_encode($re_msg);
				exit;
			}
		}
		echo json_encode($re_msg);
		exit;	
	}

	//商品邮费
	public function postage(){
		$goods_source = M('goods_source');
		$form_list = $goods_source->select();
		$this->assign("form_list",$form_list);

		$areas = M('areas');
		$result = $areas->where("parent_id=0")->field("area_id,area_name")->select();
		$this->assign("area",$result);

		$sql = "SELECT gp.id,gp.goods_id,gp.price,gf.name,a.area_name
				FROM th_goods_postage AS gp
				LEFT JOIN th_goods_source gf ON gf.id=gp.source_id
				LEFT JOIN th_areas a ON a.area_id=gp.area_id";
		$postage = M()->query($sql);
		$this->assign("postage",$postage);
		$this->display();
	}
	// 商品邮费编辑
	public function postage_edit(){
		$id = I('id');
		$data = I();

		$re_msg['code'] = 0;
		$re_msg['msg'] = "操作失败!";

		unset($data['id']);
		$goods_postage = M('goods_postage');
		if($id){
			$result = $goods_postage->where("id='$id'")->save($data);
		}else{
			$result = $goods_postage->data($data)->add();
		}

		if($result){
			$re_msg['code'] = 1;
			$re_msg['msg'] = "操作成功!";
		}
		echo json_encode($re_msg);
	}
	// 获取运费信息
	public function getInfo(){
		$id = I('id');
		$goods_postage = M('goods_postage');
		$result = $goods_postage->where("id='$id'")->find();
		if($result){
			$result['code'] = 1;
			$result['msg'] = "操作成功!";
			echo json_encode($result);
			exit;
		}
		$re_msg['code'] = 0;
		$re_msg['msg'] = "操作失败!";
		echo json_encode($re_msg);
	}
	// 删除运费信息
	public function postage_del(){
		$id = I('id');

		$re_msg['code'] = 0;
		$re_msg['msg'] = "删除失败!";

		$goods_postage = M('goods_postage');
		$result = $goods_postage->where("id='$id'")->delete();
		if($result){
			$re_msg['code'] = 1;
			$re_msg['msg'] = "删除成功!";
		}
		echo json_encode($re_msg);
	}
	// 货源地
	public function goods_source(){
		$goods_source = M("goods_source");
		$result = $goods_source->select();
		$this->assign("data",$result);
		$this->display();
	}
	public function source_edit(){
		$id = I('id');
		$data = I();
		unset($data['id']);
		$goods_source = M('goods_source');
		if($id){
			$result = $goods_source->where("id='$id'")->save($data);
		}else{
			$result = $goods_source->data($data)->add();
		}

		$re_msg['code'] = 0;
		$re_msg['msg'] = "删除失败!";

		if($result){
			$re_msg['code'] = 1;
			$re_msg['msg'] = "删除成功!";
		}
		echo json_encode($re_msg);
	}
	// 删除货源地
	public function source_del(){
		$id = I('id');

		$re_msg['code'] = 0;
		$re_msg['msg'] = "删除失败!";
		
		$goods_source = M('goods_source');
		if($goods_source->where("id='$id'")->delete()){
			$re_msg['code'] = 1;
			$re_msg['msg'] = "删除成功!";
		}

		echo json_encode($re_msg);
	}
}