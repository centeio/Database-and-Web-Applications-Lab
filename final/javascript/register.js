$(document).ready(function () {
    $("#register-form #username").on("blur", validateUsernameAsync);

    $("#register-form #email").on("blur", validateEmailAsync);

    $("#register-form #firstName").on("blur", validateFirstNameAsync);

    $("#register-form #lastName").on("blur", validateLastNameAsync);
    
    $('#login-form-link').click(function (e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    
    $('#register-form-link').click(function (e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
});

function validateLogin() {
    
    $(".spinner").css("visibility", "visible");

    $username = $('#login-username');
	$password = $('#login-password');
	$usernameText = $('#login-username').val();
	$passwordText = $('#login-password').val();
    
    $rememberMe = $("input[name=remember]").is(":checked"); 

	var $validUser = false;

	if ($usernameText !== "" && $passwordText !== "") {
		$.ajax({
			type: "POST",
			url: "../../database/users.php",
			async: false,
			data: {
				action: 'verifyUser',
				username: $usernameText,
				password: $passwordText,
                rememberMe: $rememberMe
			},
			success: function(data) {
                $validUser = (data.trim() === "true");                
            }
		});
        
		if (!$validUser) {
			$username.css("box-shadow", "0px 0px 5px red");
			$password.css("box-shadow", "0px 0px 5px red");

			$username.effect("shake", {distance: 2});
			$password.effect("shake", {distance: 2});
		}
	}
    
    $(".spinner").css("visibility", "hidden");

    return $validUser;
}

function validateRegister() {
    
    $(".spinner").css("visibility", "visible");

    $username = $("#username").val();
    if(!validateUsername($username)) {
        $(".spinner").css("visibility", "hidden");
        return false;
    }
    
    $email = $("#email").val();
    if(!validateEmail($email)) {
        $(".spinner").css("visibility", "hidden");
        return false;
    }
    
    $firstName = $('#firstName');
    if(!validateName($firstName, "first")) {
        $(".spinner").css("visibility", "hidden");
        return false;
    }
    
    $lastName = $('#lastName');
    if(!validateName($lastName, "last")) {
        $(".spinner").css("visibility", "hidden");
        return false;
    }
    
    if(!validatePassword()) {
        $(".spinner").css("visibility", "hidden");
        return false;
    }

    $(".spinner").css("visibility", "hidden");
    return true;
}