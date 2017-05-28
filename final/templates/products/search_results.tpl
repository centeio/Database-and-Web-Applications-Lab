{include file='common/header.tpl'}

<!-- Page Content -->
<div id="ProductsContent" class="container not-popup" style="margin-top:15px">
    <div class="row">
        <div class="col-md-12" id="Products">                     
            {foreach $products as $product}
            <div class="col-md-3 col-xs-6">
                <a href="{$BASE_URL}pages/products/product.php?id={$product.id}">
                    <div class="thumbnail">
                        <img src="{$BASE_URL}images/thumbnails/{$product.image}" alt="{$product.image}">
                        {if $USERID == 2}
                        <button onclick="deleteProduct(this, {$product.id})"><i class="fa fa-times pull-right" aria-hidden="true"></i></button>
                        {/if}
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
                <div class="panel panel-info add-product">
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
                            <label>Categories:</label>
                            <br>
                            {foreach $categories as $category}
                                <input type="checkbox" value="{$category.id}"> {$category.name}
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
    $('.rating-loading').rating({displayOnly: true, size:'xs', filledStar:'<i class="fa fa-star" aria-hidden="true"></i>', emptyStar:'<i class="fa fa-star-o" aria-hidden="true"></i>'});
</script>
{/literal}

{include file='common/footer.tpl'}