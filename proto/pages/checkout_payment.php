<?php 
	include_once('../config/init.php');

	$smarty->assign('style','css/CheckoutPayment.css');
	$smarty->display('../templates/common/header.tpl'); ?>

            <div id="CheckoutPayment" class="container wrapper">
                <div id="Steps" class="row form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                            <li class="checked"><a href="checkout_basket.php">
                                <h4 class="list-group-item-heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i></h4>
                                <p class="list-group-item-text">Shopping Cart</p>
                            </a></li>
                            <li class="active"><a href="checkout_payment.php">
                                <h4 class="list-group-item-heading"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></h4>
                                <p class="list-group-item-text">Payment</p>
                            </a></li>
                            <li class="disabled"><a href="receipt.php">
                                <h4 class="list-group-item-heading"><i class="fa fa-check" aria-hidden="true"></i></h4>
                                <p class="list-group-item-text">Thank you!</p>
                            </a></li>
                        </ul>
                    </div>
                </div> 

                <div class="row">
                    <form class="form-horizontal" method="post" action="">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                            <!--REVIEW ORDER-->
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Review Order
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="../images/FirstProduct.jpeg" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">Mackie Bars</div>
                                            <div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <span>$24.99</span>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="../images/SecondProduct.jpg" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">Hot Chocolate</div>
                                            <div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <span>$64.99</span>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="../images/ThirdProduct.jpg" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">Doisy&Dam</div>
                                            <div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <span>$74.99</span>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="../images/FifthProduct.jpg" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12">Strawberry Bundle II</div>
                                            <div class="col-xs-12"><small>Quantity:<span>2</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <span>$189.98</span>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <strong>Subtotal</strong>
                                            <div class="pull-right"><span>$354.95</span></div>
                                        </div>
                                        <div class="col-xs-12">
                                            <small>Shipping</small>
                                            <div class="pull-right"><span>$6.94</span></div>
                                        </div>
                                    </div>
                                    <div class="form-group"><hr /></div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <strong>Order Total</strong>
                                            <div class="pull-right"><span>$361.89</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--REVIEW ORDER END-->
                            <!--CREDIT CART PAYMENT-->
                            <div class="panel panel-info">
                                <div class="panel-heading"><span><i class="fa fa-lock" aria-hidden="true"></i></span>Secure Payment</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Card Type:</strong></div>
                                        <div class="col-md-12">
                                            <select id="CreditCardType" name="CreditCardType" class="form-control">
                                                <option value="5">Visa</option>
                                                <option value="6">MasterCard</option>
                                                <option value="7">American Express</option>
                                                <option value="8">Discover</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                        <div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Card CVV:</strong></div>
                                        <div class="col-md-12"><input type="text" class="form-control" name="car_code" value="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <strong>Expiration Date</strong>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                            <!--CREDIT CART PAYMENT END-->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">Address</div>
                                <div class="panel-body">
                                    <!--BILLING FORM-->
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Billing Address</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Country:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="country" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>First Name:</strong>
                                            <input type="text" name="first_name" class="form-control" value="" />
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Last Name:</strong>
                                            <input type="text" name="last_name" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Address:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="address" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>City:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="city" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>State:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="state" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="zip_code" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Phone Number:</strong></div>
                                        <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Email Address:</strong></div>
                                        <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="" /></div>
                                    </div>
                                    <!--BILLING FORM END-->
                                    <input type="checkbox">  My Shipping address is the same as my billing address.</input>
                                    <hr>
                                    <!--SHIPPING FORM-->
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Shipping Address</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Country:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="country" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>First Name:</strong>
                                            <input type="text" name="first_name" class="form-control" value="" />
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Last Name:</strong>
                                            <input type="text" name="last_name" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Address:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="address" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>City:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="city" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>State:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="state" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" name="zip_code" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Phone Number:</strong></div>
                                        <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Email Address:</strong></div>
                                        <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="" /></div>
                                    </div>
                                <!--SHIPPING FORM END-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?php $smarty->display('../templates/common/footer.tpl'); ?>