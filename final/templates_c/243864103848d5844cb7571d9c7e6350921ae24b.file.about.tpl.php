<?php /* Smarty version Smarty-3.1.15, created on 2017-05-27 23:16:18
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/common/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4776591745908c8ceee3dd3-40028538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '243864103848d5844cb7571d9c7e6350921ae24b' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/common/about.tpl',
      1 => 1495923377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4776591745908c8ceee3dd3-40028538',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5908c8cf14b049_04622942',
  'variables' => 
  array (
    'image_path' => 0,
    'paragraphs' => 0,
    'paragraph' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5908c8cf14b049_04622942')) {function content_5908c8cf14b049_04622942($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="about-body" class="container-fluid">
    <div id="AboutImage" class="col-md-4">
        <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
">
    </div>
    <div id="AboutText" class="col-md-8">
        <h1> About </h1>
        <?php  $_smarty_tpl->tpl_vars['paragraph'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paragraph']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paragraphs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paragraph']->key => $_smarty_tpl->tpl_vars['paragraph']->value) {
$_smarty_tpl->tpl_vars['paragraph']->_loop = true;
?>
        <p><?php echo $_smarty_tpl->tpl_vars['paragraph']->value;?>
</p>
        <?php } ?>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
