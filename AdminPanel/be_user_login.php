<?php 
//require_once '..//enc.php';
include('..//dbConnect.php');

session_start();

$email=$_POST['mail'];
$password=$_POST['pass'];

// $password=md5($password);
//$enc = new enc();
//$password1 = $enc->encry($password, 5);

$sql="SELECT* FROM users_admin WHERE email='$email' AND password='$password'";

$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);

if ($rowcount > 0) {
	header('location: index.php');
	$_SESSION['login_adm'] = true;
	$_SESSION['adm_login_msg'] = "email";
	$_SESSION['adm_login_msg_type'] = "success";
	$_SESSION['adm_usr_email'] = $email;
}else{
	header('location: login.php');
	$_SESSION['adm_login_msg'] = "You have entered wrong mail or password!";
	$_SESSION['adm_login_msg_type'] = "danger";
}

// $row = mysqli_fetch_assoc($result);
// $status = $row['status'];
// $iD = $row['id'];

// // if ($status == 1) {
// // 	echo "one";
// // }

// if ($rowcount==1 and $status==1) {
// 	header('location: profile.php');
// 	$_SESSION['login_']=true;
// 	$_SESSION['id_']=$iD;
// 	$_SESSION['message']="Successfully Logged in.";
// 	$_SESSION['msg_type']="success";
// }else{
// 	header('location: login.php');
// 	$_SESSION['message']="Invalid Credential!";
// 	$_SESSION['msg_type']="danger";
// }

 ?>