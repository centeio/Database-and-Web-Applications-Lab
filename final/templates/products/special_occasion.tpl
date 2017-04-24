{include file='common/header.tpl'}

<!-- Page Content -->
<div id="specialOccasion-body" class="container-fluid">
   <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row carousel-holder">
                <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            {for $i=1 to ($occasions|@count - 1)} 
                            <li data-target="#carousel-example-generic" data-slide-to="{$i}"></li>
                            {/for}
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="{$occasions[0].link}"><img class="slide-image" src="{$occasions[0].image_path}" alt=""></a>
                                <div class="carousel-caption">
                                    <span> {$occasions[0].name} </span>
                                </div>
                            </div>
                            {for $i=1 to ($occasions|@count - 1)} 
                            <div class="item">
                                <a href="{$occasions[$i].link}"><img class="slide-image" src="{$occasions[$i].image_path}" alt=""></a>
                                <div class="carousel-caption">
                                    <span> {$occasions[$i].name} </span>
                                </div>
                            </div>
                            {/for}
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

{include file='common/footer.tpl'}