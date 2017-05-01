$("#Products div.add-product").click(function() {
    $(".not-popup").css({ "filter": "blur(1px)", "-moz-filter": "blur(1px)", "-webkit-filter": "blur(1px)", "-o-filter": "blur(1px)"});
    $("#addProductPopUp").modal("show");
});

$('#addProductPopUp').on('shown.bs.modal', function () {
    $("#NewName").focus();
});

$('#addProductPopUp').on('hidden.bs.modal', function () {
    $(".not-popup").css({ "filter": "blur(0px)", "-moz-filter": "blur(0px)", "-webkit-filter": "blur(0px)", "-o-filter": "blur(0px)"});
    $('#addProductPopUp form input').val("");
    $('#addProductPopUp form input').removeClass("wrongAnswer");
});

$("#SubmitNewProduct").click(function() {
    $name = $("#NewName").val();
    $price = $("#NewPrice").val();
    $stock = $("#NewStock").val();
    $details = $("#NewDetails").val();
    $categories = $('#NewCategories input:checkbox:checked').map(function() {
        return this.value;
    }).get();
    
    //Try and add new product if succeed
    $.post("/~lbaw1611/final/api/add_product.php", {'name': $name, 'price': $price, 'stock': $stock, 'details': $details, 'categories': $categories}, function(data) {
        console.log(data);
        
        if(data['status'] === 'Success'){
            $("#addProductPopUp").modal("hide");
            
            //Add product to the end of list
            $newProdHTML = '<div class="col-md-3 col-xs-6"  id="Product' + data['last_id'] + '">\
                                <div class="thumbnail">\
                                    <a href="/~lbaw1611/final/pages/products/product.php?id=' + data['last_id'] + '>\
                                        <img src="/~lbaw1611/final/images/thumbnails/" alt="">\
                                    </a>\
                                    <button onclick="deleteProduct('+ data['last_id'] +')"><i class="fa fa-times pull-right" aria-hidden="true"></i></button>\
                                    <div class="caption">\
                                        <h4 class="col-xs-12"><a href="/~lbaw1611/final/pages/products/product.php?id='+ data['last_id'] + '">' + $name + '</a></h4>\
                                        <h4 class="pull-right col-xs-12">' + $price + '€</h4>\
                                        <div class="ratings">\
                                            <p class="pull-right">0 reviews</p>\
                                            <p>';
                                            for(i = 0; i < 5; i++){
                                                $newProdHTML += '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                             }
                                            $newProdHTML += '</p>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>';
            $("#addProduct").before($newProdHTML).hide().fadeIn(300);
            
        }
        else{
            $("#addProductResponse").html(data['status']);
        }
    }, 'json');
});

function deleteProduct(id){
    $.post("/~lbaw1611/final/api/delete_product.php", {'id': id}, function(data) {
        console.log(data);
        
        if(data['status'] === 'Success'){
            prodId = "#Product" + id;
            $(prodId).fadeOut(300, function() { $(this).remove(); });
        }
    }, 'json');
}