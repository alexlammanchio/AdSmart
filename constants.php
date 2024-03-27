<?php 

if(!session_id()) {
    session_start();
}

//create constants to store non repeating values

define('SITEURL', 'http://localhost/adsmart/adsmart_content/');
define('ADSMART_CUSTOMER', 'http://localhost/adsmart/adsmart_customer/');
define('ADSMART_BUSINESS', 'http://localhost/adsmart/adsmart_business_partner/');
define('IMAGES', 'http://localhost/adsmart');
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "adsmart";

$conn = mysqli_connect($sname, $unmae, $password) or die(mysqli_error()); //db connection
$db_select = mysqli_select_db($conn, $db_name) or die(mysqli_error()); // select db

?>