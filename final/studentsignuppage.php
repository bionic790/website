<!DOCTYPE html>
<html>
<head>
	<title>Creating new account</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">

</head>
<body>
	<div class="container">
		<div id="signin"><img src="img/bmslogo.png" alt="BMSCE"/><p>signin<p></div>
		<form action="studentregistration.php" method="post" onsubmit="return validation()">
			<div class="main">
				<p><i class="fa fa-user" aria-hidden="true"></i> Username</p><input type="text" name="username" placeholder="Enter Username" id="user" autocomplete="off"  /><br>
				<p><i class="fa fa-envelope" aria-hidden="true" ></i> E-mail</p><input type="text" name="email" placeholder="Enter E-mail" id="emails" autocomplete="off" /><br>
				<p><i class="fa fa-lock" aria-hidden="true"></i> Password</p><input type="Password" name="pass" placeholder="Enter Password" id="pass" autocomplete="off" /><br>
				<p>* Confirm password</p><input type="Password"  name="confirmpass" placeholder="Reenter Password" autocomplete="off" id="conpass"/><br>
			</div>
			<span id="abcddd"></span>
			<div class="main1"><input type="submit" value="Next"></div><br>
		</form>
	</div>

	<script type="text/javascript">

		function validation(){

			var user = document.getElementById('user').value;
			var pass = document.getElementById('pass').value;
			var confirmpass = document.getElementById('conpass').value;
			var emails = document.getElementById('emails').value;

			if(user == ""){
				document.getElementById('abcddd').innerHTML=" ** Please fill the username field";
				return false;
			}

			else if((user.length <= 2) || (user.length > 40)) {
				document.getElementById('abcddd').innerHTML = " ** Username lenght must be between 2 and 20";
				return false;	
			}

			else if(!isNaN(user)){
				document.getElementById('abcddd').innerHTML =" ** only characters are allowed";
				return false;
			}

			else if(emails == ""){
				document.getElementById('abcddd').innerHTML = " ** Please fill the email idx` field";
				return false;
			}

			else if(emails.indexOf('@') <= 0 ){
				document.getElementById('abcddd').innerHTML = " ** @ Invalid Position";
				return false;
			}

			else if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				document.getElementById('abcddd').innerHTML = " ** . Invalid Position";
				return false;
			}

			else if(pass == ""){
				document.getElementById('abcddd').innerHTML =" ** Please fill the password field";
				return false;
			}

			else if((pass.length <= 5) || (pass.length > 20)) {
				document.getElementById('abcddd').innerHTML = " ** Passwords lenght must be between  5 and 20";
				return false;	
			}

			else if(pass!=confirmpass){
				document.getElementById('abcddd').innerHTML = " ** Password does not match the confirm password";
				return false;
			}

			else if(confirmpass == ""){
				document.getElementById('abcddd').innerHTML = " ** Please fill the confirmpassword field";
				return false;
			}
		}
	</script>
</body>
</html>