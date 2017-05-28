<?php /* Smarty version Smarty-3.1.15, created on 2017-04-29 19:33:02
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/users/admin_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2230333845904dc5e2716a3-20947558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36dd6e4784f66634d983595a90fa7d9bae270b44' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/users/admin_menu.tpl',
      1 => 1492112551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2230333845904dc5e2716a3-20947558',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5904dc5e3e42a0_78300270',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5904dc5e3e42a0_78300270')) {function content_5904dc5e3e42a0_78300270($_smarty_tpl) {?>            <div class="row">
                <div class="col-lg-2 col-md-4 col-lg-offset-3">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/admin/admin_page_chart.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bar-chart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>Visits</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/admin/admin_clients.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>Clients</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/admin/admin_orders.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gift fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>Orders</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

            </div>
            <!-- /.row --><?php }} ?>
