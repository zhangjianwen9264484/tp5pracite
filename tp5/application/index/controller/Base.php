<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Cate;
class Base extends Controller
{
	Public function _initialize(){
		$this->right();
		$obj = new Cate;
	    $result = $obj->cates();

        $cate_id = input('cateid');

        $catename = db('cate')->find($cate_id);
        $this->assign("cid",$catename['id']);
        $this->assign("catename",$catename['catename']);
        // var_dump($catename);
	    $this->assign("cates",$result['cates']);
	    $this->assign("tags",$result['tags']);	
    }
    Public function right(){
    	$tjarticles = db("article")->where(array('state'=>1))->order('time asc')->paginate(4);
    	$rmclick = db("article")->order('click asc')->paginate(4);
    	$this->assign("tjarticles",$tjarticles);
    	$this->assign("rmclick",$rmclick);
    }
}
?>