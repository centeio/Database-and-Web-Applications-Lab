<?php 
	include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');
    
    session_start();
    if(!isset($_SESSION['user_id']) || !$_SESSION['is_admin']){
        header('Location: '.$BASE_URL .'pages/common/register.php');
    }
    
    $clients = getClients();

	$smarty->assign('style','css/AdminClients.css');
	$smarty->display('common/header.tpl'); ?>

        <div id="AdminDashboard" class="container-fluid">
            <?php $smarty->display($BASE_DIR .'templates/users/admin_menu.tpl'); ?>
            <div id="Clients" class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?foreach($clients as $key => $client){?>
                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       <?=$client['firstname']." ".$client['lastname']?>
                                    </td>
                                    <td class="col-sm-5 col-md-5 "><?=$client['email']?></td>
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
                <!-- /.container -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    </div>

<?php $smarty->display('common/footer.tpl'); ?>