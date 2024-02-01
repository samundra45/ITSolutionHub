<?php
	session_start();
	include('dbConnect.php');
    $email = $_SESSION['usr_email'];


// if (isset($_POST['address'])) {
	$job_id = $_GET['job_id'];
	$assigned = $_GET['e_email'];
    // echo $job_id;

    $r = "SELECT * FROM users where email = '$assigned'";
    $re = mysqli_query($conn, $r);

	$nu = mysqli_fetch_assoc($re);

    $a = $nu['earning'];
    $taka = (int)$a;
    // echo $taka;
    
 



	$qry = "SELECT * FROM `jobs` where job_id='$job_id';";

	$res = mysqli_query($conn, $qry);

	$num = mysqli_num_rows($res);
$nux = mysqli_fetch_assoc($res);

$b = $nux['customer_payment'];
$t = (int)$b;
$interest = ($t*.05);
 $taka += $t - ($t*.05);

//  echo $taka;

    $stmt2 = "UPDATE `users` SET `earning`= '$taka' WHERE email='$assigned';";
   // $stmt3 = "UPDATE `users_admin` SET `earning`= `earning`+'$interest';";


	if ($num >= 1) {
		$stmt = "UPDATE `jobs` SET `job_accept`=1, `ja_date`=CURRENT_TIMESTAMP WHERE job_id='$job_id';";


		if (mysqli_query($conn,$stmt)) {
            mysqli_query($conn,$stmt2);
         //   mysqli_query($conn,$stmt3);

			header('location: profile.php');
			$_SESSION['edit_msg'] = "Accepted";
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
