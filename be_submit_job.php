<?php
	session_start();
	include('dbConnect.php');
    $email = $_SESSION['usr_email'];


// if (isset($_POST['address'])) {
	$job_id = $_GET['job_id'];
    // echo $job_id;


	$qry = "SELECT * FROM `jobs` where job_id='$job_id';";

	$res = mysqli_query($conn, $qry);

	$num = mysqli_num_rows($res);

	if ($num >= 1) {
		$stmt = "UPDATE `jobs` SET `job_done`=1  WHERE job_id='$job_id';";


		if (mysqli_query($conn,$stmt)) {

			header('location: profile.php');
			$_SESSION['edit_msg'] = "Submitted";
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

// }

?>
