<?php
	session_start();
	include('dbConnect.php');


    if (isset($_POST)) {
        $email = $_SESSION['usr_email'];
        $amount = $_POST['amount'];
        $note = $_POST['note'];
        $job_id = $_POST['job_id'];


        $stmt = "INSERT INTO `job_bid`(`b_id`, `amount`, `note`, `job_id`, `bidder_email`) VALUES (null,'$amount','$note','$job_id', '$email');";
        

        $url = 'location: job_view.php?id='.$job_id;
        if (mysqli_query($conn,$stmt)) {
            header($url);
            $_SESSION['bid_message'] = "Your bid is successfully submitted.";
            $_SESSION['bid_msg_type'] = "success";
        }else{
            header($url);
            $_SESSION['bid_message'] = "Server problem. We are SORRY! 😌";
            $_SESSION['bid_msg_type'] = "warning";
        }
                
    }else{
        header($url);
    }
?>
