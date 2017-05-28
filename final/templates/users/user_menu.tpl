            <div class="row">
                <div class="user_menu col-lg-2 col-sm-4 col-xs-12 col-lg-offset-3">
                    <a href="{$BASE_URL}pages/user/user_page.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <br/>
                                        <div>Edit Profile</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="user_menu col-lg-2 col-sm-4 col-xs-12">
                    <a href="{$BASE_URL}pages/user/user_orders.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gift fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{$num_orders}</div>
                                        <div>Orders</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="user_menu col-lg-2 col-sm-4 col-xs-12">
                    <a href="{$BASE_URL}pages/user/user_favorites.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-heart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{$num_favorites}</div>
                                        <div>Favorites</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
            <!-- /.row -->