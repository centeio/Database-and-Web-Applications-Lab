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
                        <input id="productID" type="hidden" value="{$product.id}"/> 
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
                                {for $i=1 to $images|@count - 1}
                                <li data-target="#myCarousel" data-slide-to="{$i}"></li>
                                {/for}
                            </ol>   
                            <!-- Wrapper for carousel items-->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{$BASE_URL}images/products/{$images[0].name}" alt="First Slide">
                                </div>
                                {for $i=1 to $images|@count - 1}
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
                                aria-hidden="true">
                            </span></i></a>
                        {/if}
                        {if !$smarty.session.is_admin}
                            <button type="button" id="addproducttocart" class="btn" onclick="addProductToShoppingBag({$smarty.session.user_id}, {$product.id})">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </button>
                        {/if}
                        <h4>{$product.price}€</h4>
                        <div class="ratings">
                            <p>
                                <input name="rate" value="{$product.rate}" class="rating-loading" id="averageRate">
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
                <div class="details" class="col-md-11">               
                    {if isset($smarty.session.user_id) && !$smarty.session.is_admin}
                        <p class="pull-right"><a id="writeReviewBtn" class="btn">Write a Review</a></p>
                    {/if}
                        <h3 id="ReviewsTitle" > Reviews</h3><br>
                    {foreach $reviews as $review}
                        <hr>                                
                        <div class="row">
                            <div class="col-md-12">
                                <p class="pull-right">
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
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
        
    <script src="{$BASE_URL}javascript/writeReview.js"></script>
    <script src="{$BASE_URL}javascript/add_favorite.js"></script>
    <script src="{$BASE_URL}javascript/edit_product.js"></script>
    <script src="{$BASE_URL}javascript/user_favorites_buttons.js"></script>
    <script src="{$BASE_URL}javascript/plugins/star-rating/star-rating.js" type="text/javascript"></script>
    {literal}
    <script>
        $('.rating-loading').rating({displayOnly: true, size:'xs', filledStar:'<i class="fa fa-star" aria-hidden="true"></i>', emptyStar:'<i class="fa fa-star-o" aria-hidden="true"></i>'});
        $('#averageRate').parent().parent().css('display', 'inline');
    </script>
    {/literal}
    
{include file='common/footer.tpl'}