{include file='common/header.tpl'}

<div id="CheckoutReceipt" class="container">
    <div id="Steps" class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="disabled"><a href="checkout_basket.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Shopping Cart</p>
                </a></li>
                <li class="disabled"><a href="checkout_payment.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Payment</p>
                </a></li>
                <li class="active"><a href="receipt.php">
                    <h4 class="list-group-item-heading"><i class="fa fa-check" aria-hidden="true"></i></h4>
                    <p class="list-group-item-text">Thank you!</p>
                </a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <h1 id="thank-you" class="col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3"> Thank you for your purchase </h1>
        <hr class="col-lg-12 col-md-12 col-sm-12 col-xs-12" />
        <div class="well col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        {$address}
                        <br>
                        {$zipcode} {$city}
                        <abbr title="Phone">P:</abbr> {$phone}
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: {$date|date_format: "%B %eth, %Y"}</em>
                    </p>
                    <p>
                        <em>Receipt #: {$id}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">#</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $products as $product}
                        <tr>
                            <td class="col-md-9"><em>{$product.name}</em></td>
                            <td class="col-md-1 text-center"> {$product.quantity} </td>
                            <td class="col-md-1 text-center">{$product.price}€</td>
                            <td class="col-md-1 text-center">{$product.total}€</td>
                        </tr>
                        {/foreach}
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Shipping: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>{$subTotal}€</strong>
                            </p>
                            <p>
                                <strong>{$shipping}€</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>{$total}€</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}