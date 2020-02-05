<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

// personal
if(isset($_POST['servantId']))
    { 
        $servantId= $_POST['servantId'];
    }
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

if(isset($_POST['address']))
    { 
        $address= mysqli_real_escape_string($con, $_POST['address']);
    }

    // days
if(isset($_POST['monday']))
    { 
        $monday= mysqli_real_escape_string($con, $_POST['monday']);
    }
    if(isset($_POST['tuesday']))
    { 
        $tuesday= mysqli_real_escape_string($con, $_POST['tuesday']);
    }
    if(isset($_POST['wednesday']))
    { 
        $wednesday= mysqli_real_escape_string($con, $_POST['wednesday']);
    }
    if(isset($_POST['thursday']))
    { 
        $thursday= mysqli_real_escape_string($con, $_POST['thursday']);
    }
    if(isset($_POST['friday']))
    { 
        $friday= mysqli_real_escape_string($con, $_POST['friday']);
    }
    if(isset($_POST['saturday']))
    { 
        $saturday= mysqli_real_escape_string($con, $_POST['saturday']);
    }
    if(isset($_POST['sunday']))
    { 
        $sunday= mysqli_real_escape_string($con, $_POST['sunday']);
    }

    // shift
        if(isset($_POST['startTime']))
    { 
        $startTime= mysqli_real_escape_string($con, $_POST['startTime']);
    }
        if(isset($_POST['endTime']))
    { 
        $endTime= mysqli_real_escape_string($con, $_POST['endTime']);
    }

    // bools
    if(isset($_POST['homekeys']))
    { 
        $homekeys= mysqli_real_escape_string($con, $_POST['homekeys']);
    }

    if(isset($_POST['carkeys']))
    { 
        $carkeys= mysqli_real_escape_string($con, $_POST['carkeys']);
    }

    if(isset($_POST['homealone']))
    { 
        $homealone= mysqli_real_escape_string($con, $_POST['homealone']);
    }    

    if(isset($_POST['drivealone']))
    { 
        $drivealone= mysqli_real_escape_string($con, $_POST['drivealone']);
    }   


    if(isset($_POST['type']))
    { 
        $type= mysqli_real_escape_string($con, $_POST['type']);
    }    

if (strlen($picture)>0) {

    $before = mysqli_query($con,"select picture from servants where servantId='$servantId'");
        while($rowb=mysqli_fetch_assoc($before))
        {
            if (file_exists($rowb["picture"])) {
                unlink($rowb["picture"]);
            }
        }


    $decoded_string = base64_decode($picture);
    $path = 'servants/'.$image_name;
    $file = fopen($path,'w');
    $is_written = fwrite($file,$decoded_string);
    fclose($file);

    $query= mysqli_query($con,"Update servants set fname='$first_name',lname='$last_name',mobile='$cell',landline='$landline',address='$address',cnic='$cnic',picture='$path',gender='$gender',entryTime='$startTime',exitTime='$endTime',houseKeys='$homekeys',emptyHome='$homealone',carKeys='$carkeys',driveAlone='$drivealone',isMonday='$monday',isTuesday='$tuesday',isWednesday='$wednesday',isThursday='$thursday',isFriday='$friday',isSaturday='$saturday',isSunday='$sunday',type='$type' where servantId='$servantId'");
}else{
    $query= mysqli_query($con,"Update servants set fname='$first_name',lname='$last_name',mobile='$cell',landline='$landline',address='$address',cnic='$cnic',gender='$gender',entryTime='$startTime',exitTime='$endTime',houseKeys='$homekeys',emptyHome='$homealone',carKeys='$carkeys',driveAlone='$drivealone',isMonday='$monday',isTuesday='$tuesday',isWednesday='$wednesday',isThursday='$thursday',isFriday='$friday',isSaturday='$saturday',isSunday='$sunday',type='$type' where servantId='$servantId'");
}




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