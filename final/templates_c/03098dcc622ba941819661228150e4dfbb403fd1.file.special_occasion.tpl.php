<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 18:38:24
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/products/special_occasion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16736129945900df745b9f79-33814275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03098dcc622ba941819661228150e4dfbb403fd1' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/products/special_occasion.tpl',
      1 => 1495993101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16736129945900df745b9f79-33814275',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5900df74849e42_95490266',
  'variables' => 
  array (
    'highlights' => 0,
    'i' => 0,
    'special_occasion' => 0,
    'linkPrevious' => 0,
    'linkNext' => 0,
    'products' => 0,
    'BASE_URL' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5900df74849e42_95490266')) {function content_5900df74849e42_95490266($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/opt/lbaw/lbaw1611/public_html/final/lib/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Page Content -->
<div id="ProductsContent" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['highlights']->value)-1)+1 - (1) : 1-((count($_smarty_tpl->tpl_vars['highlights']->value)-1))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?> 
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"></li>
                            <?php }} ?>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[0]['link'];?>
"><img class="slide-image" src="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[0]['image_path'];?>
" alt=""></a>
                                <div class="carousel-caption">
                                    <h1><?php echo $_smarty_tpl->tpl_vars['special_occasion']->value['name'];?>
<br><small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['special_occasion']->value['beginningdate']);?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['special_occasion']->value['enddate']);?>
</small></h1>
                                </div>
                            </div>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['highlights']->value)-1)+1 - (1) : 1-((count($_smarty_tpl->tpl_vars['highlights']->value)-1))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?> 
                            <div class="item">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[$_smarty_tpl->tpl_vars['i']->value]['link'];?>
"><img class="slide-image" src="<?php echo $_smarty_tpl->tpl_vars['highlights']->value[$_smarty_tpl->tpl_vars['i']->value]['image_path'];?>
" alt=""></a>
                                <div class="carousel-caption">
                                    <h1><?php echo $_smarty_tpl->tpl_vars['special_occasion']->value['name'];?>
<br><small><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['special_occasion']->value['beginningdate']);?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['special_occasion']->value['enddate']);?>
</small></h1>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6" id="linkPrevious"><a href="<?php echo $_smarty_tpl->tpl_vars['linkPrevious']->value;?>
"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous occasion</a></div>
        <div class="col-xs-6" id="linkNext"><a href="<?php echo $_smarty_tpl->tpl_vars['linkNext']->value;?>
">Next occasion <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
    </div>
    <div class="row">
        <div class="col-md-12" id="Products">                     
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
            <div class="col-md-3 col-xs-6">
                <div class="thumbnail">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/thumbnails/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
">
                    </a>
                    <div class="caption">
                        <h4 class="col-xs-12"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/product.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></h4>
                        <h4 class="pull-right col-xs-12"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
€</h4>
                        <div class="ratings">
                            <p class="pull-right"><?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
 reviews</p>
                            <p>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['product']->value['rate']+1 - (1) : 1-($_smarty_tpl->tpl_vars['product']->value['rate'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                <?php }} ?>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5-$_smarty_tpl->tpl_vars['product']->value['rate']+1 - (1) : 1-(5-$_smarty_tpl->tpl_vars['product']->value['rate'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                <?php }} ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
</div>

<script>
    var categories = [];
    var prices = [];
    var ratings = [];
    
    $( "#categoryDropdown" ).click(function(event) {
      $("#categoryDropdown i").toggleClass("fa-caret-down fa-caret-up");
      $(".categoryOption").toggle();
    });
    $(".categoryOption input").change(function() {
        if(this.checked) {
            categories.push(this.value);
        }
        else{
            categories = categories.filter(e => e !== this.value);
        }
        
        filter();
    });
    $( "#priceDropdown" ).click(function(event) {
      $("#priceDropdown i").toggleClass("fa-caret-down fa-caret-up");
      $(".priceOption").toggle();
    });
    $(".priceOption input").change(function() {
        if(this.checked) {
            prices.push(this.value);
        }
        else{
            prices = prices.filter(e => e !== this.value);
        }
        
        filter();
    });
    $( "#ratingDropdown" ).click(function(event) {
      $("#ratingDropdown i").toggleClass("fa-caret-down fa-caret-up");
      $(".ratingOption").toggle();
    });
    $(".ratingOption input").change(function() {
        if(this.checked) {
            ratings.push(this.value);
        }
        else{
            ratings = ratings.filter(e => e !== this.value);
        }
        
        filter();
    });
    
    function filter() {
        
        console.log('categories:' + categories + '\n' +
                    'prices: ' + prices + '\n' +
                    'ratings: ' + ratings);
    }
</script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
