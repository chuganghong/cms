<?php /* Smarty version Smarty-3.1.12, created on 2014-02-24 12:41:01
         compiled from ".\templates\login.html" */ ?>
<?php /*%%SmartyHeaderCode:111530b3ddd7b1741-75814503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05b143acdc50731311b48d7001385e844715105d' => 
    array (
      0 => '.\\templates\\login.html',
      1 => 1389795980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111530b3ddd7b1741-75814503',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_530b3ddd9c3ea0_82749139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530b3ddd9c3ea0_82749139')) {function content_530b3ddd9c3ea0_82749139($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<title>admin login</title>
</head>
<body>
<form action="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" method="post">
<p>Name:<input type="input" name="name" /></p>
<p>Password:<input type="password" name="password" /></p>
<p>
	<input type="submit" value="Login" />
	&nbsp;&nbsp;
	<input type="reset" value="Reset" />
</p>
</form>
</body>
</html><?php }} ?>