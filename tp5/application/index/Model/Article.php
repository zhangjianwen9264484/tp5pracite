<?php
namespace app\index\model;
use think\Model;
class Article extends Model
{
	//不显示的区域
	protected $hidden = [
			"cate"=>['pivot'],
			"tags"=>['pivot']
	];

	// public function Cate()
 //    {
 //        return $this->belongsTo('Cate');
 //    }
	public function Cate()
    {
        // return $this->hasMany('cate','aid');//hasOne是一对一
        return $this->belongsToMany('Cate','art_cate','cid','aid');//多对多
        //belongsToMany('关联模型名','中间表名','外键名','当前模型关联键名',['模型别名定义']);
    }
    
    public function Tags()
    {
        return $this->belongsToMany('Tags','art_tag','tag_id','aid');//多对多
    }


	public  function  show($cateid,$tagid){
		if($cateid == null && $tagid ==null){
			$article = db('article')->order(['time asc','state asc'])->paginate(5);
		    return $article;
		}elseif($cateid){
			$aids = db('art_cate')->where(["cid"=>$cateid])->select();
			for ($i=0; $i < count(($aids)); $i++) { 
				$aid[] = $aids[$i]["aid"] ;
				$article[] = db('article')->order(['time asc','state asc'])->where(['id'=>$aid[$i]])->paginate(2)->toArray();
			}
			// $article = db('article')->order(['time asc','state asc'])->whereOr([ 'cateid'=> $cateid ,'tagid'=>$tagid ])->paginate(5);
			// $article = db('article')->order('time asc')->where( array('cateid'=> $cateid) )->limit($listrows)->select();

			return $article;
		}else{
			$aids = db('art_tag')->where(["tag_id"=>$tagid])->select();
			for ($i=0; $i < count(($aids)); $i++) { 
				$aid[] = $aids[$i]["aid"] ;
				$article[] = db('article')->order(['time asc','state asc'])->where(['id'=>$aid[$i]])->paginate(2)->toArray();
			}
			
			return $article;
		}
	}

}
?>