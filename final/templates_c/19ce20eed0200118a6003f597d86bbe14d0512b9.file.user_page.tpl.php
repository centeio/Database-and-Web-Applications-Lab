<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 23:14:58
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/users/user_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150180728158ff567174d386-85268219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19ce20eed0200118a6003f597d86bbe14d0512b9' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/users/user_page.tpl',
      1 => 1496000866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150180728158ff567174d386-85268219',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58ff56718ef444_59250978',
  'variables' => 
  array (
    'user' => 0,
    'address' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ff56718ef444_59250978')) {function content_58ff56718ef444_59250978($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="spinner"></div>

<div id="addAddressPopUp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Address</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="NewStreetName">Street name:</label>
                        <input type="text" class="form-control" id="NewStreetName" placeholder="Street name">
                    </div>
                    <div class="form-group">
                        <label for="NewZipCode">Zip-Code:</label>
                        <input type="text" class="form-control" id="NewZipCode" placeholder="Zip-Code">
                    </div>
                    <div class="form-group">
                        <label for="NewCity">City name:</label>
                        <input type="text" class="form-control" id="NewCity" placeholder="City name">
                    </div>
                    <div class="form-group add-address-buttons">
                        <hr/>
                        <span id="addAddressResponse"></span>
                        <button id="SubmitNewAddress" type="button" class="btn btn-default">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <span class="clear-fix"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="dashboard" class="container-fluid not-popup">

    <?php echo $_smarty_tpl->getSubTemplate ('users/user_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div id="EditProfile" class="container">
        <div class="row">
            <form class="form-horizontal col-lg-12 col-md-12 col-sm-12 col-xs-12" onsubmit="return checkPersonalDetails()" role="form" method="post" action="../../actions/edit_user.php">
                <div class="panel panel-info">
                    <div class="panel-heading">Edit your Profile</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="username" name="username" placeholder="Username" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">
                                <span id="usernameError"></span>
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="email" name="email" placeholder="E-Mail Address" class="form-control" type="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
">
                                <span id="emailError"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-2 col-md-2 col-lg-offset-4 col-md-offset-4 inputGroupContainer">
                                <input id="firstName" name="first_name" placeholder="First Name" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['firstname'];?>
">
                            </div>
                            <div class="col-lg-2 col-md-2  inputGroupContainer">
                                <input id="lastName" name="last_name" placeholder="Last Name" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['lastname'];?>
">
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="phone" name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['phonenumber'];?>
">
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="taxpayernumber" name="taxpayernumber" placeholder="Tax Payer Number" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['taxpayernumber'];?>
">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="userProfilePassword" name="password" placeholder="Password" class="form-control" type="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div id="ChangeDetails" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-10">
                                <input id="changeDetails" type="submit" class="btn btn-default pull-right" value="Change Account Details">
                                <span class="underline"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="Addresses" class="row">                    
            <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['address']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"> Address 
                            <i id="<?php echo $_smarty_tpl->tpl_vars['address']->value['idaddress'];?>
" class="fa fa-times pull-right" aria-hidden="true"></i>
                        </div>
                        <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <span class="address-label"> Street: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <span class="address-content"> <?php echo $_smarty_tpl->tpl_vars['address']->value['address'];?>
 </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <span class="address-label"> Zip-Code: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <span class="address-content"> <?php echo $_smarty_tpl->tpl_vars['address']->value['zipnumber'];?>
 </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <span class="address-label"> City: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <span class="address-content"> <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>
 </span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div id="addAddress" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-info add-address">
                    <i class="fa fa-plus md-trigger" data-modal="modal-11" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <form class="form-horizontal col-lg-12 col-md-12 col-sm-12 col-xs-12" role="form" onsubmit="return checkChangePassword()" method="post" action="../../actions/edit_password.php">
                <div class="panel panel-info">
                    <div class="panel-heading">Change Your Password</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
                                <input id="changeOldPassword" name="oldPass" placeholder="Old Password" class="form-control" type="password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
                                <input id="changeNewPassword" name="NewPass" placeholder="New Password" class="form-control" type="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
                                <input id="changeNewRepeatPassword" name="ConfNewPass" placeholder="Confirm New Password" class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-10">
                                <input type="submit" class="btn btn-default pull-right" value="Change Password">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container -->
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/validation.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/user_page.js"></script><?php }} ?>
