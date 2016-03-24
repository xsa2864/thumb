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
			$level = M('category')->where("pid=0")->select();
			$this->assign('level',$level);

			if($action == "add"){
				$this->assign('action',"save");
				$this->assign('active',"添加");
				$this->display();	
			}elseif($action == "edit"){
				$sql = "SELECT * FROM th_goods g LEFT JOIN th_category c ON g.cat_id=c.cat_id WHERE g.goods_id='$goods_id'";
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

		$data['code'] = 0;
		$data['msg'] = "删除失败!";

		if($action == 'del'){
			if(M('goods')->where("goods_id='$goods_id'")->delete()){
				$data['code'] = 1;
				$data['msg'] = "删除成功!";
				echo json_encode($data);
				exit;
			}
		}
		echo json_encode($data);
		exit;	
	}
}