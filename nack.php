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
if(isset($_POST['notificationId']))
    { 
        $notificationId= $_POST['notificationId'];
    }
if(isset($_POST['message']))
    { 
        $message= mysqli_real_escape_string($con,$_POST['message']);
    }

$query= mysqli_query($con,"update notifications set ackd='1',reported='1',reportmsg='$message', reportedOn=NOW(),ackdOn=NOW() where userId = '$userId' and notificationId='$notificationId'");

if ($query) {
    echo "success";
}else{
    echo "error";
}


?>