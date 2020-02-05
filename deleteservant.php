<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

if(isset($_POST['servantId']))
    { 
        $servantId= $_POST['servantId'];
    }

        $before = mysqli_query($con,"select picture from servants where servantId='$servantId'");

        while($rowb=mysqli_fetch_assoc($before))
        {
            if (file_exists($rowb["picture"])) {
                unlink($rowb["picture"]);
            }
        }

        //query
        $query= mysqli_query($con,"delete from servants where servantId='$servantId'");


if ($query) {
    echo "success";
}else{
    echo "error";
}

    

?>