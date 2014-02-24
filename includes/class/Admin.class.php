<?php
/**
 *@description 后台管理员类
 *@
 */
class Admin extends Common
{
	private $db;		//数据库操作类
	private $articles;	//文章类
	
	/**
	 *构造函数
	 *@param object $db	数据库操作类的实例
	 *@param object $articles 文章类实例
	 */
	public function __construct($db,$articles)
	{
		$this->db = $db;
		$this->articles = $articles;
	}
	/**
	 *@description 处理管理员登录
	 *@param string $name 用户名
	 *@param string $pwd 密码
	 *@return boolean true--success/false--failure
	 */
	public function login($name,$pwd)
	{
		$name = $this->_addslashes($name);		//过滤
		$pwd = $this->_addslashes($pwd);		//过滤
		$pwd = MD5($pwd);		//简单加密，可以完善
		
		$sql = "SELECT COUNT(aid) AS rows ";
		$sql .= "FROM cms_admin ";
		$sql .= "WHERE username = '$name' ";
		$sql .= "AND passwd = '$pwd' ";
		
		$arr = $this->db->getRow($sql);
		
		$res = $arr['rows'];
		
		if($res>=1)
		{
			$array = array('admin'=>$name);
			$this->add_session($array);
			return true;
		}
		else
		{
			return false;
		}		
	}
	
	/**
	 *@description 处理管理员注册
	 *@param string $name 用户名
	 *@param string $pwd 密码
	 *@return boolean true--success/false--failure
	 */
	public function register($name,$pwd)
	{
		$name = $this->_addslashes($name);		//过滤
		$pwd = $this->_addslashes($pwd);		//过滤
		$pwd = MD5($pwd);
		
		$sql = "INSERT INTO cms_admin ";
		$sql .= "(username,passwd) VALUES ";
		$sql .= "('$name','$pwd')";
		
		/**
		 *如何判断插入是否成功？
		 * mysql_query() 仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，如果查询执行不正确则返回 FALSE。
		 *对于其它类型的 SQL 语句， mysql_query() 在执行成功时返回 TRUE，出错时返回 FALSE。
		 */
		$res = $this->db->query($sql);	
		if($res)
		{			
			$array = array('admin'=>$name);	//冗余代码
			$this->add_session($array);
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 *@description 退出登录
	 *@param array $key	session值的key
	 */
	public function logout($key)
	{		
		$session = $_SESSION;
		$this->minus_session($key,$session);
	}
		
}