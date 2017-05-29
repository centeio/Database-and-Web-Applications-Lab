<?php /* Smarty version Smarty-3.1.15, created on 2017-05-15 08:38:07
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/users/user_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151460807858ff56718fc037-05591236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '019a921c5554faabaa5071176201cb333b5f14db' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/users/user_menu.tpl',
      1 => 1494833886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151460807858ff56718fc037-05591236',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58ff5671917a56_36286705',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'num_orders' => 0,
    'num_favorites' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ff5671917a56_36286705')) {function content_58ff5671917a56_36286705($_smarty_tpl) {?>            <div class="row">
                <div class="user_menu col-lg-2 col-sm-4 col-xs-12 col-lg-offset-3">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/user/user_page.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <br/>
                                        <div>Edit Profile</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="user_menu col-lg-2 col-sm-4 col-xs-12">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/user/user_orders.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gift fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $_smarty_tpl->tpl_vars['num_orders']->value;?>
</div>
                                        <div>Orders</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="user_menu col-lg-2 col-sm-4 col-xs-12">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/user/user_favorites.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-heart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $_smarty_tpl->tpl_vars['num_favorites']->value;?>
</div>
                                        <div>Favorites</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
            <!-- /.row --><?php }} ?>
