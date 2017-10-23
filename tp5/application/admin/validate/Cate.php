<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate
{
		//验证规则
		protected $rule = [
			'catename' => 'require|max:25|unique:cate'
		];
		//错误信息
		 protected $message  =   [
	        'catename.require' => '栏目名称必须填写',
	        'catename.max'     => '栏目名称最多不能超过25个字符',
	        'catename.unique'  =>'栏目名称不能重复'
   	 	];
   	 	//验证场景  场景名 => 验证的表单
   	 	protected $scene = [
      		'edit'  =>  ['catename'],
      		'add'  => ['catename'] //有哪个验证哪个
  		];
}		
?>