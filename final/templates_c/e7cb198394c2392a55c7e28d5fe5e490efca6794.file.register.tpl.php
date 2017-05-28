<?php /* Smarty version Smarty-3.1.15, created on 2017-05-25 17:15:38
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/common/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78535696558ff5667827f35-96874968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7cb198394c2392a55c7e28d5fe5e490efca6794' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/common/register.tpl',
      1 => 1495728933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78535696558ff5667827f35-96874968',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58ff56679c69c8_88041113',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'username' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ff56679c69c8_88041113')) {function content_58ff56679c69c8_88041113($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="spinner"></div>

<!-- /#wrapper -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <ul class="nav nav-tabs nav-justified">
                                <li><a href="#" class="active" id="login-form-link">Login</a></li>
                                <li><a href="#" id="register-form-link">Register</a></li>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" onsubmit="return validateLogin()" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/login.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="login-username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    <div class="form-group">

                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" onsubmit="return validateRegister()" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/register.php" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                        <span id="usernameError"> </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                        <span id="emailError"> </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="register-first-name col-lg-6 col-md-6">
                                                <input type="text" name="firstName" id="firstName" tabindex="1" class="form-control" placeholder="First name" value="">
                                            </div>
                                            <div class="register-last-name col-lg-6 col-md-6">
                                                <input type="text" name="lastName" id="lastName" tabindex="1" class="form-control" placeholder="Last name" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/plugins/js.cookie.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/validation.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/register.js"></script><?php }} ?>
