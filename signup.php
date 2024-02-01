<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/favicon_.png" />
</head>
<body>
    <?php 
        session_start();
        include('nav.php'); 
    ?>
    
            

    <div class="l-form" style="min-height: 100vh;">
        <form action="be_user_register.php" class="form" method="POST">
            <?php
                if (isset($_SESSION['message'])){ ?>
                    <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
                </div>
            <?php }?>

            <h3 class="form__title">Sign Up</h3>

            <div class="form__div">
                <input type="text" class="form__input" placeholder=" " name="name" required="">
                <label for="" class="form__label">Name</label>
            </div>

            <div class="form__div">
                <input type="text" class="form__input" placeholder=" " name="mail" required="">
                <label for="" class="form__label">Email</label>
            </div>

            <div class="form__div">
                <input type="password" class="form__input" placeholder=" " name="pass" required="">
                <label for="" class="form__label">Password</label>
            </div>

            <div class="form__div">
                <input type="password" class="form__input" placeholder=" " name="cpass" required="">
                <label for="" class="form__label">Confirm Password</label>
            </div>

            <div class="form__div">
                <div class="form__div bn">
                    <div class="form-group ">
                        <select class="form__input" id="sel1" required="" name="acc_type" required="">
                            <option hidden disabled selected value="">--Select Account Type--</option>
                            <option value="1">Client</option>
                            <option value="2">Expert</option>
                        </select>
                        <label for="" class="form__label">Account Type<span class="text-danger">*</span></label>
                    </div>
                </div>  
            </div>
            <!-- <p>Forget password... <a href="forget_password.php">Reset</a> </p><br> -->

            <input type="submit" class="form__button" name="insert" value="Register">
            
            <br>
        </form>
    </div>
</body>
</html>