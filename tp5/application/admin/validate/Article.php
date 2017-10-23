<?php
namespace app\admin\validate;
use think\Validate;
class Article extends Validate
{
		//验证规则
		protected $rule = [
			'title' => 'require|max:25',
			'cateid' => 'require',
			// 'pic' =>'image:jpg|image:png|image:gif'
		];
		//错误信息
		 protected $message  =   [
	        'title.require' => '标题必须填写',
	        'title.max'     => '标题最多不能超过25个字符',
	        'cateid.require'   => '请选择栏目',
	        // 'pic.image' =>'只允许上传jpg、gif、png类型的图片'
   	 	];
   	 	//验证场景  场景名 => 验证的表单
   	 	protected $scene = [
      		'edit'  =>  ['title','cateid'],
      		'add'  => ['title','cateid'] //有哪个验证哪个
  		];
}		
?>