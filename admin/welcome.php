<?php
/**
 * FileName: 	welcome.php
 * Summary:		��̨��ӭ
 * Author:		fish
 */
require_once('../commom.php');
if (isset($_SESSION['adminName']) && !empty($_SESSION['adminName']) && $_SESSION['flag'])
{	 
	 $admin= $_SESSION['adminName'];
	 
	 $smarty->assign('adminName',$admin);
	//smarty���,ָ�������ģ���ļ�
	 $smarty->display('houtai/innerHtml/welcome.html');
}
else 
{
	$smarty->display('houtai/denglu.html');
}
?>
