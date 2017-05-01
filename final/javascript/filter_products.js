var categories = [];
var prices = [0, 50];
var ratings = [];

$( "#slider-range" ).slider({
  range: true,
  min: 0,
  max: 50,
  values: [0,50],
  slide: function( event, ui ) {
    $("#minPrice").text(ui.values[0] + "€");
    $("#maxPrice").text(ui.values[1] + "€");
    
    prices[0] = ui.values[0];
    prices[1] = ui.values[1];
    
    filter();
  }
});

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
    $.post("/~lbaw1611/final/api/get_filtered.php", {'category': categories, 'price': prices, 'rating': ratings}, function(data) {
        var prod = "";
        for(i = 0; i < data.length; i++) { 
            prod += "<div class=\"col-md-3 col-xs-6\">\n" + 
                        "<div class=\"thumbnail\">\n" +
                            "<a href=\"/~lbaw1611/final/pages/products/product.php?id=" + data[i]['id'] + "\">\n"+
                                "<img src=\"/~lbaw1611/final/images/thumbnails/" + data[i]['image'] + "\" alt=\"" + data[i]['image'] + "\">\n" + 
                            "</a>\n" +
                            "<div class=\"caption\">\n" +
                                "<h4 class=\"col-xs-12\"><a href=\"/~lbaw1611/final/pages/products/product.php?id=" + data[i]['id'] + "\">" + data[i]['name'] + "</a></h4>\n" +
                                "<h4 class=\"pull-right col-xs-12\">" + data[i]['price'] + "€</h4>\n" +
                                "<div class=\"ratings\">\n" +
                                    "<p class=\"pull-right\">" + data[i]['count'] + " reviews</p>\n" +
                                    "<p>\n";
                                        for(j = 0; j < data[i]['rate']; j++)
                                            prod += "<i class=\"fa fa-star\" aria-hidden=\"true\"></i>\n";
                                        for(j = 0; j < 5 - data[i]['rate']; j++)
                                            prod += "<i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>\n";
                                    prod += "</p>\n" +
                                "</div>\n" +
                            "</div>\n" +
                        "</div>\n" + 
                    "</div>"
        }
        $("#Products").html(prod);
    }, 'json');
}
