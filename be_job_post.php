<?php
	session_start();
	include('dbConnect.php');
    $email = $_SESSION['usr_email'];


if ($_POST) {
	$prblm_name = $_POST['prblm_name'];
	$phone_no = $_POST['phone_no'];
	$details = $_POST['details'];
	$prblm_type = $_POST['prblm_type_'];
	$dev_type = $_POST['dev_name_'];
	$dev_model = $_POST['dev_model'];

	$street = $_POST['street'];
	$street_number = $_POST['street-number'];
	$city_name = $_POST['city_name_'];
	$post_code = $_POST['post-code'];

	$max_budget = $_POST['max_budget'];
	$negotiable = $_POST['negotiable'];


	$stmt = "INSERT INTO `jobs`(`job_id`, `email`,`phone_no`, `prblm_name`, `details`, `prblm_type`, `dev_type`, `dev_model`, `street`, `street_number`, `city_name`, `post_code`, `max_budget`, `negotiable`) VALUES (null,'$email', '$phone_no', '$prblm_name','$details','$prblm_type','$dev_type','$dev_model','$street','$street_number','$city_name','$post_code','$max_budget','$negotiable');";


	if (mysqli_query($conn,$stmt)) {
        // echo "Done";
        header('location: job_post.php');
        $_SESSION['jp_message'] = "Your job is posted successfully";
        $_SESSION['jp_msg_type'] = "success";
    }else{
        header('location: job_post.php');
        $_SESSION['jp_message'] = "Failed to post!";
        $_SESSION['jp_msg_type'] = "danger";
    }
        
}

?>
