<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 02:16:24
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/admin/admin_orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147709856559197474c47829-39515276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '756d676799c9605bce475df3b7356b8dd623c6b1' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/admin/admin_orders.tpl',
      1 => 1495934174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147709856559197474c47829-39515276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59197474e57559_07239766',
  'variables' => 
  array (
    'orders' => 0,
    'order' => 0,
    'product' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59197474e57559_07239766')) {function content_59197474e57559_07239766($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div id="AdminDashboard" class="container-fluid">
        <?php echo $_smarty_tpl->getSubTemplate ('admin/admin_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div id="page-wrapper">

            <div id="Orders" class="container-fluid">

                <!-- /.row -->
                <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div id = "panel_heading_order_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="panel-heading">
                                <?php if ($_smarty_tpl->tpl_vars['order']->value['state']!='canceled') {?>
                                <div class="col-lg-10">Order #<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</div>
                                <div class="text-right"> 
                                    <button type="button" class="btn remove" onclick="cancelOrder(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <?php } else { ?>
                                    Order #<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>

                                <?php }?>
                            </div>
                            

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <p>
                                            <em>Date: <?php echo $_smarty_tpl->tpl_vars['order']->value['date'];?>
</em>
                                        </p>
                                        <p>
                                            <em>Name: <?php echo $_smarty_tpl->tpl_vars['order']->value['client']['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value['client']['lastname'];?>
</em>
                                        </p>
                                        <p>
                                            <em>Status: <span id="state_order_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class=<?php echo $_smarty_tpl->tpl_vars['order']->value['state'];?>
><strong id="state_order_strong_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['order']->value['state'];?>
</strong></em>
                                        </p>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                        <address>
                                            <strong><?php echo $_smarty_tpl->tpl_vars['order']->value['client']['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value['client']['lastname'];?>
</strong>
                                            <br> <?php echo $_smarty_tpl->tpl_vars['order']->value['address']['address'];?>

                                            <br> <?php echo $_smarty_tpl->tpl_vars['order']->value['address']['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['order']->value['address']['zipnumber'];?>

                                            <br>
                                            <abbr title="Phone">P:</abbr> <?php echo $_smarty_tpl->tpl_vars['order']->value['client']['phonenumber'];?>

                                        </address>
                                    </div>
                                </div>
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                            <tr>
                                <td class="col-sm-8 col-md-6 col-xs-12 col-lg-6"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <input type="number" class="form-control" id="exampleInputEmail1" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>
">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['quantity']*$_smarty_tpl->tpl_vars['product']->value['price'];?>
</strong></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="btn remove">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <!-- /.row -->


                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/admin_orders.js"></script><?php }} ?>
