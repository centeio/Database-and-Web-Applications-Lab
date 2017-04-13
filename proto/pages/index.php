<?php 
	include_once('../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    $products = getBestSellers();

	$smarty->assign('style','css/MainPage.css');
	$smarty->display('../templates/common/header.tpl');?>

            <!-- Page Content -->
            <div id="mainpage-body" class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row carousel-holder">
                            <div class="col-md-12">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <!-- TODO: what special occasions should be here? Active ones? -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href="#"><img class="slide-image" src="../images/valentineSpecial.jpg" alt=""></a>
                                            <div class="carousel-caption">
                                                <span> Valentine's Day </span>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="slide-image" src="../images/chocolateBundle.jpg" alt=""></a>
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

                            <?foreach ($products as $key => $product) {
                            $reviews = getAllProductReviewsInfo($product['id']);
                            $product['rate'] = round($reviews['average']);
                            $product['count'] = $reviews['count'];
                            $product['image'] = getAllProductImages($product['id'])[0]['name']?>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img src="<?=$BASE_URL .'images/products/'.$product['image']?>" alt="">
                                    <div class="caption">
                                        <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="<?$BASE_URL?>product.php?id=<?=$product['id']?>"><?=$product['name']?></a></h4>
                                        <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12"><?=$product['price']?>€</h4>
                                        <div class="ratings">
                                            <p class="pull-right"><?=$product['count']?> reviews</p>
                                            <p>
                                                <?for ($i = 1; $i <= $product['rate']; $i++) {?>
                                                    <span class="glyphicon glyphicon-star"></span>
                                                <?}?>
                                                <?for ($i = 1; $i <= 5 - $product['rate']; $i++) {?>
                                                    <span class="glyphicon glyphicon-star-empty"></span>
                                                <?}?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?}?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->

            <div id="footer" class="container-fluid">
                <div id="SocialMedia" class="col-md-12">
                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
                <div id="Copyrights" class="col-md-12"> 
                    <span> ©2017 Charlie&Wonka.com. All rights reserved. </span>
                </div>
            </div>
        </div>
    </body>
</html>
