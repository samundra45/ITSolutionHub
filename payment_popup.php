<head>
  <link rel="stylesheet" href="css/payment_popup.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<!-- <div class="edit_btn">
                            <a class="button" href="#popup1">EDIT PROFILE</a>
                        </div> -->


<!-- edit profile pop up -->
            <div id="payment_pop" class="overlay">
                <div class="popup">
                    <h2>PAYMENT</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <img src="./img/ico/bkash.png" alt="">
                        <form action="<?php echo $payment_be ?>" class="for" method="POST" autocomplete="off">
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="h_id" id="h_id_" autocomplete="off" style="display: none;">
                                <input type="text" class="form__input" placeholder=" " name="job_id" id="job_id" autocomplete="off" style="display: none;">
                                <input type="text" class="form__input" placeholder=" " name="bidder_mail" id="bidder_mail" autocomplete="off" style="display: none;">
                                <input type="number" class="form__input" placeholder=" " name="bkash_no" autocomplete="off">
                                <label for="" class="form__label">ENTER YOUR BKASH NO.</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="password" class="form__input" placeholder=" " name="password" autocomplete="off">
                                <label for="" class="form__label">ENTER YOUR PASSWORD</label>
                            </div>

                            <div class="form__div" style="margin-top: 40px">
                                <input id="input_amount" type="text" class="form__input" placeholder=" " name="amount" autocomplete="off" style="display: none;">
                                <input id="input_amount_" type="text" class="form__input" placeholder=" " name="amount_" disabled="">
                                <label for="" class="form__label">Amount (BDT)</label>
                            </div>
                            <!-- href="#payment_details" -->
                            <input type="submit" class="form__button_PAY" value="PAY"><br>
                        </form>
                        <div class="amount_detail">
                            <div id="__details">
                                <section class="line-items">
                                    <table class="items--table">
                                    <thead>
                                        <tr>
                                            <td>Item</td>
                                            <td>Total BDT</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Job price</td>
                                            <td id="taka"></td>
                                        </tr>
                                        <tr>
                                            <td>Service Charge (5%)</td>
                                            <td id="s_charge">0</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td id="total">$100</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </section>
                            </div>
                            
                            <button onclick="seeDetails()" class="see-more-btn" id="show">Show payment details</button>        
                        </div>
                        
                    </div>
                </div>
            </div>

            <script>
                var i=0;
                    function seeDetails(){
                        if(!i){
                            document.getElementById("__details").style.
                                display = "inline";
                            document.getElementById("show").innerHTML="Hide Payment Details";
                            i=1;
                        }else{
                            document.getElementById("__details").style.
                                display = "none";
                            document.getElementById("show").innerHTML="Show Payment Details";
                            i=0;
                        }
                    }
            </script>


            