<?php
/**
 * FileName: 	add.php
 * Summary:		add
 * Author:		fish
 */
//���������ļ�
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
		echo "��д�ɹ�";
	}
	else 
	{
		echo "��Ϣ������";
	}
}
 //smarty���,ָ�������ģ���ļ�
 $smarty->display('houtai/innerHtml/add.html');
?>
