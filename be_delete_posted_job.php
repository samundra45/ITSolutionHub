<?php
	session_start();
	include('dbConnect.php');
    if (!isset($_SESSION['login'])) {
        header('location: login.php');
    }

          
if (isset($_GET)) {

    echo 
    "
        <script>
        alert('Are you sure?');
        </script>
    ";
    
    $job_id = $_GET["job_id"]; 


    $stmt = "DELETE FROM `jobs` WHERE job_id = '$job_id'";
    $stmt2 = "DELETE FROM `job_bid` WHERE job_id = '$job_id'";

    if (mysqli_query($conn,$stmt)) {
        mysqli_query($conn,$stmt2);
        header('location: profile.php');
        $_SESSION['edit_msg'] = "Succesful Deletion.";
        $_SESSION['edit_msg_type'] = "success";
    }else{
        $_SESSION['edit_msg'] = "Server Problem";
        $_SESSION['edit_msg_type'] = "info";
        header('location: profile.php');
	}

}else{
    $_SESSION['edit_msg'] = "Data isn't pass perfectly";
    $_SESSION['edit_msg_type'] = "danger";
    header('location: profile.php');
}

?>
