<?php /* Smarty version Smarty-3.0.6, created on 2011-05-10 23:59:48
         compiled from "views\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217384dc9b554f3fe69-85884887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb3fd37e6f529e330906b3654bbe2b19ae9511a7' => 
    array (
      0 => 'views\\index.tpl',
      1 => 1305064783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217384dc9b554f3fe69-85884887',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cssFiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
?>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('cssFolder')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
.css" type="text/css" media="screen" />
        <?php }} ?>
            <br/>
        <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('jsFiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
?>
            <script src="<?php echo $_smarty_tpl->getVariable('jsFolder')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
.js" type="text/javascript" language="javascript" charset="utf-8"></script>
        <?php }} ?>
        <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
    </head>
    <body>
        <h2><?php echo $_smarty_tpl->getVariable('message')->value;?>
</h2>
    </body>
</html>

