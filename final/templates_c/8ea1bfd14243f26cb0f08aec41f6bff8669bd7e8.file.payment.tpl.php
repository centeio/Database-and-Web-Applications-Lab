<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 20:28:03
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/shopping_bag/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137170642658ffd56d0e1dd2-21166640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ea1bfd14243f26cb0f08aec41f6bff8669bd7e8' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/shopping_bag/payment.tpl',
      1 => 1495999678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137170642658ffd56d0e1dd2-21166640',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58ffd56d2b8af3_89110238',
  'variables' => 
  array (
    'products' => 0,
    'BASE_URL' => 0,
    'product' => 0,
    'subTotal' => 0,
    'shipping' => 0,
    'total' => 0,
    'addresses' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ffd56d2b8af3_89110238')) {function content_58ffd56d2b8af3_89110238($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
        <form id="payment" class="form-horizontal" method="post" action="receipt.php" onsubmit="return validateForm()">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                <!--REVIEW ORDER-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Review Order
                    </div>
                    <div class="panel-body">
                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-3">
                                <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/thumbnails/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-xs-12"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</div>
                                <div class="col-xs-12"><small>Quantity:<span> <?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>
</span></small></div>
                            </div>
                            <div class="col-sm-3 col-xs-3 text-right">
                                <span><?php echo $_smarty_tpl->tpl_vars['product']->value['total'];?>
€</span>
                            </div>
                        </div>
                        <div class="form-group"><hr /></div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Subtotal</strong>
                                <div class="pull-right"><span><?php echo $_smarty_tpl->tpl_vars['subTotal']->value;?>
€</span></div>
                            </div>
                            <div class="col-xs-12">
                                <small>Shipping</small>
                                <div class="pull-right"><span><?php echo $_smarty_tpl->tpl_vars['shipping']->value;?>
€</span></div>
                            </div>
                        </div>
                        <div class="form-group"><hr /></div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Order Total</strong>
                                <div class="pull-right"><span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
€</span></div>
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
                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="predifined" id="predifinedBillingAddress">
                                    <option value="-1">New Address</option>
                                </select>
                            </div>
                        </div>
                        <!--BILLING FORM-->
                        <div id="billing">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Billing Address</h4>
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
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="country" value="" />
                                </div>
                            </div>
                        </div>
                        <!--BILLING FORM END-->
                        <input type="checkbox" id="addressesAreTheSame">  My Shipping address is the same as my billing address.</input>
                        
                        <!--SHIPPING FORM-->
                        <div id="shipping">
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select class="predifined" id="predifinedShippingAddress">
                                        <option value="-1">New Address</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
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
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="country" value="" />
                                </div>
                            </div>
                        </div>
                    <!--SHIPPING FORM END-->
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" value="Submit">Confirm</button>
            </div>
        </form>
    </div> 
</div>


<script>
    var addresses = <?php echo json_encode($_smarty_tpl->tpl_vars['addresses']->value);?>
;


    $.each(addresses, function (i, address) {
        $('.predifined').append($('<option>', { 
            value: i,
            text : address.address 
        }));
    });

    $('#predifinedBillingAddress').change(function(e) {
        
        if(this.value != -1){
            var address = addresses[this.value];
            
            $('#billing input[name=address]').val(address.address);
            $('#billing input[name=city]').val(address.city);
            $('#billing input[name=zip_code]').val(address.zipnumber);
            $('#billing input[name=country]').val(address.country);
        }
        else{
            $('#billing input[name=address]').val("");
            $('#billing input[name=city]').val("");
            $('#billing input[name=zip_code]').val("");
            $('#billing input[name=country]').val("");
        }
    });
    
    $('#predifinedShippingAddress').change(function(e) {
        
        if(this.value != -1){
            var address = addresses[this.value];
            
            $('#shipping input[name=address]').val(address.address);
            $('#shipping input[name=city]').val(address.city);
            $('#shipping input[name=zip_code]').val(address.zipnumber);
            $('#shipping input[name=country]').val(address.country);
        }
        else{
            $('#shipping input[name=address]').val("");
            $('#shipping input[name=city]').val("");
            $('#shipping input[name=zip_code]').val("");
            $('#shipping input[name=country]').val("");
        }
    });
    
    $('#addressesAreTheSame').click(function() {
        $('#shipping').toggle();
    });
    
    function validateForm() {
        if($('#addressesAreTheSame').is(':checked')){
            $('#shipping input[name=address]').val( $('#billing input[name=address]').val());
            $('#shipping input[name=city]').val($('#billing input[name=city]').val());
            $('#shipping input[name=zip_code]').val($('#billing input[name=zip_code]').val());
            $('#shipping input[name=country]').val($('#billing input[name=country]').val());
        }
    };
</script>


<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
