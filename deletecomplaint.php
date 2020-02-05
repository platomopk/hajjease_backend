<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

if(isset($_POST['complaintId']))
    { 
        $complaintId= $_POST['complaintId'];
    }

        //query
        $query= mysqli_query($con,"delete from complaints where complaintId='$complaintId'");


if ($query) {
    echo "success";
}else{
    echo "error";
}

    

?>