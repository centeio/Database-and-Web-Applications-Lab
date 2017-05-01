$(document).ready(function() { boundEventToDeleteAddress();
                               boundEventToAddAddress();});

function boundEventToDeleteAddress() {
    $("#Addresses .panel-heading i").click(function() {
        $addressID = this.id;
        $executed = false;

        $.ajax({
			type:"POST",
			url: "../../api/delete_address.php",
			async: false,
			data: {
				addressID: $addressID
			},
			success: function(data) {
				$executed = (data == 1);
			}
		});

        if($executed) {
           $(this).parent().parent().parent().fadeOut(300, function() { $(this).remove(); });
        }
    });

}

function boundEventToAddAddress() {

    $("#SubmitNewAddress").click(function() {
        
        $NewStreetName = $("#NewStreetName");
        $NewStreetNameText = $NewStreetName.val();

        $NewZipCode = $("#NewZipCode");
        $NewZipCodeText = $NewZipCode.val();

        $NewCity = $("#NewCity");
        $NewCityText = $NewCity.val();
        
        if ($NewStreetNameText !== "" && $NewZipCodeText !== "" && $NewCityText !== "") {
            $(".spinner").css("visibility", "visible");
            var $added = false;
            var $answer;

            $.ajax({
                type: "POST",
                url: "../../api/add_address.php",
                async: false,
                data: {
                    streetname: $NewStreetNameText,
                    zipcode: $NewZipCodeText,
                    cityname: $NewCityText
                },
                success: function(data) {
                    $answer = jQuery.parseJSON(data);
                    $added = ($answer.status === "true");
                }
            });
            
            $(".spinner").css("visibility", "hidden");

            if($added)  {
                $("#addAddressPopUp").modal("hide");
                $("#addAddress").before('<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">\
                                            <div class="panel panel-info">\
                                                <div class="panel-heading"> Address\
                                                    <i id="' + $answer.addressID + '" class="fa fa-times pull-right" aria-hidden="true"></i>\
                                                </div>\
                                                <div class="panel-body">\
                                                    <div class="row">\
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">\
                                                            <span class="address-label"> Street: </span>\
                                                        </div>\
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">\
                                                            <span class="address-content">' + $NewStreetNameText + ' <span>\
                                                        </div>\
                                                    </div>\
                                                    <div class="row">\
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">\
                                                            <span class="address-label"> Zip-Code: </span>\
                                                        </div>\
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">\
                                                            <span class="address-content"> ' + $NewZipCodeText + '<span>\
                                                        </div>\
                                                    </div>\
                                                    <div class="row">\
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">\
                                                            <span class="address-label"> City: </span>\
                                                        </div>\
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">\
                                                            <span class="address-content"> ' + $NewCityText + '<span>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>').hide().fadeIn(300);
                boundEventToDeleteAddress();                
            }
            else {
                $('#addAddressResponse').html($answer.status);
            }
        } else {
            if ($NewStreetNameText === "") {
                $NewStreetName.addClass("wrongAnswer");
                $NewStreetName.effect("shake", {distance: 2});
            }
            if ($NewZipCodeText === "") {
                $NewZipCode.addClass("wrongAnswer");
                $NewZipCode.effect("shake", {distance: 2});
            }
            if ($NewCityText === "") {
                $NewCity.addClass("wrongAnswer");
                $NewCity.effect("shake", {distance: 2});
            }
        }
    });

    $("#Addresses div.add-address").click(function() {
        $(".not-popup").css({ "filter": "blur(1px)", "-moz-filter": "blur(1px)", "-webkit-filter": "blur(1px)", "-o-filter": "blur(1px)"});
        $("#addAddressPopUp").modal("show");
    });
    
    $('#addAddressPopUp').on('shown.bs.modal', function () {
        $("#NewStreetName").focus();
    });

    $('#addAddressPopUp').on('hidden.bs.modal', function () {
        $(".not-popup").css({ "filter": "blur(0px)", "-moz-filter": "blur(0px)", "-webkit-filter": "blur(0px)", "-o-filter": "blur(0px)"});
        $('#addAddressPopUp form input').val("");
        $('#addAddressPopUp form input').removeClass("wrongAnswer");
    });
}