<?php
	include('..//dbConnect.php');
	
	if ( isset($_POST['fdate']) and isset($_POST['ldate']) ) {
        $fdate = $_POST['fdate']." 00:00:00";
        $ldate = $_POST['ldate']." 00:00:00";

        echo $fdate;
        $sql = "SELECT * from jobs WHERE cp_date > '$fdate'"; #BETWEEN '$fdate' AND '$ldate'";
        $qry = mysqli_query($conn,$sql);

        echo mysqli_num_rows($qry);

        while ( $rows = mysqli_fetch_assoc($qry)){
            echo $rows['cp_date']."=";
        }
    }
?>