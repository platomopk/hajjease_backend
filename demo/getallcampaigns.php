<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';


    $query= mysqli_query($con,
    "SELECT 
	campaigns.campaignId,
    campaigns.campaignName,
    campaigns.campaignCategory,
    campaigns.message, 
    campaigns.moderatedOn,     
    (SELECT COUNT(notifications.notificationId) FROM notifications WHERE
     notifications.campaignId=campaigns.campaignId AND notifications.userId in (SELECT users.userId from users where users.usertoken != '' or users.usertoken != null)) as sentto,
          (SELECT COUNT(notifications.notificationId) FROM notifications WHERE notifications.campaignId=campaigns.campaignId and notifications.seen='1') as totalseen,(SELECT COUNT(notifications.notificationId) FROM notifications WHERE notifications.campaignId=campaigns.campaignId and notifications.ackd='1') as totalackd,(SELECT COUNT(notifications.notificationId) FROM notifications WHERE notifications.campaignId=campaigns.campaignId and notifications.reported='1') as totalreported FROM campaigns ORDER BY campaigns.moderatedOn DESC");
  
//making an array
$rows=array();
//filling that array
while($row=mysqli_fetch_assoc($query))
{
	$rows[]=$row;
}
//encoding that array
$json= json_encode($rows);
//prettifying that array
$pretty_json= pretty_json($json);
//echoing that prettified array
echo $pretty_json;

//function to pritify json data
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