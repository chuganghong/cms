<?php
/**
 *cms20131119项目
 *@description 后台主页
 *@filename index.php
 *@author cg
 *@version 1.0 
 *@date 2013/12/04 22:15
 */
define('CMS',true);
require './init/init.php';






$smarty = new Smarty;

$smarty->template_dir = './templates/';
$smarty->compile_dir = './templates_c';
$smarty->config_dir = './configs/';
$smarty->cache_dir = './cache/';

if(isset($_SESSION['admin']))
{
	$smarty->display('index.html');
}
else
{
	$action = 'mc/login.php';
	$smarty->assign('action',$action);
	
	$smarty->display('login.html');
}