<?php /* Smarty version Smarty-3.1.15, created on 2017-03-27 18:54:07
         compiled from "/opt/lbaw/lbaw1611/public_html/frmk/templates/MainPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12045704458d94f2297dc63-63424750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0779f407ef8b861a452cb569fe225d335e95a7af' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/frmk/templates/MainPage.tpl',
      1 => 1490637246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12045704458d94f2297dc63-63424750',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58d94f22aed122_17972701',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d94f22aed122_17972701')) {function content_58d94f22aed122_17972701($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Page Content -->
<div id="mainpage-body" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="#"><img class="slide-image" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/valentineSpecial.jpg" alt=""></a>
                                <div class="carousel-caption">
                                    <span> Valentine's Day </span>
                                </div>
                            </div>
                            <div class="item">
                                <a href="#"><img class="slide-image" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/chocolateBundle.jpg" alt=""></a>
                                <div class="carousel-caption">
                                    <span> Chocolate Bundle </span>
                                </div>
                            </div>
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

                <h1 id="BestSellersTitle"> Best Sellers </h1>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/FirstProduct.jpeg" alt="">
                        <div class="caption">
                            <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Mackie Bars</a></h4>
                            <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">$24.99</h4>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/SecondProduct.jpg" alt="">
                        <div class="caption">
                            <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Hot Chocolate</a></h4>
                            <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">$64.99</h4>
                            <div class="ratings">
                                <p class="pull-right">12 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/ThirdProduct.jpg" alt="">
                        <div class="caption">
                            <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Doisy&Dam</a></h4>
                            <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">$74.99</h4>
                            <div class="ratings">
                                <p class="pull-right">31 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/ForthProduct.jpg" alt="">
                        <div class="caption">
                            <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Strawberry Bundle I</a></h4>
                            <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">$84.99</h4>
                            <div class="ratings">
                                <p class="pull-right">6 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/FifthProduct.jpg" alt="">
                        <div class="caption">
                            <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Strawberry Bundle II</a></h4>
                            <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">$94.99</h4>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/SixthProduct.jpg" alt="">
                        <div class="caption">
                            <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Chocolate Basket Bundle</a></h4>
                            <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">$94.99</h4>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
