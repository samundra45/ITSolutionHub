<head>
  <link rel="stylesheet" href="css/posted_job.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
    
    <div class="bid_list">
    <div class="container_">
        
        <ul class="cards">
          <?php 
          while ( $rows1 = mysqli_fetch_assoc($qry1)){ ?>
            <li class="carddvjjs">
                <div class="card__ card-1">
                    <div class="work-rate">
                        <?php if ($rows1["negotiable"] == 1){?>
                            <p class="yes">Negotiable</p>
                        <?php }else{?>
                            <p class="no">Fixed budget</p>
                        <?php } ?>
                        <p class="budget"><?php echo $rows1["max_budget"] . " BDT"?></p>
                    </div>
                    <div class="pos-nd-loc">
                    <p class="job-title"><?php echo $rows1["prblm_name"]?></p>
                    <p class="location">Phone no.:<?php echo " ".$rows1["phone_no"]?></p>
                    <p class="location"><?php echo $rows1["street"].", ". $rows1["city_name"]?></p>
                    </div>
                    <div class="tags">
                    <button><?php echo $rows1["prblm_type"]?></button>
                    <button><?php echo $rows1["dev_type"]?></button>
                    <button><?php echo $rows1["dev_model"]?></button>
                    <!-- <button>web design</button>
                    <button>+4</button> -->
                    </div>
                    <p class="job-desc">
                        <?php echo $rows1["details"]?>
                    </p>
                    <a class="view_job_a" href="./job_view.php?id=<?php echo $rows1["job_id"]?>"><p class="job-toggle" id="viewjob">VIEW JOB</p></a>
                    <?php
                      if ($rows1['job_done']==1 and $rows['type']==1) {?>
                      <div class="x">
                        <a href="be_accept_job.php?job_id=<?php echo $rows1["job_id"]?>&e_email=<?php echo $rows1["assigned_email"]?>" class="acc_">Job Accept</a>
                      </div>
                    <?php  } elseif( $rows['type']==2 and $rows1['job_done']==0){?>
                      <div class="x">
                        <a href="be_submit_job.php?job_id=<?php echo $rows1["job_id"] ?>"  class="acc_">Submit Job</a>
                      </div>
                    <?php }if ($rows1['job_accept']==0 and $rows['type']==2 and $rows1['job_done']!=0) {?>
                         <div class="x">
                        <a href="" style="background-color: gray;" class="acc_">Job Submitted</a>
                      </div>
                      <?php } ?>
                    <!-- <div class="action_button">
                      <a href="">PAY</a>
                      <a href=""></a>
                    </div> -->
                </div>  
              <!-- <span class="tag_bid"><?php //echo "৳ ".$rows1["name"]; ?></span>
              <div class="card_padding">
                <div>
                    
                    <!-- <img src="<?php //echo $rows1["url"]; ?>" class="thumbnail"/> -->
                    <!-- <h3 class="card-title"><?php //echo $rows1["name"]; ?></h3> -->
                    <!-- <div class="card-content"> -->
                        <p><?php //echo $rows1["name"]; ?></p>
                    <!-- </div> -->
                <!-- </div> -->
                <!-- <div class="card-link-wrapper"> -->
                    <!-- <a href="./.php?expert_id=<?php echo $rows1["id"];?>" class="card-link">Hire</a> -->
                <!-- </div> -->
              <!-- </div> -->
            </li>
          <?php } ?>
        </ul>
    </div>
  </div>  
<!-- bid list  end-->