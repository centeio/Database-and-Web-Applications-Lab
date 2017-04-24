{include file='common/header.tpl'}
   
<div id="dashboard" class="container-fluid">

    {include file='users/user_menu.tpl'}

    <div id="Favorites" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Price</th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $products as $product}
                            <tr>
                                <td class="col-sm-8 col-md-6 col-xs-12 col-lg-6">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{$BASE_URL}images/thumbnails/{$product.image}"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">{$product.name}</a></h4>
                                            {if $product.stock > 0}
                                                <span>Status: <span class="text-success"><strong>In Stock</strong></span></span>
                                            {else}
                                                <span>Status: <span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span></span>
                                            {/if}
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>{$product.price}€</strong></td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    <button type="button" class="btn remove" onclick="addProductToShoppingBag({$smarty.session.user_id}, {$product.id})">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="btn remove" onclick="removeFavorite({$smarty.session.user_id}, {$product.id})">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </td>

                            </tr>
                            {/foreach}
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.container -->

        </div>
    </div>
</div id="page-wrapper">

<script src="{$BASE_URL}javascript/user_favorites_buttons.js"></script>
{include file='common/footer.tpl'}