<?php
namespace app\index\model;
use think\Model;
class Cate extends Model
{
	// public function Article()
 //    {
 //        return $this->belongsTo('article');
 //    }
	// public function article()
 //    {
 //        return $this->hasMany('article','cateid');//hasOne是一对一
 //    }

	  

	public  function cates(){
		$cates = db("cate")->order('id asc')->limit('8')->select();
    	$tags = db("tags")->order('id asc')->limit('5')->select();
    	return array(
    		'cates'=>$cates,
    		'tags'=>$tags
    	);
	}
}
?>