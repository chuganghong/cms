<?php /* Smarty version Smarty-3.1.12, created on 2014-02-27 14:03:07
         compiled from ".\templates\main.html" */ ?>
<?php /*%%SmartyHeaderCode:11213530b5acf20ed54-32155500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ec5cc4c9d0e21c5c92b94ed649a5416160d787a' => 
    array (
      0 => '.\\templates\\main.html',
      1 => 1393509775,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11213530b5acf20ed54-32155500',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_530b5acf2aba77_29180143',
  'variables' => 
  array (
    'sys_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530b5acf2aba77_29180143')) {function content_530b5acf2aba77_29180143($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>系统信息</p>
<hr/>
<p>服务器时间：<?php echo $_smarty_tpl->tpl_vars['sys_info']->value['sys_time'];?>
</p>
<p>操作系统：<?php echo $_smarty_tpl->tpl_vars['sys_info']->value['sys_os'];?>
</p>
<p>PHP版本：<?php echo $_smarty_tpl->tpl_vars['sys_info']->value['sys_php'];?>
</p>
<p>WEB服务器信息：<?php echo $_smarty_tpl->tpl_vars['sys_info']->value['sys_web'];?>
</p>
<p>最大上传文件限制：<?php echo $_smarty_tpl->tpl_vars['sys_info']->value['max_file'];?>
M</p>
<p>是否支持远程文件获取：<?php if ($_smarty_tpl->tpl_vars['sys_info']->value['sys_php']){?>支持<?php }else{ ?>不支持<?php }?></p>
<p>是否安装GD库：<?php if ($_smarty_tpl->tpl_vars['sys_info']->value['sys_php']){?>支持<?php }else{ ?>不支持<?php }?></p>
<p>MySQL版本：<?php echo $_smarty_tpl->tpl_vars['sys_info']->value['sys_php'];?>
</p>
</body>
</html><?php }} ?>