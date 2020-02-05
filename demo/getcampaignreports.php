<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

$id="";

if (isset($_GET['id'])) {
    $id= $_GET['id'];
}

    $query= mysqli_query($con,
    "SELECT notifications.reportedOn,(SELECT cell from users WHERE users.userId=notifications.userId) as contact, (SELECT CONCAT(firstname,' ',lastname) from users WHERE users.userId=notifications.userId) as name, (SELECT CONCAT(housenumber,' ',street,' ',sector,' ',phase,' ',city) from users WHERE users.userId=notifications.userId) as address, (Select gender from users where users.userId=notifications.userId) as gender, (Select passport from users where users.userId=notifications.userId) as passport, (Select bracelet from users where users.userId=notifications.userId) as bracelet, (Select hamla from users where users.userId=notifications.userId) as hamla, (Select groupid from users where users.userId=notifications.userId) as groupid, notifications.reportmsg FROM notifications WHERE notifications.campaignId='$id' AND notifications.reported='1' ORDER BY notifications.reportedOn DESC");
  
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