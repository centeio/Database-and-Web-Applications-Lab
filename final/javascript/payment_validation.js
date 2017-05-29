$('#addressesAreTheSame').click(function() {
    $('#shipping').toggle();
});

$('form button').click(validateForm);

function validateForm() {
    $('form input').removeClass("hide-hints");
    
    if($('#addressesAreTheSame').is(':checked')){
        $('#shipping input[name=address]').val( $('#billing input[name=address]').val());
        $('#shipping input[name=city]').val($('#billing input[name=city]').val());
        $('#shipping input[name=zip_code]').val($('#billing input[name=zip_code]').val());
        $('#shipping input[name=country]').val($('#billing input[name=country]').val());
    }
    
    $invalidInputs = $('form input:invalid').effect("shake", {distance: 2});
    
    if($invalidInputs.length > 0)
        return false;
    else
        return true;
};