<?php /* Smarty version Smarty-3.1.15, created on 2017-05-25 17:29:13
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/products/best_seller.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99687996658fe1e2c52ff41-77774588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '529a5cb012c5fca94d49d841a5bec9de6455f41e' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/products/best_seller.tpl',
      1 => 1495729378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99687996658fe1e2c52ff41-77774588',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fe1e2c786153_23284006',
  'variables' => 
  array (
    'highlights' => 0,
    'i' => 0,
    'products' => 0,
    'BASE_URL' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fe1e2c786153_23284006')) {function content_58fe1e2c786153_23284006($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Page Content -->
<div id="mainpage-body" class="container">
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
                                <div class="carousel-caption">
                                    <span> <?php echo $_smarty_tpl->tpl_vars['highlights']->value[0]['name'];?>
 </span>
                                </div>
                            </div>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['highlights']->value)-1)+1 - (1) : 1-((count($_smarty_tpl->tpl_vars['highlights']->value)-1))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?> 
                            <div class="item">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[$_smarty_tpl->tpl_vars['i']->value]['link'];?>
"><img class="slide-image" src="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[$_smarty_tpl->tpl_vars['i']->value]['image_path'];?>
" alt=""></a>
                                <div class="carousel-caption">
                                    <span> <?php echo $_smarty_tpl->tpl_vars['highlights']->value[$_smarty_tpl->tpl_vars['i']->value]['name'];?>
 </span>
                                </div>
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

            <div id="BestSellers" class="row">

                <h1 id="BestSellersTitle">Best Rated</h1>

                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                        <div class="thumbnail">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/thumbnails/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
">
                            <div class="caption">
                                <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h4>
                                <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
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
                
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/plugins/star-rating/star-rating.js" type="text/javascript"></script>

<script>
    $('.rating-loading').rating({displayOnly: true, size:'xs', filledStar:'<i class="fa fa-star" aria-hidden="true"></i>', emptyStar:'<i class="fa fa-star-o" aria-hidden="true"></i>'});
</script>


<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
