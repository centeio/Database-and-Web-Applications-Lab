{include file='common/header.tpl'}

<!-- Page Content -->
<div id="ProductsContent" class="container not-popup">
    <div class="row">
        <div class="col-md-12">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            {for $i=1 to ($highlights|@count - 1)} 
                            <li data-target="#carousel-example-generic" data-slide-to="{$i}"></li>
                            {/for}
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="{$highlights[0].link}"><img class="slide-image" src="{$highlights[0].image_path}" alt=""></a>
                            </div>
                            {for $i=1 to ($highlights|@count - 1)} 
                            <div class="item">
                                <a href="{$highlights[$i].link}"><img class="slide-image" src="{$highlights[$i].image_path}" alt=""></a>
                            </div>
                            {/for}
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
        <div class="col-md-2 list-group">
            <div class="list-group-item" id="categoryDropdown">
                Categories <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            {foreach $categories as $category}
            <div  class="categoryOption list-group-item">
                <input type="checkbox" value="{$category.id}"> {$category.name}
            </div>
            {/foreach}
            <div class="list-group-item" id="priceDropdown">
                Price <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            <div  class="priceOption list-group-item">
                <div id="slider-range"></div>
                <div id="minPrice">0€</div><div id="maxPrice">50€</div>
            </div>
            <div class="list-group-item" id="ratingDropdown">
                Rating <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            <div  class="ratingOption list-group-item">
                <input type="checkbox" value="1" aria-label="1 star">
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="ratingOption list-group-item">
                <input type="checkbox" value="2" aria-label="2 stars">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="ratingOption list-group-item">
                <input type="checkbox" value="3" aria-label="3 stars">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="ratingOption list-group-item">
                <input type="checkbox" value="4" aria-label="4 stars">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="ratingOption list-group-item">
                <input type="checkbox" value="5" aria-label="5 stars">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
        </div>
        <div class="col-md-10" id="Products">                     
            {foreach $products as $product}
            <div class="col-md-3 col-xs-6">
                {if $USERID == 2}
                <button onclick="deleteProduct(this, {$product.id})" aria-label="delete product"><i class="fa fa-times pull-right" aria-hidden="true"></i></button>
                {/if}
                <a href="{$BASE_URL}pages/products/product.php?id={$product.id}">
                    <div class="thumbnail">
                        <img src="{$BASE_URL}images/thumbnails/{$product.image}" alt="{$product.name}">
                        <div class="caption">
                            <h4 class="col-xs-12">{$product.name}</h4>
                            <h4 class="pull-right col-xs-12">{$product.price}€</h4>
                            <div class="ratings">
                                <p class="pull-right">{$product.count} reviews</p>
                                <input name="rate" value="{$product.rate}" class="rating-loading">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            {/foreach}
            {if $USERID == 2}
            <div id="addProduct" class="col-md-3 col-xs-6">
                <div class="panel panel-info add-product" aria-label="New Product">
                    <i class="fa fa-plus md-trigger" data-modal="modal-11" aria-hidden="true"></i>
                </div>
            </div>
            {/if}
        </div>
    </div>
</div>

<div id="addProductPopUp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Product</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="NewName">Name:</label>
                        <input type="text" class="form-control hide-hints" id="NewName" placeholder="Product name" required>
                    </div>
                    <div class="form-group">
                        <label for="NewPrice">Price:</label>
                        <input type="number" class="form-control hide-hints" id="NewPrice" placeholder="Price" required>
                    </div>
                    <div class="form-group">
                        <label for="NewStock">Stock:</label>
                        <input type="number" class="form-control hide-hints" id="NewStock" placeholder="Stock" required>
                    </div>
                    <div class="form-group">
                        <label for="NewDetails">Details:</label>
                        <textarea class="form-control" id="NewDetails" placeholder="Details"></textarea>
                    </div>
                    <div class="form-group">
                        <fieldset id="NewCategories">
                            <legend>Categories:</legend>
                            <br>
                            {foreach $categories as $category}
                                <label>
                                <input type="checkbox" value="{$category.id}"> 
                                {$category.name} 
                                </label>
                            {/foreach}
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <label for="NewImage">Image:</label>
                        <input type="file" class="form-control hide-hints" id="NewImage" name="NewImage" accept="image/*" onchange="readURL(this);" required>
                        <img id="preview" src="" alt="your image" />
                    </div>
                    
                    <div class="form-group popup-buttons">
                        <hr/>
                        <span id="popupResponse"></span>
                        <button id="SubmitNewProduct" type="button" class="btn btn-default">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <span class="clear-fix"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{$BASE_URL}/javascript/add_delete_products.js"></script>
<script src="{$BASE_URL}/javascript/filter_products.js"></script>
<script src="{$BASE_URL}javascript/plugins/star-rating/star-rating.js" type="text/javascript"></script>
{literal}
<script>
    $('.rating-loading').rating({displayOnly: true, size:'xs', showCaption:true});
</script>
{/literal}

{include file='common/footer.tpl'}