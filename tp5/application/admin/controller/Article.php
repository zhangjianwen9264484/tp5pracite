<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Article as ArticleModel;
use app\admin\controller\Common;
//use think\Validate;
class Article extends Common
{
	Public function Lst(){ 
		$list = ArticleModel::paginate(3);
		//数据库语句连接查询
		// $list = db('article')->alias('a')->join('cate c','a.cateid=c.id')->field('a.id,a.title,a.author,a.pic,a.state,c.catename')->paginate(3);
		//关联模型
		//$list = ArticleModel::paginate(3);
		$page = $list->render();
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}

	Public function Add(){
		$cate = db('cate')->select();
		if(request()->isPost()){
			$data = array(
					'title' => input("title"),
					'author' => input("author"),
					'keywords' =>input("keywords"),
					'desc' => input("desc"),
					'content' =>input("content"),
					'cateid' =>input('cateid'),
					'time' =>time()
				);		

			if(input('state')=='on'){
					$data['state'] = 1;
				}else{
					$data['state'] = 0;
				}
			//上传文件
			if($_FILES['pic']['tmp_name']){
				$file = request()->file('pic');
				$info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
				$data['pic'] ='/uploads/'.$info->getSaveName();
			}
			

			//验证器验证  第二种为助手函数
			$validate = \think\Loader::validate('Article');

			//$validate = validate('Article');
			$result =$validate->scene('add')->check($data);
			if(!$result){
				$this->error($validate->getError());
			}

			// dump($data);die;
			//插入数据
			//Db::name('Article')->insert($date);
			if(db('Article')->insert($data)){
				$this->success('添加文章成功','Lst');
			}else{
				$this->error('添加文章失败');
			}
		}
		$this->assign('cate',$cate);
		return $this->fetch();	
	}
	Public function Del(){
		$id =input("id");
		if( db('Article')->delete($id) ){
			$this->success('删除文章成功','Lst');
		}else{
			$this->error('删除文章失败');
		}
	}
	Public function Edit(){
		$id = input('id');
		$Article=db('Article')->find($id);
		
		if(request()->isPost()){
				$data = [
					'id' =>input('id'),
					'title' => input("title"),
					'author' => input("author"),
					'keywords' =>input("keywords"),
					'desc' => input("desc"),
					'content' =>input("content"),
					'cateid' =>input('cateid'),
					'time' =>time()
				];
				if(input('state') =='on'){
					$data['state'] = 1;
				}else{
					$data['state'] = 0;
				}
				if($_FILES['pic']['tmp_name']){
				$file = request()->file('pic');
				$info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
				$data['pic'] ='/uploads/'.$info->getSaveName();
			}
			
				//验证
				$validate = validate('Article');
				$result =$validate->scene('edit')->check($data);
				if(!$result){
					$this->error($validate->getError());
				}
				//更新数据
				if(db('Article')->update($data)){
					$this->success('修改文章成功','Lst');
				}else{
					$this->error('修改文章失败');
				}		
		}
		$cate = db('cate')->select();
		$this->assign('cate',$cate);
		$this->assign('Article',$Article);
		$this->assign('id',$Article['id']);
		return $this->fetch();
	}
	Public function Upload(){
		echo 111;
	}
}
?>