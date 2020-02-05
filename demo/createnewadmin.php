<?php 
include 'db_connect.php';
    
    $name = ""; $branch=""; $cell=""; $address=""; $email=""; $password="";


    if (isset($_GET['name'])) {
        $name = $_GET['name'];
    }

    if (isset($_GET['branch'])) {
        $branch = $_GET['branch'];
    }

    if (isset($_GET['cell'])) {
        $cell = $_GET['cell'];
    }

    if (isset($_GET['address'])) {
        $address = $_GET['address'];
    }

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }

    if (isset($_GET['password'])) {
        $password = $_GET['password'];
    }
    
    $query = "insert into usersw (name,branch,cell,address,email,password) values 
    ('$name','$branch','$cell','$address','$email','$password')";

    $querySearch2= mysqli_query($con,$query);

    if ($querySearch2) {
        echo "Successfully Added";
    }else{
        echo "System Failed To Complete This Request. Try Again Later";
    }

    

?>


