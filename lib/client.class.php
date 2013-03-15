<?php
/**
 * FileName: 	client.class.php
 * Summary:		客户端模块
 * Author:		REN DING
 */
 
 class client 
 {
 	private  $db; 	//mysql object
 	
 	function client($db) 
 	{
 		$this->db = $db;
 	}
 	
 	/**
 	 * 投票次数加一
 	 *
 	 * @param string $id
 	 */
 	function add_vote($id)
 	{
 		$sql = "UPDATE tb_jd SET num = num +1 WHERE id = '{$id}'";
 		$this->db->query($sql);
 	}
 	
 }
 ?>
