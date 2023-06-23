<?php include 'db.php';
session_start();
if(isset($_POST['btnSingup'])){
	$email = $_POST['email'];
	$username = $_POST['username'];
	$pass =  $_POST['password'];
	//check user
	$sql = "SELECT * FROM `users` WHERE `email` ='$email' OR `username` ='$username'";
	$user_old = mysqli_fetch_array(mysqli_query($conn, $sql));
	if($user_old){
		$_SESSION["eror"] =  'نام کاربری یا ایمیل شما قبلا ثبت شده است';
	}
	else{
	//add user
	$sql = "INSERT INTO `users` (`ID`, `email`, `username`, `password`) VALUES (NULL, '$email', '$username', '$pass')";
	mysqli_query($conn, $sql);
	// get user id
	$sql = "SELECT ID FROM `users` WHERE `username` = '$username'";
	$user = mysqli_fetch_array(mysqli_query($conn, $sql)) ;
	setcookie('user_id', $user['ID'].'-'.md5("user-idvs-".$user['ID']), time() + (86400 * 30), "/");
	}
	header("location:SingUpOrLogin.php");
}

if(isset($_POST['btn_login'])){
	$email = $_POST['email'];
	$pass =  $_POST['password'];
	//check user
	$sql = "SELECT ID FROM `users` WHERE `email` ='$email' AND `password` ='$pass';";
	$user_old = mysqli_fetch_array(mysqli_query($conn, $sql));
	if(!$user_old){
		$_SESSION["eror"] =  'ایمیل یا رمز عبور اشتباه است';
	}
	else{
	setcookie('user_id', $user_old['ID'].'-'.md5("user-idvs-".$user_old['ID']), time() + (86400 * 30), "/");
	}
	header("location:SingUpOrLogin.php");
}
