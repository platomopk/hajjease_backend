<?php

include 'db_connect.php';

if(isset($_GET['userId']))
    { 
        $userId= $_GET['userId'];
    }

if(isset($_GET['carpoolid']))
    { 
        $carpoolid= $_GET['carpoolid'];
    }


$insert = mysqli_query($con,"Insert into carpoolaccept (carpoolid,userid) values ('$carpoolid','$userId')");

$joinername = "";

$query= mysqli_query($con,
"select userToken as token,firstname from users where userToken!='' and userId = (select initiatorid from carpool where id='$carpoolid')"
);

$queryjoiner = mysqli_query($con,"select firstname from users where users.userId='$userId'");
while ($row=mysqli_fetch_assoc($queryjoiner)) {
    $joinername = $row['firstname'];
}

if (mysqli_num_rows($query)>0) {
    
        //filling that array
        while($row=mysqli_fetch_assoc($query))
        {
            $token = $row['token'];
            $msg = array
                (
                    'priority' => 'high',
                    'normal'  => 'true',
                    'content'   => $joinername.' has accepted your pickup request and will be at your location soon.'
                );
            $ids = array
            (
                    $token
            );
            $fields = array
            (
                'registration_ids'  => $ids,
                'data'          =>$msg
            );
            $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
             
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            //echo $result;
            curl_close( $ch );

        }

    }





?>