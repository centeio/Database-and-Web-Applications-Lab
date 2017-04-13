<?php 
	include_once('../../config/init.php');
	
	$smarty->assign('style','css/AdminPage.css');
	$smarty->display($BASE_DIR .'templates/common/header.tpl'); ?>

        <div id="AdminDashboard" class="container-fluid">
            <?php $smarty->display($BASE_DIR .'templates/users/admin_menu.tpl'); ?>
            <div id="page-wrapper">

                <div id="Orders" class="container-fluid">


                    <!-- Morris Charts -->

                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="col-lg-10">Order #345</div>
                                    <div class="text-right"> 
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    </div>
                                

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <p>
                                                <em>Date: 6th Feb, 2017</em>
                                            </p>
                                            <p>
                                                <em>Name: Cláudio Costa Pinto</em>
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
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-sm-8 col-md-6 col-xs-12 col-lg-6">Mackie Bars</td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="email" class="form-control" id="exampleInputEmail1" value="1">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>$24.99</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>$24.99</strong></td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">Hot Chocolate</td>
                                        <td class="col-md-1" style="text-align: center">
                                        <input type="email" class="form-control" id="exampleInputEmail1" value="1">
                                        </td>
                                        <td class="col-md-1 text-center"><strong>$64.99</strong></td>
                                        <td class="col-md-1 text-center"><strong>$64.99</strong></td>
                                        <td class="col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">Doisy&Dam</td>
                                        <td class="col-md-1" style="text-align: center">
                                        <input type="email" class="form-control" id="exampleInputEmail1" value="1">
                                        </td>
                                        <td class="col-md-1 text-center"><strong>$74.99</strong></td>
                                        <td class="col-md-1 text-center"><strong>$74.99</strong></td>
                                        <td class="col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">Strawberry Bundle II</td>
                                        <td class="col-md-1" style="text-align: center">
                                        <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                                        </td>
                                        <td class="col-md-1 text-center"><strong>$94.99</strong></td>
                                        <td class="col-md-1 text-center"><strong>$189.98</strong></td>
                                        <td class="col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
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

                    <!-- /.row -->


                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

    </div>

<?php $smarty->display($BASE_DIR .'templates/common/footer.tpl'); ?>