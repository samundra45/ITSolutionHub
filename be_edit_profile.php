<?php
	session_start();
	include('dbConnect.php');
    $email = $_SESSION['usr_email'];


 //if (isset($_POST['address'])) {
	$tag = $_POST['tag_line'];
	$addr = $_POST['address'];
	$about = $_POST['about'];
	$web = $_POST['web'];
	$fb = $_POST['fb'];
	$twt = $_POST['twt'];


	$qry = "SELECT * FROM `user_info` where email='$email';";

	$res = mysqli_query($conn, $qry);

	$num = mysqli_num_rows($res);

	if ($num >= 1) {
		$stmt = "UPDATE `user_info` SET `email`='$email', `tag_line`='$tag', `address`='$addr', `about`='$about', `web`='$web', `fb`='$fb', `twt`='$twt' WHERE email='$email';";


		if (mysqli_query($conn,$stmt)) {

			header('location: profile.php');
			$_SESSION['edit_msg'] = "Successfully Updated!";
			$_SESSION['edit_msg_type'] = "success";
		}else{
			header('location: profile.php');
			$_SESSION['edit_msg'] = "Server problem. We are SORRY! 😌";
			$_SESSION['edit_msg_type'] = "warning";
		}
				
	}else if ($num < 1) {
		$stmt = "INSERT INTO `user_info`(`u_id`, `email`, `tag_line`, `address`, `about`, `web`, `fb`, `twt`) VALUES (null,'$email','$tag','$addr','$about','$web','$fb','$twt');";


		if (mysqli_query($conn,$stmt)) {

			header('location: profile.php');
			$_SESSION['edit_msg'] = "Successfully Updated!";
			$_SESSION['edit_msg_type'] = "success";
		}else{
			header('location: profile.php');
			$_SESSION['edit_msg'] = "Server problem. We are SORRY! 😌";
			$_SESSION['edit_msg_type'] = "warning";
		}
				
	}else{
		header('location: profile.php');
		$_SESSION['edit_msg'] = "Something Went Wrong";
		$_SESSION['edit_msg_type'] = "info";
	}

 //}

?>
