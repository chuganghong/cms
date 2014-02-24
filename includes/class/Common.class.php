<?php
class Common
{
	private $db;		//数据库类
	
	public function __construct()
	{
		global $db;		//创建全局变量，数据库连接。我不知道如此做的必要性。
		if(!isset($db))
		{
			return false;
		}
		$this->db = $db;
	}
	
	/**
	 *过滤用户输入
	 *@param mixed $param 用户输入
	 *@return mixed $param 过滤后的用户输入
	 */
	public function _addslashes($param)
	{
		if(function_exists('mysql_real_escape_string'))
		{
			if(is_array($param))
			{
				foreach($param as $key=>$value)
				{
					$param[$key] = mysql_real_escape_string($value);
				}
			}
			else
			{
				$param = mysql_real_escape_string($param);
			}
		}
		else
		{
			if(is_array($param))
			{
				foreach($param as $key=>$value)
				{
					$param[$key] = addslashes($value);
				}
			}
			else
			{
				$param = addslashes($param);
			}
		}
		return $param;
	}
	
	/**
	 *@description 跳转
	 *@param string $link 要跳转到的页面
	 *@param string $msg	提示信息
	 */
	public function cms_header($link,$msg)
	{
		Header('Content-Type:text/html;charset=utf-8');
		$html = <<<EOT

<h1>$msg</h1>;	
<h1>3秒钟后返回上一页</h1>
<h1><a href="$link">跳转</h1>	
<script type="text/javascript">setTimeout('location.href="$link"',5000);</script>
EOT;
		echo $html;		
	}
	
	/**
     *@description 开启SESSION
	 */
	public function start_session()
	{
		if(!isset($_SESSION))
		{
			session_start();
		}
	}
	
	/**
	 *@description 将值加入SESSION
	 *@param mixed $array
	 */
	public function add_session($array)
	{
		$this->start_session();
		if(count($array)>0)
		{
			foreach($array as $key=>$value)
			{
				$_SESSION[$key] = $value;
			}
		}
	}
	
	/**
	 *@description 将值从SESSION中清除
	 *@param miexed $array	$_SESSION的key
	 *
	 */
	public function minus_session($array)
	{
		$this->start_session();
		
		if(count($array)>0)
		{
			
			foreach($array as $v)
			{
				
				if(array_key_exists($v,$_SESSION))
				{
					//var_dump($session[$v]);exit;
					unset($_SESSION[$v]);
				}
			}
		}
	}
	
}