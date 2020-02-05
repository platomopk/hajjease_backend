<?php

include 'db_connect.php';

if(isset($_GET['userId']))
    { 
        $userId= $_GET['userId'];
    }
    if(isset($_GET['location']))
    { 
        $location= $_GET['location'];
    }
//$random = "";
    $random = uniqid();

    $panicid = "";


$insert = mysqli_query($con,"Insert into panic 
    (userid,teamarrivaltime,panictype,respondername,closuretime,closureauthority,randomt,location) 
    values 
    ('$userId',NOW() + INTERVAL 4 MINUTE,'Medical','Ahmad',NOW() + INTERVAL 50 MINUTE,'Ambulance','$random','$location')
    ");


$getsss = mysqli_query($con,"select panicid from panic where randomt='$random'");
while ($row = mysqli_fetch_assoc($getsss)) {
    $panicid = $row['panicid'];
}


$insertpanicattachments = mysqli_query($con,"Insert into panicattachments 
    (panicid,attachement) 
    values 
    ('$panicid','profile/crime1.jpg')");

$insertpanicattachments = mysqli_query($con,"Insert into panicattachments 
    (panicid,attachement) 
    values 
    ('$panicid','profile/crime2.jpg')");

$insertpanicattachments = mysqli_query($con,"Insert into panicattachments 
    (panicid,attachement) 
    values 
    ('$panicid','profile/crime3.jpg')");


?>