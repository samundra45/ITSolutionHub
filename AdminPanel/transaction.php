<?php 
    session_start();
            if (!isset($_SESSION['login_adm'])) {
            header('location: login.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="css/posted_job.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/transaction.css">
    <!-- <link rel="stylesheet" href="..//css/work.css" /> -->
    <link rel="stylesheet" href="..//css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>

    <?php 
    include('..//dbConnect.php'); 
    include('nav.php');
    $user_email = $_SESSION['adm_usr_email'];

    $r1 = mysqli_query($conn, "SELECT * from users_admin");
    $r2 = mysqli_query($conn, "SELECT * from jobs");
    $r3 = mysqli_query($conn, "SELECT * from jobs where j_status = 1");
    $r4 = mysqli_query($conn, "SELECT * from jobs where j_status = 2");
    $r5 = mysqli_query($conn, "SELECT * from hire_user");

    $c = mysqli_fetch_assoc($r1);
    $c1 = $c['earning'].' ৳';
    $c2 = mysqli_num_rows($r2);
    $c3 = mysqli_num_rows($r3);
    $c4 = mysqli_num_rows($r4);
    $c5 = mysqli_num_rows($r5);

    // $a = "SELECT * from users where email='$user_email'";
    // $r = mysqli_query($conn, $a);
    // $ar = mysqli_fetch_assoc($r);

    $q = "SELECT * from jobs";
    // echo $user_email;

    
    $res = mysqli_query($conn, $q);

?>
<!-- <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
      <!-- partial -->
      <div class="bg-ash">
        <div class="content-wrapper">

          <?php 

              if (isset($_SESSION['sa_message'])){ ?>
                <div class="alert alert-<?=$_SESSION['sa_msg_type']?>">
                  <?php
                    echo $_SESSION['sa_message'];
                    unset($_SESSION['sa_msg']);
                    unset($_SESSION['sa_msg_type']);
                  ?>
                </div>
             <?php }?>

<div class="cont">
    
    <div class="card_ap">
        <div class="container">
            <h4><b><a href="transaction.php">Total Earning</a></b></h4>
            <p><?php echo $c1 ?></p>
        </div>
    </div>
   

    <div class="card_ap">
        <div class="container">
            <h4><b><a href="index.php">Total Posted Job</a></b></h4>
            <p><?php echo $c2 ?></p>
        </div>
    </div>

    <div class="card_ap">
        <div class="container">
            <h4><b>Total Completed Job</b></h4>
            <p><?php echo $c4 ?></p>
        </div>
    </div>

    <div class="card_ap">
        <div class="container">
            <h4><b>Ongoing Job</b></h4>
            <p><?php echo $c3 ?></p>
        </div>
    </div>

      <div class="card_ap">
        <div class="container">
            <h4><b><a href="hiring_list.php">Total Hired</a></b></h4>
            <p><?php echo $c5 ?></p>
        </div>
    </div>
</div>


<br><br>
<br><br>
    <div class="container_jobs">
        <div class="divCat">

            <div class="category">
                <div class="head_"><h5 >Filter Jobs</h5></div>
                
                <hr>
                <h6 class= "text-info">Select Date</h6>
                <form action="date_search.php" method="POST">
                    <div>
                        <input class="md-form md-outline input-with-post-icon datepicker" type="date" name="fdate" id="fdate">
                        <label for="fdate">Start Date</label>
                    </div>
                    <div class="form-group mt-2">
                        <input type="date" name="ldate" class="" id="ldate">
                        <label for="ldate">End Date</label>
                    </div>
                    <input class="btn btn-success btn-sm mt-2 product_check" type="" name="Find" id="submit_" value="FILTER">
                    

                </form>
                
                
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
            
            <div class="wrapper_" id="">
                <div class="table-users">
                    <div class="header">Transaction</div>
                    
                    <table cellspacing="0" >
                        <tr>
                            <th>Employeer</th>
                            <th>Budget</th>
                            <th>Payment Status</th>
                            <th>Paid Amount</th>
                            <th>Paid Date</th>
                            <th>Expert</th>
                            <th>Expert Earning</th>
                            <th>Payment Date</th>
                            <th >System Earning</th>
                        </tr>

                        <tbody id="result_">
                            <?php 
                            while ( $rows = mysqli_fetch_assoc($res)) {
                            ?>
                            <tr>
                                <td> <?php echo $rows['email']; ?> </td>
                                <td> <?php echo $rows['max_budget']; ?> </td>
                                <td> 
                                    <?php 
                                        if ($rows['customer_payment'] > 0) {
                                            echo "Paid";
                                        }else{
                                            echo "Unpaid"; 
                                        } ?> 
                                </td>
                                <td> 
                                    <?php 
                                        $rt = $rows['customer_payment']; 
                                        echo $rt;
                                    ?> 
                                    <span style="color: orange; font-weight: bold;"><?php echo '+'.$rt*.05 ?></span>
                                </td>
                                <td> <?php 
                                        echo $rows['cp_date']; 
                                    ?> </td>
                                <td> <?php echo $rows['assigned_email']?> </td>
                                <td> 
                                    <?php 
                                        if ($rows['job_accept'] == 1) {
                                            echo $rt-($rt*0.05);
                                            $hjk = $rt*0.05;
                                            $se = 2*$hjk;
                                        }else {
                                            echo 0;
                                            $hjk = 0;
                                            $se = $rt*0.05;
                                        }
                                        
                                    ?> 
                                    <span style="color: orange; font-weight: bold;"><?php echo "+".$hjk ?></span>
                                </td>
                                <td><?php echo $rows['ja_date'] ?></td>
                                <td> 
                                    <?php 
                                        echo $se; 
                                    ?> 
                                </td>                         
                            </tr>


                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
                        
    <script type="text/javascript">
        $(document).ready(function(){
            // alert("vmkdsfhn");
            // $('#submit_').on('click', function() {
            // //    alert("test");
            //     var action = 'data';
            //     var fdate = document.getElementById("fdate").value;
            //     var ldate = document.getElementById("ldate").value;

            //     $.ajax({
            //         url: 'fetch_job_search.php',
            //         method: 'POST' ,
            //         data: {action: action, fdate: fdate, ldate: ldate},
            //         success:function(response) {
            //             // console.log(response);
            //             $("#result_").html(response);
            //             $("#text_change").text("Filtered Jobs");

            //         }
            //     });
            // });
            $('.product_check').on('click', function(){
                // alert("check");
                var action = 'data';
                var prblm_type = get_filter_text('prblm_type');
                var dev_type = get_filter_text('dev_type');
                var city_name = get_filter_text('city_name');

                var fdate = document.getElementById("fdate").value;
                var ldate = document.getElementById("ldate").value;

                console.log(fdate);

                $.ajax({
                    url: 'fetch_job_search.php',
                    method: 'POST' ,
                    data: {action: action, prblm_type: prblm_type, dev_type: dev_type,city_name:city_name, fdate:fdate, ldate:ldate},
                    success:function(response) {
                        // console.log(response);
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






          
        <!-- content-wrapper ends -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>

</body>
</html>



<script>
    // $(document).ready(function(){
    //     $('#search_text').keyup(function(){
    //         var txt = $(this).val();
    //         if (txt != '') {
                
    //         }else{
    //             $('#result').html('');
    //             $.ajax({
    //                 url: "search_fetch.php",
    //                 method: "post",
    //                 data: {search:txt},
    //                 dataType: "text",
    //                 success: function(data){
    //                     $('#result').html(data);
    //                 }
    //             })
    //         }
    //     });
    // });
</script>