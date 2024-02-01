<?php

include('dbConnect.php');

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
    
    
    $res_ = mysqli_query($conn,$sql);
    $output ='';



    if (mysqli_num_rows($res_) > 0) {
        while( $rows = mysqli_fetch_assoc($res_)){
            if ($rows["negotiable"] == 1){
                $cl = 'yes';
                $nego = 'Negotiable';
            }else {
                $cl = 'no';
                $nego = 'Fixed budget';
            }

            $output .='<div class="card_ card_-1">
                        <div class="work-rate">
                            <p class="'.$cl.'">'.$nego.'</p>
                            <p class="budget">'.$rows["max_budget"].' BDT</p>
                        </div>
                        <div class="pos-nd-loc">
                            <p class="job-title">'.$rows["prblm_name"].'</p>
                            <p class="location">'.$rows["street"].', '.$rows["city_name"].'</p>
                        </div>
                        <div class="tags">
                        <button>'.$rows["prblm_type"].'</button>
                        <button>'.$rows["dev_type"].'</button>
                        <button>'.$rows["dev_model"].'</button>
                        </div>
                        <p class="job-desc">
                            '.$rows["details"].'
                        </p>
                        <br><br>
                        <a href="./job_view.php?id='.$rows["job_id"].'"><p class="job-toggle" id="viewjob">VIEW JOB</p></a>
                    </div> ';
        }
    }else {
        $output = "<h3>No Jobs Found</h3>";
    }

    echo $output;
}







?>