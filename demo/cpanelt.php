<?php
    session_start();
    include 'db_connect.php';
?>

<html>
<head>
    <title>Dashboard - Teacher</title>
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
            $("#myProfileLogoutBtn").click(function(){
                window.location = "logoff.php";
            });

            $("#markAttendanceBtn").click(function(){
                window.location="markattendance.php";
                //alert("Clicked!")
            });

            $("#viewAttendanceBtn").click(function(){
                window.location="viewattendance.php";
                //alert("Clicked!")
            });

        });

    </script>

    <style type="text/css" media="screen">
        body{
            overflow-x: hidden;
        }
        #mainlogo{
            height: 60px;
            width: 60px;
        }
        img{
            image-rendering: pixelated;
        }

    </style>

</head>

<body>

<!-- header section -->

<section>
    <div class="row" style="background-color: #333; color:white;">
        <div class="container" >
            <div class="row">
                <div class="col-md-3" >
                    <img src="assets/logo.png" id="mainlogo" alt="logo" class="img img-responsive pull-left">
                </div>
                <div class="col-md-9 " >
                    <div class="dropdown pull-right" style="margin-top: 18px; margin-bottom: 14px">
                      <span class="dropdown-toggle text-center"  data-toggle="dropdown"><span><i class="fa fa-caret-down fa-2x" id="bars"></i></span></span>
                      <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu">
                        <li><a id="myProfileLogoutBtn">Logout</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br>
<!-- welcome -->
<section>
    <div class="row">
        <div class="container">
            <div style="padding: 10px; cursor:pointer; box-shadow: 0px 0px 25px -8px #333; box-sizing: border-box;">
                <p class="lead" style="margin-bottom: 0px;">Welcome,  <span style="font-weight: bold;"><?php echo $_SESSION['name']; ?></span>!</p>
            </div>
        </div>
    </div>
</section>

<br>
<section>
    <div class="row">
        <div class="container">
            <div style="background-color:#c0392b;padding:10px 0px 10px 10px; cursor:pointer; box-shadow: 0px 0px 25px -8px #333; box-sizing: border-box;">
                <p class="lead" style="color:white;margin-bottom: 0px; font-weight: 0;font-size: medium;">ATTENDANCE</p>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2" id="markAttendanceBtn">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;border-box; border:1px solid grey">
                        <div>
                        <br>
                            <img src="assets/plus.png" class="center-block" style="height:50px;width:50px; padding: 0px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">MARK</p>
                            <div style="height:0px;"></div>
                        </div>
                    </div>
                </div>  
                <div class="col-md-2" id="viewAttendanceBtn">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;border-box; border:1px solid grey">
                        <div>
                        <br>
                            <img src="assets/reply.png" class="center-block" style="height:50px;width:50px; padding: 0px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">VIEW</p>
                            <div style="height:0px;"></div>
                        </div>
                    </div>
                </div>                
            </div>

        </div>
    </div>
</section>

<br><br><br><br><br><br><br>
<br><br><br><br><br>


<!-- emoty -->
<section id="footerSection" style="background-color: #333;color:#fff;display: none">
    <br>
    <div class="row">
        <div class="container">
            <div class="row">
                <p style="margin:0px;">&copy; All Rights Reserved | VectraCom Pvt. Ltd.</p>
            </div>
        </div>
    </div>
    <br>
</section>

</body>
</html>