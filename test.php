<?php

include 'db_connect.php';

if (file_exists("profile/bcp-1489823695.jpg")) {
	unlink("profile/bcp-1489823695.jpg");
	echo 'Deleted';
}

?>