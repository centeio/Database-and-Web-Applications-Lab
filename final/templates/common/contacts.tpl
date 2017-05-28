{include file='common/header.tpl'}

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
                            <strong>Your email:</strong> <small>*</small>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <strong>Subject:</strong> <small>*</small>
                            <input type="subject" class="form-control" id="subject">
                        </div>
                        <div class="form-group">
                            <strong>Message:</strong> <small>*</small>
                            <textarea class="form-control" rows="5" cols="3" id="message"></textarea>
                        </div>
                        <button type="button" id="sendEmail" href="#" class="pull-right"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
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

<script src="{$BASE_URL}javascript/contact.js"></script>
{include file='common/footer.tpl'}
