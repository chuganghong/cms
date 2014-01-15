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
			return true;
		}
		else
		{
			return false;
		}		
	}
}