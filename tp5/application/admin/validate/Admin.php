<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
		//验证规则
		protected $rule = [
			'username' => 'require|max:25|unique:admin',
			'password' => 'require|max:18|min:6'
		];
		//错误信息
		 protected $message  =   [
	        'username.require' => '名称必须填写',
	        'username.max'     => '名称最多不能超过25个字符',
	        'username.unique' =>'用户名不能重复',
	        'password.max'     => '密码最多不能超过18个字符',
	        'password.min'     => '密码最少不能少于6个字符',
	        'password.require'   => '密码必须填写',
   	 	];
   	 	//验证场景  场景名 => 验证的表单
   	 	protected $scene = [
      		'edit'  =>  ['username','password','age'=>'require|number|between:1,120'],
      		'add'  => ['username','password'],  //有哪个验证哪个
  		];
}		
?>