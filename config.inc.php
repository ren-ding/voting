<?php
/**
 * FileName: 	config.inc.php
 * Summary:		配置文件	
 * Author:		REN DING
 */

//Global
define("ROOT_URL","/jdtp/");		//用于url中的根地址
define("ROOT",str_replace('\\','/',dirname(__FILE__)) . '/');
define('UPLOAD_DIR',ROOT.'pic');
define('UPLOAD_URL',ROOT_URL.'pic/upload/');

//MySQL configure
define("MYSQL_HOST","localhost");	//mysql服务器
define("MYSQL_USER","root");		//mysql用户
define("MYSQL_PASSWORD","");//mysql密码
define("MYSQL_DATEBASE","jdtp");	//mysql数据库名
define("MYSQL_PREFIX","tb_");		//数据表名前缀

?>
