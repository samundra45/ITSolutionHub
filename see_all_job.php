<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs</title>
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="AdminPanel/css/posted_job.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>

    <?php 
    include('./dbConnect.php'); 
    session_start();
    include('nav.php');
    $user_email = $_SESSION['usr_email'];

    $a = "SELECT * from users where email='$user_email'";
    $r = mysqli_query($conn, $a);
    $ar = mysqli_fetch_assoc($r);
    if ($ar['type']==1) {
        $q = "SELECT * from jobs where email='$user_email'";
    }else{
        $q = "SELECT * from jobs where assigned_email='$user_email'";
    }

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
                <a href="">EDIT</a> 
                <a href="be_delete_posted_job_t.php?job_id=<?php echo $rows['job_id']?>">DELETE</a> 
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