<?php
/**
 * FileName: 	common.php
 * Summary:		初始化系统
 * Author:		REN DING
 */
//error_reporting(0);
//设置session为一小时
session_start();

//配置文件
require_once('config.inc.php');
//smarty模板引擎
require_once('smarty/Smarty.class.php');
//数据库类
require_once('lib/mysql.php');
//客户端类
require_once('lib/client.class.php');
//管理端类
require_once('lib/admin.php');
//投票端类
require_once('lib/pic.class.php');
//后台登陆类
require_once ('lib/login.class.php');

//新建smarty对象
$smarty = new Smarty();
//设置smarty的模板文件夹的文件
$smarty->template_dir =   dirname(__FILE__) . '/templates/';
//设置smarty编译后文件位置
$smarty->compile_dir = dirname(__FILE__) .'/templates_c/';

//新建数据库对象
$db = new mysql(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATEBASE);
//新建客户端对象
$client = new client($db);
//新建管理端对象
$admin = new admin($db);
//新建投票端对象
$pic = new pic($db);
//新建后台登陆对象
$login = new login($db);
?>
