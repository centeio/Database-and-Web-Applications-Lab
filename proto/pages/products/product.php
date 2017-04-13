<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    if (!$_GET['id']) {
        $_SESSION['error_messages'][] = 'Undefined product';
        header("Location: $BASE_URL");
        exit;
    }
    
    $product = getProduct($_GET['id']);
    $rate = getAllProductReviewsInfo($product['id']);
    $reviews = getAllProductReviews($product['id']);
    $images = getAllProductImages($product['id']);

	$smarty->assign('style','css/Product.css');
	$smarty->display($BASE_DIR .'templates/common/header.tpl'); ?>
        
            <!-- Page Content -->
            <div id="ProductInformation" class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="bs-example">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <?for ($i = 1; $i < count($images); $i++) {?>
                                    <li data-target="#myCarousel" data-slide-to="<?=$i?>"></li>
                                    <?}?>
                                </ol>   
                                <!-- Wrapper for carousel items-->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="<?=$BASE_URL .'images/products/'.$images[0]['name']?>" alt="First Slide">
                                    </div>
                                    <?for ($i = 1; $i < count($images); $i++) {?>
                                    <div class="item">
                                        <img src="<?=$BASE_URL .'images/products/'.$images[$i]['name']?>" alt="">
                                    </div>
                                    <?}?>
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
                            <p class="pull-right">ID#<?=$product['id']?></p>
                            <h4><?=$product['name']?></h4>
                            <h4><?=$product['price']?>€</h4>
                            <div class="ratings">
                                <p>
                                    <?for ($i = 1; $i <= $rate['average']; $i++) {?>
                                        <span class="glyphicon glyphicon-star"></span>
                                    <?}?>
                                    <?for ($i = 1; $i <= 5 - $rate['average']; $i++) {?>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    <?}?>
                                    (<?=$rate['count']?>)
                                </p>
                            </div>
                            <p>Caixa sortido de 32 chocolates com morangos cobertos por diversos tipos de chocolates</p>   
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Details <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <p class="details"><?=$product['details']?></p>
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
                        <?foreach ($reviews as $key => $review) {?>
                            <hr>                                
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="pull-right">
                                        <?for ($i = 1; $i <= $review['rate']; $i++) {?>
                                            <span class="glyphicon glyphicon-star"></span>
                                        <?}?>
                                        <?for ($i = 1; $i <= 5 - $review['rate']; $i++) {?>
                                            <span class="glyphicon glyphicon-star-empty"></span>
                                        <?}?>
                                    </p>
                                    <p class="data"><?=date("d/m/Y", strtotime($review['date']))?></p>
                                    <div class="rev">
                                        <p>Subscried by: <br></p>
                                        <p class="username"><?=$review['firstname']?> <?=$review['lastname']?></p>
                                        <p class="descr"><?=$review['comment']?></p>
                                    </div>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>
<?php $smarty->display($BASE_DIR .'templates/common/footer.tpl'); ?>
