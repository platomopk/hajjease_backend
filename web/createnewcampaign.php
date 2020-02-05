<?php
    session_start();
    include 'db_connect.php';
?>

<html>
<head>
    <title>New Campaign - BCP</title>
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


            $('input[type=radio][name=search]').change(function() {
                if (this.value == 'address') {
                    $("#AddressSearch").css("display","block");
                    $("#GroupsSearch").css("display","none");
                }
                else if (this.value == 'groups') {
                    $("#AddressSearch").css("display","none");
                    $("#GroupsSearch").css("display","block");
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

<br><br>




<section>
    <div class="row">
        <div class="container">
            <div class="row">
                <h4><u>CREATE NEW CAMPAIGN</u></h4>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <p style="text-align:justify;">Please select the audience for this campaign. Make sure to select only the most relevent people whom you are targeting this information too. People with no knowledge/need/intent of this content will most probably report the content of this campaign.</p>
                        <br>
                        <br>

                        <div style="border:1px dotted grey;padding:15px;">
                            <div class="row">
                                <p style="text-align:justify; margin-left: 15px;">How do you want to find your audience?</p>
                                <input name="search" value="address" style="margin-left: 15px;" type="radio" id="r1" /><label for="r1" style="font-weight: none">&nbsp;via Address</label>
                                <input name="search" value="groups" style="margin-left: 15px;" type="radio" id="r2" /><label for="r2" style="font-weight: none">&nbsp;via Groups</label>
                            </div>
                            <br>


                            <!-- search by address -->
                            <div id="AddressSearch" style="display:none;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>City</label>
                                        <select name="category" class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            <option value="islamabad">Islamabad</option>
                                            <option value="rawalpindi">Rawalpindi</option>
                                            <option value="karachi">Karachi</option>
                                            <option value="lahore">Lahore</option>
                                        </select> 
                                    </div>
                                    <div class="col-md-4">
                                        <label>Phase</label>
                                        <select name="category" class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            <option value="Phase 1">Phase 1</option>
                                            <option value="Phase 2">Phase 2</option>
                                            <option value="Phase 3">Phase 3</option>
                                            <option value="Phase 4">Phase 4</option>
                                            <option value="Phase 5">Phase 5</option>
                                            <option value="Phase 6">Phase 6</option>
                                            <option value="Phase 7">Phase 7</option>
                                            <option value="Phase 8">Phase 8</option>
                                            <option value="Bahria Enclave">Bahria Enclave</option>
                                        </select> 
                                    </div>
                                    <div class="col-md-4">
                                        <label>Sector</label>
                                        <select name="category" class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            <?php
                                                for ($i = 'A'; $i < 'Z'; $i++) {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                            ?>
                                            <option value="Z">Z</option>
                                        </select> 
                                    </div>
                                    
                                </div>
                                <br>
                                    <div class="row">
                                        <input type="button" id="searchBtn" value="Search People" class="btn btn-primary" style="margin-left: 15px;">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div style="margin-left: 15px;">
                                            Total Records Found: 0
                                        </div>
                                    </div>
                            </div>

                            <!-- search in groups -->
                            <div id="GroupsSearch" style="display:none">
                                <div class="row">
                                    <div>
                                        <label style="margin-left: 15px;">All Groups</label>
                                    </div>
                                </div>
                                <div class="row" style="height:150px;overflow: auto;">
                                    <?php
                                        $query = mysqli_query($con,"Select name, count(userId) as count from groups group by name");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            echo '<div class="col-md-3"><div style="border:1px solid grey;padding:10px">
                                                    <input type="checkbox" name="'.$row['name'].'" value="'.$row['name'].'">&nbsp;&nbsp;<b>'.$row['name'].'</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;count:'.$row['count'].'
                                                    </div></div>';
                                        }
                                    ?>
                                </div>
                                <br>
                                <div class="row">
                                    <input type="button" id="searchBtn" value="Select Groups" class="btn btn-primary" style="margin-left: 15px;">
                                </div>
                                <br>
                                <div class="row">
                                    <div style="margin-left: 15px;">
                                        Total Records Found: 0
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                    <p style="text-align:justify;">Please fill in the following information about the campaign you are about to create. This information will be sent to the moderator along with your selection of the audience for this campaign.</p>
                    <br>
                    <form action="createnewcampaign.php" method="post" accept-charset="utf-8">
                        <div class="row">
                            <label>Name</label>
                            <input type="text" name="campaignName" class="form-control" placeholder="Enter Here" required>    
                        </div>
                        <br>
                        <div class="row">
                            <label>Category</label>
                            <select name="category" class="form-control" required>
                                <option value="" disabled selected>Select</option>
                                <option value="water">Water</option>
                                <option value="power">Power</option>
                                <option value="gas">Gas</option>
                                <option value="security">Security</option>
                            </select>    
                        </div>
                        <br>
                        <div class="row">
                            <label>Message</label>
                            <textarea class="form-control" name="message" rows="8" required placeholder="Enter here"></textarea>    
                        </div>
                        <br>
                        <div class="row">
                        <p style="text-align:justify;">By pressing the following button, you agree that the information provided above is correct to the best to your knowledge.</p></div>
                        <div class="row">
                            <input class="btn btn-primary" type="submit" name="submit" value="Submit Request for Approval">
                        </div>

                    </form>    
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