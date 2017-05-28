$('#preview').hide();

$("#Products div.add-product").click(function() {
    $(".not-popup").css({ "filter": "blur(1px)", "-moz-filter": "blur(1px)", "-webkit-filter": "blur(1px)", "-o-filter": "blur(1px)"});
    $('#addProductPopUp form input').addClass("hide-hints");
    $("#addProductPopUp").modal("show");
});

$('#addProductPopUp').on('shown.bs.modal', function () {
    $("#NewName").focus();
});

$('#addProductPopUp').on('hidden.bs.modal', function () {
    $(".not-popup").css({ "filter": "blur(0px)", "-moz-filter": "blur(0px)", "-webkit-filter": "blur(0px)", "-o-filter": "blur(0px)"});
    $('#addProductPopUp form input').val("");
});

$("#SubmitNewProduct").click(function() {
    $('#addProductPopUp form input').removeClass("hide-hints");
    
    $name = $("#NewName").val();
    $price = $("#NewPrice").val();
    $stock = $("#NewStock").val();
    $details = $("#NewDetails").val();
    $categories = $('#NewCategories input:checkbox:checked').map(function() {
        return this.value;
    }).get();    
    
    $invalidInputs = $('#addProductPopUp form input:invalid').effect("shake", {distance: 2});
    
    if($invalidInputs.length > 0){
        return;
    }
    
    var fd = new FormData();
    fd.append("name", $name); 
    fd.append("price", $price);   
    fd.append("stock", $stock);   
    fd.append("details", $details);   
    fd.append("categories", JSON.stringify($categories));
    fd.append("image", $("#NewImage")[0].files[0]);     
    
    //Try and add new product if succeed
    $.ajax({
        url: "/~lbaw1611/final/api/add_product.php",
        method: "POST",
        dataType: 'json',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            console.log($("#NewImage")[0].files[0]);
            
            if(data['status'] === 'Success'){
                $("#addProductPopUp").modal("hide");
                
                //Add product to the end of list
                $newProdHTML = '<div class="col-md-3 col-xs-6">\
                                    <div class="thumbnail">\
                                        <a href="/~lbaw1611/final/pages/products/product.php?id=' + data['last_id'] + '">\
                                            <img src="/~lbaw1611/final/images/thumbnails/'+ $("#NewImage")[0].files[0]['name'] +'" alt="' + $("#NewImage")[0].files[0]['name'] + '">\
                                        </a>\
                                        <button onclick="deleteProduct(this, '+ data['last_id'] +')"><i class="fa fa-times pull-right" aria-hidden="true"></i></button>\
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
                $("#popupResponse").html(data['status']);
            }
        }
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview')
                .attr('src', e.target.result)
                .css( "maxWidth", 70 + "%")
                .show();
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function deleteProduct(b, id){
    $.post("/~lbaw1611/final/api/delete_product.php", {'id': id}, function(data) {
        
        if(data['status'] === 'Success'){
            $(b).parent().parent().fadeOut(300, function() { $(this).remove(); });
        }
    }, 'json');
}