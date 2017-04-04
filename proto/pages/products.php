<?php 
	include_once('../config/init.php');

	$smarty->assign('style','css/Products.css');
	$smarty->display('../templates/common/header.tpl'); ?><!DOCTYPE html>        

            <!-- Page Content -->
            <div id="ProductsContent" class="container">
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
                                            <a href="#"><img class="slide-image" src="../images/h1.jpg" alt=""></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="slide-image" src="../images/h1.jpg" alt=""></a>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="slide-image" src="../images/h3.jpg" alt=""></a>
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
                    </div>
                    <div class="col-md-2">
                        <div class="list-group">
                            <div class="list-group-item">
                                Categories
                            </div>
                            <div class="list-group-item">
                                White Chocolate
                            </div>
                            <div class="list-group-item">
                                Dark Chocolate
                            </div>
                            <div class="list-group-item">
                                Milk Chocolate
                            </div>
                            <div class="list-group-item">
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Price <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><input type="checkbox"> 0€...10€</li>
                                        <li><input type="checkbox">10€...20€</li>
                                        <li><input type="checkbox">20€...30€</li>
                                        <li><input type="checkbox">30€...</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Rating<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li>
                                            <input type="checkbox">
                                            <span class="glyphicon glyphicon-star"></span>
                                        </li>
                                        <li>
                                            <input type="checkbox">
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                        </li>
                                        <li>
                                            <input type="checkbox" >
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                        </li>
                                        <li>
                                            <input type="checkbox" >
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                        </li>
                                        <li>
                                            <input type="checkbox" >
                                            <span class="fa fa-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                            <span class="glyphicon glyphicon-star"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Products">
                        <div class="col-sm-3 col-lg-3 col-md-3">
                            <div class="thumbnail">
                                <img src="../images/2.jpg" alt="">
                                <div class="caption">
                                    <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Dark Chocolate</a></h4>
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
                        <div class="col-sm-3 col-lg-3 col-md-3">
                            <div class="thumbnail">
                                <img src="../images/3.jpg" alt="">
                                <div class="caption">
                                    <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Orange</a></h4>
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
                        <div class="col-sm-3 col-lg-3 col-md-3">
                            <div class="thumbnail">
                                <img src="../images/4.jpg" alt="">
                                <div class="caption">
                                    <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">White</a></h4>
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
                        <div class="col-sm-3 col-lg-3 col-md-3">
                            <div class="thumbnail">
                                <img src="../images/3.jpg" alt="">
                                <div class="caption">
                                    <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Coffee</a></h4>
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
                        <div class="col-sm-3 col-lg-3 col-md-3">
                            <div class="thumbnail">
                                <img src="../images/3.jpg" alt="">
                                <div class="caption">
                                    <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="#">Milk</a></h4>
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
            <!-- /.container -->

<?php $smarty->display('../templates/common/footer.tpl'); ?>