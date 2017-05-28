function validateUsernameAsync() {
    $username = $("#username");
    $usernameText = $username.val();
    var $validUsername;

    $.ajax({
        type: "POST",
        url: "../../api/validateUsername.php",
        data: {
            username: $usernameText
        },
        success: function(data) {
            $validUsername = data;
            
            if($validUsername != "true") {
                if($validUsername == "User username.") {
                    $("#usernameError").html('');
                    $("#usernameError").css("padding-left", "0px");

                    $("#username").removeClass("wrongAnswer");
                    $("#username").removeClass("rightAnswer");

                } else {
                    $("#usernameError").html($validUsername);
                    $("#usernameError").css({"color": "red", "padding-left": "10px"});

                    $("#username").removeClass("rightAnswer");
                    $("#username").addClass("wrongAnswer");
                    $("#username").effect("shake", {distance: 2});
                }
            } else {
                $("#usernameError").html('');
                $("#usernameError").css("padding-left", "0px");

                $("#username").removeClass("wrongAnswer");
                $("#username").addClass("rightAnswer");
            }
        }
    });
}

function validateEmailAsync() {
    $email = $("#email");
    $emailText = $email.val();
    var $validEmail;

    $.ajax({
        type: "POST",
        url: "../../api/validateUserEmail.php",
        data: {
            email: $emailText
        },
        success: function(data) {
            $validEmail = data;
            
            if($validEmail != "true") {
                if($validEmail == "User email.") {
                    $("#emailError").html('');
                    $("#emailError").css("padding-left", "0px");

                    $email.removeClass("wrongAnswer");
                    $email.removeClass("rightAnswer");

                    return true;
                } else {
                    $("#emailError").html($validEmail);
                    $("#emailError").css({"color": "red", "padding-left": "10px"});
                    
                    $email.removeClass("rightAnswer");
                    $email.addClass("wrongAnswer");
                    $email.effect("shake", {distance: 2});
                    return false;
                }
            } else {
                $("#register-form #emailError").html('');
                $("#register-form #emailError").css("padding-left", "0px");

                $email.removeClass("wrongAnswer");
                $email.addClass("rightAnswer");
                return true;
            }
        }
    });
}

function validateFirstNameAsync() {
    $firstName = $("#firstName");
    $nameText = $firstName.val();
    var $validName;

    $.ajax({
        type: "POST",
        url: "../../api/validateName.php",
        data: {
            name: $nameText,
            type: "first"
        },
        success: function(data) {
            $validName = data;
            
            if($validName == "false") {
                $firstName.removeClass("rightAnswer");
                $firstName.addClass("wrongAnswer");
                $firstName.effect("shake", {distance: 2});
            }
            else if($validName == "true") {
                $firstName.removeClass("wrongAnswer");
                $firstName.addClass("rightAnswer");
            }
            else {
                $firstName.removeClass("wrongAnswer");
                $firstName.removeClass("rightAnswer");
            }
        }
    });
}

function validateLastNameAsync() {
    $lastName = $("#lastName");
    $nameText = $lastName.val();
    var $validName;

    $.ajax({
        type: "POST",
        url: "../../api/validateName.php",
        data: {
            name: $nameText,
            type: "last"
        },
        success: function(data) {
            $validName = data;
            
            if($validName == "false") {
                $lastName.removeClass("rightAnswer");
                $lastName.addClass("wrongAnswer");
                $lastName.effect("shake", {distance: 2});
            }
            else if($validName == "true") {
                $lastName.removeClass("wrongAnswer");
                $lastName.addClass("rightAnswer");
            }
            else {
                $lastName.removeClass("wrongAnswer");
                $lastName.removeClass("rightAnswer");
            }
        }
    });
}

function validateUsername(username) {
    var $validUsername;
    
    $.ajax({
        type: "POST",
        url: "../../api/validateUsername.php",
        async: false,
        data: {
            username: username
        },
        success: function(data) {
            $validUsername = data;
        }
    });
    
    if($validUsername != "true") {
        if($validUsername == "User username.") {
            $("#usernameError").html('');
            $("#usernameError").css("padding-left", "0px");

            $("#username").removeClass("wrongAnswer");
            $("#username").removeClass("rightAnswer");
                        
            return true;
        } else {
            
            $("#usernameError").html($validUsername);
            $("#usernameError").css({"color": "red", "padding-left": "10px"});
            
            $("#username").removeClass("rightAnswer");
            $("#username").addClass("wrongAnswer");
            $("#username").effect("shake", {distance: 2});

            return false;
        }
    } else {
        $("#usernameError").html('');
        $("#usernameError").css("padding-left", "0px");

        $("#username").removeClass("wrongAnswer");
        $("#username").addClass("rightAnswer");
        return true;
    }
}

function validateEmail(email) {
    var $validEmail;

    $.ajax({
        type: "POST",
        url: "../../api/validateUserEmail.php",
        async: false,
        data: {
            email: email
        },
        success: function(data) {
            $validEmail = data;
        }
    });
    
    if($validEmail != "true") {
        if($validEmail == "User email.") {
            $("#emailError").html('');
            $("#emailError").css("padding-left", "0px");

            $("#email").removeClass("wrongAnswer");
            $("#email").removeClass("rightAnswer");
            
            return true;
        } else {
            $("#emailError").html($validEmail);
            $("#emailError").css({"color": "red", "padding-left": "10px"});
            
            $("#email").removeClass("rightAnswer");
            $("#email").addClass("wrongAnswer");
            $("#email").effect("shake", {distance: 2});
            return false;
        }
    } else {
        $("#register-form #emailError").html('');
        $("#register-form #emailError").css("padding-left", "0px");
        
        $("#email").removeClass("wrongAnswer");
        $("#email").addClass("rightAnswer");
        return true;
    }
}

function validateName(name, type) {
    $nameText = name.val();
    var $validName;

    $.ajax({
        type: "POST",
        url: "../../api/validateName.php",
        async: false,
        data: {
            name: $nameText,
            type: type
        },
        success: function(data) {
            $validName = data;
        }
    });

    if($validName == "false") {
        $(name).removeClass("rightAnswer");
        $(name).addClass("wrongAnswer");
        $(name).effect("shake", {distance: 2});
        return false;
    }
    else if($validName == "true") {
        $(name).removeClass("wrongAnswer");
        $(name).addClass("rightAnswer");
        return true;
    }
    else {
        $(name).removeClass("wrongAnswer");
        $(name).removeClass("rightAnswer");
        return true;
    }
}

function validatePassword() {
    $password = $("#register-form #password");
    $passwordText = $password.val();

    $confirmPassword = $("#register-form #confirm-password");
    $confirmPasswordText = $confirmPassword.val();

    if($passwordText == "" || $confirmPasswordText == "" || $passwordText != $confirmPasswordText) {

        $password.css("box-shadow", "0px 0px 5px red");
        $password.effect("shake", {distance: 2});

        $confirmPassword.css("box-shadow", "0px 0px 5px red");
        $confirmPassword.effect("shake", {distance: 2});
        return false;
    }

    return true;
}