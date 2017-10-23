<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Admin as AdminModel;
use app\admin\controller\Common;
//use think\Validate;
class Admin extends Common
{
	Public function Lst(){ 
		$list = AdminModel::paginate(3);
		$page = $list->render();
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}

	Public function Add(){
		if(request()->isPost()){
			$data = array(
					'username' => input("username"),
					'password' => input("password")
				);
			
			//验证器验证  第二种为助手函数
			$validate = \think\Loader::validate('Admin');

			//$validate = validate('Admin');
			$result =$validate->scene('add')->check($data);
			if(!$result){
				$this->error($validate->getError());
			}
			//插入数据
			//Db::name('admin')->insert($date);
			$save=db('admin')->insert($data);

			if($save !== false){
				$this->success('添加成功','Lst');
			}else{
				$this->error('添加失败');
			}
		}
		return $this->fetch();
	}
	Public function Del(){
		$id =input("id");
		if($id !== 1){
				if( db('admin')->delete($id) ){
					$this->success('删除管理员成功','Lst');
				}else{
					$this->error('删除管理员失败');
				}
		}else{
			$this->error('超级管理员,不能删除');
		}
	}
	Public function Edit(){
		$id = input('id');
		$admins=db('admin')->find($id);
		
		if(request()->isPost()){
				$data = [
					 'id' =>input('id'),
	 				 'username' => input('username'),
					 'password' => input('password') 
				];
				//判断密码是否为空
				if(input('password')){
					$data['password'] = input('password');
				}else{
					$data['password'] = $admins['password'];
				}

				//验证
				$validate = validate('Admin');
				$result =$validate->scene('edit')->check($data);
				if(!$result){
					$this->error($validate->getError());
				}
				//更新数据
				$save=db('admin')->insert($data);
				if($save !== false){
					$this->success('修改管理员成功','Lst');
				}else{
					$this->error('修改管理员失败');
				}		
		}
		$this->assign('admins',$admins);
		$this->assign('id',$admins['id']);
		return $this->fetch();
	}
	Public function logout(){
		session(null);
		$this->success('退出成功','Admin/Login/index');
	}
}
?>