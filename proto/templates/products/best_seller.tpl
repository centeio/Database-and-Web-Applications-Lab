{include file='common/header.tpl'}

<!-- Page Content -->
<div id="mainpage-body" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            {for $i=1 to ($special_occasions|@count - 1)} 
                            <li data-target="#carousel-example-generic" data-slide-to="{$i}"></li>
                            {/for}
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="#"><img class="slide-image" src="../images/{$special_occasions[0].image}" alt=""></a>
                                <div class="carousel-caption">
                                    <span> {$special_occasions[0].name} </span>
                                </div>
                            </div>
                            {for $i=1 to ($special_occasions|@count - 1)} 
                            <div class="item">
                                <a href="#"><img class="slide-image" src="../images/{$special_occasions[$i].image}" alt=""></a>
                                <div class="carousel-caption">
                                    <span> {$special_occasions[$i].name} </span>
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

            <div id="BestSellers" class="row">

                <h1 id="BestSellersTitle"> Best Sellers </h1>

                {foreach $products as $product}
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="{$BASE_URL}images/thumbnails/{$product.image}" alt="{$product.image}">
                        <div class="caption">
                            <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="{$BASE_URL}pages/products/product.php?id={$product.id}">{$product.name}</a></h4>
                            <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">{$product.price}€</h4>
                            <div class="ratings">
                                <p class="pull-right">{$product.count} reviews</p>
                            <p>
                                {for $i=1 to $product.rate}
                                    <span class="glyphicon glyphicon-star"></span>
                                {/for}
                                {for $i=1 to 5 - $product.rate}
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                {/for}
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                {/foreach}
                
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}