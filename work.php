<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job</title>
    <link rel="stylesheet" href="./css/work.css" />
    <!-- <link rel="stylesheet" href="./css/nav.css" /> -->
    <link rel="stylesheet" href="css/header.css" />
    <link rel="shortcut icon" href="img/favicon_.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
  <body>
    <?php 
        session_start();
        include('nav.php');
        // include('dbConnect.php');

        // echo $email;

        // $rows = mysqli_fetch_assoc($qry);    
    ?>

    <div class="container_jobs">
        <div class="divCat">

            <div class="category">
                <div class="head_"><h5 >Filter Jobs</h5></div>
                
                <hr>
                <h6 class= "text-info">Problem Category</h6>
                <ul class="list-group">
                    <?php
                        $sql = "SELECT DISTINCT prblm_type FROM jobs ORDER BY prblm_type";
                        $qry = mysqli_query($conn,$sql);
                        while ( $rows = mysqli_fetch_assoc($qry)){
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input product_check" value="<?php echo $rows['prblm_type']?>" id="prblm_type">
                                <?php echo $rows['prblm_type']?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

                <br><br>

                <h6 class= "text-info">Devices</h6>
                <ul class="list-group">
                    <?php
                        $sql = "SELECT DISTINCT dev_type FROM jobs ORDER BY dev_type";
                        $qry = mysqli_query($conn,$sql);
                        while ( $rows = mysqli_fetch_assoc($qry)){
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input product_check" value="<?php echo $rows['dev_type']?>" id="dev_type"> 
                                <?php echo $rows['dev_type']?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>

                <br><br>

                <h6 class= "text-info">Location</h6>
                <ul class="list-group">
                    <?php
                        $sql = "SELECT DISTINCT city_name FROM jobs ORDER BY city_name";
                        $qry = mysqli_query($conn,$sql);
                        while ( $rows = mysqli_fetch_assoc($qry)){
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input product_check" value="<?php echo $rows['city_name']?>" id="city_name"> 
                                <?php echo $rows['city_name']?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                
            </div>


        </div>

        <div class="divContent">
            <div class="head_"><h2 id="text_change">All Products</h2></div>
            
            <div class="wrapper_" id="result_">
                <?php 
                    $sql = "SELECT * FROM jobs";
                    $qry = mysqli_query($conn,$sql);
                while ( $rows = mysqli_fetch_assoc($qry)){ ?>
                <div class="card_ card_-1">
                    <div class="work-rate">
                        <?php if ($rows["negotiable"] == 1){?>
                            <p class="yes">Negotiable</p>
                        <?php }else{?>
                            <p class="no">Fixed budget</p>
                        <?php } ?>
                        <p class="budget"><?php echo $rows["max_budget"] . " BDT"?></p>
                    </div>
                    <div class="pos-nd-loc">
                        <p class="job-title"><?php echo $rows["prblm_name"]?></p>
                        <p class="location"><?php echo $rows["street"].", ". $rows["city_name"]?></p>
                    </div>
                    <div class="tags">
                    <button><?php echo $rows["prblm_type"]?></button>
                    <button><?php echo $rows["dev_type"]?></button>
                    <button><?php echo $rows["dev_model"]?></button>
                    <!-- <button>web design</button>
                    <button>+4</button> -->
                    </div>
                    <p class="job-desc">
                        <?php echo $rows["details"]?>
                    </p>
                    <br><br>
                    <a href="./job_view.php?id=<?php echo $rows["job_id"]?>"><p class="job-toggle" id="viewjob">VIEW JOB</p></a>
                </div>  
                <?php } ?>
            </div>
        </div>
    </div>
    
                        
    <script type="text/javascript">
        $(document).ready(function(){
            // alert("vmkdsfhn");
            $('.product_check').on('click', function(){
                // alert("check");
                var action = 'data';
                var prblm_type = get_filter_text('prblm_type');
                var dev_type = get_filter_text('dev_type');
                var city_name = get_filter_text('city_name');

                

                $.ajax({
                    url: 'fetch_job_search.php',
                    method: 'POST' ,
                    data: {action: action, prblm_type: prblm_type, dev_type: dev_type,city_name:city_name},
                    success:function(response) {
                        console.log(response);
                        $("#result_").html(response);
                        $("#text_change").text("Filtered Jobs");

                    }
                });
                   

            });

            function get_filter_text(text_id){
                var filterData = [];
                $('#'+text_id+':checked').each(function(){
                    filterData.push($(this).val());
                });
                return filterData;
            }
        });
    </script>
            

    
    <script scr="jquery.min.js"></script>
    <script scr="jquery.collapser.min.js"></script>
    
  </body>
</html>
