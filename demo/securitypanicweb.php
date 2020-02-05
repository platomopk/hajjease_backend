<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

//query string
$query= mysqli_query($con,
"SELECT 
(SELECT concat(users.firstname,' ',users.lastname,' (',users.gender,') - (PP -> ',users.passport,')',' - (','Pakistani)') FROM users WHERE users.userId=panic.userid) as name,
(SELECT concat(users.housenumber,' ',users.street,' ',users.sector,' ',users.phase,' ',users.city) FROM users WHERE users.userId=panic.userid) as address, panic.requesttime, panic.location 
FROM panic WHERE panic.requesttime >= NOW() - INTERVAL 5 MINUTE ORDER BY panic.requesttime DESC
LIMIT 1");


//making an array
$rows=array();
//filling that array
while($row=mysqli_fetch_assoc($query))
{
    $rows[] = $row;
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