<?php /* Smarty version Smarty-3.1.15, created on 2017-05-27 16:34:51
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/products/search_results.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165813498059299a1aa5cc69-87204726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5673594f95e9f7950cf4402816608b13e1c26faa' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/products/search_results.tpl',
      1 => 1495899291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165813498059299a1aa5cc69-87204726',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59299a1ace0ba6_41043075',
  'variables' => 
  array (
    'products' => 0,
    'BASE_URL' => 0,
    'product' => 0,
    'USERID' => 0,
    'categories' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59299a1ace0ba6_41043075')) {function content_59299a1ace0ba6_41043075($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Page Content -->
<div id="ProductsContent" class="container not-popup" style="margin-top:15px">
    <div class="row">
        <div class="col-md-12" id="Products">                     
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
            <div class="col-md-3 col-xs-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                    <div class="thumbnail">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/thumbnails/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
">
                        <?php if ($_smarty_tpl->tpl_vars['USERID']->value==2) {?>
                        <button onclick="deleteProduct(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)"><i class="fa fa-times pull-right" aria-hidden="true"></i></button>
                        <?php }?>
                        <div class="caption">
                            <h4 class="col-xs-12"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h4>
                            <h4 class="pull-right col-xs-12"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
€</h4>
                            <div class="ratings">
                                <p class="pull-right"><?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
 reviews</p>
                                <input name="rate" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['rate'];?>
" class="rating-loading">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['USERID']->value==2) {?>
            <div id="addProduct" class="col-md-3 col-xs-6">
                <div class="panel panel-info add-product">
                    <i class="fa fa-plus md-trigger" data-modal="modal-11" aria-hidden="true"></i>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<div id="addProductPopUp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Product</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="NewName">Name:</label>
                        <input type="text" class="form-control hide-hints" id="NewName" placeholder="Product name" required>
                    </div>
                    <div class="form-group">
                        <label for="NewPrice">Price:</label>
                        <input type="number" class="form-control hide-hints" id="NewPrice" placeholder="Price" required>
                    </div>
                    <div class="form-group">
                        <label for="NewStock">Stock:</label>
                        <input type="number" class="form-control hide-hints" id="NewStock" placeholder="Stock" required>
                    </div>
                    <div class="form-group">
                        <label for="NewDetails">Details:</label>
                        <textarea class="form-control" id="NewDetails" placeholder="Details"></textarea>
                    </div>
                    <div class="form-group">
                        <fieldset id="NewCategories">
                            <label>Categories:</label>
                            <br>
                            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                                <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                            <?php } ?>
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <label for="NewImage">Image:</label>
                        <input type="file" class="form-control hide-hints" id="NewImage" name="NewImage" accept="image/*" onchange="readURL(this);" required>
                        <img id="preview" src="" alt="your image" />
                    </div>
                    
                    <div class="form-group popup-buttons">
                        <hr/>
                        <span id="popupResponse"></span>
                        <button id="SubmitNewProduct" type="button" class="btn btn-default">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <span class="clear-fix"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/javascript/add_delete_products.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/javascript/filter_products.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/plugins/star-rating/star-rating.js" type="text/javascript"></script>

<script>
    $('.rating-loading').rating({displayOnly: true, size:'xs', filledStar:'<i class="fa fa-star" aria-hidden="true"></i>', emptyStar:'<i class="fa fa-star-o" aria-hidden="true"></i>'});
</script>


<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
