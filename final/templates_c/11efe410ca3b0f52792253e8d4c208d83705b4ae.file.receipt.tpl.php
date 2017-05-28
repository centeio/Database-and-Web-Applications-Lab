<?php /* Smarty version Smarty-3.1.15, created on 2017-05-26 16:32:07
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/shopping_bag/receipt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49042061259195e49396168-35494657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11efe410ca3b0f52792253e8d4c208d83705b4ae' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/shopping_bag/receipt.tpl',
      1 => 1494838155,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49042061259195e49396168-35494657',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59195e495dc743_63687972',
  'variables' => 
  array (
    'address' => 0,
    'zipcode' => 0,
    'city' => 0,
    'phone' => 0,
    'date' => 0,
    'id' => 0,
    'products' => 0,
    'product' => 0,
    'subTotal' => 0,
    'shipping' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59195e495dc743_63687972')) {function content_59195e495dc743_63687972($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1611/public_html/final/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="CheckoutReceipt" class="container">
    <div id="Steps" class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="disabled"><a href="checkout_basket.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Shopping Cart</p>
                </a></li>
                <li class="disabled"><a href="checkout_payment.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Payment</p>
                </a></li>
                <li class="active"><a href="receipt.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-check" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Thank you!</p>
                </a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <h1 id="thank-you" class="col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3"> Thank you for your purchase </h1>
        <hr class="col-lg-12 col-md-12 col-sm-12 col-xs-12" />
        <div class="well col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <?php echo $_smarty_tpl->tpl_vars['address']->value;?>

                        <br>
                        <?php echo $_smarty_tpl->tpl_vars['zipcode']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['city']->value;?>

                        <abbr title="Phone">P:</abbr> <?php echo $_smarty_tpl->tpl_vars['phone']->value;?>

                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%B %eth, %Y");?>
</em>
                    </p>
                    <p>
                        <em>Receipt #: <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">#</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                        <tr>
                            <td class="col-md-9"><em><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</em></td>
                            <td class="col-md-1 text-center"> <?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>
 </td>
                            <td class="col-md-1 text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
€</td>
                            <td class="col-md-1 text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['total'];?>
€</td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Shipping: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong><?php echo $_smarty_tpl->tpl_vars['subTotal']->value;?>
€</strong>
                            </p>
                            <p>
                                <strong><?php echo $_smarty_tpl->tpl_vars['shipping']->value;?>
€</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
€</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
