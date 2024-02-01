<div class="info_sidebar">
                <div class="profile-sidebar">
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
                    <div class="profile_userpic">
                        <img src="<?php echo $rows["url"]?>" class="imag" alt="">
                        <form id="test_form" class="test_form" action="up.php" method="POST" enctype="multipart/form-data">
                            <div class="round">
                                <?php $email = $rows["email"]; ?>
                                <input type="hidden" name="email" value="<?php echo $email; ?>">
                                <input type="file" name="file" id="pic" accept=".jpg, .jpeg, .png">
                                <i class="fa fa-camera"></i>
                            </div>
                        </form>
                    </div>
                    <script type="text/javascript">
                    document.getElementById("pic").onchange = function() {
                        alert('Are you sure?');
                        document.getElementById('test_form').submit();
                    }
                    </script>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php
                              echo $rows["name"];
                            ?>
                        </div>
                        <div class="profile-usertitle-job">
                            <?php echo $rows["tag_line"]; ?>
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <!-- <div class="profile-userbuttons">
                        <button type="button" class="btn btn_green">Follow</button>
                        <button type="button" class="btn btn_blue">Message</button>
                    </div> -->
                    <!-- END SIDEBAR BUTTONS -->
                    <div class="info_user">
                        <h4 class="profile-desc-title">From</h4>
                        <span class="profile-desc-text">
                            <?php echo $rows["address"]; ?></span>
                        <br /><br />
                        <h4 class="profile-desc-title">About</h4>
                        <span class="profile-desc-text">
                            <?php echo $rows["about"]; ?></span>
                        <br /><br />
                        <div class="flex">
                            <div class="socia_handler">
                                <a href="<?php echo $rows["web"]; ?>">
                                    <i class="fa fa-globe"></i>
                                    <!-- tareq.com -->
                                </a>
                            </div>
                            <div class="socia_handler">
                                <a href="<?php echo $rows["fb"]; ?>">
                                    <i class="fa fa-facebook"></i>
                                    <!-- @sheikh -->
                                </a>
                            </div>
                            <div class="socia_handler">
                                <a href="<?php echo $rows["twt"]; ?>">
                                    <i class="fa fa-twitter"></i>
                                    <!-- S.tareq -->
                                </a>
                            </div>
                        </div>
                        <br>
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-house"></i>
                                        Overview </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-user"></i>
                                        Account Settings </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-check-to-slot"></i>
                                        Tasks </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-solid fa-hand-holding-hand"></i>
                                        Help </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                        
                        <div class="stat">
                            <!-- STAT -->
                            <div class="profile_stat">
                                <div class="stat_div">
                                    <div class="uppercase profile-stat-title"> <?php echo $rows['earning']." ৳"; ?> </div>
                                    <div class="uppercase profile-stat-text"> Earning </div>
                                </div>
                        
                                <!-- <div class="stat_div">
                                    <div class="uppercase profile-stat-title"> 51 </div>
                                    <div class="uppercase profile-stat-text"> Ongoing </div>
                                </div>
                                <div class="stat_div">
                                    <div class="uppercase profile-stat-title"> 61 </div>
                                    <div class="uppercase profile-stat-text"> Cancelled </div>
                                </div> -->
                            </div>
                            <!-- END STAT -->
                        </div>
                        <div class="edit_btn">
                            <a class="button" href="#popup1">EDIT PROFILE</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit profile pop up -->
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h2>Edit Profile</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <form action="be_edit_profile.php" class="for" method="POST">
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="tag_line" value="<?php echo $rows["tag_line"]; ?>">
                                <label for="" class="form__label">Your tag line</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="address" value="<?php echo $rows["address"]; ?>">
                                <label for="" class="form__label">Where are you from?</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input rows="4" cols="50" type="text" class="form__input" placeholder=" " name="about" value="<?php echo $rows["about"]; ?>">
                                <label for="" class="form__label">Tell us about yourself</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="web" value="<?php echo $rows["web"]; ?>">
                                <label for="" class="form__label">Website Url</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="fb" value="<?php echo $rows["fb"]; ?>">
                                <label for="" class="form__label">Facebook Url</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="twt" value="<?php echo $rows["twt"]; ?>">
                                <label for="" class="form__label">Twitter Url</label>
                            </div>
                            <input type="submit" class="form__button" value="UPDATE"><br>
                        </form>
                    </div>
                </div>
            </div>