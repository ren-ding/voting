<?php
/**
 * FileName: 	index.php
 * Summary:		景点投票主页
 * Author:		REN DING
 */
//包含公用文件

require_once('commom.php');
//获取所有投票图片信息
$piclist = $pic->list_all();
//投票
if (isset($_POST['chkbox']) && !empty($_POST['chkbox']))
{
	if(isset($_SESSION['visit']))
	{
		foreach ($_POST['chkbox'] as $key =>$value)
		{
			$client->add_vote($value);
		}
	}
	header('location:index.php');
}
$_SESSION['visit'] = 1;
$smarty->assign('piclist',$piclist);			//交给smarty输出

 //smarty输出,指定输出的模板文件
 $smarty->display('index.html');

?>
