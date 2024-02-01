<div class="title__container apply">
                <?php
                        if (isset($_SESSION['bid_message'])){ ?>
                        <div class="alert alert-<?=$_SESSION['bid_msg_type']?>">
                    <?php
                        echo $_SESSION['bid_message'];
                        unset($_SESSION['bid_message']);
                        unset($_SESSION['bid_msg_type']);
                    ?>
                        </div><br>
                    <?php }?>
                <h2 class="heading">Apply on this Job:</h2>
                    <form action="be_bid.php" class="form" method="POST">
                    
                    <?php if ($rows["negotiable"] == 0) { ?>
                      <div class="form__div">
                        <input type="number" class="form__input" placeholder=" " name="amount" >
                        <label for="" class="form__label" style="color:gray;">Your Demand   ---you can demand less or equal <?php echo $rows["max_budget"]?> BDT---</label>
                      </div>
                    <?php }else{ ?>
                      <div class="form__div">
                        <input type="number" class="form__input" placeholder=" " name="amount">
                        <label for="" class="form__label">Your Demand?</label>
                      </div>

                    <?php } ?>

                    
                    

                    <div class="form__div">
                        <input type="text" class="form__input" placeholder=" " name="note">
                        <label for="" class="form__label">Notes</label>
                        <input type="hidden" class="form__input" placeholder=" " name="job_id" value="<?php echo $rows["job_id"]?>">
                        
                    </div>
                    <!-- <p>Forget password... <a href="forget_password.php">Reset</a> </p><br> -->

                    <input type="submit" class="form__button" value="SUBMIT"><br>
                    
                </form>
              </div>   