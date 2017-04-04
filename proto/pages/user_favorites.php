<?php 
	include_once('../config/init.php');

	$smarty->assign('style','css/UserFavorites.css');
	$smarty->display('../templates/common/header.tpl'); ?>

        <div id="dashboard" class="container-fluid">

            <?php $smarty->display('../templates/users/user_menu.tpl'); ?>

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
                                <tr>
                                    <td class="col-sm-8 col-md-6 col-xs-12 col-lg-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/FirstProduct.jpeg"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#">Mackie Bars</a></h4>
                                                <span>Status: <span class="text-success"><strong>In Stock</strong></span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>$24.99</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/SecondProduct.jpg"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#">Hot Chocolate</a></h4>
                                                <span>Status: <span class="text-success"><strong>In Stock</strong></span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>$64.99</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/ThirdProduct.jpg"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#">Doisy&Dam</a></h4>
                                                <span>Status: <span class="text-success"><strong>In Stock</strong></span></span>
                                            </div>
                                        </div>
                                    </td>
                                          <td class="col-sm-1 col-md-1 text-center"><strong>$74.99</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/FifthProduct.jpg"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#">Strawberry Bundle II</a></h4>
                                                <span>Status: <span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span></span>
                                            </div>
                                        </div>
                                    </td>
                                       <td class="col-sm-1 col-md-1 text-center"><strong>$94.99</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.container -->

            </div>
        </div>
    </div id="page-wrapper">
<?php $smarty->display('../templates/common/footer.tpl'); ?>