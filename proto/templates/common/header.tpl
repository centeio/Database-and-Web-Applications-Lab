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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/518af292f4.js"></script>

        <!-- Custom CSS -->
        <link href="{$BASE_URL}css/header.css" rel="stylesheet">
        <link href="{$BASE_URL}{$style}" rel="stylesheet">

    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top">
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
                            <li><a href="{$BASE_URL}pages/products/special_occasion.php">Special Occasions</a></li>
                            <li><a href="{$BASE_URL}pages/common/about_page.php">About</a></li>
                            <li><a href="{$BASE_URL}pages/common/contacts.php">Contact</a></li>
                            <li class="navbar-text"><a href="#">Search</a></li>
                            <li class="navbar-text"><a href="{$BASE_URL}pages/common/register.php">Login/Register</a></li>
			    <li class="navbar-text"><a href="{$BASE_URL}pages/shopping_bag/checkout_basket.php">Shopping Bag</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="navbar-icon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            <li class="navbar-icon"><a href="{$BASE_URL}pages/common/register.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
			    <li class="navbar-icon"><a href="{$BASE_URL}pages/shopping_bag/checkout_basket.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
