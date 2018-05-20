function handleSignUp()
{
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	
	if(email.length<4)
	{
		alert("Password must more than 4");
		return;
	}
	if(password.length<4)
	{
		alert("Invalid Email");
		return;
	}

}
