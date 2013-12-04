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
	
	
}