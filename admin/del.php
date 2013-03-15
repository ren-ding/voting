<?php
/**
 * FileName: 	del.php
 * Summary:		del
 * Author:		fish
 */
//包含公用文件
require_once('../commom.php');

if (isset($_POST['del']) && !empty($_POST['del']))
{
	$admin->del_pic($_POST['del']);
}

 $piclist = $pic->list_all();
 
$smarty->assign('piclist',$piclist);			//交给smarty输出

 //smarty输出,指定输出的模板文件
 $smarty->display('houtai/innerHtml/del.html');
?>
