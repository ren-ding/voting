<?php
/**
 * FileName: 	ready.php
 * Summary:		景点投票子页
 * Author:		REN DING
 */
//包含公用文件
require_once('commom.php');

 $rank		= $pic->get_top_20(); 				//获取投票图片排名信息
 $piclist1	= $pic->list_one($_GET['id']);		//获取单个投票图片信息
 
 $smarty->assign('rank',$rank);			//交给smarty输出
 $smarty->assign('piclist1',$piclist1);			//交给smarty输出

 //smarty输出,指定输出的模板文件
 $smarty->display('ready.html');
?>
