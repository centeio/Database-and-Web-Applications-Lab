<?php /* Smarty version Smarty-3.1.15, created on 2017-05-22 10:34:17
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/admin/admin_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210845962659197474e66746-15995952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5da4dbd979a3357cb72acd1bea42c67ac45e5e2d' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/admin/admin_menu.tpl',
      1 => 1495445656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210845962659197474e66746-15995952',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59197474e7b6b4_79952077',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'nviews' => 0,
    'nclients' => 0,
    'norders' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59197474e7b6b4_79952077')) {function content_59197474e7b6b4_79952077($_smarty_tpl) {?>            <div class="row">
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
                                        <div class="huge"><?php echo $_smarty_tpl->tpl_vars['nviews']->value;?>
</div>
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
                                        <div class="huge"><?php echo $_smarty_tpl->tpl_vars['nclients']->value;?>
</div>
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
                                        <div class="huge"><?php echo $_smarty_tpl->tpl_vars['norders']->value;?>
</div>
                                        <div>Orders</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

            </div>
            <!-- /.row --><?php }} ?>
