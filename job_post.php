<?php 
    session_start();
    if (!isset($_SESSION['login'])) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Job Post</title>
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="css/post.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/alert.css">
  <link rel="shortcut icon" href="img/favicon_.png" />
<!-- <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'><link rel="stylesheet" href="./style.css"> -->

</head>
<body>
  <?php 
    include('nav.php');
    include('dbConnect.php');
  ?>


  <form action="be_job_post.php" method="POST">
    <div>
      <?php
        if (isset($_SESSION['jp_message'])){ ?>
            <div class="alert alert-<?=$_SESSION['jp_msg_type']?>">
      <?php
        echo $_SESSION['jp_message'];
        unset($_SESSION['jp_message']);
      ?>
        </div>
      <?php }?>
    </div>
    <!--  General -->
    <div class="form-group">
      <h2 class="heading">Problem Description</h2>
      <div class="controls">
        <input type="text" id="prblm_name" class="floatLabel" name="prblm_name" required="">
        <label for="name">Problem Title</label>
      </div>
      <div class="grid">
          <br>
          <div class="controls">
            <textarea name="details" class="floatLabel" id="details" required=""></textarea>
            <label for="details">Describe your Problem in details </label>
          </div>
      </div>  


       <div class="controls">
        <input type="text" id="email" class="floatLabel" name="email">
        <label for="email">Email</label>
      </div>       
      <div class="controls">
        <input type="tel" id="phone" class="floatLabel" name="phone">
        <label for="phone">Phone</label>
      </div> 
      <div class="grid">
          <div class="col-1-3 col-1-3-sm">
            <div class="controls">
              <i class="fa fa-sort"></i>
              <select class="floatLabel" name="prblm_type_" required="">

                <option value="Hardware" selected>Hardware</option>
                <option value="Software">Software</option> 
                <option value="Others">Others</option>
              </select> <!-- <i class="fas fa-sort-size-up-alt"></i> -->
              <label for="fruit">&nbsp;&nbsp;Problem Types</label>
            
            </div>
          </div>
          <div class="col-1-3 col-1-3-sm">
            <div class="controls">
              <i class="fa fa-sort"></i>
              <select class="floatLabel" name="dev_name_" required="">
        
                 <option value="Desktop" selected>Desktop</option>
                <option value="Laptop">Laptop</option> 
                <option value="Mobile">Mobile</option>
              </select>
              <label for="fruit">Devices Type</label>
            </div>
          </div>

          <div class="col-1-3 col-1-3-sm">
            <div class="controls">
              <input type="text" id="dev_model" class="floatLabel" name="dev_model" required="">
              <label for="dev_model">Devices Model</label>
            </div>  
          </div>
        </div>

      <br><br>
      <h2 class="heading">Contact & Location</h2>
        <div class="grid">
          <div class="col-2-3">
            <div class="controls">
            <input type="text" id="street" class="floatLabel" name="street" required="">
            <label for="street">Street</label>
            </div>          
          </div>
          <div class="col-1-3">
            <div class="controls">
              <input type="number" id="street-number" class="floatLabel" name="street-number" required="">
              <label for="street-number">Street Number</label>
            </div>          
          </div>
        </div>
        <div class="grid">
          <div class="col-2-3">
            <div class="controls">
              <i class="fa fa-sort"></i>
              <select class="floatLabel" name="city_name_" required="">

        
                  <option value="Dhaka" selected>Dhaka</option>
                  <option value="Khulna">Khulna</option> 
                  <option value="Rajshahi">Rajshahi</option> 
                  <option value="Barishal">Barishal</option> 
                  <option value="Chittagong">Chittagong</option> 
                  <option value="Jessore">Jessore</option> 
              </select>
              <label for="fruit">City</label>
            </div>
          </div>
        </div>

          
            <div class="controls">
              <input type="text" id="post-code" class="floatLabel" name="post-code" required="">
              <label for="post-code">Post Code</label>
            </div>
             

         <!-- <div class="controls">
            <input type="text" id="phone_no" class="floatLabel" name="phone_no" required="">
            <label for="phone_no">Phone No.</label>
          </div>
        </div>-->

        <div class="controls">
          <input type="text" id="phone_no" class="floatLabel" name="phone_no" value="+880 ">
          <label for="phone_no">Phone no.</label>
        </div>
    </div>

    <br>
    <!--  Details -->
    <div class="form-group">
      <h2 class="heading">Payment Details</h2>
      <div class="grid">
      <div class="col-1-2 col-1-4-sm">
        <div class="controls">
          <input type="number" id="max_budget" class="floatLabel" name="max_budget" required="">
          <label for="arrive" class="label-date"><i class="fa fa-dollar"></i>&nbsp;&nbsp;Maximum Budget (BDT)</label>
        </div>      
      </div>
      <div class="col-1-4 col-1-4-sm">
        <div class="controls">
          <i class="fa fa-sort"></i>
          <select class="floatLabel" name="negotiable" required="">
              <option value="1" selected>Yes</option>
              <option value="0">No</option>
          </select>
          <label for="fruit">Is it Negotiable?</label>
        </div>      
      </div>
        </div>

        <button type="submit" value="Submit" class="col-1-4">Submit</button>
      </div>
    </div> <!-- /.form-group -->
  </form>
<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!-- <script src='js/job_posts.js'></script> -->
<script src='//raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery-ui-autocomplete.js'></script>
<script src='//raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.js'></script>
<script src='//raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.min.js'></script><script  src="./script.js"></script>

<script>
  (function ($) {
    function floatLabel(inputType) {
      $(inputType).each(function () {
        var $this = $(this);
        $this.focus(function () { //focused
          $this.next().addClass("active");
        });
        // $this.blur(function () {
        //   if ($this.val() === "" || $this.val() === "blank") {
        //     $this.next().removeClass();
        //   }
        // });
      });
    }
    floatLabel(".floatLabel");
  })(jQuery);
</script>

</body>
</html>
