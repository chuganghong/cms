<?php
/**
 *cms20131119项目
 *@description 数据库操作类
 *@filename DB.class.php
 *@author cg
 *@version 1.0
 *@date 2013/12/03 23:23
 */
class Db
{
	private $host;			//host，数据库服务器
	private $root;			//root,数据库用户名
	private $pwd;			//password,数据库连接密码
	private $db;			//数据库名称，即选中的数据库
	private $conn;			//数据库连接
	private $result;		//数据库操作后的结果
	
	public function __construct($host,$root,$pwd,$db)
	{
		$this->host = $host;
		$this->root = $root;
		$this->pwd = $pwd;
		$this->db = $db;
		
		$this->conn = mysql_connect($host,$root,$pwd) or die('Can not connect:' . mysql_error());
		mysql_select_db($db,$this->conn) or die('Can not use ' . $db . ':' . mysql_error());
	}
	
	public function query($sql)
	{
		mysql_query('SET NAMES utf8');
		$this->result = mysql_query($sql) or die($this->showErrorMsg($sql));
		return $this->result;
	}
	
	/**
	 *将查询结果存储到数组中
	 *@param string $sql SQL语句
	 *@return array $arr 存储查询结果的数组
	 */
	public function getRows($sql)
	{
		$res = $this->query($sql);
		$arr = array();
		while($row=mysql_fetch_array($res))
		{
			$arr[] = $row;
		}
		return $arr;
	}
	
	public function getRow($sql)
	{
		$res = $this->query($sql);		
		$row = mysql_fetch_array($res);
		return $row;
	}
	
	/**
	 *取得上一步 INSERT 操作产生的 ID 
	 */
	public function getInsertId()
	{
		$id = mysql_insert_id();
		return $id;
	}
	
	/**
	 *取得上一步insert,update,delete操作所影响的行数
	 */
	public function getAffectedRows()
	{
		$rows = mysql_affected_rows();
		return $rows;
	}
	
	/**
	 *输出数据库操作的错误信息
	 *@param string $sql SQL语句
	 *@param boolean $bool true--输出错误信息/false--不输出错误信息
	 */
	public function showErrorMsg($sql,$bool=true)
	{
		if($bool)
		{
			$errorMsg = '"' . $sql . '"语句错误：';
			$errorMsg .= mysql_error();
			$errorMsg .= '在' . __FILE__ . '的第' . __LINE__ . '行。';
			$errorMsg .= '<br />';		
			echo $errorMsg;
		}
	}
	
	/**
	 *@description 获取服务器上的mysql的版本
	 *@return string $info mysql的版本
	 */
	public function mysql_version()
	{
		$sql = 'SELECT VERSION()';
		$infos = $this->getRow($sql);
		$info = $infos[0];
		return $info;
	}
}