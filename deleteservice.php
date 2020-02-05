<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

if(isset($_POST['servicesId']))
    { 
        $servicesId= $_POST['servicesId'];
    }

    $query= mysqli_query($con,"delete from services where servicesId='$servicesId'");


if ($query) {
    echo "success";
}else{
    echo "error";
}

    

?>