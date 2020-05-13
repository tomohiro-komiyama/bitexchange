<?php
   // error_reporting(E_ALL);
   //      ini_set('display_errors', 1);
define("INT_DB_HOST",'localhost');
define("INT_DB_USER",'root');
define("INT_DB_PASS",'xchange123');
define("INT_DB_NAME",'translator');

$conn_l=mysqli_connect(INT_DB_HOST, INT_DB_USER, INT_DB_PASS, INT_DB_NAME);
mysqli_set_charset( $conn_l, 'utf8');
// print_r($conn_l);
// if ($conn_l) {
// 	echo "string";
// }
?>