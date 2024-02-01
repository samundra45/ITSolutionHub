<?php 
    session_start();
    include('dbConnect.php');
    if (!isset($_GET['expert_id'])) {
    header('location: login.php');
  }


    $expert_id = $_GET["expert_id"];
    // echo $t_id;

    $sql = "SELECT* FROM users natural join user_info natural join pro_img WHERE id = $expert_id";
    $qry = mysqli_query($conn,$sql);
    $rows = mysqli_fetch_assoc($qry)
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/hire.css" />
    <link rel="stylesheet" href="./css/post.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/job_view.css" />
  </head>
  <body>
    
    <?php 
    // include('nav.php');
    ?>

    <div class="body__">
    <div class="section__header">
      <div class="name__container">
        <h1><?php echo $rows["name"];?></h1>
        <p><?php echo $rows["tag_line"];?></p>
        <br><br>
        <p><?php echo $rows["address"];?></p>
      </div>
      <div class="image__container">
        <img
          src="<?php echo $rows["url"];?>"
          alt=""
        />
      </div>
    </div>
    <div class="section__details">
      <div class="info__container">
        <div class="location__container"></div>
        <div class="age__container"></div>
      </div>
      <hr />

      <div class="title__container apply">
                <?php
                        if (isset($_SESSION['hire_message'])){ ?>
                        <div class="alert alert-<?=$_SESSION['hire_msg_type']?>">
                    <?php
                        echo $_SESSION['hire_message'];
                        unset($_SESSION['hire_message']);
                        unset($_SESSION['hire_msg_type']);
                    ?>
                        </div><br>
                    <?php }?>
                <h2 class="heading">Hire him/her</h2>
                    <form action="be_hired.php?eemail=<?php echo $rows["email"];?>" class="form" method="POST">
                      <div class="form__div">
                        <input type="number" class="form__input" placeholder=" " name="amount" >
                        <label for="" class="form__label" style="color:gray;">Your Offer (BDT) </label>
                      </div>             
                    

                    <div class="form__div">
                        <input type="text" class="form__input" placeholder=" " name="note">
                        <label for="" class="form__label">Notes</label>
                        
                    </div>
                    <!-- <p>Forget password... <a href="forget_password.php">Reset</a> </p><br> -->

                    <input type="submit" class="form__button" value="SUBMIT"><br>
                    
                </form>
              </div>   
      </div>
    <?php
      // include('bid_list.php'); 
    ?>
  </body>
</html>
