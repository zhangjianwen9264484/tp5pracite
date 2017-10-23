<?php
namespace app\admin\model;
use think\Model;
class Article extends Model
{
	Public function cate(){
		return $this->belongsTo('cate','cateid');   //hasMany('关联模型名','外键名','主键名',['模型别名定义']);

	}
}
?>