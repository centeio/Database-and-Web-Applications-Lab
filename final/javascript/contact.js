$(document).ready(function() { validateEmailForm(); });

function validateEmailForm() {
    $("#emailForm #email").on("blur", function() {
        $emailText = $(this).val();
        var $validEmail;
        
        $.ajax({
            type: "POST",
            url: "../../api/validateEmail.php",
            data: {
                email: $emailText
            },
            success: function(data) {
                $validEmail = data;
                
                if($validEmail == "true") {
                    $("#emailForm #email").removeClass("wrongAnswer");
                    $("#emailForm #email").addClass("rightAnswer");

                } else {
                    $("#emailForm #email").removeClass("rightAnswer");
                    $("#emailForm #email").addClass("wrongAnswer");
                    $("#emailForm #email").effect("shake", {distance: 2});
                }
            }
        });
    });
    
    $("#emailForm #subject").on("blur", function() {
        if($(this).val() == "") {
            $(this).addClass("wrongAnswer");
            $(this).effect("shake", {distance: 2});
        } else {
            $(this).removeClass("wrongAnswer");
        }
    });
    
    $("#emailForm #message").on("blur", function() {
        if($(this).val() == "") {
            $(this).addClass("wrongAnswer");
            $(this).effect("shake", {distance: 2});
        } else {
            $(this).removeClass("wrongAnswer");
        }
    });
    
    $("#emailForm #sendEmail").on("click", function() {
        
        if($("#emailForm #email").val() == "") {
            $("#emailForm #email").removeClass("rightAnswer");
            $("#emailForm #email").addClass("wrongAnswer");
            $("#emailForm #email").effect("shake", {distance: 2});
            return ;
        }

        if($("#emailForm #email").val() != "") {
           $emailText = $("#emailForm #email").val()
            var $validEmail;

            $.ajax({
                type: "POST",
                url: "../../api/validateEmail.php",
                async: false,
                data: {
                    email: $emailText
                },
                success: function(data) {
                    $validEmail = data;

                    if($validEmail == "true") {
                        $("#emailForm #email").removeClass("wrongAnswer");
                        $("#emailForm #email").addClass("rightAnswer");

                    } else {
                        $("#emailForm #email").removeClass("rightAnswer");
                        $("#emailForm #email").addClass("wrongAnswer");
                        $("#emailForm #email").effect("shake", {distance: 2});
                    }
                }   
            });

            if($validEmail == "false") return ;
        }

        if($("#emailForm #subject").val() == "") {
            $("#emailForm #subject").removeClass("rightAnswer");
            $("#emailForm #subject").addClass("wrongAnswer");
            $("#emailForm #subject").effect("shake", {distance: 2});
            return ;
        }

        if($("#emailForm #message").val() == "") {
            $("#emailForm #message").removeClass("rightAnswer");
            $("#emailForm #message").addClass("wrongAnswer");
            $("#emailForm #message").effect("shake", {distance: 2});
            return ;
        }
        
        var newElement = $("#emailForm").clone(true);
        newElement.find("input").val('');
        newElement.find("input").removeClass("rightAnswer");
        newElement.find("textarea").val('');
        newElement.find("textarea").removeClass("rightAnswer");
        
        $("#emailForm").removeClass("fadeAndScale");
        $("#emailForm").addClass("sendEmail");
        setTimeout(function() {
            $("#emailForm").remove();
            $("#emailFormContainer").append(newElement);
            newElement.addClass("fadeAndScale");
        }, 400);
        
        var $emailText = $("#emailForm #email").val();
        var $subjectText = $("#emailForm #subject").val();
        var $messageText = $("#emailForm #message").val();
        
        $.ajax({
            type: "POST",
            url: "../../api/sendEmail.php",
            data: {
                email: $emailText,
                subject: $subjectText,
                message: $messageText
            },
            success: function(data) {},
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        
    });
}
