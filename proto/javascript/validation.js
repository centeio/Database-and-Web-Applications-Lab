function validateLogin(){

    $username = $('#login-username');
	$password = $('#login-password');
	$usernameText = $('#login-username').val();
	$passwordText = $('#login-password').val();

	var $validUser = false;
	
	if($usernameText != "" && $passwordText != "") {
		$.ajax({
			type:"POST",
			url: "../../database/users.php",
			async: false,
			data: {
				action: 'verifyUser',
				username: $usernameText,
				password: $passwordText 
			},
			success: function(data) {
                $validUser = (data === "true")            
			}
		});
		if(!$validUser) {
			$username.css("box-shadow", "0px 0px 5px red");
			$password.css("box-shadow", "0px 0px 5px red");
            
			//$username.effect("shake", {distance: 5});
			//$password.effect("shake", {distance: 5});
		}
	}
    
    return $validUser;
}