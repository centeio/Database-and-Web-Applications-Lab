<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 20:28:59
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/admin/admin_clients.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193860802759197a969048f5-71457777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fbf462477d71917bf060c70c375c451f675852a' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/admin/admin_clients.tpl',
      1 => 1495999731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193860802759197a969048f5-71457777',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59197a96ac1b06_42225545',
  'variables' => 
  array (
    'clients' => 0,
    'client' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59197a96ac1b06_42225545')) {function content_59197a96ac1b06_42225545($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div id="AdminDashboard" class="container-fluid">
        <?php echo $_smarty_tpl->getSubTemplate ('admin/admin_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div id="Clients" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['client'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['client']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clients']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['client']->key => $_smarty_tpl->tpl_vars['client']->value) {
$_smarty_tpl->tpl_vars['client']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['client']->value['isremoved']) {?>
                                <tr data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
" class="removed">
                            <?php } else { ?>
                                <tr data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
" class="notRemoved">
                            <?php }?>
                                <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                    <?php echo $_smarty_tpl->tpl_vars['client']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['client']->value['lastname'];?>

                                </td>
                                <td class="col-sm-5 col-md-5 "><?php echo $_smarty_tpl->tpl_vars['client']->value['email'];?>
</td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="btn remove" data-id="<?php echo $_smarty_tpl->tpl_vars['client']->value['id'];?>
">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </td>

                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.container -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<!-- /#wrapper -->

<?php }} ?>
