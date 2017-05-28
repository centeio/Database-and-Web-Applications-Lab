{include file='common/header.tpl'}

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
                    <div class="rating form-group">
                        <input id="review-rating" name="rating" class="rating rating-loading">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="writeReviewComment" rows="5" placeholder="Write your review in here..."></textarea>
                    </div>
                    <div class="form-group">
                        <input id="productID" type="hidden" value="{$product.id}"/> 
                    </div>
                    <div>
                        <input id="submitButton" type="button" class="btn btn-default" value="Submit"/>
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
                        <input type="text" class="form-control" id="EditName" placeholder="Product name" value="{$product.name}">
                    </div>
                    <div class="form-group">
                        <label for="EditPrice">Price:</label>
                        <input type="number" class="form-control" id="EditPrice" placeholder="Price" value="{$product.price}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="EditStock">Stock:</label>
                        <input type="number" class="form-control" id="EditStock" placeholder="Stock" value="{$product.stock}">
                    </div>
                    <div class="form-group">
                        <label for="EditDetails">Details:</label>
                        <textarea class="form-control" id="EditDetails" placeholder="Details">{$product.details}</textarea>
                    </div>
                    <div class="form-group">
                        <fieldset id="NewCategories">
                            <label>Categories:</label>
                            <br>
                            {foreach $categories as $category}
                                {if in_array($category.name, $productCategories)}
                                    <input type="checkbox" value="{$category.id}" checked> {$category.name}
                                {else}
                                    <input type="checkbox" value="{$category.id}"> {$category.name}
                                {/if}
                            {/foreach}
                        </fieldset>
                    </div>
                    
                    <div class="form-group">
                        <div id="editImages" class="row">
                            {for $i=0 to $images|@count - 1}
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 already-added">
                                    <i id="image{$images[$i].id}" class="fa fa-times pull-right" aria-hidden="true"></i>
                                    <img src="{$BASE_URL}images/products/{$images[$i].name}" alt=""/>
                                </div>
                            {/for}
                            <div id="addNewImage" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="insideAddNewImage">
                                    <i class="fa fa-plus " aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group popup-buttons">
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
                                <li id="indicator{$images[0].id}" data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                {for $i=1 to $images|@count - 1}
                                <li id="indicator{$images[$i].id}" data-target="#myCarousel" data-slide-to="{$i}"></li>
                                {/for}
                            </ol>   
                            <!-- Wrapper for carousel items-->
                            <div class="carousel-inner">
                                <div id="slideshow{$images[0].id}" class="item active">
                                    <img src="{$BASE_URL}images/products/{$images[0].name}" alt="First Slide">
                                </div>
                                {for $i=1 to $images|@count - 1}
                                <div id="slideshow{$images[$i].id}" class="item">
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
                        <p class="pull-right">
                            {if $USERID == 2}
                                <span id="editProduct" style="color: #7B2832"> 
                                    <i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i>
                                </span>
                            {/if}
                            ID#{$product.id}
                        </p>
                        <span id="product_id" data="{$product.id}"/>
                        <h4>{$product.name}
                            {if isset($heart)}
                                <a href="#" id="addfavorite"><span style="color: #7B2832"> 
                                    <i id="heart" class="fa {$heart}"
                                    aria-hidden="true"></i>
                                </span></a>
                            {/if}
                            {if isset($smarty.session.user_id) && !$smarty.session.is_admin}
                                <button type="button" id="addproducttocart" class="btn" onclick="addProductToShoppingBag({$smarty.session.user_id}, {$product.id})">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </button>
                            {/if}
                        </h4>
                        <h4>{$product.price}€</h4>
                        <div class="ratings">
                            <p>
                                <input name="rate" value="{$product.rate}" class="rating-loading" id="averageRate"/>
                                ({$product.votes})
                            </p>
                        </div>
                        <p>{$product.details}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div id="reviewsContainer" class="details" class="col-md-11">               
                    {if isset($smarty.session.user_id) && !$smarty.session.is_admin}
                        <p class="pull-right"><a id="writeReviewBtn" class="btn">Write a Review</a></p>
                    {/if}
                        <h3 id="ReviewsTitle" > Reviews</h3><br>
                    {foreach $reviews as $review}
                        <div id="review{$review.id}">
                            <hr>                                
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="pull-right">
                                        {if $USERID == 1}
                                            <i id="{$review.id}" class="fa fa-times pull-right" aria-hidden="true"></i>
                                        {/if}
                                        <input name="rate" value="{$review.rate}" class="rating-loading">
                                    </p>
                                    <p class="data">{$review.date|date_format}</p>
                                    <div class="rev">
                                        <p>Subscried by: <br></p>
                                        <p class="username">{$review.firstname} {$review.lastname}</p>
                                        <p class="descr">{$review.comment}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
        
    <script src="{$BASE_URL}javascript/write_review.js"></script>
    <script src="{$BASE_URL}javascript/delete_review.js"></script>
    <script src="{$BASE_URL}javascript/add_favorite.js"></script>
    <script src="{$BASE_URL}javascript/edit_product.js"></script>
    <script src="{$BASE_URL}javascript/user_favorites_buttons.js"></script>
    <script src="{$BASE_URL}javascript/plugins/star-rating/star-rating.js" type="text/javascript"></script>
    {literal}
    <script>
        $('.rating-loading:not(#review-rating)').rating({displayOnly: true, size:'xs'});
        $('#review-rating').rating({size:'md', showClear:false, showCaption:false, step:1});
    </script>
    {/literal}
    
{include file='common/footer.tpl'}