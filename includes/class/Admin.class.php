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
	
	/**
	 *@description 获取本程序的路径
	 *@return string $path 本程序的路径
	 */
	public function sys_path()
	{
		//获取程序路径
		global $root_path;
		$sys_path = $root_path;
		
		return $sys_path;
	}
	
	/**
	 *@description 获取服务器时间
	 *@return string $sys_time 服务器时间
	 */
	public function sys_time()
	{
		$sys_time = date('Y-n-d H:i:s');
		return $sys_time;
	}
	
	/**
	 *@description 获取PHP版本
	 *@return string $sys_php PHP版本
	 */
	public function sys_php()
	{
		$sys_php = phpversion();
		return $sys_php;
	}
	
	/**
	 *@description 获取web服务器信息
	 *@return string $sys_web web服务器信息
	 */
	public function sys_web()
	{
		//服务器版本
		$sys_web_info = $_SERVER['SERVER_SIGNATURE'];
		//var_dump($sys_web);//<address>Apache/2.2.22 (Win32) PHP/5.4.3 Server at 127.0.0.1 Port 80</address>
		$pattern_web = '#<address>(.*)</address>#i';
		$num = preg_match($pattern_web,$sys_web_info,$match);
		//var_dump($num);exit;
		if($num)
		{
			$sys_web = strstr($match[1],'PHP',true);
		}
		else
		{
			$sys_web = '';
		}
		
		return $sys_web;
	}
	
	/**
	 *@description 获取mysql版本信息
	 *@return string $sys_mysql
	 */
	public function sys_mysql()
	{
		//mysql版本
		$sys_mysql = $this->db->mysql_version();		
		//var_dump($sys_mysql);
		return $sys_mysql;
	}
	
	/**
	 *@description 检测是否支持获取远程文件
	 *@return boolean $yn true--支持,false--不支持
	 */
	public function is_remote()
	{
		$res = ini_get('allow_url_fopen');
		$yn = ($res==1)?true:false;
		return $yn;
	}
	
	/**
	 *@description 获取支持上传的最大文件所占空间
	 *@return int $max_file 能够上传的最大文件所占空间，单位为M
	 */
	public function max_file()
	{
		$max_file = ini_get('max_file_uploads');
		return $max_file;
	}
	
	/**
	 *@description 检测PHP是否支持GD库以及获取GD库版本
	 *@return mixed $sys_gd true--支持，false--不支持
	 */
	public function sys_gd()
	{
		if(extension_loaded('gd'))
		{
			$sys_gd = gd_info();	//取得当前安装的 GD 库的信息			
		}
		else
		{
			$sys_gd = false;
		}
		return $sys_gd;
	}
	
	/**
	 *@description 获取运行PHP的操作系统的信息
	 *@return string $sys_os 操作系统信息
	 */
	public function sys_os()
	{
		//var_dump(php_uname('s'));
		$sys_os = PHP_OS;
		//var_dump($sys_os);
		return $sys_os;
	}
	/**
	 *@description 检测数据库所占空间大小
	 *@return int $size 数据库所站空间大小，单位为M
	 */
	public function db_size()
	{
		$sql = 'SHOW TABLE STATUS FROM ecshop';
		$res = $this->db->getRows($sql);
		$data = 0;
		//var_dump($res);
		foreach($res as $v)
		{
			$data += $v['Max_data_length'];
		}
		var_dump($data);
		var_dump($data/1024/1024);
	}
	
	/**
	 *@description 获取本程序的系统信息
	 *@return array $sys_info	本程序的系统信息
	 *@date 2014/02/26 21:00
	 */
	public function sys_info()
	{
		$sys_info = array();
		
		$sys_info = array(
			'sys_path'	=>	$this->sys_path(),
			'sys_time'	=>	$this->sys_time(),
			'sys_php'	=>	$this->sys_php(),
			'sys_web'	=>	$this->sys_web(),
			'sys_mysql'	=>	$this->sys_mysql(),
			'is_remote'	=>	$this->is_remote(),
			'max_file'	=>	$this->max_file(),
			'sys_gd'	=>	$this->sys_gd(),
			'sys_os'	=>	$this->sys_os(),
			);
		//var_dump($sys_info);
		return $sys_info;
	}
		
}