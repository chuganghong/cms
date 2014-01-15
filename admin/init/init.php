<?php
/**
 *@description 初始化配置
 *@filename init.php
 *@project cms20131119
 *@version 1.0
 *@date 2014/01/15
 *@author ggh
 */
if(!defined('CMS'))
{
	die('Hack attack!');
}

if(!isset($_SESSION))
{
	session_start();
}

$root_path = substr(__FILE__,0,-19);
$search = '\\';
$replace = '/';
$root_path = str_replace($search,$replace,$root_path);
//var_dump($root_path);exit;
define('ROOT_PATH',$root_path);		//根目录

include ROOT_PATH . 'includes/smarty/libs/Smarty.class.php';
require ROOT_PATH . 'includes/class/Common.class.php';
require ROOT_PATH . 'includes/class/Db.class.php';
require ROOT_PATH . 'includes/class/Articles.class.php';
require ROOT_PATH . 'includes/class/Image.class.php';
require ROOT_PATH . 'includes/class/Admin.class.php';


//连接数据库
$host = 'localhost';
$root = 'root';
$pwd = '';
$db2 = 'cms20131119';
$db = new Db($host,$root,$pwd,$db2);

$articles = new Articles();
$admin = new Admin($db,$articles);






