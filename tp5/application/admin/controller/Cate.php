<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Cate as CateModel;
use app\admin\controller\Common;
//use think\Validate;
class Cate extends Common
{
	Public function Lst(){ 
		$list = CateModel::paginate(3);
		$page = $list->render();
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}

	Public function Add(){
		if(request()->isPost()){
			$data = array(
					'catename' => input("catename")
				);
			
			//验证器验证  第二种为助手函数
			$validate = \think\Loader::validate('Cate');

			//$validate = validate('Cate');
			$result =$validate->scene('add')->check($data);
			if(!$result){
				$this->error($validate->getError());
			}
			//插入数据
			//Db::name('Cate')->insert($date);
			if(db('cate')->insert($data)){
				$this->success('添加成功','Lst');
			}else{
				$this->error('添加失败');
			}
		}
		return $this->fetch();
	}
	Public function Del(){
		$id =input("id");
		if( db('cate')->delete($id) ){
			$this->success('删除栏目成功','Lst');
		}else{
			$this->error('删除栏目失败');
		}	
	}
	Public function Edit(){
		$id = input('id');
		$Cate=db('Cate')->find($id);
		
		if(request()->isPost()){
				$data = [
					 'id' =>input('id'),
	 				 'catename' => input('catename')
				];
				//验证
				$validate = validate('Cate');
				$result =$validate->scene('edit')->check($data);
				if(!$result){
					$this->error($validate->getError());
				}
				//更新数据
				if($result=db('Cate')->update($data)){
					$this->success('修改栏目成功','Lst');
				}else{
					$this->error('修改栏目失败');
				}		
		}

		$this->assign('id',$Cate['id']);
		$this->assign('cate',$Cate);
		return $this->fetch();
	}
}
?>