<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Links as LinksModel;
//use think\Validate;
use app\admin\controller\Common;
class Links extends Common
{
	Public function Lst(){ 
		$list = LinksModel::paginate(3);
		$page = $list->render();
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}

	Public function Add(){
		if(request()->isPost()){
			$data = array(
					'title' => input("title"),
					'url' => input("url"),
					'desc' => input("desc"),
				);
			
			//验证器验证  第二种为助手函数
			$validate = \think\Loader::validate('Links');

			//$validate = validate('Links');
			$result =$validate->scene('add')->check($data);
			if(!$result){
				$this->error($validate->getError());
			}
			//插入数据
			//Db::name('Links')->insert($date);
			if(db('Links')->insert($data)){
				$this->success('添加链接成功','Lst');
			}else{
				$this->error('添加链接失败');
			}
		}
		return $this->fetch();
	}
	Public function Del(){
		$id =input("id");
		if( db('Links')->delete($id) ){
			$this->success('删除链接成功','Lst');
		}else{
			$this->error('删除链接失败');
		}
	}
	Public function Edit(){
		$id = input('id');
		$Links=db('Links')->find($id);
		
		if(request()->isPost()){
				$data = [
					 'id' =>input('id'),
	 				 'title' => input('title'),
					 'url' => input('url') ,
					 'desc' => input('desc') 
				];
				//验证
				$validate = validate('Links');
				$result =$validate->scene('edit')->check($data);
				if(!$result){
					$this->error($validate->getError());
				}
				//更新数据
				if(db('Links')->update($data)){
					$this->success('修改链接成功','Lst');
				}else{
					$this->error('修改链接失败');
				}		
		}
		$this->assign('Links',$Links);
		$this->assign('id',$Links['id']);
		return $this->fetch();
	}
}
?>