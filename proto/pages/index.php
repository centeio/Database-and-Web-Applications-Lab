<?php 
	include_once('../config/init.php');

	$smarty->assign('style','css/MainPage.css');
	$smarty->display('../templates/common/header.tpl');?>

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

                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img src="../images/FirstProduct.jpeg" alt="">
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
                                    <img src="../images/SecondProduct.jpg" alt="">
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
                                    <img src="../images/ThirdProduct.jpg" alt="">
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
                                    <img src="../images/ForthProduct.jpg" alt="">
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
                                    <img src="../images/FifthProduct.jpg" alt="">
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
                                    <img src="../images/SixthProduct.jpg" alt="">
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
