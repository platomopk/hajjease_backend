<?php
    session_start();
    include 'db_connect.php';
?>

<html>
<head>
    <title>General Notification - OS</title>
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

            $("#generate").click(function (){
                if ($.trim($("#message").val())== "" || $.trim($("#numbers").val())== "") {
                    alert("Please enter a valid value in textboxes.");
                }else{

                    // <?php

                    //     // create curl resource 
                    //     $ch = curl_init(); 

                    //     // set url 
                    //     curl_setopt($ch, CURLOPT_URL, "http://202.61.51.118:1470/shopy.php?sender=923357768887&message=Test"); 

                    //     //return the transfer as a string 
                    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                    //     // $output contains the output string 
                    //     $output = curl_exec($ch); 



                    //     // close curl resource to free up system resources 
                    //     curl_close($ch); 


                    // ?>


                    $.ajax({
                        type: "GET",
                        url: "http://202.61.51.118:1470/shopy.php?",
                        data: { 
                            sender: $.trim($("#numbers").val()), 
                            message: $.trim($("#message").val()) 
                        },
                        success: function(result) {
                            alert('ok');
                        },
                        error: function(result) {
                            alert('Message Sent*');
                        }
                    });
                }
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
                    <img src="assets/logo.png" id="mainlogo" alt="logo" class="img img-responsive pull-left" onclick="window.location='index.php'">
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

<br><br>




<section>
    <div class="row">
        <div class="container">
            <div class="row">
                <h4 style="padding-left: 15px;"><u>CREATE GENERAL NOTIFICATION</u></h4>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p style="text-align:justify; margin-right: 25%">Please select the audience for this notification. Make sure to select only the most relevent people whom you are targeting this information too. People with no knowledge/need/intent of this content will most probably report the content of this notification.</p>
                    <br>
                    <p style="text-align:justify; margin-right: 25%">Please fill in the following information about the campaign you are about to create. This information will be sent to the moderator along with your selection of the audience for this campaign.</p>
                    <br>
                    
 
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <label>Numbers</label>
                        <p>Incase of more than 1 number, seperate the numbers with a comma.</p>
                        <input type="text" id="numbers" class="form-control" placeholder="Enter Here" required>    
                    </div>
                    <br>
                    <div class="row">
                        <label>Message</label>
                        <textarea class="form-control" id="message" rows="8" required placeholder="Enter here"></textarea>    
                    </div>
                    <br>
                    <div class="row">
                    <p style="text-align:justify;">By pressing the following button, you agree that the information provided above is correct to the best of your knowledge.</p></div>
                    <div class="row">
                        <input class="btn btn-primary" type="button" id="generate" value="Generate Notification">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>





<!-- emoty -->
<br><br>


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