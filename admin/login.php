<?php
/**
 * FileName: 	login.php
 * Summary:		后台登陆检查
 * Author:		fish
 */
//包含公用文件
require_once('../commom.php');
//判断管理员和密码
if (!empty($_POST))
{
	if (isset($_POST['adminName']) && isset($_POST['adminPwd']) && !empty($_POST['adminName']) && !empty($_POST['adminPwd']))
	{
		$loginlist['adminName']	= $_POST['adminName'];
		$loginlist['adminPwd']	= $_POST['adminPwd'];
		$_SESSION['adminName']	= $_POST['adminName'];
		$_SESSION['adminPwd']	= $_POST['adminPwd'];
		if ($login->login_check_admin($loginlist))
		{
			$_SESSION['flag'] = 1;
			$smarty->display('houtai/houtai.html');
		}
		else 
		{
			$_SESSION['flag'] = 0;
			$smarty->display('houtai/denglu.html');
		}
	}
}
?>
