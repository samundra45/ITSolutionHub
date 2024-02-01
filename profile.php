<?php 
        session_start();
        if (!isset($_SESSION['login'])) {
            header('location: login.php');
        }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="shortcut icon" href="img/favicon_.png" />
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/alert.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer_.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/bid_list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/7a76d52362.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php 
        include('nav.php'); 
        include('dbConnect.php');

        $email = $_SESSION['usr_email'];
        // echo $email;
        $sql = "SELECT* FROM users natural join pro_img natural join user_info WHERE email = '$email' ";
        $qry = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_assoc($qry);    
    ?>

    <div class="container-profile">
        <div class="con1">
            <?php include('side_bar.php')?>
        </div>

        <div class="con2">
            <div class="see_all">
            <?php 
                if ($rows['type'] == 1) {
                    $sql1 = "SELECT* FROM jobs WHERE email = '$email' ";?> 
                    <h2 class="heading">My Posted Job</h2><a href="see_all_job.php">SEE ALL</a></div>
                <?php }elseif($rows['type'] == 2){
                    $sql1 = "SELECT* FROM jobs WHERE assigned_email = '$email' ";?> 
                    <h2 class="heading">My Onging Job</h2><a href="see_all_job.php">SEE ALL</a></div>
                <?php }
                    $qry1 = mysqli_query($conn,$sql1);?>
                <?php include('posted_job.php');
                
                    if($rows['type'] == 2) {?>
                    
                        <br><br>
                        <div class="see_all">
                        <h2 class="heading">My Hiring Offers</h2><a href="see_all_hiring.php">SEE ALL</a></div>
                        <?php include('hiring_list.php');
                    }elseif($rows['type'] == 1){?>
                        <br><br>
                        <div class="see_all">
                        <h2 class="heading">My Hiring Request</h2><a href="see_all_hiring.php">SEE ALL</a></div>
                        <?php include('hiring_list.php');
                    }?>
        </div>

        <div class="footer">
            
            <?php include('footer_.php'); ?>
        </div>
        

    </div>
    
</body>

</html>