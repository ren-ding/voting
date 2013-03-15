<?php
/**
 * FileName: 	add.php
 * Summary:		add
 * Author:		fish
 */
//包含公用文件
require_once('../commom.php');
if (!empty($_POST))
{
	if (!empty($_POST['name']) && !empty($_POST['note']) && !empty($_POST['describe']) && !empty($_POST['id']))
	{
		$piclist2['id'] = $_POST['id'];
		$piclist2['name'] = $_POST['name'];
		$piclist2['note'] = $_POST['note'];
		$piclist2['describe'] = $_POST['describe'];
		$admin->add_pic($piclist2);
		echo "填写成功";
	}
	else 
	{
		echo "信息不完整";
	}
}
 //smarty输出,指定输出的模板文件
 $smarty->display('houtai/innerHtml/add.html');
?>
