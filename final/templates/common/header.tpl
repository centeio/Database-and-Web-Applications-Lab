<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <title>Charlie&Wonka</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{$BASE_URL}css/star-rating.min.css" rel="stylesheet">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/518af292f4.js"></script>
        <script src="{$BASE_URL}javascript/header.js"></script>

        <!-- REMOVER DAQUI -->
        <script src="{$BASE_URL}javascript/admin_clients.js"></script>

        <!-- Custom CSS -->
        <link href="{$BASE_URL}css/header.css" rel="stylesheet">
        <link href="{$BASE_URL}css/footer.css" rel="stylesheet">
        <link href="{$BASE_URL}{$style}" rel="stylesheet">
		
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top not-popup">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{$BASE_URL}pages/index.php"> &bull;Charlie&Wonka&bull;</a>
                    </div>
                    <div id="myNavbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-center">
                            <li class="active"><a href="{$BASE_URL}pages/products/products.php">Products</a></li>
                            <li><a href="{$BASE_URL}pages/common/about_page.php">About</a></li>
                            <li><a href="{$BASE_URL}pages/common/contacts.php">Contact</a></li>
                            <li class="navbar-text"><a href="#">Search</a></li>
                            {if !isset($smarty.session.user_id)}
                            <li class="navbar-text"><a href="{$BASE_URL}pages/common/register.php">Login/Register</a></li>
                            {elseif $smarty.session.is_admin}
                            <li class="navbar-text"><a href="{$BASE_URL}pages/admin/admin_page_chart.php">Admin Pages</a></li>
                            <li class="navbar-text"><a href="{$BASE_URL}actions/logout.php">Log out</a></li>
                            {else}
                            <li class="navbar-text"><a href="{$BASE_URL}pages/user/user_page.php">User Pages</a></li>
                            <li class="navbar-text"><a href="{$BASE_URL}actions/logout.php">Log out</a></li>
                            {/if}
			                 <li class="navbar-text"><a href="{$BASE_URL}pages/shopping_bag/checkout_basket.php">Shopping Bag</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li id="searchInput" class="navbar-icon"><input type="text" name="searchText"/></li>
                            <li class="navbar-icon"><a id="searchButton"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            {if isset($smarty.session.user_id)}
                            <li class="navbar-icon dropdown"> 
                                <i id="toggleDropdown" class="fa fa-user dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                <ul id="dropdown" class="dropdown-menu">
                                    {if $smarty.session.is_admin}
                                        <li class="navbar-icon"><a href="{$BASE_URL}pages/admin/admin_page_chart.php">Admin Page</a></li>
                                    {else}
                                        <li class="navbar-icon"><a href="{$BASE_URL}pages/user/user_page.php">Profile</a></li>
                                    {/if}
                                    <li class="navbar-icon"><a href="{$BASE_URL}actions/logout.php">Log out</a></li>
                                </ul>
                            </li>
                            {else}
                            <li class="navbar-icon"><a href="{$BASE_URL}pages/common/register.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                            {/if}
			    <li class="navbar-icon"><a href="{$BASE_URL}pages/shopping_bag/checkout_basket.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>