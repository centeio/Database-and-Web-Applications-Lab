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
                            {for $i=1 to ($highlights|@count - 1)} 
                            <li data-target="#carousel-example-generic" data-slide-to="{$i}"></li>
                            {/for}
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="{$highlights[0].link}"><img class="slide-image" src="{$highlights[0].image_path}" alt="{$highlights[0].alt}"></a>
                                <div class="carousel-caption">
                                    <span> {$highlights[0].name} </span>
                                </div>
                            </div>
                            {for $i=1 to ($highlights|@count - 1)} 
                            <div class="item">
                                <a href="{$highlights[$i].link}"><img class="slide-image" src="{$highlights[$i].image_path}" alt="{$highlights[$i].alt}"></a>
                                <div class="carousel-caption">
                                    <span> {$highlights[$i].name} </span>
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

                <h1 id="BestSellersTitle">Best Rated</h1>

                {foreach $products as $product}
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <a href="{$BASE_URL}pages/products/product.php?id={$product.id}">
                        <div class="thumbnail">
                            <img src="{$BASE_URL}images/thumbnails/{$product.image}" alt="{$product.name}">
                            <div class="caption">
                                <h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">{$product.name}</h4>
                                <h4 class="pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">{$product.price}€</h4>
                                <div class="ratings">
                                    <p class="pull-right">{$product.count} reviews</p>
                                    <input name="rate" value="{$product.rate}" class="rating-loading">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                {/foreach}
                
            </div>
        </div>
    </div>
</div>

<script src="{$BASE_URL}javascript/plugins/star-rating/star-rating.js" type="text/javascript"></script>
{literal}
<script>
    $('.rating-loading').rating({displayOnly: true, size:'xs', filledStar:'<i class="fa fa-star" aria-hidden="true"></i>', emptyStar:'<i class="fa fa-star-o" aria-hidden="true"></i>'});
</script>
{/literal}

{include file='common/footer.tpl'}