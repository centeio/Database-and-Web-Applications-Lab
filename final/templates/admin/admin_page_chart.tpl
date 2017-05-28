{include file='common/header.tpl'}
    <div id="AdminDashboard" class="container-fluid">
        {include file='admin/admin_menu.tpl'}
        <div id="page-wrapper">

            <div id= "charts" class="container-fluid">


                <!-- Morris Charts -->

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><i class="fa fa-bar-chart-o"></i> Website Visits</div>

                            <div id="morris-area-chart"></div>
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

<!-- Morris Charts JavaScript -->
<script src="{$BASE_URL}javascript/plugins/morris/raphael.min.js"></script>
<script src="{$BASE_URL}javascript/plugins/morris/morris.min.js"></script>
<script src="{$BASE_URL}javascript/plugins/morris/morris-data.js"></script>

{include file='common/footer.tpl'}