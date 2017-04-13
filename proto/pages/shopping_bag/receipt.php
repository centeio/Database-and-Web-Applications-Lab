<?php 
	include_once('../../config/init.php');

	$smarty->assign('style','css/Receipt.css');
	$smarty->display($BASE_DIR .'templates/common/header.tpl'); ?>

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
                                    <strong>Elf Cafe</strong>
                                    <br>
                                    2135 Sunset Blvd
                                    <br>
                                    Los Angeles, CA 90026
                                    <br>
                                    <abbr title="Phone">P:</abbr> (213) 484-6829
                                </address>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>
                                    <em>Date: 4th March, 2017</em>
                                </p>
                                <p>
                                    <em>Receipt #: 34522677W</em>
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
                                        <th>#</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-9"><em>Mackie Bars</em></td>
                                        <td class="col-md-1" style="text-align: center"> 1 </td>
                                        <td class="col-md-1 text-center">$24.99</td>
                                        <td class="col-md-1 text-center">$24.99</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><em>Hot Chocolate</em></td>
                                        <td class="col-md-1" style="text-align: center"> 1 </td>
                                        <td class="col-md-1 text-center">$64.99</td>
                                        <td class="col-md-1 text-center">$64.99</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><em>Doisy&Dam</em></td>
                                        <td class="col-md-1" style="text-align: center"> 1 </td>
                                        <td class="col-md-1 text-center">$74.99</td>
                                        <td class="col-md-1 text-center">$74.99</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><em>Strawberry Bundle II</em></td>
                                        <td class="col-md-1" style="text-align: center"> 2 </td>
                                        <td class="col-md-1 text-center">$94.99</td>
                                        <td class="col-md-1 text-center">$189.98</td>
                                    </tr>
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
                                            <strong>$354.95</strong>
                                        </p>
                                        <p>
                                            <strong>$6.94</strong>
                                        </p></td>
                                    </tr>
                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                        <td class="text-center text-danger"><h4><strong>$361.89</strong></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<?php $smarty->display($BASE_DIR .'templates/common/footer.tpl'); ?>