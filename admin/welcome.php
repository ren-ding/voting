<?php
/**
 * FileName: 	welcome.php
 * Summary:		后台欢迎
 * Author:		fish
 */
require_once('../commom.php');
if (isset($_SESSION['adminName']) && !empty($_SESSION['adminName']) && $_SESSION['flag'])
{	 
	 $admin= $_SESSION['adminName'];
	 
	 $smarty->assign('adminName',$admin);
	//smarty输出,指定输出的模板文件
	 $smarty->display('houtai/innerHtml/welcome.html');
}
else 
{
	$smarty->display('houtai/denglu.html');
}
?>
