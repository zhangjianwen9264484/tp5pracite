<?php
namespace app\index\controller;
use think\Controller;
use app\index\Model\Article;
class Index extends Base
{
    public function index() 
    {
    	//获取文章
    	$articles = Article::paginate(5);
    	$pages = $articles->render();
    	//给模版赋值
    	$this->assign("articles",$articles);
    	$this->assign("pages",$pages);
    	return $this->fetch();
    }
    
}
