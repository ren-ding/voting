<?php
/**
 * FileName: 	login.class.php
 * Summary:		登陆类
 * Author:		REN DING
 */
 class login
 {
 	private  $db; //mysql object
 	
 	/**
 	 * 初始化对象,实例化数据库
 	 *
 	 * @param object $db 数据库对象
 	 * @return login
 	 */
 	function login($db)
 	{
 		$this->db=$db;
 	}
 	
    /*
 	 * 检查管理员名及密码
 	 * 
 	 */
 	function login_check_admin($loginlist)
 	{
 		$sql = "select * from tb_admin where adminName = '{$loginlist['adminName']}'";
 		$result = $this->db->fetch_first($sql);
		if($result['adminPwd'] == $loginlist['adminPwd'])
 		{
 			return $result['ID'];
		}
		else 
		{
			return 0;
		}
 	}
 
 }
 ?>
