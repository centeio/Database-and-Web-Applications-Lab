{include file='common/header.tpl'}

<!-- Write Review Pop up -->
<div id="writeReview" class="container-fluid">
    <div id="writeReviewWrapper" class="container-fluid">
                <h2> Review </h2>
        <form class="col-xs-12 col-sm-12 col-md-12 col-lg-12" action="">
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
            <div>
                <input id="productID" type="hidden" value="{$product.id}"/> 
            </div>
                        <div>
                <input id="cancelReview" type="button" class="btn btn-danger" value="Cancel"></button>
                <input id="submitButton" type="button" class="btn btn-success pull-right" value="Submit"></button>
            </div>
                    </form>
    </div>
</div>
        <!-- Page Content -->
        <div id="ProductInformation" class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="bs-example">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                {for $i=1 to $images|@count}
                                <li data-target="#myCarousel" data-slide-to="{$i}"></li>
                                {/for}
                            </ol>   
                            <!-- Wrapper for carousel items-->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{$BASE_URL}images/products/{$images[0].name}" alt="First Slide">
                                </div>
                                {for $i=1 to $images|@count}
                                <div class="item">
                                    <img src="{$BASE_URL}images/products/{$images[$i].name}" alt="">
                                </div>
                                {/for}
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
                        <p class="pull-right">ID#{$product.id}</p>
                        <span id="product_id" data="{$product.id}"/>
                        <h4>{$product.name}
                        {if isset($heart)}
                            <a href="#" id="addfavorite"><span style="color: #7B2832"> 
                                <i id="heart" class="fa {$heart}"
                                aria-hidden="true">
                            </span></i></a>
                        {/if}
                        <h4>{$product.price}€</h4>
                        <div class="ratings">
                            <p>
                                {for $i=1 to $product.rate}
                                    <span class="glyphicon glyphicon-star"></span>
                                {/for}
                                {for $i=1 to $product.rate}
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                {/for}
                                ({$product.votes})
                            </p>
                        </div>
                        <p>Caixa sortido de 32 chocolates com morangos cobertos por diversos tipos de chocolates</p>   
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Details <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <p class="details">{$product.details}</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="details" class="col-md-11">               
                    {if isset($smarty.session.user_id)}
                        <p class="pull-right"><a id="writeReviewBtn" class="btn">Write a Review</a></p>
                    {/if}
        <h3 id="ReviewsTitle" > Reviews</h3><br>
                    {foreach $reviews as $review}
                        <hr>                                
                        <div class="row">
                            <div class="col-md-12">
                                <p class="pull-right">
                                    {for $i=1 to $review.rate}
                                    <span class="glyphicon glyphicon-star"></span>
                                    {/for}
                                    {for $i=1 to 5 - $review.rate}
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    {/for}
                                </p>
                                <p class="data">{$review.date|date_format}</p>
                                <div class="rev">
                                    <p>Subscried by: <br></p>
                                    <p class="username">{$review.firstname} {$review.lastname}</p>
                                    <p class="descr">{$review.comment}</p>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        
    <script src="{$BASE_URL}javascript/writeReview.js"></script>
    <script src="{$BASE_URL}javascript/add_favorite.js"></script>
    
{include file='common/footer.tpl'}