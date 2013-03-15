<?php
/**
 * FileName: 	yuanyu.php
 * Summary:		oragin picture
 * Author:		REN DING
 */
require_once('commom.php');
 $piclist2	= $pic->list_one($_GET['id']);		
 $smarty->assign('piclist2',$piclist2);			
 
 $smarty->display('yuantu.html');
?>