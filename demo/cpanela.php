<?php
    session_start();
    include 'db_connect.php';
    if (isset($_SESSION['id'])) {
    }else{
        header("location:index.php");  
    }
?>

<html>
<head>
    <title>Dashboard - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no">

    <script src="js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="js/form.js" type="text/javascript"></script>

    <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Category', 'Total'],
        ['Food', 12],
        ['Power', 2],
        ['Cleanliness', 6],
        ['Water', 2],
        ['Security', 4],
        ['Others', 3]
    ]);
    var data1 = google.visualization.arrayToDataTable([
        ['Category', 'Total'],
        ['22-09-2019', 12],
        ['23-09-2019', 2],
        ['24-09-2019', 6],
        ['25-09-2019', 8],
        ['26-09-2019', 4],
        ['27-09-2019', 4]
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {'title':'29 Feedbacks Recieved', 'width':500, 'height':300, 'margin':'0px auto'};
    var options1 = {'title':'26 Emergencies Recieved', 'width':800, 'height':300, 'margin':'0px auto'};

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);

    var chart1 = new google.visualization.ColumnChart(document.getElementById('barchart'));
    chart1.draw(data1, options1);
    }
</script>

    <!-- <script src="http://malsup.github.com/jquery.form.js"></script>  -->

    <script>


        $().ready(function(){
            $('#myTab a[href="' + hash + '"]').tab('show');


            $("#myProfileLogoutBtn").click(function(){
                window.location = "logoff.php";
            });

            $("#createNewGeneralNotifcationBtn").click(function(){
                window.location="createnewgeneralnotification.php";
                //alert("Clicked!")
            });

            $("#viewAllAttendanceBtn").click(function(){
                window.location="viewallattendance.php";
                //alert("Clicked!")
            });

            $("input[name=complaintsradio]").change(function(){
                if ($("#complaintsHome").is(":checked")) {
                    $("#complaintsHomeSection").css('display', 'block');
                    $("#complaintsLogsSection").css('display', 'none');
                }else if($("#complaintsLog").is(":checked")) {
                    $("#complaintsHomeSection").css('display', 'none');
                    $("#complaintsLogsSection").css('display', 'block');
                }
            });

            $("input[name=observationradio]").change(function(){
                if ($("#observationHome").is(":checked")) {
                    $("#observationHomeSection").css('display', 'block');
                    $("#observationLogsSection").css('display', 'none');
                }else if($("#observationLog").is(":checked")) {
                    $("#observationHomeSection").css('display', 'none');
                    $("#observationLogsSection").css('display', 'block');
                }
            });

            $("input[name=servicesradio]").change(function(){
                if ($("#servicesHome").is(":checked")) {
                    $("#servicesHomeSection").css('display', 'block');
                    $("#servicesLogsSection").css('display', 'none');
                }else if($("#servicesLog").is(":checked")) {
                    $("#servicesHomeSection").css('display', 'none');
                    $("#servicesLogsSection").css('display', 'block');
                }
            });

            $("input[name=securityradio]").change(function(){
                if ($("#securityHome").is(":checked")) {
                    $("#securityHomeSection").css('display', 'block');
                    $("#securityLogsSection").css('display', 'none');
                }else if($("#securityLog").is(":checked")) {
                    $("#securityHomeSection").css('display', 'none');
                    $("#securityLogsSection").css('display', 'block');
                }
            });

            //fill carpool table
            $.getJSON("getallcarpool.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#carpooltable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.starttime+'</td><td>'+item.namestarter+'</td><td>'+item.dest_to+'</td><td>'+item.dest_from+'</td><td>'+item.completedby+'</td></tr>';
                });
                $("#carpooltable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#carpooltable tr:has(td)").remove();
                    //alert("No Carpools Found!");
                }
            });

            //fill management registered table
            $.getJSON("getallmanagement.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#managementregisteredtable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.name+'</td><td>'+item.cell+'</td><td>'+item.branch+'</td><td>'+item.email+'</td><td>'+item.createdOn+'</td></tr>';
                });
                $("#managementregisteredtable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#managementregisteredtable tr:has(td)").remove();
                    //alert("No Administrators Found!");
                }
            });

            //fill service summary table
            $.getJSON("getservicessummary.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#servicessummarytable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.total+'</td><td>'+item.done+'</td></tr>';
                });
                $("#servicessummarytable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#servicessummarytable tr:has(td)").remove();
                    //alert("No Services Found!");
                }
            });

            //fill open services table
            $.getJSON("getallopenservices.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#openservicestable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.category+'</td><td>'+item.title+'</td><td>'+item.message+'</td><td>'+item.status+'</td></tr>';
                });
                $("#openservicestable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#openservicestable tr:has(td)").remove();
                    //alert("No Services Found!");
                }
            });

            //fill open services table
            $.getJSON("getallserviceslog.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#serviceslogtable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.servicesId+'</td><td>'+item.createdOn+'</td><td>'+item.name+'</td><td>'+item.address+'</td><td>'+item.category+'</td><td>'+item.status+'</td><td>'+item.closuredate+'</td><td>'+item.resource+'</td></tr>';
                });
                $("#serviceslogtable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#serviceslogtable tr:has(td)").remove();
                    //alert("No Services Found!");
                }
            });

            //fill complaint summary table
            $.getJSON("getcomplaintssummary.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#complaintsummarytable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.total+'</td><td>'+item.done+'</td></tr>';
                });
                $("#complaintsummarytable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#complaintsummarytable tr:has(td)").remove();
                    //alert("No Complaint Found!");
                }
            });

            //fill open complaint table
            $.getJSON("getallopencomplaints.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#opencomplaintstable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.hamla+'</td><td>'+item.groupid+'</td><td>'+item.category+'</td><td>'+item.title+'</td><td>'+item.message+'</td><td>'+item.status+'</td></tr>';
                });
                $("#opencomplaintstable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#opencomplaintstable tr:has(td)").remove();
                    //alert("No Complaint Found!");
                }
            });

            //fill complaint table
            $.getJSON("getallcomplaintslog.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#complaintlogtable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.name+'</td><td>'+item.contact+'</td><td>'+item.passport+'</td><td>'+item.hamla+'</td><td>'+item.groupid+'</td><td>'+item.category+'</td><td>'+item.message+'</td><td>'+item.status+'</td><td></td></tr>';
                });
                $("#complaintlogtable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#complaintlogtable tr:has(td)").remove();
                    //alert("No Complaint Found!");
                }
            });


                //observations

                $.getJSON("getobservationsummary.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#observationsummarytable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.total+'</td><td>'+item.done+'</td></tr>';
                    });
                    $("#observationsummarytable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#observationsummarytable tr:has(td)").remove();
                        //alert("No Complaint Found!");
                    }
                });

                //fill obs  table
                $.getJSON("getallopenobservation.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#openobservationtable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.category+'</td><td>'+item.title+'</td><td>'+item.message+'</td><td>'+item.status+'</td><td>'+item.type+'</td></tr>';
                    });
                    $("#openobservationtable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#openobservationtable tr:has(td)").remove();
                        //alert("No Complaint Found!");
                    }
                });

                //fill obs table
                $.getJSON("getallobservationlog.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#observationlogtable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.obsid+'</td><td>'+item.createdOn+'</td><td>'+item.name+'</td><td>'+item.address+'</td><td>'+item.cat+'</td><td>'+item.placename+'</td><td>'+item.message+'</td><td>'+item.status+'</td><td>'+item.closureTime+'</td><td>'+item.resource+'</td><td>'+item.type+'</td><td><a target="_blank" href="http://aslkdnfas.com/'+item.picture+'">Image</a></td></tr>';
                    });
                    $("#observationlogtable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#observationlogtable tr:has(td)").remove();
                        //alert("No Complaint Found!");
                    }
                });



                //end
 


















            //fill panic summary table
            $.getJSON("getpanicsummary.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#panicsummarytable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.total+'</td><td>'+item.done+'</td></tr>';
                });
                $("#panicsummarytable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#panicsummarytable tr:has(td)").remove();
                    //alert("No Panic Complaint Found!");
                }
            });

            //fill open panic table
            $.getJSON("getallopenpanic.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#openpanictable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.category+'</td><td>'+item.respondername+'</td><td>'+item.status+'</td></tr>';
                });
                $("#openpanictable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#openpanictable tr:has(td)").remove();
                    //alert("No Panic Found!");
                }
            });

            //fill paniclog table
            $.getJSON("getallpaniclog.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#paniclogtable tr:has(td)").remove();
                var trHTML = '';
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.requesttime+'</td><td>'+item.name+'</td><td>'+item.gender+'</td><td>'+item.passport+'</td><td>'+item.bracelet+'</td><td>'+item.hamla+'</td><td>'+item.groupid+'</td><td>'+item.emergencypoc+'</td><td>'+item.emergencynumber+'</td><td>'+item.panictype+'</td><td>'+item.respondername+'</td><td>'+item.closureauthority+'</td><td>'+item.closuretime+'</td><td>'+item.status+'</td></tr>';
                });
                $("#paniclogtable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#paniclogtable tr:has(td)").remove();
                    //alert("No Panic Found!");
                }
            });

            //database find
            $("#database_find").click(function(event) {
                if ($("#database_number").val()!="" || $("#database_email").val()!="") 
                {
                    //fill databaseusers table
                    $.getJSON("getuserinfo.php?number="+$.trim($("#database_number").val())+"&email="+$.trim($("#database_email").val()),function(data){
                        var _len = data.length, post, i;
                        var user_id="";
         
                        if (_len>0) {
                        $("#databaseusertable tr:has(td)").remove();
                        var trHTML = '';
                        $.each(data, function (i, item) {
                            trHTML+='<tr><td>'+item.name+'</td><td>'+item.gender+'</td><td>'+item.cnic+'</td><td>'+item.cell+'</td><td>'+item.landline+'</td><td>'+item.address+'</td><td><a  target="_blank" href="http://localhost/bcp/'+item.picture+'">Image</a></td></tr>';
                            user_id = item.userId;
                        });
                        $("#databaseusertable tbody").append(trHTML);

                            //fill servants table
                            $.getJSON("getservantsinfo.php?id="+user_id,function(data){
                                var _len = data.length, post, i;
                                var user_id="";
                 
                                if (_len>0) {
                                $("#databaseservantstable tr:has(td)").remove();
                                var trHTML = '';
                                $.each(data, function (i, item) {
                                    trHTML+='<tr><td>'+item.name+'</td><td>'+item.gender+'</td><td>'+item.cnic+'</td><td>'+item.mobile+'</td><td>'+item.landline+'</td><td>'+item.address+'</td><td>'+item.type+'</td><td>'+item.isActivated+'</td><td>'+item.entryTime+'</td><td>'+item.exitTime+'</td><td><a  target="_blank" href="http://localhost/bcp/'+item.picture+'">Image</a></td></tr>';
                                });
                                $("#databaseservantstable tbody").append(trHTML);
                                }else{
                                    //show not found bar
                                    $("#databaseservantstable tr:has(td)").remove();
                                    //alert("No Servants Found!");
                                }
                            });

                            //fill cars table
                            $.getJSON("getcarsinfo.php?id="+user_id,function(data){
                                var _len = data.length, post, i;
                                var user_id="";
                 
                                if (_len>0) {
                                $("#databasecarstable tr:has(td)").remove();
                                var trHTML = '';
                                $.each(data, function (i, item) {
                                    trHTML+='<tr><td>'+item.make+'</td><td>'+item.model+'</td><td>'+item.color+'</td><td>'+item.registeration_number+'</td><td>'+item.chasis_number+'</td><td>'+item.is_activated+'</td><td><a  target="_blank" href="http://localhost/bcp/'+item.picture+'">Image</a></td></tr>';
                                });
                                $("#databasecarstable tbody").append(trHTML);
                                }else{
                                    //show not found bar
                                    $("#databasecarstable tr:has(td)").remove();
                                    //alert("No Cars Found!");
                                }
                            });

                        }else{
                            //show not found bar
                            $("#databaseusertable tr:has(td)").remove();
                            alert("No Users Found!");
                        }
                    });
                }
                else
                {
                    alert("Please enter values first.")
                }
            });

            //createNewAdminForm
            $('#createNewAdminForm').ajaxForm({
                beforeSend:function(){

                },
                uploadProgress:function(event,position,total,percentComplete)
                {
                    
                },
                success:function(){
                    
                },
                complete:function(response){    
                    alert(response.responseText);
                    //refresh management registered table
                    $.getJSON("getallmanagement.php",function(data){
                        var _len = data.length, post, i;
         
                        if (_len>0) {
                        $("#managementregisteredtable tr:has(td)").remove();
                        var trHTML = '';
                        $.each(data, function (i, item) {
                            trHTML+='<tr><td>'+item.name+'</td><td>'+item.cell+'</td><td>'+item.branch+'</td><td>'+item.email+'</td><td>'+item.createdOn+'</td></tr>';
                        });
                        $("#managementregisteredtable tbody").append(trHTML);
                        }else{
                            //show not found bar
                            $("#managementregisteredtable tr:has(td)").remove();
                            //alert("No Administrators Found!");
                        }
                    });
                }
            });

            //createNewCampaignform
            $('#createNewCampaignForm').ajaxForm({
                beforeSend:function(){

                },
                uploadProgress:function(event,position,total,percentComplete)
                {
                    
                },
                success:function(){
                    
                },
                complete:function(response){
                    console.log(response);    
                    alert(response.responseText);
                    //getallcampaignsinfo
                    $.getJSON("getallcampaigns.php",function(data){
                        var _len = data.length, post, i;
         
                        if (_len>0) {
                        $("#notificationTable tr:has(td)").remove();
                        var trHTML = '';
                        $.each(data, function (i, item) {
                            trHTML+='<tr><td>'+item.campaignName+'</td><td>'+item.campaignCategory+'</td><td>'+item.message+'</td><td>'+item.moderatedOn+'</td><td>'+item.sentto+'</td><td>'+item.totalseen+'</td><td>'+item.totalackd+'</td><td>'+item.totalreported+'</td></tr>';
                        });
                        $("#notificationTable tbody").append(trHTML);
                        }else{
                            //show not found bar
                            $("#notificationTable tr:has(td)").remove();
                        }
                    });
                }
            });

            //interval panic block
            window.setInterval(function(){




                //fill paniclog table

                $.getJSON("securitypanicweb.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {

                    $.each(data, function (i, item) {
                        // $("#panic_name").text(item.name);
                        $("#panic_name").html('<p class="lead">'+item.name+'<a href="https://maps.google.com/maps?q='+item.location+'" target="_blank"> - (Goto Location) - </a></p>');
                        $("#panic_address").text(item.address);
                        $("#panic_time").html('<p class="lead"> - (DT -> '+item.requesttime+')</p>');
                    });
                        $("#panic_section").css('display','block');
                        $("body").scrollTop()
                    }else{
                        $("#panic_section").css('display','none');
                    }
                });



                //getallcampaignsinfo
                $.getJSON("getallcampaigns.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#notificationTable tr:has(td)").remove();
                    var trHTML = '';
                    

                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.campaignName+'</td><td>'+item.campaignCategory+'</td><td>'+item.message+'</td><td>'+item.moderatedOn+'</td><td>'+item.sentto+'</td><td>'+item.totalseen+'</td><td>'+item.totalackd+'</td><td><a href="'+'#reportsmodel'+'" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-id="'+item.campaignId+'"  title="View Reports" style="text-decoration:none; color:red;cursor:pointer;text-decoration:underline;">'+item.totalreported+'</a></td></tr>';
                    });
                    $("#notificationTable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#notificationTable tr:has(td)").remove();
                    }
                });

                //fill carpool table
                // $.getJSON("getallcarpool.php",function(data){
                //     var _len = data.length, post, i;
     
                //     if (_len>0) {
                //     $("#carpooltable tr:has(td)").remove();
                //     var trHTML = '';
                //     $.each(data, function (i, item) {
                //         trHTML+='<tr><td>'+item.starttime+'</td><td>'+item.namestarter+'</td><td>'+item.dest_to+'</td><td>'+item.dest_from+'</td><td>'+item.completedby+'</td></tr>';
                //     });
                //     $("#carpooltable tbody").append(trHTML);
                //     }else{
                //         //show not found bar
                //         $("#carpooltable tr:has(td)").remove();
                //         //alert("No Carpools Found!");
                //     }
                // });

                //fill service summary table
                // $.getJSON("getservicessummary.php",function(data){
                //     var _len = data.length, post, i;
     
                //     if (_len>0) {
                //     $("#servicessummarytable tr:has(td)").remove();
                //     var trHTML = '';
                //     $.each(data, function (i, item) {
                //         trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.total+'</td><td>'+item.done+'</td></tr>';
                //     });
                //     $("#servicessummarytable tbody").append(trHTML);
                //     }else{
                //         //show not found bar
                //         $("#servicessummarytable tr:has(td)").remove();
                //       //  alert("No Services Found!");
                //     }
                // });

                //fill open services table
                // $.getJSON("getallopenservices.php",function(data){
                //     var _len = data.length, post, i;
     
                //     if (_len>0) {
                //     $("#openservicestable tr:has(td)").remove();
                //     var trHTML = '';
                //     $.each(data, function (i, item) {
                //         trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.category+'</td><td>'+item.title+'</td><td>'+item.message+'</td><td>'+item.status+'</td></tr>';
                //     });
                //     $("#openservicestable tbody").append(trHTML);
                //     }else{
                //         //show not found bar
                //         $("#openservicestable tr:has(td)").remove();
                //       //  alert("No Services Found!");
                //     }
                // });

                //fill complaint summary table
                $.getJSON("getcomplaintssummary.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#complaintsummarytable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.total+'</td><td>'+item.done+'</td></tr>';
                    });
                    $("#complaintsummarytable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#complaintsummarytable tr:has(td)").remove();
                      //  alert("No Complaint Found!");
                    }
                });

                //fill open complaint table
                $.getJSON("getallopencomplaints.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#opencomplaintstable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.hamla+'</td><td>'+item.groupid+'</td><td>'+item.category+'</td><td>'+item.title+'</td><td>'+item.message+'</td><td>'+item.status+'</td></tr>';
                    });
                    $("#opencomplaintstable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#opencomplaintstable tr:has(td)").remove();
                      //  alert("No Complaint Found!");
                    }
                });

                //fill panic summary table
                $.getJSON("getpanicsummary.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#panicsummarytable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.total+'</td><td>'+item.done+'</td></tr>';
                    });
                    $("#panicsummarytable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#panicsummarytable tr:has(td)").remove();
                      //  alert("No Panic Complaint Found!");
                    }
                });

                //fill open panic table
                $.getJSON("getallopenpanic.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#openpanictable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.category+'</td><td>'+item.respondername+'</td><td>'+item.status+'</td></tr>';
                    });
                    $("#openpanictable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#openpanictable tr:has(td)").remove();
                      //  alert("No Panic Found!");
                    }
                });



                //auto log here
                // $.getJSON("getallserviceslog.php",function(data){
                //     var _len = data.length, post, i;
     
                //     if (_len>0) {
                //     $("#serviceslogtable tr:has(td)").remove();
                //     var trHTML = '';
                //     $.each(data, function (i, item) {
                //         trHTML+='<tr><td>'+item.servicesId+'</td><td>'+item.createdOn+'</td><td>'+item.name+'</td><td>'+item.address+'</td><td>'+item.category+'</td><td>'+item.status+'</td><td>'+item.closuredate+'</td><td>'+item.resource+'</td></tr>';
                //     });
                //     $("#serviceslogtable tbody").append(trHTML);
                //     }else{
                //         //show not found bar
                //         $("#serviceslogtable tr:has(td)").remove();
                //         //alert("No Services Found!");
                //     }
                // });

                $.getJSON("getallcomplaintslog.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#complaintlogtable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.name+'</td><td>'+item.contact+'</td><td>'+item.passport+'</td><td>'+item.hamla+'</td><td>'+item.groupid+'</td><td>'+item.category+'</td><td>'+item.message+'</td><td>'+item.status+'</td><td></td></tr>';
                    });
                    $("#complaintlogtable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#complaintlogtable tr:has(td)").remove();
                        //alert("No Complaint Found!");
                    }
                });
            
                $.getJSON("getallpaniclog.php",function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    $("#paniclogtable tr:has(td)").remove();
                    var trHTML = '';
                    $.each(data, function (i, item) {
                        trHTML+='<tr><td>'+item.requesttime+'</td><td>'+item.name+'</td><td>'+item.gender+'</td><td>'+item.passport+'</td><td>'+item.bracelet+'</td><td>'+item.hamla+'</td><td>'+item.groupid+'</td><td>'+item.emergencypoc+'</td><td>'+item.emergencynumber+'</td><td>'+item.panictype+'</td><td>'+item.respondername+'</td><td>'+item.closureauthority+'</td><td>'+item.closuretime+'</td><td>'+item.status+'</td></tr>';
                    });
                    $("#paniclogtable tbody").append(trHTML);
                    }else{
                        //show not found bar
                        $("#paniclogtable tr:has(td)").remove();
                        //alert("No Panic Found!");
                    }
                });


               //observations

                // $.getJSON("getobservationsummary.php",function(data){
                //     var _len = data.length, post, i;
     
                //     if (_len>0) {
                //     $("#observationsummarytable tr:has(td)").remove();
                //     var trHTML = '';
                //     $.each(data, function (i, item) {
                //         trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.total+'</td><td>'+item.done+'</td></tr>';
                //     });
                //     $("#observationsummarytable tbody").append(trHTML);
                //     }else{
                //         //show not found bar
                //         $("#observationsummarytable tr:has(td)").remove();
                //         //alert("No Complaint Found!");
                //     }
                // });

                //fill obs  table
                // $.getJSON("getallopenobservation.php",function(data){
                //     var _len = data.length, post, i;
     
                //     if (_len>0) {
                //     $("#openobservationtable tr:has(td)").remove();
                //     var trHTML = '';
                //     $.each(data, function (i, item) {
                //         trHTML+='<tr><td>'+item.createdOn+'</td><td>'+item.category+'</td><td>'+item.title+'</td><td>'+item.message+'</td><td>'+item.status+'</td><td>'+item.type+'</td></tr>';
                //     });
                //     $("#openobservationtable tbody").append(trHTML);
                //     }else{
                //         //show not found bar
                //         $("#openobservationtable tr:has(td)").remove();
                //         //alert("No Complaint Found!");
                //     }
                // });

                //fill obs table
                // $.getJSON("getallobservationlog.php",function(data){
                //     var _len = data.length, post, i;
     
                //     if (_len>0) {
                //     $("#observationlogtable tr:has(td)").remove();
                //     var trHTML = '';
                //     $.each(data, function (i, item) {
                //         trHTML+='<tr><td>'+item.obsid+'</td><td>'+item.createdOn+'</td><td>'+item.name+'</td><td>'+item.address+'</td><td>'+item.cat+'</td><td>'+item.placename+'</td><td>'+item.message+'</td><td>'+item.status+'</td><td>'+item.closureTime+'</td><td>'+item.resource+'</td><td>'+item.type+'</td><td><a target="_blank" href="http://aslkdnfas.com/'+item.picture+'">Image</a></td></tr>';
                //     });
                //     $("#observationlogtable tbody").append(trHTML);
                //     }else{
                //         //show not found bar
                //         $("#observationlogtable tr:has(td)").remove();
                //         //alert("No Complaint Found!");
                //     }
                // });



                //end



            }, 5000);



            $('#reportsmodel').on('show.bs.modal', function (e) { //Modal Event
                var id = $(e.relatedTarget).data('id'); //Fetch id from modal

                $("#reportsmodeltable tr:has(td)").remove();

                $.getJSON("getcampaignreports.php?id="+id, function(data){
                    var _len = data.length, post, i;
     
                    if (_len>0) {
                    
                    var trHTML = '';
                    $.each(data, function (i, item) {
                            trHTML += '<tr><td>'+item.name+'</td><td>'+item.gender+'</td><td>'+item.contact+'</td><td>'+item.passport+'</td><td>'+item.bracelet+'</td><td>'+item.hamla+'</td><td>'+item.groupid+'</td><td>'+item.reportmsg+'</td></tr>';
                    });
                    $('#reportsmodeltable').append(trHTML);

                    }else{
                        //show not found bar
                        $("#reportsmodeltable tr:has(td)").remove();
                        alert("No Data Found!");
                    }
                });
            });

            //getallcampaignsinfo
            $.getJSON("getallcampaigns.php",function(data){
                var _len = data.length, post, i;
 
                if (_len>0) {
                $("#notificationTable tr:has(td)").remove();
                var trHTML = '';
                
                $.each(data, function (i, item) {
                    trHTML+='<tr><td>'+item.campaignName+'</td><td>'+item.campaignCategory+'</td><td>'+item.message+'</td><td>'+item.moderatedOn+'</td><td>'+item.sentto+'</td><td>'+item.totalseen+'</td><td>'+item.totalackd+'</td><td><a href="'+'#reportsmodel'+'" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-id="'+item.campaignId+'"  title="View Reports" style="text-decoration:none; color:red;cursor:pointer;text-decoration:underline;">'+item.totalreported+'</a></td></tr>';
                });
                
                $("#notificationTable tbody").append(trHTML);
                }else{
                    //show not found bar
                    $("#notificationTable tr:has(td)").remove();
                }
            });

            $("#acc_searchBtn").on('click',function(){
                if($("#acc_ppnumber").val() === "pk123456"){
                    $("#pilgrimfound").css("display","block");
                    $("#managepackage").css("display","block");
                }else{
                    $("#pilgrimfound").css("display","none");
                    $("#managepackage").css("display","none");
                    alert("Passport not found. Please try again.")
                }
                
            });

            $("#acc_assignBtn").on('click',function(){
                alert("Assignment Successful!");
                location.reload();
            });

            $("#acc_package").on('change',function(){
                $("#manageaccomodation").css("display","block");
                if($("#acc_package").val() === 'Umrah'){
                    $("#minacamp").css("display","none");
                }else{
                    $("#minacamp").css("display","block");
                }
            });

            $("#sc_addBtn").on('click',function(){
                alert("Schedule Added!");
                location.reload();
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
        .nav-pills > li {
            float:none;
            display:inline-block;
        }

        .nav-pills {
            text-align:center;
        }

        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
            color: #333;
            background-color: #e8f2ff;
        }

        .nav-pills li a{
            color: #fff;
        }

        .nav-pills li a:hover{
            color: #333;
        }

        table{
            table-layout: fixed;
            word-break: break-word;
        }

    </style>

</head>

<body>

<!-- header section -->

<section>
    <div class="row" style="background-color: #5d99c6; color:#333;">
        <div class="container" >
            <div class="row">
                <div class="col-md-3" >
                    <img src="assets/mecca.png" style="width:60px; height:60px; padding:10px;" id="mainlogo" alt="logo" class="pull-left">
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

<!-- panic -->
<section style="display: none;" id="panic_section">
    <div class="row">
        <div class="container" style="background-color:#e74c3c ">
            <div style="padding: 10px; box-sizing: border-box;text-align: center; color:#fff">
                <label style="font-size: x-large; text-decoration: underline;">PANIC ALERT!!</label> <br>
                <label style="font-size: large;" id="panic_name">NAME</label>
                <label style="font-size: large; display:none" id="panic_address">Address</label>
                <label style="font-size: large;" id="panic_time">DateTime</label>
            </div>
        </div>
    </div>
</section>

<!-- welcome -->
<br>
<section>
    <div class="row">
        <div class="container">
            <div style="padding: 10px; cursor:pointer; border:1px solid #e6e6e6; box-sizing: border-box;">
                <p class="lead" style="margin-bottom: 0px;">Welcome,  <span style="font-weight: bold;"><?php echo $_SESSION['name']; ?></span>!</p>
            </div>
        </div>
    </div>
</section>


<br>

<!-- tabbed categories -->
<section>
    <!-- centered pills -->
    <div class="row" style="background-color: #5d99c6;padding:5px">
        <div class="row" style="margin-left: 20px;margin-right: 20px;">
            <!-- pills header -->
            <div class="row" style="margin:0px auto">
                <ul class="nav nav-pills " id="myTab" style="text-align:left; margin-left:95px;">
                
                    <li class="active"><a data-toggle="pill" href="#tab1">NOTIFICATIONS</a></li>
                    <li ><a data-toggle="pill" href="#tab2">EMERGENCY</a></li>
                    <li ><a data-toggle="pill" href="#tab3">FEEDBACKS</a></li>
                    <li ><a data-toggle="pill" href="#tab8">ACCOMODATIONS</a></li>
                    <li ><a data-toggle="pill" href="#tab9">SCHEDULES</a></li>
                    <li ><a data-toggle="pill" href="#tab10">ANALYTICS</a></li>
                    <!-- <li ><a data-toggle="pill" href="#tab3_5">OBSERVATIONS</a></li>
                    <li ><a data-toggle="pill" href="#tab4">SERVICES</a></li>
                    <li ><a data-toggle="pill" href="#tab5">CARPOOL</a></li>
                    <li ><a data-toggle="pill" href="#tab6">DATABASE</a></li>
                    <li ><a data-toggle="pill" href="#tab7">MANAGEMENT</a></li> -->
                    
                </ul>

                <script type="text/javascript">
                            //selecting them tabs
                    $('#myTab a').click(function(e) {
                      e.preventDefault();
                      $(this).tab('show');
                      window.scrollTo(0,0);
                    });

                    // store the currently selected tab in the hash value
                    $("ul.nav-pills > li > a").on("shown.bs.tab", function(e) {
                      var id = $(e.target).attr("href").substr(1);
                      window.location.hash = id;
                      window.scrollTo(0,0);
                    });

                    // on load of the page: switch to the currently selected tab
                    var hash = window.location.hash;
                    $( "#myTab" ).tabs( "option", "active", '2' );

                    $('#myTab a[href="' + hash + '"]').tab('show');
                    $('a[href="' + hash + '"]').click();
                </script>
            </div>
        </div>
    </div>
</section>

<!-- tab Description -->
<section>
    <div class="row" >
        <div class="container" >
            <!-- pills content -->
            <div class="tab-content">

                <?php include "tab1.php";?>
                <?php include "tab2.php";?> 
                <?php include "tab3.php";?>
                <?php include "tab3_5.php";?>
                <?php include "tab4.php";?> 
                <?php include "tab5.php";?>
                <?php include "tab6.php";?> 
                <?php include "tab7.php";?>    
                <?php include "tab8.php";?>    
                <?php include "tab9.php";?>    
                <?php include "tab10.php";?>    
                    
                
            </div>
        </div>
    </div>
</section>




<!-- edit coupon modal -->
<?php include "reportsmodal.php";?>

</body>
</html>