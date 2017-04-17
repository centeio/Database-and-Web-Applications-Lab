{include file='common/header.tpl'}
   
<div id="dashboard" class="container-fluid">

    {include file='users/user_menu.tpl'}
    <!--<h1 id="thank-you" class="col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3"> Your Orders </h1> -->

    <div id="Orders" class="container-fluid">
        {foreach $orders as $order}
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">Order #{$order.id}</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <p>
                                {if $order.arriveddate}
                                    <em>{$order.arriveddate|date_format}</em>
                                {elseif $order.sentdate}
                                    <em>{$order.sentdate|date_format}</em>
                                {elseif $order.canceleddate}
                                    <em>{$order.canceleddate|date_format}</em>
                                {else}
                                    <em>{$order.orderdate|date_format}</em>
                                {/if}
                                
                            </p>

                            <p>
                                <em>Status: <span class="text-success"><strong>{$order.state}</strong></em>
                            </p>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <address>
                                <strong>Elf Cafe</strong>
                                <br> 2135 Sunset Blvd
                                <br> Los Angeles, CA 90026
                                <br>
                                <abbr title="Phone">P:</abbr> (213) 484-6829
                            </address>

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

                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $order.products as $product}
                                    <tr>
                                        <td class="col-md-6">
                                            <div class="media">
                                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{$BASE_URL}images/thumbnails/{$product.image}"> </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#">{$product.name}</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-md-1" style="text-align: center"><strong>1</strong>
                                        </td>
                                        <td class="col-md-1 text-center"><strong>{$product.price}€</strong></td>
                                        <td class="col-md-1 text-center"><strong>{$product.total}€</strong></td>

                                    </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                            <table class="table total-price">
                                <tbody>
                                    <tr>
                                        <tr>
                                            <td class="col-lg-9 col-md-9"> </td>
                                            <td>
                                                <h5>Subtotal</h5>
                                            </td>
                                            <td class="text-right">
                                                <h5><strong>{$order.subTotal}€</strong></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-9 col-md-9"> </td>
                                            <td>
                                                <h5>Shipping</h5>
                                            </td>
                                            <td class="text-right">
                                                <h5><strong>{$order.shipping}€</strong></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-9 col-md-9"> </td>
                                            <td>
                                                <h3 id="Total">Total</h3>
                                            </td>
                                            <td class="text-right">
                                                <h3><strong>{$order.total}</strong></h3>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {/foreach}
    </div>

</div>
<!-- /.container -->

</div>
</div id="page-wrapper">

{include file='common/footer.tpl'}