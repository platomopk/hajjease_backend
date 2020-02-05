<?php 
include 'db_connect.php';
    
    $name = ""; $category=""; $message=""; $creater=""; 


    if (isset($_GET['campaignName'])) {
        $name = $_GET['campaignName'];
    }

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
    }

    if (isset($_GET['message'])) {
        $message = $_GET['message'];
    }

    if (isset($_GET['creater'])) {
        $creater = $_GET['creater'];
    }

    $random = uniqid();
    
    $query = "insert into campaigns 
    (campaignName,campaignCategory,createdBy,moderatedBy,moderatedOn,isActivated,message,randomt) 
    values 
    ('$name','$category','$creater','$creater',NOW(),'1','$message','$random')";

    $querySearch2= mysqli_query($con,$query);
    

    //get newly created campaign id
    $campaignID="";
    $createdOn="";    
    $getcreated = mysqli_query($con,"select campaignId,moderatedOn from campaigns where randomt='$random'");
    while ($row = mysqli_fetch_assoc($getcreated)) {
        $campaignID=$row['campaignId'];
        $createdOn=$row['moderatedOn'];    
    }
    

    //getallusers
    $valArr = array();
    $getallusers = mysqli_query($con,"select userId from users");
    while ($row = mysqli_fetch_assoc($getallusers)) {
        $user_id = $row['userId'];
        $valArr[] = "('$campaignID','$user_id','$createdOn')";
    }

    //insert into notifications
     $query = "insert into notifications 
     (campaignId,userId,createdOn) values ";
    $query .= implode(',', $valArr);
    $querySearch2= mysqli_query($con,$query);




    $query= mysqli_query($con,
    "select notifications.notificationId, users.usertoken as token from notifications INNER JOIN users ON users.userId = notifications.userId WHERE (users.usertoken != '' OR users.usertoken != null ) AND notifications.campaignId='$campaignID'");

        if (mysqli_num_rows($query)>0) {
        
            //filling that array
            while($row=mysqli_fetch_assoc($query))
            {
                if ($row['token'] != "") {
                    $token = $row['token'];
                $msg = array
                    (
                        'priority' => 'high',
                        'notificationId'  => $row['notificationId'],
                        'content'   => $message
                    );
                $ids = array
                (
                        $token
                );
                $fields = array
                (
                    'registration_ids'  => $ids,
                    'data'          =>$msg,
                    'time_to_live'  => 300
                );
                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );
                 
                $ch = curl_init();
                // curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
                curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                $result = curl_exec($ch );
                echo $result . "\n\n";
                curl_close( $ch );
                }
                

            }

        }

    if ($querySearch2) {
        echo "Successfully Created Campaign";
    }else{
        echo "System Failed To Complete This Request. Try Again Later";
    }

    

?>


