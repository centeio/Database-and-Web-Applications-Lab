{include file='common/header.tpl'}

    <div id="AdminDashboard" class="container-fluid">
        {include file='admin/admin_menu.tpl'}
        <div id="Clients" class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $clients as $client}
                            {if $client.isremoved}
                                <tr data-id="{$client.id}" class="removed">
                            {else}
                                <tr data-id="{$client.id}" class="notRemoved">
                            {/if}
                                <td class="col-sm-5 col-md-5 col-xs-12 col-lg-6">
                                    {$client.firstname} {$client.lastname}
                                </td>
                                <td class="col-sm-5 col-md-5 ">{$client.email}</td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="btn remove" data-id="{$client.id}">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </td>

                            </tr>
                            {/foreach}

                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.container -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

</div>

{include file='common/footer.tpl'}