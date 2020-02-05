<?php
    session_start();
    include 'db_connect.php';
?>

<html>
<head>
    <title>Dashboard - BCP</title>
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
                <?php $_SESSION['userIDFromSession']=""; ?>
                <?php $_SESSION['adminIDFromSession']=""; ?>
                window.location = "loginw.php";
            });

            $("#createNewCampaignBtn").click(function(){
                window.location="createnewcampaign.php";
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
                        <li><a id="myProfileMenuBtn">My Profile</a></li>
                        <li class="divider"></li>
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
                <p class="lead" style="margin-bottom: 0px;">Welcome,  <span style="font-weight: bold;"><?php echo $_SESSION['userNameFromSession']; ?></span>!</p>
            </div>
        </div>
    </div>
</section>

<!-- notifications -->
<br>
<section>
    <div class="row">
        <div class="container">
            <div style=" background-color:#c0392b;padding:10px 0px 10px 10px; cursor:pointer; box-shadow: 0px 0px 25px -8px #333; box-sizing: border-box;">
                <p class="lead" style="color:white;margin-bottom: 0px;  font-size: medium">GENERAL NOTIFICATIONS</p>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div id="createNewCampaignBtn" style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/plus.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">CAMPAIGNS <br>(NEW)</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/load.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">CAMPAIGNS <br>(LOAD)</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/notification.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">QUICK <br>MESSAGE</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/groups new.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">GROUPS <br>(NEW)</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/groups load.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">GROUPS <br>(LOAD)</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/temp2.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">TEMPLATES <br>(NEW)</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- second tier -->
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/temp1.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">TEMPLATES <br>(LOAD)</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/history.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">MESSAGE <br>(HISTORY)</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>

<!-- complaints -->
<br><br>
<section>
    <div class="row">
        <div class="container">
            <div style="background-color:#c0392b;padding:10px 0px 10px 10px; cursor:pointer; box-shadow: 0px 0px 25px -8px #333; box-sizing: border-box;">
                <p class="lead" style="color:white;margin-bottom: 0px; font-weight: 0;font-size: medium;">COMPLAINTS</p>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/reply.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">VIEW ALL</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/drop.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">WATER</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/electric-tower.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">POWER</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/gas.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">GAS</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/locked.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">SECURITY</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- maintenance work -->
<br><br>
<section>
    <div class="row">
        <div class="container">
            <div style="background-color:#c0392b;padding:10px 0px 10px 10px; cursor:pointer; box-shadow: 0px 0px 25px -8px #333; box-sizing: border-box;">
                <p class="lead" style="color:white;margin-bottom: 0px; font-weight: 0;font-size: medium;">MAINTENANCE WORK</p>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/reply.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">VIEW ALL</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/drop.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">WATER</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/electric-tower.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">POWER</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/gas.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">GAS</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/locked.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">SECURITY</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- resource pool -->
<br><br>
<section>
    <div class="row">
        <div class="container">
            <div style="background-color:#c0392b;padding:10px 0px 10px 10px; cursor:pointer; box-shadow: 0px 0px 25px -8px #333; box-sizing: border-box;">
                <p class="lead" style="color:white;margin-bottom: 0px; font-weight: 0;font-size: medium;">RESOURCE POOL</p>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/search.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">SEARCH</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/plus.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">ADD NEW</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div style="cursor:pointer; box-shadow: 0px 0px 25px -10px #333; box-sizing: border-box;">
                        <div>
                        <br>
                            <img src="assets/delete.png" class="center-block" style="height:100px;width:100px; padding: 15px;">
                        </div>
                        <div >
                            <p class="lead text-center" style="font-size:medium;font-weight: 0; margin-top: 10px;">DELETE</p>
                            <div style="height:10px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- emoty -->
<br><br>


<section id="footerSection" style="background-color: #333;color:#fff">
    <br>
    <div class="row">
        <div class="container">
            <div class="row">
                <p style="margin:0px;">&copy; All Rights Reserved | Niggs & Co.</p>
            </div>
        </div>
    </div>
    <br>
</section>

</body>
</html>