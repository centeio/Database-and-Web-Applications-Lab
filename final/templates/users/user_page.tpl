{include file='common/header.tpl'}

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

    {include file='users/user_menu.tpl'}

    <div id="EditProfile" class="container">
        <div class="row">
            <form class="form-horizontal col-lg-12 col-md-12 col-sm-12 col-xs-12" onsubmit="return checkPersonalDetails()" role="form" method="post" action="../../actions/edit_user.php">
                <div class="panel panel-info">
                    <div class="panel-heading">Edit your Profile</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="username" name="username" placeholder="Username" class="form-control" type="text" value="{$user.username}">
                                <span id="usernameError"></span>
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="email" name="email" placeholder="E-Mail Address" class="form-control" type="email" value="{$user.email}">
                                <span id="emailError"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-2 col-md-2 col-lg-offset-4 col-md-offset-4 inputGroupContainer">
                                <input id="firstName" name="first_name" placeholder="First Name" class="form-control" type="text" value="{$user.firstname}">
                            </div>
                            <div class="col-lg-2 col-md-2  inputGroupContainer">
                                <input id="lastName" name="last_name" placeholder="Last Name" class="form-control" type="text" value="{$user.lastname}">
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="phone" name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="{$user.phonenumber}">
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                                <input id="taxpayernumber" name="taxpayernumber" placeholder="Tax Payer Number" class="form-control" type="text" value="{$user.taxpayernumber}">
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
            {foreach $user.address as $address}
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"> Address 
                            <i id="{$address.idaddress}" class="fa fa-times pull-right" aria-hidden="true"></i>
                        </div>
                        <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <span class="address-label"> Street: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <span class="address-content"> {$address.address} </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <span class="address-label"> Zip-Code: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <span class="address-content"> {$address.zipnumber} </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <span class="address-label"> City: </span>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <span class="address-content"> {$address.city} </span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            {/foreach}
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
{include file='common/footer.tpl'}
<script src="{$BASE_URL}javascript/validation.js"></script>
<script src="{$BASE_URL}javascript/user_page.js"></script>