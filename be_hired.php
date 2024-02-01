<?php
	session_start();
	include('dbConnect.php');
     if (!isset($_SESSION['login'])) {
         header('location: login.php');
     }

           echo
           "
           <script>
             alert('Invalid Image Extension');
             document.location.href = './profile.php';
           </script>
           ";
if (isset($_POST)) {
    $hemail = $_SESSION["usr_email"]; //he will hire
    // echo $hemail;
    $eemail = $_GET["eemail"];  //he would be hired
    // echo $eemail;
    $demand = $_POST["amount"];
    $note = $_POST["note"];


    $stmt = "INSERT INTO `hire_user`(`h_id`, `e_email`, `h_email`, `demand`, `notes`) VALUES (null,'$eemail','$hemail','$demand','$note')";


    if (mysqli_query($conn,$stmt)) {
        header('location: talent.php');
         $_SESSION['login'] = true;
         $_SESSION['hire_message'] = "Hired";
         $_SESSION['usr_email'] = $email;
         $_SESSION['hire_msg_type'] = "success";
    }else{
        $_SESSION['hire_message'] = "Password not matched. 😌";
        $_SESSION['hire_msg_type'] = "info";
        header('location: hire.php');
	}

}

?>
