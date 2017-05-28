<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 13:42:45
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/products/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64699621758fe772517a9c0-91842440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f274f68a76ec71520d3eda9fdc76b2a8dbd0b8dc' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/products/product.tpl',
      1 => 1495975364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64699621758fe772517a9c0-91842440',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fe77254166f0_41120014',
  'variables' => 
  array (
    'product' => 0,
    'categories' => 0,
    'category' => 0,
    'productCategories' => 0,
    'images' => 0,
    'i' => 0,
    'BASE_URL' => 0,
    'USERID' => 0,
    'heart' => 0,
    'reviews' => 0,
    'review' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fe77254166f0_41120014')) {function content_58fe77254166f0_41120014($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1611/public_html/final/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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

<!-- Write Review Pop up -->
<div id="writeReview" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Review</h4>
            </div>
            <div class="modal-body">
                <form>
                <form>
                    <div class="rating form-group">
                        <span><input class="form-check-input" type="radio" name="rating" id="str5" value="5"><label for="str5"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        <span><input class="form-check-input" type="radio" name="rating" id="str4" value="4"><label for="str4"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        <span><input class="form-check-input" type="radio" name="rating" id="str3" value="3"><label for="str3"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        <span><input class="form-check-input" type="radio" name="rating" id="str2" value="2"><label for="str2"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        <span><input class="form-check-input" type="radio" name="rating" id="str1" value="1"><label for="str1"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="writeReviewComment" rows="5" placeholder="Write your review in here..."></textarea>
                    </div>
                    <div class="form-group">
                        <input id="productID" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"/> 
                    </div>
                    <div>
                        <input id="submitButton" type="button" class="btn btn-success" value="Submit"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Pop up -->
<div id="editProductPopUp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="EditName">Name:</label>
                        <input type="text" class="form-control" id="EditName" placeholder="Product name" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
                    </div>
                    <div class="form-group">
                        <label for="EditPrice">Price:</label>
                        <input type="number" class="form-control" id="EditPrice" placeholder="Price" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="EditStock">Stock:</label>
                        <input type="number" class="form-control" id="EditStock" placeholder="Stock" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
">
                    </div>
                    <div class="form-group">
                        <label for="EditDetails">Details:</label>
                        <textarea class="form-control" id="EditDetails" placeholder="Details"><?php echo $_smarty_tpl->tpl_vars['product']->value['details'];?>
</textarea>
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
                                <?php if (in_array($_smarty_tpl->tpl_vars['category']->value['name'],$_smarty_tpl->tpl_vars['productCategories']->value)) {?>
                                    <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" checked> <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                                <?php } else { ?>
                                    <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                                <?php }?>
                            <?php } ?>
                        </fieldset>
                    </div>
                    
                    <div class="form-group popup-buttons">
                        <hr/>
                        <span id="popupResponse"></span>
                        <button id="SubmitEditProduct" type="button" class="btn btn-default">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <span class="clear-fix"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <div id="productWrapper" class="not-popup">
        <!-- Page Content -->
        <div id="ProductInformation" class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="bs-example">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['images']->value)-1+1 - (1) : 1-(count($_smarty_tpl->tpl_vars['images']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                <li data-target="#myCarousel" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"></li>
                                <?php }} ?>
                            </ol>   
                            <!-- Wrapper for carousel items-->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/products/<?php echo $_smarty_tpl->tpl_vars['images']->value[0]['name'];?>
" alt="First Slide">
                                </div>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['images']->value)-1+1 - (1) : 1-(count($_smarty_tpl->tpl_vars['images']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                <div class="item">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/products/<?php echo $_smarty_tpl->tpl_vars['images']->value[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
" alt="">
                                </div>
                                <?php }} ?>
                            </div>
                            <!-- Carousel controls -->
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-details">
                        <p class="pull-right">
                            <?php if ($_smarty_tpl->tpl_vars['USERID']->value==2) {?>
                                <span id="editProduct" style="color: #7B2832"> 
                                    <i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i>
                                </span>
                            <?php }?>
                            ID#<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>

                        </p>
                        <span id="product_id" data="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"/>
                        <h4><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>

                        <?php if (isset($_smarty_tpl->tpl_vars['heart']->value)) {?>
                            <a href="#" id="addfavorite"><span style="color: #7B2832"> 
                                <i id="heart" class="fa <?php echo $_smarty_tpl->tpl_vars['heart']->value;?>
"
                                aria-hidden="true">
                            </span></i></a>
                        <?php }?>
                        <?php if (!$_SESSION['is_admin']) {?>
                            <button type="button" id="addproducttocart" class="btn" onclick="addProductToShoppingBag(<?php echo $_SESSION['user_id'];?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
)">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </button>
                        <?php }?>
                        <h4><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
€</h4>
                        <div class="ratings">
                            <p>
                                <input name="rate" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['rate'];?>
" class="rating-loading" id="averageRate">
                                (<?php echo $_smarty_tpl->tpl_vars['product']->value['votes'];?>
)
                            </p>
                        </div>
                        <p><?php echo $_smarty_tpl->tpl_vars['product']->value['details'];?>
</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="details" class="col-md-11">               
                    <?php if (isset($_SESSION['user_id'])&&!$_SESSION['is_admin']) {?>
                        <p class="pull-right"><a id="writeReviewBtn" class="btn">Write a Review</a></p>
                    <?php }?>
                        <h3 id="ReviewsTitle" > Reviews</h3><br>
                    <?php  $_smarty_tpl->tpl_vars['review'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['review']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reviews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['review']->key => $_smarty_tpl->tpl_vars['review']->value) {
$_smarty_tpl->tpl_vars['review']->_loop = true;
?>
                        <hr>                                
                        <div class="row">
                            <div class="col-md-12">
                                <p class="pull-right">
                                    <input name="rate" value="<?php echo $_smarty_tpl->tpl_vars['review']->value['rate'];?>
" class="rating-loading">
                                </p>
                                <p class="data"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['review']->value['date']);?>
</p>
                                <div class="rev">
                                    <p>Subscried by: <br></p>
                                    <p class="username"><?php echo $_smarty_tpl->tpl_vars['review']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['review']->value['lastname'];?>
</p>
                                    <p class="descr"><?php echo $_smarty_tpl->tpl_vars['review']->value['comment'];?>
</p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
        
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/writeReview.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/add_favorite.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/edit_product.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/user_favorites_buttons.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/plugins/star-rating/star-rating.js" type="text/javascript"></script>
    
    <script>
        $('.rating-loading').rating({displayOnly: true, size:'xs', filledStar:'<i class="fa fa-star" aria-hidden="true"></i>', emptyStar:'<i class="fa fa-star-o" aria-hidden="true"></i>'});
        $('#averageRate').parent().parent().css('display', 'inline');
    </script>
    
    
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
