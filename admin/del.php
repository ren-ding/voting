<?php
/**
 * FileName: 	del.php
 * Summary:		del
 * Author:		fish
 */
//���������ļ�
require_once('../commom.php');

if (isset($_POST['del']) && !empty($_POST['del']))
{
	$admin->del_pic($_POST['del']);
}

 $piclist = $pic->list_all();
 
$smarty->assign('piclist',$piclist);			//����smarty���

 //smarty���,ָ�������ģ���ļ�
 $smarty->display('houtai/innerHtml/del.html');
?>
