<?php 
	include_once('../config/init.php');

	$smarty->assign('style','css/Product.css');
	$smarty->display('../templates/common/header.tpl'); ?>
        
            <!-- Page Content -->
            <div id="ProductInformation" class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="bs-example">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>   
                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="../images/pink.jpg" alt="First Slide">
                                    </div>
                                    <div class="item">
                                        <img src="../images/pink4.jpg" alt="Second Slide">
                                    </div>
                                    <div class="item">
                                        <img src="../images/pink3.jpg" alt="Third Slide">
                                    </div>
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
                            <p class="pull-right">ID#5730</p>
                            <h4>Chocolates com morangos</h4>
                            <h4>15.49€</h4>
                            <div class="ratings">
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    (3)
                                </p>
                            </div>
                            <p>Caixa sortido de 32 chocolates com morangos cobertos por diversos tipos de chocolates</p>   
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Details <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <p class="details">
                                        Duis tristique posuere leo, sit amet commodo turpis fermentum elementum. Vestibulum et ex vel magna tincidunt vulputate. Cras dictum odio quis mattis pellentesque. Vestibulum auctor faucibus molestie. Nunc ullamcorper enim libero, sed mattis orci gravida at. Donec a nisi quis elit facilisis facilisis sed a tortor. Sed rutrum scelerisque fermentum.                    
                                    </p>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="details" class="col-md-11">
                        <p class="pull-right"><a class="btn">Write a Review</a></p>
                        <h3> Reviews</h3><br>
                        <hr>                                
                        <div class="row">
                            <div class="col-md-12">
                                <p class="pull-right">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                                <p class="data">13/12/2016</p>
                                <div class="rev">
                                    <p>Subscried by: <br></p>
                                    <p class="username">Ariana fernandes</p>
                                    <p class="descr">This product was great in terms of quality. I would definitely buy another!</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="pull-right">
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                                <p class="data">13/12/2016</p>
                                <div class="rev">
                                    <p>Subscried by: <br></p>
                                    <p class="username">Ariana fernandes</p>
                                    <p class="descr" class="col-md-1">Nullam laoreet venenatis velit vitae iaculis. Phasellus at dictum nibh. Aenean sed augue sit amet dolor tempor porta et vel quam. Cras vitae cursus nisi. In vitae augue lorem. In nec tempor mauris. Quisque tristique quam neque, nec pretium purus malesuada non. Sed non metus non lacus porta gravida a id massa. Nullam enim ipsum, vehicula quis vulputate id, maximus a leo. Suspendisse lacinia semper orci ut semper.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $smarty->display('../templates/common/footer.tpl'); ?>
