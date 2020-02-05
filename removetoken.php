<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

if(isset($_POST['userId']))
    { 
        $userId= $_POST['userId'];
    }
//     //query string
$query= mysqli_query($con,"update users set usertoken='' where userId='$userId'");

if ($query) {
    echo "success";
}else{
    echo "error";
}

?>