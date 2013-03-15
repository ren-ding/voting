<?php
/**
 * FileName: 	admin.class.php
 * Summary:		管理模块
 * Author:		REN DING
 */

class admin
 {
 	private  $admin; //mysql object
 	
 	/**
 	 * 初始化对象,实例化数据库
 	 *
 	 * @param object $db 数据库对象
 	 * @return pic
 	 */
 	function admin($db)
 	{
 		$this->db=$db;
 	}
 	
	/*
	 * 增加投票图片信息
	 */
 	function add_pic($pic)
 	{
 		$sql = "INSERT INTO tb_jd SET id ='{$pic['id']}', name = '{$pic['name']}',`note` = '{$pic['note']}',`describe` = '{$pic['describe']}',`num`= '0'";
 		$this->db->query($sql);
 	}
 	
 	/*
	 * 删除投票图片信息
	 */
 	function del_pic($id)
 	{
 		$sql ="delete from tb_jd where id ={$id}";	 
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 }
?>
