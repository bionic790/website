<?php

	session_start();
	

$con = mysqli_connect('localhost','root');

if($con){
	echo "connection successful";
}
else{
	echo "connection failed";
}

mysqli_select_db($con,'userdb');

$Name = $_POST['username'];
$Pass = $_POST['pass'];

$q = "select * from student where name='$Name' && password='$Pass' ";

$result = mysqli_query($con,$q);

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['username'] = $Name;
	header('location:homepage.php');
}
else{
	header('location:studentlogin.php');
}

?>