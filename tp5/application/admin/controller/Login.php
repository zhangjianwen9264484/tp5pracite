<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin as AdminModel;
//use think\Validate;
class Login extends Controller
{
	Public function index(){
		if(request()->isPost()){
			$data=[
				'username' =>input('username'),
				'password' =>md5(input('password')),
				'code'	   =>input('code')
			];
			$admin = new AdminModel;
			//模型返回的数据
			$num = $admin->login($data);

			if($num == 3 ){
				$this->success('登陆成功，正在跳转...','Index/index');
			}elseif($num == 4){
				$this->success('验证码错误');
			}else{
				$this->error('用户名或密码有误');
			}
		}
		
		return $this->fetch('login');
	}
}
?>