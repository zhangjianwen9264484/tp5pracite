<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Article;
class Lst extends Base
{
    public  function index()
    { 
		 $articles = Article::paginate(10);
    	$pages = $articles->render();
        
        //获取栏目标签id
    	$cate_id = input('cateid');
    	$tag_id =  input('tagid');

        
        // var_dump($catename['catename']);
        
        // $articlemodel = new Article(); 

       // $article[] = $articlemodel->with('Cate,Tags')->find()->toArray();

    	$artobj = new Article;
    	$articles['art'] = $artobj->show($cate_id,$tag_id);
        for ($i=0; $i < count($articles['art']); $i++) { 
            $article[] =$articles['art'][$i]['data'];
        }
        for ($i=0; $i < count($articles['art']); $i++) { 
            $art[] =$article[$i]['0'];
        }
        // dump($art,1,'<pre>',0);die;
        // $pages = $art->render();
    	//给模版赋值
    	
    	$this->assign("articles",$art);
        
    	$this->assign("pages",$pages);
    	return $this->fetch();
    }
}