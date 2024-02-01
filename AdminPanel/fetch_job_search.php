<?php

include('..//dbConnect.php');

if (isset($_POST['action'])) {
    $sql = "SELECT * FROM jobs WHERE prblm_type != ''";

    if (isset($_POST['prblm_type'])) {
        $prblm_type = implode("','", $_POST['prblm_type']);
        $sql .= "AND prblm_type IN('" .$prblm_type. "')";
    }
    if (isset($_POST['dev_type'])) {
        $dev_type = implode("','", $_POST['dev_type']);
        $sql .= "AND dev_type IN('" .$dev_type. "')";
    }
    if (isset($_POST['city_name'])) {
        $city_name = implode("','", $_POST['city_name']);
        $sql .= "AND city_name IN('" .$city_name. "')";
    }

     if (isset($_POST['fdate']) and isset($_POST['ldate'])) {
        $fdate = $_POST['fdate'];
        $ldate = $_POST['ldate'];
        $sql .= "AND cp_date BETWEEN '" .$fdate. "' AND '" .$ldate. "'";
    }else

   if(isset($_POST['fdate'])) {
        $fdate = $_POST['fdate'];
        // console.log($fdate);
        $sql .= "AND cp_date >'" .$fdate. "'";
    }elseif (isset($_POST['ldate'])) {
        $ldate = $_POST['ldate'];
        $sql .= "AND cp_date >'" .$ldate. "'";
    }

    
    
    $res_ = mysqli_query($conn,$sql);
    $output ='';



    if (mysqli_num_rows($res_) > 0) {
        while( $rows = mysqli_fetch_assoc($res_)){
            if ($rows["customer_payment"] > 0){
                $status = 'Paid';
                $nego = 'Negotiable';
            }else {
                $status = 'Unpaid';
            }

            $rt = $rows['customer_payment'];

            if ($rows['job_accept'] == 1) {
                $pay = $rt-($rt*0.05);
                $hjk = $rt*0.05;
                $se = 2*$hjk;
            }else {
                $pay = 0;
                $hjk = 0;
                $se = $rt*0.05;
            }

            $output .='<?php 
                            while ( $rows = mysqli_fetch_assoc($res)) {
                            ?>
                            <tr>
                                <td> '.$rows['email'].' </td>
                                <td> '.$rows['max_budget'].'</td>
                                <td> '.$status.'</td>
                                <td> '.$rt.'
                                    <span style="color: orange; font-weight: bold;">'.'"+"'.$rt*.05.'</span>
                                </td>
                                <td> '.$rows['cp_date'].'</td>
                                <td> '.$rows['assigned_email'].'</td>
                                <td> '.$pay.'
                                    <span style="color: orange; font-weight: bold;">'.'"+"'.$hjk.'</span>
                                </td>
                                <td> '.$rows['ja_date'].'</td>
                                <td>'.$se.'</td>                         
                            </tr>


                            <?php } ?>';
        }
    }else {
        $output = "<h3>No Jobs Found</h3>";
    }

    echo $output;
}







?>