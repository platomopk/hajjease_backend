<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

if(isset($_POST['carId']))
    { 
        $carId= $_POST['carId'];
    }

        $before = mysqli_query($con,"select picture from cars where carId='$carId'");

        while($rowb=mysqli_fetch_assoc($before))
        {
            if (file_exists($rowb["picture"])) {
                unlink($rowb["picture"]);
            }
        }

        //query
        $query= mysqli_query($con,"delete from cars where carId='$carId'");


if ($query) {
    echo "success";
}else{
    echo "error";
}

    

?>