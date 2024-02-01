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


    if (mysqli_query($conn,$stmt)) {
        header('location: see_all_job.php');
        $_SESSION['sa_msg'] = "Succesful Deletion.";
        $_SESSION['sa_msg_type'] = "success";
    }else{
        $_SESSION['sa_msg'] = "Server Problem";
        $_SESSION['sa_msg_type'] = "info";
        header('location: see_all_job.php');
	}

}else{
    $_SESSION['sa_msg'] = "Data isn't pass perfectly";
    $_SESSION['sa_msg_type'] = "danger";
    header('location: see_all_job.php');
}

?>
