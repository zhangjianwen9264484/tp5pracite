<?php
namespace app\admin\controller;
use think\Controller;
Class Common extends Controller
	{
		Public  function _initialize(){
			if(!session('username')){
				$this->error('您还没有登陆，请登录','Login/index');
			}
		}
	}
?>