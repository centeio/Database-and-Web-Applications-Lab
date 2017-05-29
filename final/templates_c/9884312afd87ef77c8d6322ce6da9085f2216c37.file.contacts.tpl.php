<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 19:50:53
         compiled from "/opt/lbaw/lbaw1611/public_html/final/templates/common/contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37425704459064d88246759-43492293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9884312afd87ef77c8d6322ce6da9085f2216c37' => 
    array (
      0 => '/opt/lbaw/lbaw1611/public_html/final/templates/common/contacts.tpl',
      1 => 1495997449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37425704459064d88246759-43492293',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59064d883c8009_36982520',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59064d883c8009_36982520')) {function content_59064d883c8009_36982520($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Page Content -->
<div class="container">
    <div class="row">
        <div id="emailFormContainer" class="col-md-offset-1 col-md-5 col-lg-offset-1 col-lg-5 col-sm-12 col-xs-12">
            <div id="emailForm" class="panel panel-default">
                <div class="panel-heading">
                    Send us an email!
                </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="email"><strong>Your email:</strong> <small>*</small></label>
                            <input name="email" type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="subject"><strong>Subject:</strong> <small>*</small></label>
                            <input name="subject" type="subject" class="form-control" id="subject">
                        </div>
                        <div class="form-group">
                            <label for="message"><strong>Message:</strong> <small>*</small></label>
                            <textarea name="message" class="form-control" rows="5" cols="3" id="message"></textarea>
                            
                        </div>
                        <button type="button" id="sendEmail" href="#" class="pull-right" aria-label="send"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
</i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-offset-1 col-md-4 col-lg-offset-1 col-lg-4 col-sm-12 col-xs-12">
            <div class="contacts">
                <h2>Contact us</h2>
                <address>
                    <strong>CharlieWonka, Inc.</strong><br>
                    1355 Avenida da Boavista, 900<br>
                    PORTO, PT 94103<br>
                    <abbr title="Phone">P:</abbr> (+351) 251 698 777
                </address>

                <address>
                    <strong>Email</strong><br>
                    <a href="#">CharlieWonka@CharlieWonka.com</a>
                </address>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/contact.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
