<?php
/**
 * FileName: 	pic.class.php
 * Summary:		用户模块
 * Author:		REN DING
 */
 class pic
 {
 	private  $db; //mysql object
 	
 	/**
 	 * 初始化对象,实例化数据库
 	 *
 	 * @param object $db 数据库对象
 	 * @return pic
 	 */
 	function pic($db)
 	{
 		$this->db=$db;
 	}
 	
 	/**
 	 * 列出20张投票照片的首页信息组
 	 *
 	 * @return array 成员数组
 	 */
 	function list_all()
 	{
 		$sql = "SELECT `id`,`name`,`note`,`num`,`describe` FROM tb_jd order by `id` limit 20";
 		return $this->db->fetch_all($sql);
 	}
 	
 	/**
 	 * 列出1张投票照片的介绍页信息组
 	 *
 	 * @return array 成员数组
 	 */
 	function list_one($id)
 	{
 		$sql = "SELECT `id`,`name`,`describe` FROM tb_jd WHERE id = '{$id}' limit 1";
 		return $this->db->fetch_all($sql);
 	}
 	
 	/**
 	 * 获得投票排名
 	 *
 	 * @return array 成员信息数组
 	 */
 	function get_top_20()
 	{
 		$sql = "SELECT * FROM tb_jd ORDER BY `num` DESC LIMIT 20";
 		return $this->db->fetch_all($sql);
 	}
 }
 ?>
