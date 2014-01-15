<?php
/**
 *@description 处理后台管理员的登录请求
 *@filename login.php
 *@project cms20131119
 *@version 1.0
 *@date 2014/01/15
 *@author ggh
 */
define('CMS',true);

require '../init/init.php';

$name = $_POST['name'];
$pwd = $_POST['password'];

$res = $admin->login($name,$pwd);
var_dump($res);exit;

