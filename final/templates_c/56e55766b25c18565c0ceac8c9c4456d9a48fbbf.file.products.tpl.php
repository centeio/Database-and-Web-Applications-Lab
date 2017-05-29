<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 19:44:35
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/products/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83489452858fe238a248591-88532230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56e55766b25c18565c0ceac8c9c4456d9a48fbbf' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/products/products.tpl',
      1 => 1495997067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83489452858fe238a248591-88532230',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fe238a47c547_09705730',
  'variables' => 
  array (
    'highlights' => 0,
    'i' => 0,
    'categories' => 0,
    'category' => 0,
    'products' => 0,
    'USERID' => 0,
    'product' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fe238a47c547_09705730')) {function content_58fe238a47c547_09705730($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Page Content -->
<div id="ProductsContent" class="container not-popup">
    <div class="row">
        <div class="col-md-12">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['highlights']->value)-1)+1 - (1) : 1-((count($_smarty_tpl->tpl_vars['highlights']->value)-1))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?> 
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"></li>
                            <?php }} ?>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[0]['link'];?>
"><img class="slide-image" src="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[0]['image_path'];?>
" alt=""></a>
                            </div>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['highlights']->value)-1)+1 - (1) : 1-((count($_smarty_tpl->tpl_vars['highlights']->value)-1))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?> 
                            <div class="item">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[$_smarty_tpl->tpl_vars['i']->value]['link'];?>
"><img class="slide-image" src="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[$_smarty_tpl->tpl_vars['i']->value]['image_path'];?>
" alt=""></a>
                            </div>
                            <?php }} ?>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 list-group">
            <div class="list-group-item" id="categoryDropdown">
                Categories <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
            <div  class="categoryOption list-group-item">
                <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

            </div>
            <?php } ?>
            <div class="list-group-item" id="priceDropdown">
                Price <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            <div  class="priceOption list-group-item">
                <div id="slider-range"></div>
                <div id="minPrice">0€</div><div id="maxPrice">50€</div>
            </div>
            <div class="list-group-item" id="ratingDropdown">
                Rating <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            <div  class="ratingOption list-group-item">
                <input type="checkbox" value="1" aria-label="1 star">
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="ratingOption list-group-item">
                <input type="checkbox" value="2" aria-label="2 stars">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="ratingOption list-group-item">
                <input type="checkbox" value="3" aria-label="3 stars">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="ratingOption list-group-item">
                <input type="checkbox" value="4" aria-label="4 stars">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="ratingOption list-group-item">
                <input type="checkbox" value="5" aria-label="5 stars">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
        </div>
        <div class="col-md-10" id="Products">                     
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
            <div class="col-md-3 col-xs-6">
                <?php if ($_smarty_tpl->tpl_vars['USERID']->value==2) {?>
                <button onclick="deleteProduct(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)" aria-label="delete product"><i class="fa fa-times pull-right" aria-hidden="true"></i></button>
                <?php }?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                    <div class="thumbnail">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/thumbnails/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
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
                <div class="panel panel-info add-product" aria-label="New Product">
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
                            <legend>Categories:</legend>
                            <br>
                            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                                <label>
                                <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"> 
                                <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
 
                                </label>
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
    $('.rating-loading').rating({displayOnly: true, size:'xs', showCaption:true});
</script>


<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
