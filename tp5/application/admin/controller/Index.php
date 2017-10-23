<?php
namespace app\admin\controller;
use app\admin\controller\Common;
Class Index extends Common
{
	Public function index()
	{
		return $this->fetch();
	}
}

?>