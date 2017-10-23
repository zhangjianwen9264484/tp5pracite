<?php
namespace app\admin\validate;
use think\Validate;
class Links extends Validate
{
		//验证规则
		protected $rule = [
			'title' => 'require|max:25',
			'url' => 'require|max:18'
		];
		//错误信息
		 protected $message  =   [
	        'title.require' => '标题必须填写',
	        'title.max'     => '标题最多不能超过25个字符',
	        'url.max'     => 'url最多不能超过18个字符',
	        'url.require'   => 'url必须填写'
   	 	];
   	 	//验证场景  场景名 => 验证的表单
   	 	protected $scene = [
      		'edit'  =>  ['title','url','age'=>'require|number|between:1,120'],
      		'add'  => ['title','url'] //有哪个验证哪个
  		];
}		
?>