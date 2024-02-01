<header>
    <?php
        include('..//dbConnect.php');
        if(isset($_SESSION['adm_usr_email'])){
            $email = $_SESSION['adm_usr_email'];
            $sql = "SELECT* FROM users_admin WHERE email = '$email' ";
            $qry = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_assoc($qry);
        }
        
    ?>
        <div class="logo">
            <img src="img/favicon.png">
            <a href="..//index.php">IT Solution Hub</a> 
        </div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <div class="na_v_div">
            <ul>
                <li><a class="" href="..//index.php">Main Site</a></li>

                <!-- <li><a class="" href="./about.php">About</a></li> -->
        <?php        
            if (isset($_SESSION['adm_usr_email'])) {?>
                <li><a class="" href="./be_logout.php">LOGOUT</a></li>
             <!--   <a href="./profile.php"><img class="profile_ico" src="<?php echo $rows["url"]; ?>"></a>  -->
            </ul>
                
            <?php }else{  ?>
                <li><a class="login" href="./login.php">Login</a></li>
                <!-- <li><a class="login" href="./signup.php">Sign Up</a></li> -->
            </ul>
            <?php }  ?>
                
            
            <script type="text/javascript">
                const currentLocation = location.href;
                const menuItem = document.querySelectorAll('a');
                const menuLength = menuItem.length;

                for (let i = 0; i<menuLength; i++) {
                    if (menuItem[i].href === currentLocation) {
                        menuItem[i].className = "active";
                    }
                }

                hamburger = document.querySelector(".hamburger");
                hamburger.onclick = function () {
                    navBar = document.querySelector(".na_v_div");
                    navBar.classList.toggle("active");
                };
            </script>
        </div>
    </header>