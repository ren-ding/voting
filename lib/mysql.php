<?php

class mysql 
{
private $host     = "";			//mysql主机名
	private $user     = "";			//mysql用户名
	private $pwd      = "";			//mysql密码
	private $dbName   = "";			//mysql数据库名称
	private $linkID   = 0;			//用来保存连接ID
	private $queryID  = 0;			//用来保存查询ID
	private $fetchMode= MYSQL_ASSOC;//取记录时的模式
	private $errorMessage    = "";			//mysql出错信息
	private $record   = array();	//一条记录数组

	//======================================
	// 函数: mysql()
	// 功能: 构造函数
	// 参数: 参数类的变量定义
	// 说明: 构造函数将自动连接数据库
	//      如果想手动连接去掉连接函数
	//======================================
	function __construct($host,$user,$pwd,$dbName)
	{	if(empty($host) || empty($user) || empty($dbName))
			$this->errorMessage = "数据库主机地址,用户名或数据库名称不完全,请检查!";
		$this->host    = $host;
		$this->user    = $user;
		$this->pwd     = $pwd;
		$this->dbName  = $dbName;
		$this->connect();//设置为自动连接
	}
	//======================================
	// 函数: connect($host,$user,$pwd,$dbName)
	// 功能: 连接数据库
	// 参数: $host 主机名, $user 用户名
	// 参数: $pwd 密码, $dbName 数据库名称
	// 返回: 0:失败
		// 说明: 默认使用类中变量的初始值
	//======================================
	function connect($host = "", $user = "", $pwd = "", $dbName = "")
	{
		if ("" == $host)
			$host = $this->host;
		if ("" == $user)
			$user = $this->user;
		if ("" == $pwd)
			$pwd = $this->pwd;
		if ("" == $dbName)
			$dbName = $this->dbName;
		//now connect to the database
		$this->linkID = mysql_connect($host, $user, $pwd);
		if (!$this->linkID)
		{
			$this->errorMessage = mysql_error();
			$this->errorLoging($this->errorMessage);
		
		}
		if (!mysql_select_db($dbName, $this->linkID))
		{
			$this->errorMessage = mysql_error();
			$this->errorLoging($this->errorMessage);
	
		}
                $this->query("set names utf8");
		return $this->linkID;			
	}
	//======================================
	// 函数: query($sql)
	// 功能: 数据查询
	// 参数: $sql 要查询的SQL语句
	// 返回: 0:失败
	//======================================
	function query($sql)
	{
		//echo "query,$sql<br>\n";
		$this->queryID = mysql_query($sql, $this->linkID);
		if (!$this->queryID)
		{	
			$this->errorMessage = mysql_error() . "\tSQL is:{$sql}.";
			$this->errorLoging($this->errorMessage);
		}
		return $this->queryID;
	}
	//======================================
	// 函数: set_fetch_mode($mode)
	// 功能: 设置取得记录的模式
	// 参数: $mode 模式 MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
	// 返回: 0:失败
	//======================================
	function set_fetch_mode($mode)
	{
		if ($mode == MYSQL_ASSOC || $mode == MYSQL_NUM || $mode == MYSQL_BOTH) 
		{
			$this->fetchMode = $mode;
			return true;
		}
		else
		{
			$this->errorLoging("setFetchMode错误的模式:$mode.");
			return false;
		}
	}
	//======================================
	// 函数: fetchRow()
	// 功能: 从记录集中取出一条记录
	// 返回: 0: 出错 record: 一条记录
	//======================================
	function fetch_row()
	{
		$this->record = mysql_fetch_array($this->queryID,$this->fetchMode);
		return $this->record;
	}
	//======================================
	// 函数: fetchAll()
	// 功能: 从记录集中取出所有记录
	// 返回: 记录集数组
	//======================================
	function fetch_all($sql)
	{
		$this->query($sql);
		$arr = array();
		while($this->record = mysql_fetch_array($this->queryID,$this->fetchMode))
		{
			$arr[] = $this->record;
		}
		mysql_free_result($this->queryID);
		return $arr;
	}
	//======================================
	// 函数: getValue()
	// 功能: 返回记录中指定字段的数据
	// 参数: $field 字段名或字段索引
	// 返回: 指定字段的值
	//======================================
	function get_value($field)
	{
		return $this->record[$field];
	}
	
	/**
	 * 直接获得第一条记录
	 * @author hugo
	 * @param string $sql 查询语句
	 * @return array 一条记录
	 */
	function fetch_first($sql)
	{
		$this->query($sql);
		return $this->fetch_row();
	}
	
	/**
	 * 获得第一条记录的第一个字段名
	 * @author  hugo
	 * @param string $sql 查询语句
	 * @return string 字段的值
	 */
	function result_first($sql)
	{
			$this->query($sql);
			(array)$result = mysql_fetch_array($this->queryID,MYSQL_NUM);
			return $result[0];
	}
	
	
	//======================================
	// 函数: affectedRows()
	// 功能: 返回影响的记录数
	//======================================
	function affected_rows()
	{
		return mysql_affected_rows($this->linkID);
	}
	//======================================
	// 函数: recordCount()
	// 功能: 返回查询记录的总数
	// 参数: 无
	// 返回: 记录总数
	//======================================
	function record_count()
	{
		return mysql_num_rows($this->queryID);
	}

	//======================================
	// 函数: getVersion()
	// 功能: 返回mysql的版本
	// 参数: 无
	//======================================
	function get_version() 
	{
		$this->query("select version() as ver");
		$this->fetch_row();
		return $this->get_value("ver");
	}
	//======================================
	// 函数: getDBSize($dbName, $tblPrefix=null)
	// 功能: 返回数据库占用空间大小
	// 参数: $dbName 数据库名
	// 参数: $tblPrefix 表的前缀,可选
	//======================================
	function get_DB_size($dbName, $tblPrefix=null) 
	{
		$sql = "SHOW TABLE STATUS FROM " . $dbName;
		if($tblPrefix != null) {
			$sql .= " LIKE '$tblPrefix%'";
		}
		$this->query($sql);
		$size = 0;
		while($this->fetch_row())
			$size += $this->get_value("Data_length") + $this->get_value("Index_length");
		return $size;
	}
	//======================================
	// 函数: insert_ID()
	// 功能: 返回最后一次插入的自增ID
	// 参数: 无
	//======================================
	function insert_id()
	{
		return mysql_insert_id($this->linkID);
	}
	
	//===========================
	//函数： errorLoging
	//功能：	write error to file
	//参数：	$e
	//返回：	null
	//===========================
	protected function errorLoging($errorMessage)
	{
		//错误记录格式： 2008-06-19 $errorMessage;
		$date = date("y-m-d h:i:s");
		$fp = @fopen('error.log',"a");
		@fwrite($fp,$date . "\t" . $errorMessage . "\r\n");
		@fclose($fp);
	}
}
?>
