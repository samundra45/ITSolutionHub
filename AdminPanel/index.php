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
    <title>Admin</title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="css/posted_job.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="..//css/header.css">
    <link rel="stylesheet" href="..//css/login.css">
</head>
<body>

    <?php 
    include('..//dbConnect.php');
    include('nav.php');

    $r1 = mysqli_query($conn, "SELECT * from users_admin");
    $r2 = mysqli_query($conn, "SELECT * from jobs");
    $r3 = mysqli_query($conn, "SELECT * from jobs where j_status = 1");
    $r4 = mysqli_query($conn, "SELECT * from jobs where j_status = 2");
    //$r5 = mysqli_query($conn, "SELECT * from hire_user");

    $c = mysqli_fetch_assoc($r1);
  //  $c1 = $c['earning'].'৳';
    $c2 = mysqli_num_rows($r2);
    $c3 = mysqli_num_rows($r3);
    $c4 = mysqli_num_rows($r4);
    //$c5 = mysqli_num_rows($r5);


    $q = "SELECT * from jobs";
    $res = mysqli_query($conn, $q);

?>
<!-- <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
      <!-- partial -->
      <div class="bg-ash">
        <div class="content-wrapper">

          <?php 

              if (isset($_SESSION['adm_message'])){ ?>
                <div class="alert alert-<?=$_SESSION['adm_msg_type']?>">
                  <?php
                    echo $_SESSION['adm_message'];
                  ?>
                </div>
             <?php }?>



<div class="cont">
    
    <div class="card_ap">
        <div class="container">
            <h4><b><a href="transaction.php">Total Earning</a></b></h4>
           <!--<p><?php echo $c1 ?></p>-->
        </div>
    </div>
   

    <div class="card_ap">
        <div class="container">
            <h4><b>Total Posted Job</b></h4>
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
           <!-- <p><?php echo $c5 ?></p>-->
        </div>
    </div>
</div>


<br><br>



<div class="table-users">
   <div class="header">Posted Jobs
    <!-- <div class="searchbox">
		<input id="search" type="text" placeholder="Search..." name="search" class="search">
	<button  class="btn-search">
			<img src="img/magnifier.png " style="width: 20px; height:20px;">
		</button>
</div> -->
    <!-- <div class="search">
        <img src="img/magnifier.png" style="width: 25px; height:25px;">
        <input type="text" class="form__input" placeholder=" " name="search_text" id="search_text">
        <!-- <label for="" class="form__label">Email</label> -->
    <!-- </div> --> 
   </div>
   
   <table cellspacing="0">
      <tr>
         <th>Problem</th>
         <th>Type</th>
         <th>Details</th>
         <th>Address</th>
         <th>Phone</th>
         <th >Budget</th>
         <th >Status</th>
         <th >Action</th>
      </tr>

        <?php 
        while ( $rows = mysqli_fetch_assoc($res)) {
        ?>
        <tr>
            <td> <?php echo $rows['prblm_name']; ?> </td>
            <td> <?php echo $rows['prblm_type']; ?> </td>
            <td> <?php echo $rows['details']; ?> </td>
            <td> <?php echo $rows['street'].", ".$rows['city_name']; ?> </td>
            <td> <?php echo $rows['phone_no']; ?> </td>
            <td> <?php echo $rows['max_budget']; ?> </td>
            <td> <?php echo $rows['j_status']; ?> </td>
            <td class="act_btn"> 
                <a href="">PAY</a> 
                <a href="..//be_delete_posted_job_t.php?job_id=<?php echo $rows['job_id']?>">DELETE</a> 
            </td>                          
        </tr>


        <?php } ?>
   </table>
</div>

          
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

<?php $rows = mysqli_fetch_assoc($res); ?>
<!-- edit profile pop up -->
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h2>Edit Profile</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <form action="be_edit_profile.php" class="for" method="POST">
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="tag_line" value="<?php // echo $rows["tag_line"]; ?>">
                                <label for="" class="form__label">Problem</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="address" value="<?php //echo $rows["address"]; ?>">
                                <label for="" class="form__label">Type</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="about" value="<?php //echo $rows["about"]; ?>">
                                <label for="" class="form__label">Details</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="web" value="<?php //echo $rows["web"]; ?>">
                                <label for="" class="form__label">Address</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="fb" value="<?php //echo $rows["fb"]; ?>">
                                <label for="" class="form__label">Phone</label>
                            </div>
                            <div class="form__div" style="margin-top: 40px">
                                <input type="text" class="form__input" placeholder=" " name="twt" value="<?php //echo $rows["twt"]; ?>">
                                <label for="" class="form__label">Budget</label>
                            </div>
                            <input type="submit" class="form__button" value="UPDATE"><br>
                        </form>
                    </div>
                </div>
            </div>



<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt = $(this).val();
            if (txt != '') {
                
            }else{
                $('#result').html('');
                $.ajax({
                    url: "search_fetch.php",
                    method: "post",
                    data: {search:txt},
                    dataType: "text",
                    success: function(data){
                        $('#result').html(data);
                    }
                })
            }
        });
    });
</script>