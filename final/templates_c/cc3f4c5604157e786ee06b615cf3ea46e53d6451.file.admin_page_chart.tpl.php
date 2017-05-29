<?php /* Smarty version Smarty-3.1.15, created on 2017-05-15 10:46:14
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/admin/admin_page_chart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1863472786591978e656cdc6-17682195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc3f4c5604157e786ee06b615cf3ea46e53d6451' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/admin/admin_page_chart.tpl',
      1 => 1494841563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1863472786591978e656cdc6-17682195',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_591978e671ad80_16651010',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591978e671ad80_16651010')) {function content_591978e671ad80_16651010($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="AdminDashboard" class="container-fluid">
        <?php echo $_smarty_tpl->getSubTemplate ('admin/admin_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/plugins/morris/raphael.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/plugins/morris/morris.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/plugins/morris/morris-data.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
