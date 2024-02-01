<!-- bid list -->
<?php 
  $payment_be = "be_make_payment_for_job.php";

  if($rows['type'] == 2) {
      $sql1 = "SELECT* 
                FROM hire_user 
                Left join pro_img on pro_img.email = hire_user.h_email
                Left join users on pro_img.email = users.email
                  WHERE e_email = '$email' and expert_accept=0";
      // $ep = "SELECT* FROM pro_img natural join users, job_bid WHERE job_id = $job_id and users.email = job_bid.email";
      $qry1 = mysqli_query($conn,$sql1);
  }elseif($rows['type'] == 1){
      $sql1 = "SELECT* 
                FROM hire_user 
                Left join pro_img on pro_img.email = hire_user.e_email
                Left join users on pro_img.email = users.email
                  WHERE H_email = '$email' and expert_accept=1 and customer_payment=0";
      // $ep = "SELECT* FROM pro_img natural join users, job_bid WHERE job_id = $job_id and users.email = job_bid.email";
      $qry1 = mysqli_query($conn,$sql1);
  }
      // $rows1 = mysqli_fetch_assoc($qry1);
  ?>
    <div class="bid_list">
    <div class="container_">
        <ul class="cards">
          <?php 
          while ( $rows1 = mysqli_fetch_assoc($qry1)){ 
            $taka = $rows1["demand"];?>
            <li class="card">
              <span class="tag_bid"><?php echo "৳ ".$taka ?></span>
              <div class="card_padding">
                <div>
                    
                    <img src="<?php echo $rows1["url"]; ?>" class="thumbnail"/>
                    <h3 class="card-title"><?php echo $rows1["name"]; ?></h3>
                    <div class="card-content">
                        <p><?php echo $rows1["notes"]; ?></p>
                    </div>
                </div>
                <!-- href="#payment_pop" -->
                <div class="card-link-wrapper">
                  <button id="<?php echo $rows1["demand"];?>" class="card-link pay_btn" bh="<?php echo $rows1["h_id"];?>">PAY</button>
                    
                    
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
    </div>
  </div>  

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script>

    $(document).ready(function(){
      $('.pay_btn').click(function () { 
        h_id = $(this).attr('id');

        hiring_id = $(this).attr('bh');
        // alert(hiring_id)

        s_charge = h_id*0.05;
        total = Number(h_id) + Number(s_charge);
        // alert(h_id)
        // $.ajax({
        //   url: "onload.php", 
        //   method: 'post',
        //   data: {hire_id: h_id},
        //   success: function(result){
        //   $("#taka").innerHTML=result;
        //   alert(result);
        //   },
        //   error: function (err, msg) { 
        //     alert(msg)
        //    }
        // });

        document.getElementById("input_amount").value=total;
        document.getElementById("input_amount_").value=total;
        document.getElementById("h_id_").value=hiring_id;
        document.getElementById("taka").innerHTML=h_id;
        document.getElementById("s_charge").innerHTML= s_charge;
        document.getElementById("total").innerHTML = total;
        location.href = "#payment_pop";
        
      });
    })
  </script>

  <?php include('payment_popup.php')?>
<!-- bid list  end-->