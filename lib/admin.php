<?php
/**
 * FileName: 	admin.class.php
 * Summary:		����ģ��
 * Author:		REN DING
 */

class admin
 {
 	private  $admin; //mysql object
 	
 	/**
 	 * ��ʼ������,ʵ�������ݿ�
 	 *
 	 * @param object $db ���ݿ����
 	 * @return pic
 	 */
 	function admin($db)
 	{
 		$this->db=$db;
 	}
 	
	/*
	 * ����ͶƱͼƬ��Ϣ
	 */
 	function add_pic($pic)
 	{
 		$sql = "INSERT INTO tb_jd SET id ='{$pic['id']}', name = '{$pic['name']}',`note` = '{$pic['note']}',`describe` = '{$pic['describe']}',`num`= '0'";
 		$this->db->query($sql);
 	}
 	
 	/*
	 * ɾ��ͶƱͼƬ��Ϣ
	 */
 	function del_pic($id)
 	{
 		$sql ="delete from tb_jd where id ={$id}";	 
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 }
?>
