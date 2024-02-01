<?php
	session_start();
	include('dbConnect.php');
    $email = $_SESSION['usr_email'];


if (isset($_POST)) {
	$job_id = $_POST['job_id'];
    $bidder_email = $_POST['bidder_mail'];
	$bkash = $_POST['bkash_no'];
	$amount = $_POST['amount'];
	$se = $amount*0.05;
    // echo $job_id.$bkash.$amount.$bidder_email;


	$qry = "SELECT * FROM `jobs` where job_id='$job_id';";

	$res = mysqli_query($conn, $qry);

	$num = mysqli_num_rows($res);
    //alert($num);

	if ($num >= 1) {
		$stmt = "UPDATE `jobs` SET `customer_payment`='$amount', `bkash_no`='$bkash', `assigned_email`='$bidder_email', `cp_date`= CURRENT_TIMESTAMP WHERE job_id='$job_id';";


		if (mysqli_query($conn,$stmt)) {

			//$sql = "UPDATE `users_admin` SET `earning`=`earning`+'$se';";
			//$res = mysqli_query($conn, $sql);
// echo "Success";
			header('location: job_view.php?id='.$job_id);
			$_SESSION['edit_msg'] = "Successfully Paid & hired";
			$_SESSION['edit_msg_type'] = "success";
		}else{
            // echo "fail-1";
			header('location: job_view.php?id='.$job_id);
			$_SESSION['edit_msg'] = "Server problem. We are SORRY! 😌";
			$_SESSION['edit_msg_type'] = "warning";
		}
				
	}else{
        // echo "fail-2";
		header('location: job_view.php?id='.$job_id);
		$_SESSION['edit_msg'] = "Something Went Wrong";
		$_SESSION['edit_msg_type'] = "info";
	}

}

?>
