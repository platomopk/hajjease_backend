<?php

    include 'db_connect.php';

    $id = "";
    if (isset($_GET['panicid'])) {
        $id = $_GET['panicid'];
    }



?>

<html>
<head>
    <title>Attachments - BCP</title>
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

<section>
    <div class="row">
        <div class="container" >
            <div class="row">
                <?php
                    $query = mysqli_query($con,"select attachement from panicattachments where panicid='$id'");

                    while ($row = mysqli_fetch_assoc($query)) {
                        //echo $row['attachement'];
                        //echo "<img src='http://localhost/bcp/".$row['attachement']."' />";        
                        // echo nl2br("<img src='http://localhost/bcp/".$row['attachement']."' />" . "\n"); 

                        echo '<div class="col-md-10 col-md-offset-1" class="center-block" style="margin-top:10px;"><img src="http://localhost/bcp/'.$row['attachement'].'" style="width:90%;height:auto"></div>';       
                    }
                ?>

                
            </div>
        </div>
    </div>




</section>



</body>
</html>