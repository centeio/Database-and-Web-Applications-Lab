<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');
    include_once($BASE_DIR .'database/orders.php');
    
    session_start();
    if(!isset($_SESSION['user_id']) || !$_SESSION['is_admin']){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }
    
    $orders = getAllOrders();
	
	$smarty->assign('style','css/AdminPage.css');
	$smarty->display($BASE_DIR .'templates/common/header.tpl'); ?>

        <div id="AdminDashboard" class="container-fluid">
            <?php $smarty->display($BASE_DIR .'templates/users/admin_menu.tpl'); ?>
            <div id="page-wrapper">

                <div id="Orders" class="container-fluid">


                    <!-- Morris Charts -->

                    <!-- /.row -->
                    <?foreach ($orders as $key => $order) {
                        $client = getClient($order['idclient']);
                        $products = getProductsFromOrder($order['id']);?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="col-lg-10">Order #<?=$order['id']?></div>
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
                                                <?if($order['state'] == 'requested'){
                                                    $date = date_create($order['orderdate']);
                                                } else if($order['state'] == 'canceled'){
                                                    $date = date_create($order['canceleddate']);
                                                } else if($order['state'] == 'sent'){
                                                    $date = date_create($order['sentdate']);
                                                } else {
                                                    $date = date_create($order['arriveddate']);
                                                }?>
                                                <em>Date: <?=date_format($date, 'jS F Y')?></em>
                                                
                                            </p>
                                            <p>
                                                <em>Name: <?=$client['firstname']." ".$client['lastname']?></em>
                                            </p>
                                            <p>
                                                <em>Status: <span class="text-success"><strong><?=$order['state']?></strong></em>
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
                                <?foreach ($products as $key2 => $product) {?>
                                <tr>
                                    <td class="col-sm-8 col-md-6 col-xs-12 col-lg-6"><?=$product['name']?></td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="number" class="form-control" id="exampleInputEmail1" value="<?=$product['quantity']?>">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?=$product['price']?></strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?=$product['quantity']*$product['price']?></strong></td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?}?>
                            </tbody>
                        </table>
                    </div>
                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?}?>

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