<?php 
	include_once('../../config/init.php');

	$smarty->assign('style','css/UserOrders.css');
	$smarty->display($BASE_DIR .'templates/common/header.tpl'); ?>

        <div id="dashboard" class="container-fluid">

            <?php $smarty->display($BASE_DIR .'templates/users/user_menu.tpl'); ?>
            <!--       <h1 id="thank-you" class="col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3"> Your Orders </h1> -->

            <div id="Orders" class="container-fluid">
                <div class="row">
                    <div class="panel panel-info">
                        <div class="panel-heading">Order #6485</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <p>
                                        <em>Date: 4th March, 2017</em>
                                    </p>

                                    <p>
                                        <em>Status: <span class="text-warning"><strong>Shipped</strong></em>
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
                                            <tr>
                                                <td class="col-sm-8 col-md-6 col-xs-12 col-lg-6">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/FirstProduct.jpeg"> </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Mackie Bars</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-1 col-md-1" style="text-align: center"><strong>1</strong></td>
                                                <td class="col-sm-1 col-md-1 text-center"><strong>$24.99</strong></td>
                                                <td class="col-sm-1 col-md-1 text-center"><strong>$24.99</strong></td>

                                            </tr>
                                            <tr>
                                                <td class="col-md-6">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/SecondProduct.jpg"> </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Hot Chocolate</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-md-1" style="text-align: center">
                                                    <strong>1</strong> </td>
                                                <td class="col-md-1 text-center"><strong>$64.99</strong></td>
                                                <td class="col-md-1 text-center"><strong>$64.99</strong></td>
                                            </tr>
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
                                                        <h5><strong>$89.98</strong></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-9 col-md-9"> </td>
                                                    <td>
                                                        <h5>Shipping</h5>
                                                    </td>
                                                    <td class="text-right">
                                                        <h5><strong>$6.00</strong></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-9 col-md-9"> </td>
                                                    <td>
                                                        <h3 id="Total">Total</h3>
                                                    </td>
                                                    <td class="text-right">
                                                        <h3><strong>$95.98</strong></h3>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-info">
                        <div class="panel-heading">Order #5846</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <p>
                                        <em>Date: 6th Feb, 2017</em>
                                    </p>

                                    <p>
                                        <em>Status: <span class="text-success"><strong>Delivered</strong></em>
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
                                            <tr>
                                                <td class="col-md-6">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/ThirdProduct.jpg"> </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Doisy&Dam</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-md-1" style="text-align: center"><strong>1</strong>
                                                </td>
                                                <td class="col-md-1 text-center"><strong>$74.99</strong></td>
                                                <td class="col-md-1 text-center"><strong>$74.99</strong></td>

                                            </tr>
                                            <tr>
                                                <td class="col-md-6">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/FifthProduct.jpg"> </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Strawberry Bundle II</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-md-1" style="text-align: center"><strong>2</strong></td>
                                                <td class="col-md-1 text-center"><strong>$94.99</strong></td>
                                                <td class="col-md-1 text-center"><strong>$189.98</strong></td>

                                            </tr>

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
                                                        <h5><strong>$264.97</strong></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-9 col-md-9"> </td>
                                                    <td>
                                                        <h5>Shipping</h5>
                                                    </td>
                                                    <td class="text-right">
                                                        <h5><strong>$6.00</strong></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-9 col-md-9"> </td>
                                                    <td>
                                                        <h3 id="Total">Total</h3>
                                                    </td>
                                                    <td class="text-right">
                                                        <h3><strong>$270.97</strong></h3>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    </div id="page-wrapper">
<?php $smarty->display($BASE_DIR .'templates/common/footer.tpl'); ?>