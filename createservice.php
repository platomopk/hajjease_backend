<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

// personal
if(isset($_POST['userId']))
    { 
        $userId= $_POST['userId'];
    }
if(isset($_POST['category']))
    { 
        $category= $_POST['category'];
    }
if(isset($_POST['title']))
    { 
        $title= $_POST['title'];
    }
if(isset($_POST['message']))
    { 
        $message= $_POST['message'];
    }

$query= mysqli_query($con,"Insert into services 
    (userId,category,title,message,closuredate,assignedresource, status) 
    values 
    ('$userId','$category','$title','$message',NOW() + INTERVAL 60 MINUTE,'1','open')");

if ($query) {
    echo "success";
}else{
    echo "error";
}

    
//         // check if row inserted or not
//         if ($query) {
//                         $response["success"] = "yes";
//                         // echoing JSON response
//                         echo json_encode($response);
            
//             // successfully inserted into database

//             // $query2=mysqli_query($con,
//             //     "select * from users where userToken='$userToken' and firstName='$firstName'");

//             //     while($row=mysqli_fetch_assoc($query2))
//             //     {
//             //         $to = $row['email'];
//             //         $userId=$row['userId'];
//             //         $subject = "Account Activation - Bahria Composite Project";
//             //         $message = "<html><body><h2>Click the link below to activate your account.</h2><a href='http://localhost/bcp/activate_account.php?userId=$userId'>Activate Account</a></body></html>";
//             //         $header = "From:NO-REPLY@bcp.pk \r\n";
//             //         $header .= "MIME-Version: 1.0\r\n";
//             //         $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//             //         $retval = mail ($to,$subject,$message,$header);

//             //         if ($retval) {
//             //             $response["success"] = "yes";
//             //             // echoing JSON response
//             //             echo json_encode($response);
//             //         }else{
//             //             $response["success"] = "no";
//             //             // echoing JSON response
//             //             echo json_encode($response);
//             //         }
//             //     }

//         } else {
//             // failed to insert row
//             $response["success"] = "no";
     
//             // echoing JSON response
//             echo json_encode($response);
//         }




?>