<?php

include 'db_connect.php';

if(isset($_GET['userId']))
    { 
        $userId= $_GET['userId'];
    }

if(isset($_GET['dest_to']))
    { 
        $dest_to= $_GET['dest_to'];
    }

if(isset($_GET['dest_from']))
    { 
        $dest_from= $_GET['dest_from'];
    }

    $username = "";

$insert = mysqli_query($con,"insert into carpool (initiatorid,dest_to,dest_from,status) values ('$userId','$dest_to','$dest_from','ongoing')");

$getname = mysqli_query($con,"select users.firstname from users where users.userId='$userId'");

while ($row = mysqli_fetch_assoc($getname)) {
    $username = $row['firstname'];
}


$carpoolid ="";
$getcarpoolid = mysqli_query($con,"select id from carpool where initiatorid='$userId' and dest_to='$dest_to' and dest_from = '$dest_from' ");
while ($row = mysqli_fetch_assoc($getcarpoolid)) {
    $carpoolid = $row['id'];
}



$query= mysqli_query($con,
"select userToken as token from users where userToken!='' and carpoolnotification=1"
);

if (mysqli_num_rows($query)>0) {
    
        //filling that array
        while($row=mysqli_fetch_assoc($query))
        {
            $token = $row['token'];
            $msg = array
                (
                    'priority' => 'high',
                    'carpool'  => 'true',
                    'carpoolid' => $carpoolid,
                    'content'   => $username.' wants to go from '.$dest_from.' to '.$dest_to
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