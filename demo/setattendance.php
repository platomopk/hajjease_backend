<?php 
include 'db_connect.php';
    
    $rollnum = ""; $datef=""; $classf=""; $sectionf="";

    $url = "http://202.61.51.118:1470/shopy.php?";

    if (isset($_GET['rollnum'])) {
        $rollnum = $_GET['rollnum'];
    }

    if (isset($_GET['datef'])) {
        $datef = $_GET['datef'];
    }

    if (isset($_GET['classf'])) {
        $classf = $_GET['classf'];
    }

    if (isset($_GET['sectionf'])) {
        $sectionf = $_GET['sectionf'];
    }

    $status = array();

    foreach ($rollnum as $key => $value) {
        $status[] = $_GET[$value];
    }
    
    $valArr = array();
        
    for($i=0;$i<count($status);$i++)
    {
        $valArr[]="('$datef','$classf','$sectionf','1','$rollnum[$i]','$status[$i]')";
    } 
    
    $query = "insert into attendance (date,class,section,markedby,studentid,status) values ";
    $query .= implode(',', $valArr);

    $querySearch2= mysqli_query($con,$query);


    $getAbsents = mysqli_query($con,"select (select students.gnumber from students where students.rollnum = attendance.studentid) as number,(select students.name from students where students.rollnum = attendance.studentid) as name, studentid, status from attendance where date='$datef' and class='$classf' and section='$sectionf' and status='absent'");



    while ($row = mysqli_fetch_assoc($getAbsents)) {
        $message = 'Your child '.$row['name'].' did not come to the school today.';
        
        getUrlContent($url."sender=".$row['number']."&message=".$message);
        

        //fileGetContent($url."sender=".$row['number']."&message=".$message);

        // echo nl2br($row['name'] . " | " . $row['number'] . " | " . $row['studentid'] . " | " . $row['status'] . "\n");
    }

    if ($getAbsents) {
        echo "Attendance Successfully Marked!";
    }else{
        echo "System Failed To Complete This Request. Try Again Later";
    }

    

    function getUrlContent($url){
        $url = str_replace(' ','%20',$url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        usleep(3000000);
        return ($httpcode>=200 && $httpcode<300) ? $data : false;
    }

    function fileGetContent($url){
        $opts = array(
          'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en" 
          )
        );

         $context = stream_context_create($opts);

        // Open the file using the HTTP headers set above
        $file = file_get_contents($url, false, $context);
    }

?>


