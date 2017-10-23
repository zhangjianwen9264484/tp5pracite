<?php
namespace app\admin\model;
use think\Model;
// use think\Db;
class Admin extends Model
{
	Public function login($data){
		 $captcha = new \think\captcha\Captcha();			//(!captcha_check($code))   用助手函数，此行可注释 
        if (!$captcha->check($data['code'])) {     
            return 4;    //验证码错误
        }else{
			$user=db('admin')->where('username','=',$data["username"])->find();
			if($user){		
				if(md5($user['password']) == $data['password']){
					session('username',$user['username']);
					session('uid',$user['id']);
					return 3;  //验证成功
				}else{
					return 2;  //密码错误
				}
			}else{
				return 1; //用户名不存在
			}
		}
	}
}
?>