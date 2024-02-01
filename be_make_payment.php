<?php
	session_start();
	include('dbConnect.php');
    $email = $_SESSION['usr_email'];


if (isset($_POST)) {
	$h_id = $_POST['h_id'];
	$bkash = $_POST['bkash_no'];
	$amount = $_POST['amount'];

    // echo $h_id.$bkash.$amount;


	$qry = "SELECT * FROM `hire_user` where h_id='$h_id';";

	$res = mysqli_query($conn, $qry);

	$num = mysqli_num_rows($res);
    //alert($num);

	if ($num >= 1) {
		$stmt = "UPDATE `hire_user` SET `customer_payment`='$amount', `bkash_no`='$bkash' WHERE h_id='$h_id';";


		if (mysqli_query($conn,$stmt)) {

			header('location: profile.php');
			$_SESSION['edit_msg'] = "Successfully Paid";
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

}

?>
