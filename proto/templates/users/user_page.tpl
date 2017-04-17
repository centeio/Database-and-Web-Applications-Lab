{include file='common/header.tpl'}

<div id="dashboard" class="container-fluid">

    {include file='users/user_menu.tpl'}

    <div id="EditProfile" class="container">
        <form class="form-horizontal" method="post" action="">

            <div class="panel panel-info">
                <div class="panel-heading">Edit your Profile</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                            <input name="username" placeholder="Username" class="form-control" type="text" value="{$user.username}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2 col-md-2 col-lg-offset-4 col-md-offset-4 inputGroupContainer">
                            <input name="first_name" placeholder="First Name" class="form-control" type="text" value="{$user.firstname}">
                        </div>
                        <div class="col-lg-2 col-md-2  inputGroupContainer">
                            <input name="last_name" placeholder="Last Name" class="form-control" type="text" value="{$user.lastname}">
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                            <input name="email" placeholder="E-Mail Address" class="form-control" type="email" value="{$user.email}">
                        </div>
                    </div>


                    <!-- Text input-->

                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                            <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" value="{$user.phonenumber}">
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                            <input name="address" placeholder="Address" class="form-control" type="text" value="{$user.address.address}">
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                            <input name="zip" placeholder="Zip Code" class="form-control" type="text" value="{$user.address.zipnumber}">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 inputGroupContainer">
                            <input name="oldPass" placeholder="Old Password" class="form-control" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">Change Your Password</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
                            <input name="oldPass" placeholder="Old Password" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
                            <input name="NewPass" placeholder="New Password" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
                            <input name="ConfNewPass" placeholder="Confirm New Password" class="form-control" type="text">
                        </div>
                    </div>


                </div>
            </div>

                    <div class="panel panel-info">
                        <div class="panel-heading">Payment Details</div>
                        <div class="panel-body">
                            <label class="col-lg-2 col-md-2 col-md-offset-2">Credit Card Number</label>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" class="form-control" name="car_number" value="" /></div>
                            </div>
                            <label class="col-lg-2 col-md-2 col-md-offset-2">Card Type</label>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 ">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div>

                            <label class="col-lg-2 col-md-2 col-md-offset-2">Card CCV</label>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" class="form-control" name="car_code" value="" /></div>
                            </div>
                            <label class="col-lg-2 col-md-2 col-md-offset-2">Expiration Date</label>
                            <div class="form-group">
                                <div class="col-lg-2 col-md-2 ">
                                    <select class="form-control" name="">
                                        <option value="">Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <select class="form-control" name="">
                                        <option value="">Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn-group" role="group">Update Changes</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- /.container -->

</div>
</div id="page-wrapper">
    
{include file='common/footer.tpl'}