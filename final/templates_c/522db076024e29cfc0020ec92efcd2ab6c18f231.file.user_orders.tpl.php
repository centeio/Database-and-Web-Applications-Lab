<?php /* Smarty version Smarty-3.1.15, created on 2017-05-15 09:59:31
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/users/user_orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136516483258ff60b3bee765-30885502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '522db076024e29cfc0020ec92efcd2ab6c18f231' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/users/user_orders.tpl',
      1 => 1494838491,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136516483258ff60b3bee765-30885502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58ff60b3e28b49_53840213',
  'variables' => 
  array (
    'orders' => 0,
    'order' => 0,
    'user' => 0,
    'BASE_URL' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ff60b3e28b49_53840213')) {function content_58ff60b3e28b49_53840213($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1611/public_html/final/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

   
<div id="dashboard" class="container-fluid">

    <?php echo $_smarty_tpl->getSubTemplate ('users/user_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!--<h1 id="thank-you" class="col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3"> Your Orders </h1> -->

    <div id="Orders" class="container-fluid">
        <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">Order #<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <p>
                                <?php if ($_smarty_tpl->tpl_vars['order']->value['arriveddate']) {?>
                                    <em><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['arriveddate']);?>
</em>
                                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['sentdate']) {?>
                                    <em><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['sentdate']);?>
</em>
                                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['canceleddate']) {?>
                                    <em><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['canceleddate']);?>
</em>
                                <?php } else { ?>
                                    <em><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['orderdate']);?>
</em>
                                <?php }?>
                                
                            </p>

                            <p>
                                <em>Status: <span class=<?php echo $_smarty_tpl->tpl_vars['order']->value['state'];?>
><strong><?php echo $_smarty_tpl->tpl_vars['order']->value['state'];?>
</strong></em>
                            </p>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <address>
                                <strong><?php echo $_smarty_tpl->tpl_vars['user']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['lastname'];?>
</strong>
                                <br> <?php echo $_smarty_tpl->tpl_vars['order']->value['address'];?>

                                <br> <?php echo $_smarty_tpl->tpl_vars['order']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['order']->value['zipnumber'];?>

                                <br>
                                <abbr title="Phone">P:</abbr> <?php echo $_smarty_tpl->tpl_vars['user']->value['phonenumber'];?>

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

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                                    <tr>
                                        <td class="col-md-6">
                                            <div class="media">
                                                <a class="thumbnail pull-left" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"> <img class="media-object" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/thumbnails/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
"> </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-md-1" style="text-align: center"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>
</strong>
                                        </td>
                                        <td class="col-md-1 text-center"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
€</strong></td>
                                        <td class="col-md-1 text-center"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['total'];?>
€</strong></td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <table class="table total-price">
                                <tbody>
                                    <tr>
                                        <tr>
                                            <td class="col-lg-9 col-md-9"> </td>
                                            <td>
                                                <h5>Subtotal</h5>
                                            </td>
                                            <td class="text-right">
                                                <h5><strong><?php echo $_smarty_tpl->tpl_vars['order']->value['subTotal'];?>
€</strong></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-9 col-md-9"> </td>
                                            <td>
                                                <h5>Shipping</h5>
                                            </td>
                                            <td class="text-right">
                                                <h5><strong><?php echo $_smarty_tpl->tpl_vars['order']->value['shipping'];?>
€</strong></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-9 col-md-9"> </td>
                                            <td>
                                                <h3 id="Total">Total</h3>
                                            </td>
                                            <td class="text-right">
                                                <h3><strong><?php echo $_smarty_tpl->tpl_vars['order']->value['total'];?>
</strong></h3>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>
<!-- /.container -->

</div>
</div id="page-wrapper">

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
