<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['notificationId']))
    { 
$notificationId= mysqli_real_escape_string($con, $_GET['notificationId']);
    }

if(isset($_GET['userId']))
    { 
$userId= mysqli_real_escape_string($con, $_GET['userId']);
    } 

$query= mysqli_query($con,"update notifications set seen='1',readOn=NOW() WHERE notifications.userId='$userId' and notifications.notificationId='$notificationId' and seen='0'");

$query= mysqli_query($con,"SELECT notifications.reportedOn as reportedOn,notifications.ackdOn as ackdOn,notifications.notificationId as id, notifications.seen as seen,notifications.ackd as ackd,notifications.reported as reported,notifications.reportmsg as reportmsg, (Select campaigns.campaignCategory from campaigns where campaigns.campaignId=notifications.campaignId and campaigns.isActivated='1') as subject,(Select campaigns.moderatedOn from campaigns where campaigns.campaignId=notifications.campaignId and campaigns.isActivated='1') as camdate,(Select campaigns.message from campaigns where campaigns.campaignId=notifications.campaignId and campaigns.isActivated='1') as msg from notifications WHERE notifications.userId='$userId' and notifications.notificationId='$notificationId'");


//making an array
$rows=array();
//filling that array
while($row=mysqli_fetch_assoc($query))
{
        $rows[]=$row;
}



$json= json_encode($rows);
$pretty_json= pretty_json($json);
echo $pretty_json;



function pretty_json($json) {
 
    $result      = '';
    $pos         = 0;
    $strLen      = strlen($json);
    $indentStr   = '  ';
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;
 
    for ($i=0; $i<=$strLen; $i++) {
 
        // Grab the next character in the string.
        $char = substr($json, $i, 1);
 
        // Are we inside a quoted string?
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;
 
        // If this character is the end of an element, 
        // output a new line and indent the next line.
        } else if(($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos --;
            for ($j=0; $j<$pos; $j++) {
                $result .= $indentStr;
            }
        }
 
        // Add the character to the result string.
        $result .= $char;
 
        // If the last character was the beginning of an element, 
        // output a new line and indent the next line.
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos ++;
            }
 
            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }
 
        $prevChar = $char;
    }
 
    return $result;
}

?>