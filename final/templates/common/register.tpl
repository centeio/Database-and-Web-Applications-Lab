{include file='common/header.tpl'}

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
                                <form id="login-form" onsubmit="return validateLogin()" action="{$BASE_URL}actions/login.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="login-username" tabindex="1" class="form-control" placeholder="Username" value="{$username}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="Password" value="{$password}">
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
                                <form id="register-form" onsubmit="return validateRegister()" action="{$BASE_URL}actions/register.php" method="post" role="form" style="display: none;">
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
    {include file='common/footer.tpl'}
</div>
<script src="{$BASE_URL}javascript/plugins/js.cookie.js"></script>
<script src="{$BASE_URL}javascript/validation.js"></script>
<script src="{$BASE_URL}javascript/register.js"></script>