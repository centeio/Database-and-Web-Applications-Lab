<?php /* Smarty version Smarty-3.1.15, created on 2017-03-27 18:45:33
         compiled from "/opt/lbaw/lbaw1611/public_html/frmk/templates/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84094818558d94f22af57b0-62034116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68bb2e12919790a0aa532d6b6dab754f34b211ca' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/frmk/templates/common/header.tpl',
      1 => 1490636684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84094818558d94f22af57b0-62034116',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58d94f22afba79_16296416',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d94f22afba79_16296416')) {function content_58d94f22afba79_16296416($_smarty_tpl) {?><!DOCTYPE html>
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
        <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/header.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/MainPage.css" rel="stylesheet">

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
                        <a class="navbar-brand" href="MainPage.html"> &bull;Charlie&Wonka&bull;</a>
                    </div>
                    <div id="myNavbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-center">
                            <li class="active"><a href="#">Products</a></li>
                            <li><a href="#">Special Occasions</a></li>
                            <li><a href="AboutPage.html">About</a></li>
                            <li><a href="#">Contact</a></li>
                            <li class="navbar-text"><a href="#">Search</a></li>
                            <li class="navbar-text"><a href="#">Login/Register</a></li>
                            <li class="navbar-text"><a href="#">Shopping Bag</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="navbar-icon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            <li class="navbar-icon"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                            <li class="navbar-icon"><a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
<?php }} ?>
