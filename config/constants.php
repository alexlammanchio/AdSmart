<?php 

if(!session_id()) {
    session_start();
}

//create constants to store non repeating values

define('SITEURL', 'http://localhost/adsmart/adsmart_content/');
define('ADMIN', 'http://localhost/adsmart/');
define('USER_MANAGEMENT', 'http://localhost/adsmart/user_management/');
define('USER_INTERACTION', 'http://localhost/adsmart/user_interaction/');
define('PRODUCT_MANAGEMENT', 'http://localhost/adsmart/product_management/');
define('REPORT_SYSTEM', 'http://localhost/adsmart/report_system/');
define('ORDER_TICKET', 'http://localhost/adsmart/order_ticket/');
define('PAYMENT', 'http://localhost/adsmart/payment/');
define('IMAGES', 'http://localhost/adsmart');
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "adsmart";

$conn = mysqli_connect($sname, $unmae, $password) or die(mysqli_error()); //db connection
$db_select = mysqli_select_db($conn, $db_name) or die(mysqli_error()); // select db

?>
