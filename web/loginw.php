<?php
    session_start();
//error_reporting(0);
    
    include 'db_connect.php';
    if(isset($_POST['submit'])){

        $email= mysqli_real_escape_string($con, $_POST['login_email']);
        $password= mysqli_real_escape_string($con, $_POST['login_password']);


        //admin view
        if ($email == "admin@bcp" && $password=="abc@123") {
                $_SESSION['adminIDFromSession']="admin";
                header("location:root.php");
        }

        //check for retailers
        $query= mysqli_query($con,
        "SELECT id,name from usersw where email='$email' and password='$password'");
      if (mysqli_num_rows($query)>0) {
                  //making an array
            $rows=array();
            //filling that array
            while($row=mysqli_fetch_assoc($query))
            {
                $_SESSION['userIDFromSession']=$row['id'];
                $_SESSION['userNameFromSession']=$row['name'];
                header("location:dashboard.php");
            }
      }else{
        echo "<script>alert('No Data Found!');</script>";
      }
    }
    
    if($_SESSION['adminIDFromSession']=="admin")
    {
        header("location:root.php");
    }
    else if($_SESSION['userIDFromSession']!="")
    {
        header("location:dashboard.php");
    }

?>

<html>
<head>
    <title>BCP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no">

    <script src="js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome.min.css">

    <script src="js/form.js" type="text/javascript"></script>

    <!-- <script src="http://malsup.github.com/jquery.form.js"></script>  -->

    <script>
        
        $().ready(function(){

            $('#forgot_email').click(function(){
                if ($('#login_email').val()=="") {
                    alert("Please enter email in the respective textbox and then press forgot password button.");
                }
                // else{
                //     var email=$('#login_email').val();
                //     $.getJSON("forgot_password_retailer.php?email="+email 
                //     , function(data){
                //             var _len = data.length, post, i;
                                         
                //                 $.each(data, function (i, item) {
                                
                //                     if (item.indexOf("yes") >= 0){
                //                    alert("An email has been sent to you with your credentials.");
                //                     }
                //                     else{
                //                    alert("We couldn't find any information associated with this email.");
                //                     }
                //                 });

                //         });
                // }
            });
                    //handle the couponImageUpload here
            // $('#signInForm').ajaxForm({
            //     beforeSend:function(){
                    

            //     },
            //     uploadProgress:function(event,position,total,percentComplete)
            //     {
            //         // $('#upload_image_coupon_btn').prop('value','<i class="fa fa-spinner"></i>');
            //     },
            //     success:function(){
            //         // $('#upload_image_coupon_btn').prop('value','upload');

            //     },
            //     complete:function(response){
            //         // $('#uploaded_coupon_loc_text').val(response.responseText);
            //         //alert(response.responseText);
            //         window.location.href ="retailer_view.php"
            //     }
            // });
        });

    </script>


    <style type="text/css" media="screen">
        body{
            background-color: #fff;
            overflow-x: hidden;
            height: 100%;
        }
        #headerContainer{
            height: 80px;
            width: 100%;
            background-color: #333;
            margin: 0px auto;
            text-align: center;
        }
        #loginWrapper{
            height: 518px;
        }
        #loginContainer{
            height: 100%;
            display: table;
        }
        #loginBox{
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }
    </style>

</head>
<body>
    <!-- header -->
    <section>
        <div class="row">
            <div class="container" id="headerContainer">
                <h1 style="color:whitesmoke;font-size: 40px; padding:0px;"><b>BCP</b></h1>
            </div>
        </div>
    </section>
    <!-- header -->

    <!-- login -->

<form id="signInForm"  method="post">

    <section>
        <div class="row" id="loginWrapper">
            <div class="container" id="loginContainer">
                <div class="row" id="loginBox">
                    <!-- login container -->
                    <div style="color:white;width: 300px;height: auto;margin:0px auto;border-radius: 10px;border-color: #333; background-color:#333;  border-width: 2px; border-style: solid;box-shadow: 10px 10px 5px #e6e6e6;">
                    <!-- email -->
                    <div style="padding:15px ">
                        <input class="form-control" type="text" name="login_email" id="login_email" placeholder="Email">
                    </div>
                    <!-- password -->
                    <div style="padding:0px 15px 15px 15px">
                        <input class="form-control" type="password" name="login_password" placeholder="Password">
                    </div>
                    <!-- submit -->
                    <div style="padding:0px 15px 15px 15px">
                        <input type="submit" name="submit" value="Log In" class="btn btn-default" style="width: 100%">
                    </div>
                    <!-- forgot -->
                    <div style="padding:0px 15px 0px 15px; margin-bottom: 10px;">
                        <p style="margin:0px;text-align: center;"><a style="text-decoration: none; color:white; cursor:pointer"  id="forgot_email">Forgot Password?</a></p>
                    </div>  
                    <!-- some text -->
                    <div style="padding:0px 15px 15px 15px">
                        <p style="text-align: center; font-size: small;">By signing in to our application you agree to abide by the <a target="_blank" href="tnc.html" style="color:white;cursor:pointer "><i>Terms & Conditions</i></a> presided by <br><b><a href="http://www.google.com.pk" target="_blank" style="text-decoration: none; color:white; cursor:pointer">US</a>.</b></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

</form>

</body>
</html>