$('#addressesAreTheSame').click(function() {
    $('#shipping').toggle();
    if($('#addressesAreTheSame').is(':checked')){
        $('#shipping input').prop('required',false);
    }
    else{
        $('#shipping input').prop('required',true);
    }
    
});

beforeSubmit = function(){
    $('#payment input').removeClass("hide-hints");
    
    $('#payment input:invalid').effect("shake", {distance: 2});    
    
    $("#payment").submit();            
}

function validateForm() {
    if($('#addressesAreTheSame').is(':checked')){
        $('#shipping_address').val( $('#billing_address').val());
        $('#shipping_city').val($('#billing_city').val());
        $('#shipping_zip_code').val($('#billing_zip_code').val());
        $('#shipping_country').val($('#billing_country').val());
    }
    
    $invalidInputs = $('#payment input:invalid');
    
    if($invalidInputs.length > 0){
        return false;
    }
    else
        return true;
};