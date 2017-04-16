{include file='common/header.tpl'}

<div id="CheckoutBasket" class="container">
    <div id="Steps" class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="checkout_basket.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Shopping Cart</p>
                </a></li>
                <li class="checked"><a href="checkout_payment.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Payment</p>
                </a></li>
                <li class="disabled"><a href="">
                    <h4 class="list-group-item-heading"><i class="fa fa-check" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Thank you!</p>
                </a></li>
            </ul>
        </div>
    </div> 

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $products as $product}
                    <tr>
                        <td class="col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="{$BASE_URL}pages/products/product.php?id={$product.id}"> 
                                    <img class="media-object" src="{$BASE_URL}images/thumbnails/{$product.image}"> 
                                </a>
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
                        <td class="col-xs-1 col-sm-1 col-md-1" style="text-align: center">
                            <input type="number" class="form-control" id="quantity" value="{$product.quantity}">
                        </td>
                        <td class="col-sm-6 col-md-1 text-center"><strong>{$product.price}€</strong></td>
                        <td class="col-sm-6 col-md-1 text-center"><strong>{$product.total}€</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <button type="button" class="btn remove">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
            <table class="table total-price">
                <tbody>
                    <tr>
                        <td class="col-lg-9 col-md-9"> </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>{$subTotal}€</strong></h5></td>
                    </tr>
                    <tr>
                        <td class="col-lg-9 col-md-9"> </td>
                        <td><h5>Shipping</h5></td>
                        <td class="text-right"><h5><strong>{$shipping}€</strong></h5></td>
                    </tr>
                    <tr>
                        <td class="col-lg-9 col-md-9"> </td>
                        <td><h3 id="Total">Total</h3></td>
                        <td class="text-right"><h3><strong>{$total}€</strong></h3></td>
                    </tr>
                    <tr>
                        <td class="col-lg-9 col-md-9"> </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Payment <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}