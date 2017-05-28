{include file='common/header.tpl'}

    <div id="AdminDashboard" class="container-fluid">
        {include file='admin/admin_menu.tpl'}
        <div id="page-wrapper">

            <div id="Orders" class="container-fluid">

                <!-- /.row -->
                {foreach $orders as $order}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div id = "panel_heading_order_{$order.id}" class="panel-heading">
                                {if $order.state neq 'canceled'}
                                <div class="col-lg-10">Order #{$order.id}</div>
                                <div class="text-right"> 
                                    <button type="button" class="btn remove" onclick="cancelOrder({$order.id});">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                {else}
                                    Order #{$order.id}
                                {/if}
                            </div>
                            

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <p>
                                            <em>Date: {$order.date}</em>
                                        </p>
                                        <p>
                                            <em>Name: {$order.client.firstname} {$order.client.lastname}</em>
                                        </p>
                                        <p>
                                            <em>Status: <span id="state_order_{$order.id}" class={$order.state}><strong id="state_order_strong_{$order.id}">{$order.state}</strong></span></em>
                                        </p>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                        <address>
                                            <strong>{$order.client.firstname} {$order.client.lastname}</strong>
                                            <br> {$order.address.address}
                                            <br> {$order.address.city}, {$order.address.zipnumber}
                                            <br>
                                            <abbr title="Phone">P:</abbr> {$order.client.phonenumber}
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
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach $order.products as $product}
                                                <tr>
                                                    <td class="col-sm-8 col-md-6 col-xs-12 col-lg-6">{$product.name}</td>
                                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                                        <input type="number" class="form-control" id="exampleInputEmail1" value="{$product.quantity}">
                                                    </td>
                                                    <td class="col-sm-1 col-md-1 text-center"><strong>{$product.price}</strong></td>
                                                    <td class="col-sm-1 col-md-1 text-center"><strong>{$product.quantity*$product.price}</strong></td>
                                                    <td class="col-sm-1 col-md-1">
                                                        <button type="button" class="btn remove">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {/foreach}

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
{include file='common/footer.tpl'}
<script src="{$BASE_URL}javascript/admin_orders.js"></script>