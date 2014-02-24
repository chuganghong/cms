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

if(isset($_SESSION['admin']))
{	
	Header('Location:admin.php');
}
else
{
	Header('Location:admin.php?act=login');
}