<?php
namespace app\index\controller;
use think\Controller;
use app\index\Model\Article as Articles;

class Article extends Base
{
    public function index()
    {
    	$aid = input('aid'); 
         $where['id']=$aid;
        //点击量
        db("article")->where(array('id'=>$aid))->setInc("click");

        //文章表为从表（带有tagid字样的）  cate和tag为主表   
        //主表模型写关联关系 （一对一等hasOne） 从表为属于关系  对应model函数 返回 belongsTo('Cate');

        $articlemodel = new Articles();

        $article[] = $articlemodel->with('Cate,Tags')->find($aid)->toArray();
        //相关阅读
        $articles = db("article")->order('time asc')->select();

        //推荐文章
        $recart = db("article")->where(array('state'=>1))->order('time asc')->select();
    	//给模版赋值
        $this->assign("article",$article);
    	$this->assign("articles",$articles);
        $this->assign("recart",$recart);
    	return $this->fetch();
    }
}
