<!-- bid list -->
<?php 
      $sql1 = "SELECT* 
                FROM job_bid 
                Left join pro_img on pro_img.email = job_bid.bidder_email
                Left join users on pro_img.email = users.email
                  WHERE job_id = $job_id";
       //$ep = "SELECT* FROM pro_img natural join users, job_bid WHERE job_id = $job_id and users.email = job_bid.email";
      $qry1 = mysqli_query($conn,$sql1);
       $rows1 = mysqli_fetch_assoc($qry1);
  ?>
    <div class="bid_list">
    <div class="container_">
        <h2 class="heading">Expert Bid on this job</h2>
        <ul class="cards">
          <?php 
          while ( $rows1 = mysqli_fetch_assoc($qry1)){ ?>
            <li class="card">
              <span class="tag_bid"><?php echo "৳ ".$rows1["amount"]; ?></span>
              <div class="card_padding">
                <div>
                    
                    <img src="<?php echo $rows1["url"]; ?>" class="thumbnail"/>
                    <h3 class="card-title"><?php echo $rows1["name"]; ?></h3>
                    <div class="card-content">
                        <p><?php echo $rows1["note"]; ?></p>
                    </div>
                </div>
                <div class="card-link-wrapper">
                    
                    <button id="<?php echo $rows1["amount"];?>" class="card-link pay_btn" bh="<?php echo $rows1["bidder_email"];?>"  ji="<?php echo $rows1["job_id"]?>">HIRE</button>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
    </div>
  </div>  
<!-- bid list  end-->
<!-- <a href="./.php?expert_id=<?php //echo $rows1["id"];?>" class="card-link">Hire</a>  ?>"-->

<?php 
$payment_be = "be_make_payment_for_job.php";
include('payment_popup.php'); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script>

    $(document).ready(function(){
      $('.pay_btn').click(function () { 
        h_id = $(this).attr('id');

        bidder_email = $(this).attr('bh');
        job_id = $(this).attr('ji');
        // alert(hiring_id)

        s_charge = h_id*0.05;
        total = Number(h_id) + Number(s_charge);

        document.getElementById("input_amount").value=Number(h_id);
        document.getElementById("input_amount_").value=total;
        document.getElementById("bidder_mail").value=bidder_email;
        document.getElementById("job_id").value=job_id;
        document.getElementById("taka").innerHTML=h_id;
        document.getElementById("s_charge").innerHTML= s_charge;
        document.getElementById("total").innerHTML = total;
        location.href = "#payment_pop";
        
      });
    })
  </script>