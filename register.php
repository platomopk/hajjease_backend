<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

if(isset($_POST['first_name']))
    { 
        $first_name= $_POST['first_name'];
    }
if(isset($_POST['last_name']))
    { 
        $last_name= $_POST['last_name'];
    }
if(isset($_POST['gender']))
    { 
        $gender= $_POST['gender'];
    }
if(isset($_POST['cnic']))
    { 
        $cnic= mysqli_real_escape_string($con, $_POST['cnic']);
    }
if(isset($_POST['cell']))
    { 
        $cell= mysqli_real_escape_string($con, $_POST['cell']);
    }
if(isset($_POST['landline']))
    { 
        $landline= mysqli_real_escape_string($con, $_POST['landline']);
    }
if(isset($_POST['picture']))
    { 
        $picture= $_POST['picture'];

    }
if(isset($_POST['image_name']))
    { 
        $image_name= $_POST['image_name'];
    }

if(isset($_POST['city']))
    { 
        $city= mysqli_real_escape_string($con, $_POST['city']);
    }
if(isset($_POST['phase']))
    { 
        $phase= mysqli_real_escape_string($con, $_POST['phase']);
    }
if(isset($_POST['sector']))
    { 
        $sector= mysqli_real_escape_string($con, $_POST['sector']);
    }
    if(isset($_POST['street']))
    { 
        $street= mysqli_real_escape_string($con, $_POST['street']);
    }
    if(isset($_POST['house_number']))
    { 
        $house_number= mysqli_real_escape_string($con, $_POST['house_number']);
    }
    if(isset($_POST['usertoken']))
    { 
        $usertoken= mysqli_real_escape_string($con, $_POST['usertoken']);
    }
    if(isset($_POST['email']))
    { 
        $email= mysqli_real_escape_string($con, $_POST['email']);
    }
    if(isset($_POST['password']))
    { 
        $password= mysqli_real_escape_string($con, $_POST['password']);
        //$password = crypt($password);
        $password = password_hash($password,PASSWORD_DEFAULT);
        //password_verify($currentInputPass,$passwordfromdb)
    }

//print_r($_POST);

$decoded_string = base64_decode($picture);
$path = 'profile/'.$image_name;
$file = fopen($path,'w');
$is_written = fwrite($file,$decoded_string);
fclose($file);

//echo $path;

// $response = array();
   

//     //query string
$query= mysqli_query($con,"Insert into users (firstname,lastname,gender,cnic,cell,landline,picture,city,phase,sector,street,housenumber,usertoken,isactivated,email,password) values ('$first_name','$last_name','$gender','$cnic','$cell','$landline','$path','$city','$phase','$sector','$street','$house_number','$usertoken','0','$email','$password')");

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