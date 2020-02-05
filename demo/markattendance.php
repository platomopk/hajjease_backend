<?php
    session_start();
    include 'db_connect.php';
?>

<html>
<head>
    <title>Mark Attendance - OS</title>
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

            // $.getJSON("getuniqueclasses.php",function(data){
            //         var _len = data.length, post, i;
            //         if (_len>0) {
            //             var trHTML = '';
            //             $.each(data, function (i, item) {
            //                 $("#selectClass").append("<option value='"+item.class+"'>"+item.class+"</option>");
            //             });
                   
            //     }else{
            //         $("#selectClass").append('<option value="">No Classes</option>');
            //     }
            // });

            $("#selectClass").change(function(){


                //alert($(this).val());

                $("#selectSection").find("option:not(:first)").remove();

                $.getJSON("getuniquesections.php?id="+$.trim($(this).val())+"",function(data){
                        var _len = data.length, post, i;
                        if (_len>0) {
                            var trHTML = '';
                            $.each(data, function (i, item) {
                                $("#selectSection").append("<option value='"+item.section+"'>"+item.section+"</option>");
                            });
                    }else{
                        //$("#selectSection").append('<option value="all">All</option>');
                    }
                });


            });


            $("#getStudentsBtn").click(function(){

                if ($("#selectClass").val() != "" && $("#selectSection").val() != "" ) {

                    var cl= $.trim($("#selectClass").val());
                    var dt= $.trim($("#date").val());
                    var sc= $.trim($("#selectSection").val());

                    


                    $.getJSON("getstudents.php?cl="+cl+"&sc="+sc,function(data){

                            var _len = data.length, post, i;
                            total = _len;
                            if (_len>0) {
                                $("#attable tr:has(td)").remove();

                                var trHTML = '';
                                $.each(data, function (i, item) {
                                    trHTML+="<tr><td><input type='text' name='rollnum[]' value='"+item.rollnum+"' style='width:100%;border:none;' readonly></td><td>"+item.name+"</td><td>"+item.class+"</td><td>"+item.section+"</td><td>P <input type='radio' name="+item.rollnum+" value='present' checked>&nbsp;&nbsp;A <input type='radio' name="+item.rollnum+" value='absent'>&nbsp;&nbsp;HL <input type='radio' name="+item.rollnum+" value='halfleave'></td></tr>";
                                });
                                $("#attable tbody").append(trHTML);


                                $("#summaryDiv").css('display','block');

                        }else{
                            $("#attable tr:has(td)").remove();
                            alert("no data found");
                            $("#summaryDiv").css('display','none');
                            //$("#selectSection").append('<option value="all">All</option>');
                        }
                    });


                }else{
                    alert("Please enter valid values.")
                }

            });

            $("#date").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
                maxDate:0
            });            


            $('#setAttendance').ajaxForm({
                beforeSend:function(){
                    window.scrollTo(0,0);
                    $("#wait").css('display', 'block');
                },
                uploadProgress:function(event,position,total,percentComplete)
                {
                    
                },
                success:function(){
                    
                },
                complete:function(response){
                    $("#wait").css('display', 'none');
                    alert(response.responseText);
                    location.reload();
                    // if (response.responseText=="Err") {
                    //     alert("Couldnot add this cart. Please try again");
                    // }else{
                    //     alert("Successfully Sold!"); 
                    //     location.reload();  
                    // }
                    

                    //show the barcode here
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
        table {
        table-layout: fixed;
        word-wrap: break-word;
        }

        table th, table td {
            overflow: hidden;
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
                    <img src="assets/logo.png" id="mainlogo" alt="logo" class="img img-responsive pull-left" onclick="window.location='index.php';">
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


<section style="background-color: #ffebee; display: none" id="wait">
    <span style="padding-top: 5px; padding-bottom: 5px;"  class="center-block text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><p style="font-size: larger; font-weight: 500; ">PLEASE WAIT ...</p></span>
</section>
<br>
<section>
    <form id="setAttendance" action="setattendance.php" method="get" accept-charset="utf-8">
        <div class="row">
            <div class="container">
                <div class="row">
                    <h4 style="padding-left: 15px;"><u>MARK ATTENDANCE</u></h4>
                </div>
                <div class="row">
                    <div class="col-md-4">

                        <label for="date" style="font-weight: 100;">Date</label>
                        <input type="text" name="datef" id="date" placeholder="click here to set date" class="form-control" style="width: 80%" required>  

                        <div style="width: 100%;height:10px;"></div>

                        <label for="selectClass" style="font-weight: 100;">Class</label>
                        <select id="selectClass" name="classf" class="form-control" style="width: 80%" required>
                          <option value="" selected>Please select a class</option>
                          <option value="Class 2">Class 2</option>
                          <option value="Class 6">Class 6</option>
                          <option value="Class 10">Class 10</option>
                        </select>  

                        <div style="width: 100%;height:10px;"></div>

                        <label for="selectSection" style="font-weight: 100;">Section</label>
                        <select id="selectSection" name="sectionf" class="form-control" style="width: 80%" required>
                          <option value="" selected>Please select a section</option>
                        </select> 

                        <div style="width: 100%;height:10px;"></div>

                        <p style="width: 80%; text-align: justify;"><b>Note:</b> The following button click will render all the results of currently enrolled students in this search, those who are not enrolled or are under moderation will not be visible here.</p>

                        <input class="btn btn-primary" type="button" id="getStudentsBtn" value="List Students" style="width: 80%">


                        
                    </div>

                    <div id="summaryDiv" class="col-md-8" style="background-color: beige; display:none">
                        <div>
                            <h4><u>Details</u></h4>
                        </div>

                        
                            <div>
                                <table id="attable" class="table table-bordered table-hover" style="background-color: white">    
                                    <thead>
                                        <tr style="background-color: lightgrey">
                                            <th>Roll #</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <input class="btn btn-primary" type="submit" name="submit" value="Mark Attendance">
                            </div>
                        

                        <br>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
</section>
<br><br><br><br>





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