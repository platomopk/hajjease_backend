<?php

include 'db_connect.php';

$query= mysqli_query($con,
"SELECT services.servicesId, (SELECT users.usertoken from users where users.userId=services.userId) as token from services WHERE services.userId='21'"
);

if (mysqli_num_rows($query)>0) {
    
        //filling that array
        while($row=mysqli_fetch_assoc($query))
        {
            $token = $row['token'];
            $msg = array
                (
                    'priority' => 'high',
                    'notificationId'  => '',
                    'content'   => 'Job was carried out successfully! Please Rate our resource',
                    'servicesId'   => '5'
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
            echo $result;
            curl_close( $ch );

        }

}

?>