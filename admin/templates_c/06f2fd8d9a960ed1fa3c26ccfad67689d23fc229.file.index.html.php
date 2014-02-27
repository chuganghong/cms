<?php /* Smarty version Smarty-3.1.12, created on 2014-02-27 13:57:28
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:12668530b462e8b4917-00145990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f2fd8d9a960ed1fa3c26ccfad67689d23fc229' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1393509273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12668530b462e8b4917-00145990',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_530b462e924a46_48616393',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530b462e924a46_48616393')) {function content_530b462e924a46_48616393($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<title>Admin</title>
</head>
<frameset rows="5%,95%">
	<frame src = "admin.php?act=top">
	<frameset cols = "20%,80%">
		<frame src = "admin.php?act=left" >
		<frame src = "admin.php?act=main" name="main">
	</frameset>
</frameset>
</html><?php }} ?>