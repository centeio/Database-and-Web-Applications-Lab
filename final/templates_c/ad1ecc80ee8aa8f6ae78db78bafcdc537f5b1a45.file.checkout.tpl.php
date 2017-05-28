<?php /* Smarty version Smarty-3.1.15, created on 2017-05-02 21:36:26
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/shopping_bag/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111731966358ffd5681dbd37-84347905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad1ecc80ee8aa8f6ae78db78bafcdc537f5b1a45' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/shopping_bag/checkout.tpl',
      1 => 1493757385,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111731966358ffd5681dbd37-84347905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58ffd5682c2279_87635631',
  'variables' => 
  array (
    'products' => 0,
    'BASE_URL' => 0,
    'product' => 0,
    'subTotal' => 0,
    'shipping' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ffd5682c2279_87635631')) {function content_58ffd5682c2279_87635631($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="CheckoutBasket" class="container">
    <div id="Steps" class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="checkout_basket.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Shopping Cart</p>
                </a></li>
                <li class="checked"><a href="checkout_payment.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Payment</p>
                </a></li>
                <li class="disabled"><a href="">
                    <h4 class="list-group-item-heading"><i class="fa fa-check" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Thank you!</p>
                </a></li>
            </ul>
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
                        <th class="text-center">Total <a href=#> <i id="refresh" class="fa fa-refresh" aria-hidden="true"> </a></i></th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                    <tr>
                        <td class="col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"> 
                                    <img class="media-object" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/thumbnails/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
"> 
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></h4>
                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['stock']>0) {?>
                                        <span>Status: <span class="text-success"><strong>In Stock</strong></span></span>
                                  <?php } else { ?>
                                        <span>Status: <span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span></span>
                                    <?php }?>
                                </div>
                            </div>
                        </td>
                        <td class="col-xs-1 col-sm-1 col-md-1 input-group" style="text-align: center">
                                <button type="button" class="btn_less">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                                <input type="text" min="1" class="quantity" data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>
">
                                <button type="button" class="btn_plus">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                
                                                            
                        </td>
                        <td class="col-sm-6 col-md-1 text-center"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
€</strong></td>
                        <td class="col-sm-6 col-md-1 text-center"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['total'];?>
€</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <button type="button" class="btn_remove" data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <table class="table total-price">
                <tbody>
                    <tr>
                        <td class="col-lg-9 col-md-9"> </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong><?php echo $_smarty_tpl->tpl_vars['subTotal']->value;?>
€</strong></h5></td>
                    </tr>
                    <tr>
                        <td class="col-lg-9 col-md-9"> </td>
                        <td><h5>Shipping</h5></td>
                        <td class="text-right"><h5><strong><?php echo $_smarty_tpl->tpl_vars['shipping']->value;?>
€</strong></h5></td>
                    </tr>
                    <tr>
                        <td class="col-lg-9 col-md-9"> </td>
                        <td><h3 id="Total">Total</h3></td>
                        <td class="text-right"><h3><strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
€</strong></h3></td>
                    </tr>
                    <tr>
                        <td class="col-lg-9 col-md-9"> </td>
                        <td>
                        <a type="button" class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/products/products.php">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i> Continue Shopping
                        </a></td>
                        <td>
                        <a type="button" class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/shopping_bag/checkout_payment.php">
                            Payment <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/checkout.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
