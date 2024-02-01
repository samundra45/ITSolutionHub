<?php
	session_start();
	include('dbConnect.php');
    if (!isset($_SESSION['login'])) {
        header('location: login.php');
    }

          
if (isset($_GET)) {
     $hemail = $_SESSION["usr_email"]; //he will hire
     echo $hemail;
    $hiring_id = $_GET["hiring_id"];  //he would be hired
     echo $eemail;
     $demand = $_POST["amount"];
     $note = $_POST["note"];


    $stmt = "UPDATE `hire_user` SET `expert_accept`=1 WHERE h_id = '$hiring_id'";


    if (mysqli_query($conn,$stmt)) {
        header('location: profile.php');
        $_SESSION['edit_msg'] = "Your acceptance is stored.";
        $_SESSION['edit_msg_type'] = "success";
    }else{
        $_SESSION['edit_msg'] = "Server Problem";
        $_SESSION['edit_msg_type'] = "info";
        header('location: profile.php');
	}

}

?>
