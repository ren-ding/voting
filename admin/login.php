<?php
/**
 * FileName: 	login.php
 * Summary:		��̨��½���
 * Author:		fish
 */
//���������ļ�
require_once('../commom.php');
//�жϹ���Ա������
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
