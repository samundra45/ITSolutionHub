<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="..//css/header.css">
    <link rel="stylesheet" href="..//css/footer_.css">
    <link rel="stylesheet" href="..//css/alert.css">
    <link rel="stylesheet" href="..//css/login.css">
    <link rel="shortcut icon" href="img/favicon.png" />
</head>
<body>
    <?php 
        session_start();
        include('nav.php'); 
    ?>
    
    <div class="l-form" style="min-height: 100vh;">
        <form action="be_user_login.php" class="form" method="POST">
            <!-- <div class="alert alert-info" role="alert">
  This is a primary alert—check it out!
</div> -->
            <?php
                if (isset($_SESSION['adm_login_msg'])){ ?>
                <div class="alert alert-<?=$_SESSION['adm_login_msg_type']?>">
            <?php
                echo $_SESSION['adm_login_msg'];
                unset($_SESSION['adm_login_msg']);
            ?>
                </div>
            <?php }?>

            <h3 class="form__title">Login</h3>

            <div class="form__div">
                <input type="text" class="form__input" placeholder=" " name="mail">
                <label for="" class="form__label">Email</label>
            </div>

            <div class="form__div">
                <input type="password" class="form__input" placeholder=" " name="pass">
                <label for="" class="form__label">Password</label>
            </div>
            <p>Not register yet?... <a href="signup.php">Signup</a> </p><br>

            <input type="submit" class="form__button" value="Sign In"><br>
            
        </form>

        
    </div>
    <?php include('footer_.php'); ?>
</body>
</html>


      

      
