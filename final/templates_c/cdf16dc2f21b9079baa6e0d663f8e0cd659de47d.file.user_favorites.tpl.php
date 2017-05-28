<?php /* Smarty version Smarty-3.1.15, created on 2017-04-27 16:15:16
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/users/user_favorites.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113867495458ff60be797039-61730486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdf16dc2f21b9079baa6e0d663f8e0cd659de47d' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/users/user_favorites.tpl',
      1 => 1493306105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113867495458ff60be797039-61730486',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58ff60be94dd18_58566495',
  'variables' => 
  array (
    'products' => 0,
    'BASE_URL' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ff60be94dd18_58566495')) {function content_58ff60be94dd18_58566495($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Product added to cart.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
   
<div id="dashboard" class="container-fluid">

    <?php echo $_smarty_tpl->getSubTemplate ('users/user_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div id="Favorites" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Price</th>
                                <th> </th>
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
                                <td class="col-sm-8 col-md-6 col-xs-12 col-lg-6">
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
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['stock']>0) {?>
                                                <span>Status: <span class="text-success"><strong>In Stock</strong></span></span>
                                            <?php } else { ?>
                                                <span>Status: <span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span></span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
€</strong></td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    <button type="button" id="addproducttocart" class="btn remove" onclick="addProductToShoppingBag(<?php echo $_SESSION['user_id'];?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="btn remove" onclick="removeFavorite(<?php echo $_SESSION['user_id'];?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">
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
    </div>
</div id="page-wrapper">

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/user_favorites_buttons.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
