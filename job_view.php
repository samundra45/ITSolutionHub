<?php 
  session_start();
  if (!isset($_GET['id'])) {
    header('location: work.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job view</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/job_view.css" />
    <link rel="stylesheet" href="css/alert.css" />
    <link rel="stylesheet" href="css/bid_list.css" />
    <link rel="shortcut icon" href="img/favicon_.png" />
    <!-- <link rel="stylesheet" href="css/login.css" /> -->
  </head>
  <body>
    <?php 
      include('nav.php'); 
      include('dbConnect.php');

        $job_id = $_GET['id'];
        // echo $job_id;
        $sql = "SELECT * FROM jobs WHERE job_id = $job_id";
        $qry = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_assoc($qry);
    ?>

  <div class="body_">
    <div class="section__header">
      <?php
          if (isset($_SESSION['edit_msg'])){ ?>
              <div class="alert alert-<?=$_SESSION['edit_msg_type']?>">
                  <?php
            echo $_SESSION['edit_msg'];
            unset($_SESSION['edit_msg']);
            unset($_SESSION['edit_msg_type']);
          ?>
              </div>
          <?php }?>
      <div class="title__container">
        <h2 class="heading">Problem:</h2>
        <h1><span>Title</span> <?php echo ": ".$rows["prblm_name"]; ?></h1>
        <h1><span>Details:</span> </h1>
        <h1><?php echo $rows["details"]; ?></h1>
        <h1><span>Problem Type</span> <?php echo ": ".$rows["prblm_type"]; ?></h1>
        <h1><span>Devices Type</span> <?php echo ": ".$rows["dev_type"]; ?></h1>
        <h1><span>Devices Model</span> <?php echo ": ".$rows["dev_model"]; ?></h1>
      </div>

      <br><br>
      <div class="title__container">
        <h2 class="heading">Location:</h2>
        <h1><span>Street</span> <?php echo ": ".$rows["street"]; ?></h1>
        <h1><span>Street No.</span> <?php echo ": ".$rows["street_number"]; ?></h1>
        <h1><span>Postal Code</span> <?php echo ": ".$rows["post_code"]; ?></h1>
        <h1><span>City</span> <?php echo ": ".$rows["city_name"]; ?></h1>
      </div>

<?php 
        if(isset($_SESSION['usr_email'])){
          $email = $_SESSION['usr_email'];
          // echo $email;

          $sql_ = "SELECT * FROM users WHERE email = '$email'";
          $qry_ = mysqli_query($conn,$sql_);
          $rows_ = mysqli_fetch_assoc($qry_);?>

      <br><br>
      <div class="title__container">
        <h2 class="heading">Budget:</h2>
        <h1><span>Maximum Budget</span> <?php echo ": ".$rows["max_budget"]; ?></h1>
        <h1><span>Negotiable:</span> 
        <?php if($rows["negotiable"] == 1){
          echo "Yes";
        }else {
          echo "No";
        } ?></h1>
        
       
        <?php if($rows_["type"] == 1) {?>
          <div class="dp">
          <a href="./be_delete_posted_job.php?job_id=<?php echo $job_id?>" class="delete_post">DELETE</a>
        </div>
        <?php } ?>
         <br> <br>
      </div>

      
          <?php if($rows_["type"] == 2) {?>
              <br><br><br>
            <?php  include('bid_form.php'); 
            }
        }else{
          include('bid_form.php');
        }  
        ?>
    </div>
  </div>
  <?php 
    if(isset($_SESSION['usr_email'])){
      if($rows_["type"] == 1) {?>
      
        <?php include('bid_list.php'); 
        }
    }  
    ?>

  </body>
</html>
