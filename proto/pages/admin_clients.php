<?php 
	include_once('../config/init.php');

	$smarty->assign('style','css/AdminClients.css');
	$smarty->display('../templates/common/header.tpl'); ?>

        <div id="AdminDashboard" class="container-fluid">
            <?php $smarty->display('../templates/users/admin_menu.tpl'); ?>
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
                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Ana Sofia Rodrigues
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">arodrigues@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Carolina Maria Silva
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">c.msilva@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Cláudio Costa Pinto
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">ccostap@yahoo.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Daniel Filipe Assis e Melo
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">df.assisemelo@msn.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Francisca Andrade Rocha
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">kikaandrade@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Manuel Luís Henriques
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">neluis@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       José Maria Pires
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">jmaria_pires@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Rita Almeida Santos
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">ritinhasantos@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Sara Filipa Carvalho Guedes
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">carvalhoguedes@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Rita Xavier Mendes
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">ritaxavimendes@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Susana Gomes Pinto
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">su_pinto15@gmail.com</td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn remove">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                                                <tr>
                                    <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                       Zélia Ribeiro Luís
                                    </td>
                                    <td class="col-sm-5 col-md-5 ">zezeluis@gmail.com</td>
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    </div>

<?php $smarty->display('../templates/common/footer.tpl'); ?>