function checkPasswordOnChange()
{
    var current = document.getElementById('currentPassword').value;
    var newP = document.getElementById('newPassword').value;
    var confirm = document.getElementById('confirmNewPassword').value;
	var old = document.getElementById('oldPassword').value;

	if(current === old)
	{
		if(newP === confirm)
		{
			if(newP === old)
			{
				alert("Password need to be different from the old password!");
				return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			alert("Password Mismatch!");
			return false;
		}
	}
	else
	{
		alert("Entered current password is wrong!");
		return false;
	}
}    

function userRegisterPasswordCheck()
{
	var pw = document.getElementById('password').value;
	var rpw = document.getElementById('rPassword').value;
	if(pw === rpw)
			{
				return true;
			}
			else
			{
				alert("Password missmatch!");
				return false;
			}
}