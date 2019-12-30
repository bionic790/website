<!DOCTYPE html>
<html>
<head>
	<title>Faculty login page</title>
	<link rel="stylesheet" type="text/css" href="css/facultylogin.css">
</head>
<body>
	<div class="faculty"><img src="img/teacher.png"></div>
	<div class="welcome"><img id="hi" src="img/welcome.png"></div>
	<div class="main">
		<div id="login"><img src="img/bmslogo.png" alt="BMSCE"/><p>login<p></div>
		
		<form action="facultyvalidation.php" method="post" onsubmit="return validation()">
			<p><i class="fa fa-user" aria-hidden="true"></i> Username</p>
			<input id="user" type="text" name="username" placeholder="please enter name" autocomplete="off"/><br><br>
			<p><i class="fa fa-lock" aria-hidden="true"></i> Password</p>
			<input id="pass" type="Password" name="pass" placeholder="please enter Password" autocomplete="off"/><br><br>
			<span id="abcddd"></span>
			<input class="sub" type="submit" value="SIGN IN"><br>
			<a class="a" href="facultysignuppage.php">Create an Account</a>
			<a class="b" href="#">Forgot Password?</a>
		</form>

	</div>
	<script type="text/javascript">
		function validation(){
			var user = document.getElementById('user').value;
			var pass = document.getElementById('pass').value;

			if(user == ""){
				document.getElementById('abcddd').innerHTML=" ** Please fill the username field";
				return false;
			}

			else if((user.length <= 2) || (user.length > 40)) {
				document.getElementById('abcddd').innerHTML = " ** Username lenght must be between 2 and 20";
				return false;	
			}

			else if(pass == ""){
				document.getElementById('abcddd').innerHTML =" ** Please fill the password field";
				return false;
			}

			else if((pass.length < 5) || (pass.length > 20)) {
				document.getElementById('abcddd').innerHTML = " ** Passwords lenght must be between  5 and 20";
				return false;	
			}
		}
	</script>
</body>
</html>