<?php

	session_start();
	header('location:studentlogin.php');

$con = mysqli_connect('localhost','root');

if($con){
	echo "connection successful";
}
else{
	echo "connection failed";
}

mysqli_select_db($con,'userdb');

$name = $_POST['username'];
$email= $_POST['email'];
$pass = $_POST['pass'];

$q = "select * from student where name='$name' ";

$result = mysqli_query($con,$q);

$num = mysqli_num_rows($result);

if($num == 1){
	echo "Username already taken";
}
else{
	$qy= "insert into student(name,email,password) values ('$name','$email','$pass')";
	mysqli_query($con,$qy);
}

?>