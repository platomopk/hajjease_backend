<?php
//json format
//header('Content-type:Application/json');
//including db

error_reporting(0);

include 'db_connect.php';

if(isset($_POST['userId']))
    { 
        $userId= $_POST['userId'];
    }
if(isset($_POST['first_name']))
    { 
        $first_name= $_POST['first_name'];
    }
if(isset($_POST['carpoolnotification']))
    { 
        $carpoolnotification= $_POST['carpoolnotification'];
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
    }

    if (strlen($password)>0 && strlen($picture)>0) {

        $before = mysqli_query($con,"select picture from users where userId='$userId'");
        while($rowb=mysqli_fetch_assoc($before))
        {
            if (file_exists($rowb["picture"])) {
                unlink($rowb["picture"]);
            }
        }

        //image
        $decoded_string = base64_decode($picture);
        $path = 'profile/'.$image_name;
        $file = fopen($path,'w');
        $is_written = fwrite($file,$decoded_string);
        fclose($file);

        //password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //query
        $query= mysqli_query($con,"
        update users set firstname='$first_name',
        lastname='$last_name',gender='$gender',cnic='$cnic',
        cell='$cell',landline='$landline',password='$password',
        city='$city',phase='$phase',sector='$sector',street='$street',
        housenumber='house_number',email='$email',picture='$path',usertoken='$usertoken',carpoolnotification='$carpoolnotification' where
        userId='$userId'
            ");

    }else if (strlen($picture)>0) {

        $before = mysqli_query($con,"select picture from users where userId='$userId'");
        while($rowb=mysqli_fetch_assoc($before))
        {
            if (file_exists($rowb["picture"])) {
                unlink($rowb["picture"]);
            }
        }

        $decoded_string = base64_decode($picture);
        $path = 'profile/'.$image_name;
        $file = fopen($path,'w');
        $is_written = fwrite($file,$decoded_string);
        fclose($file);

        //image
        $query= mysqli_query($con,"
        update users set firstname='$first_name',
        lastname='$last_name',gender='$gender',cnic='$cnic',
        cell='$cell',landline='$landline',picture='$path',
        city='$city',phase='$phase',sector='$sector',street='$street',
        housenumber='$house_number',email='$email',usertoken='$usertoken',carpoolnotification='$carpoolnotification' where
        userId='$userId'
            ");
    }else if (strlen($password)>0) {
        //password
        $password = password_hash($password,PASSWORD_DEFAULT);
        //$query= mysqli_query($con,"");

        $query= mysqli_query($con,"
        update users set firstname='$first_name',
        lastname='$last_name',gender='$gender',cnic='$cnic',
        cell='$cell',landline='$landline',password='$password',
        city='$city',phase='$phase',sector='$sector',street='$street',
        housenumber='$house_number',email='$email',usertoken='$usertoken' where
        userId='$userId'
            ");
    }else{
                $query= mysqli_query($con,"
        update users set firstname='$first_name',
        lastname='$last_name',gender='$gender',cnic='$cnic',
        cell='$cell',landline='$landline',
        city='$city',phase='$phase',sector='$sector',street='$street',
        housenumber='$house_number',email='$email',usertoken='$usertoken',carpoolnotification='$carpoolnotification' where
        userId='$userId'
            ");
    }


if ($query) {
    echo "success";
}else{
    echo "error";
}

    

?>