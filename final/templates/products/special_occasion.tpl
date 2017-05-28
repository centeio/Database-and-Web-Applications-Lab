{include file='common/header.tpl'}

<!-- Page Content -->
<div id="ProductsContent" class="container">
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
                                <a href="{$highlights[0].link}"><img class="slide-image" src="{$highlights[0].image_path}" alt=""></a>
                                <div class="carousel-caption">
                                    <h1>{$special_occasion.name}<br><small>{$special_occasion.beginningdate|date_format} - {$special_occasion.enddate|date_format}</small></h1>
                                </div>
                            </div>
                            {for $i=1 to ($highlights|@count - 1)} 
                            <div class="item">
                                <a href="{$highlights[$i].link}"><img class="slide-image" src="{$highlights[$i].image_path}" alt=""></a>
                                <div class="carousel-caption">
                                    <h1>{$special_occasion.name}<br><small>{$special_occasion.beginningdate|date_format} - {$special_occasion.enddate|date_format}</small></h1>
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
    <div class="row">
        <div class="col-xs-6"><a href="{$linkPrevious}"><i class="fa fa-arrow-left" aria-hidden="true"></i>Previous occasion</a></div>
        <div class="col-xs-6"><a href="{$linkNext}">Next occasion<i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
    </div>
    <div class="row">
        <div class="col-md-12" id="Products">                     
            {foreach $products as $product}
            <div class="col-md-3 col-xs-6">
                <div class="thumbnail">
                    <a href="{$BASE_URL}pages/products/product.php?id={$product.id}">
                        <img src="{$BASE_URL}images/thumbnails/{$product.image}" alt="{$product.image}">
                    </a>
                    <div class="caption">
                        <h4 class="col-xs-12"><a href="{$BASE_URL}pages/products/product.php?id={$product.id}">{$product.name}</a></h4>
                        <h4 class="pull-right col-xs-12">{$product.price}€</h4>
                        <div class="ratings">
                            <p class="pull-right">{$product.count} reviews</p>
                            <p>
                                {for $i=1 to $product.rate}
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                {/for}
                                {for $i=1 to 5 - $product.rate}
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
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

<script>
    var categories = [];
    var prices = [];
    var ratings = [];
    
    $( "#categoryDropdown" ).click(function(event) {
      $("#categoryDropdown i").toggleClass("fa-caret-down fa-caret-up");
      $(".categoryOption").toggle();
    });
    $(".categoryOption input").change(function() {
        if(this.checked) {
            categories.push(this.value);
        }
        else{
            categories = categories.filter(e => e !== this.value);
        }
        
        filter();
    });
    $( "#priceDropdown" ).click(function(event) {
      $("#priceDropdown i").toggleClass("fa-caret-down fa-caret-up");
      $(".priceOption").toggle();
    });
    $(".priceOption input").change(function() {
        if(this.checked) {
            prices.push(this.value);
        }
        else{
            prices = prices.filter(e => e !== this.value);
        }
        
        filter();
    });
    $( "#ratingDropdown" ).click(function(event) {
      $("#ratingDropdown i").toggleClass("fa-caret-down fa-caret-up");
      $(".ratingOption").toggle();
    });
    $(".ratingOption input").change(function() {
        if(this.checked) {
            ratings.push(this.value);
        }
        else{
            ratings = ratings.filter(e => e !== this.value);
        }
        
        filter();
    });
    
    function filter() {
        
        console.log('categories:' + categories + '\n' +
                    'prices: ' + prices + '\n' +
                    'ratings: ' + ratings);
    }
</script>

{include file='common/footer.tpl'}