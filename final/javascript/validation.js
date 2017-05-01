function validateLogin() {

    $username = $('#login-username');
	$password = $('#login-password');
	$usernameText = $('#login-username').val();
	$passwordText = $('#login-password').val();

	var $validUser = false;
	
	if ($usernameText !== "" && $passwordText !== "") {
		$.ajax({
			type: "POST",
			url: "../../database/users.php",
			async: false,
			data: {
				action: 'verifyUser',
				username: $usernameText,
				password: $passwordText 
			},
			success: function(data) {
                $validUser = (data === "true");
			}
		});
		if (!$validUser) {
			$username.css("box-shadow", "0px 0px 5px red");
			$password.css("box-shadow", "0px 0px 5px red");
            
			$username.effect("shake", {distance: 5});
			$password.effect("shake", {distance: 5});
		}
	}
    
    return $validUser;
}

function checkPassword() {

	var $password = $('#userProfilePassword');
	var $passwordText = $password.val();

	var $validUser = false;

	if ($passwordText !== "") {
		$.ajax({
			type: "POST",
			url: "../../database/users.php",
			async: false,
			data: {
				action: 'checkPassword',
				password: $passwordText 
			},
			success: function(data) {
                $validUser = (data === "true");
			}
		});
	}

	if (!$validUser) {
		$password.addClass("wrongAnswer");
		$password.effect("shake", {distance: 5});
	}

	return $validUser;
}

function checkChangePassword() {
	$oldPassword = $('#changeOldPassword');
	$oldPasswordText = $oldPassword.val();

	$newPassword = $('#changeNewPassword');
	$newPasswordText = $newPassword.val();

	$newRepeatPassword = $('#changeNewRepeatPassword');
	$newRepeatPasswordText = $newRepeatPassword.val();

	var $validUser = false;

	if ($oldPasswordText !== "") {
		$.ajax({
			type: "POST",
			url: "../../database/users.php",
			async: false,
			data: {
				action: 'checkPassword',
				password: $oldPasswordText 
			},
			success: function(data) {
				$validUser = (data === "true");
			}
		});		
	}

	if (!$validUser) {
		$oldPassword.addClass("wrongAnswer");
		$oldPassword.effect("shake", {distance: 5});
	} else {
		if ($newPasswordText !== "" && $newRepeatPasswordText !== "") {
			if($newPasswordText != $newRepeatPasswordText) {
				$newRepeatPassword.addClass("wrongAnswer");
				$newRepeatPassword.effect("shake", {distance: 5});
				$validUser = false;
			}
		} else {
			if ($newPasswordText == "") {
				$newPassword.addClass("wrongAnswer");
				$newPassword.effect("shake", {distance: 5});
			} 
			if ($newRepeatPasswordText == "") {
				$newRepeatPassword.addClass("wrongAnswer");
				$newRepeatPassword.effect("shake", {distance: 5});
			}
			$validUser = false;
		}
	}

	return $validUser;
}