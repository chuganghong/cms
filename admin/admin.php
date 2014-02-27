<?php
/**
 *@description 后台管理员功能：logout等
 *@filename admin.php
 *@date 2014/02/24 21:19
 */
define('CMS',true);
require './init/init.php';


$smarty = new Smarty;

$smarty->template_dir = './templates/';
$smarty->compile_dir = './templates_c';
$smarty->config_dir = './configs/';
$smarty->cache_dir = './cache/';

$act = isset($_GET['act'])?$_GET['act']:'default';
$act = isset($_SESSION['admin'])?$act:'login';

switch($act)
{
	case 'login':
		$action = 'login.php';
		$smarty->assign('action',$action);	
		$smarty->display('login.html');
		break;
	case 'logout':		
		$key = array('admin');
		$admin->logout($key);		
		ob_clean();
		Header('Location:index.php');
		break;
	case 'default':				
		$smarty->display('index.html');
		break;
	case 'top':
		$smarty->display('top.html');
		break;
	case 'main':
		$time = time();
		$time = date('Y-M-D H:m:s');
		$hi = $time;
		$sys_info = $admin->sys_info();
		$smarty->assign('sys_info',$sys_info);
		$smarty->display('main.html');
		break;
	case 'left':
		$smarty->display('left.html');
		break;
	
}