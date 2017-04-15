<?php 
	include_once('../../config/init.php');

	$smarty->assign('style','css/SpecialOccasion.css');
	$smarty->display($BASE_DIR .'templates/common/header.tpl'); ?>

            <!-- Page Content -->
            <div id="specialOccasion-body" class="container-fluid">
               <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row carousel-holder">
                            <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-md-12">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href="#"><img class="slide-image" src="<?=$BASE_URL?>images/valentineSpecial.jpg" alt=""></a>
                                            <div class="carousel-caption">
                                                <span> Valentine's Day </span>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <a href="#"><img class="slide-image" src="<?=$BASE_URL?>images/chocolateBundle.jpg" alt=""></a>
                                            <div class="carousel-caption">
                                                <span> Chocolate Bundle </span>
                                            </div>
                                        </div>
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
            </div>

<?php $smarty->display($BASE_DIR .'templates/common/footer.tpl'); ?>
