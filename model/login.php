<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
	
require 'rb/rb.php';
R::setup('mysql:host=mysql687.loopia.se;dbname=consultech_rs_db_12', 'test@c44510', 'probna_sifra_1'); //for both mysql or mariaDBR

if (!R::testConnection()) {
    exit('Error connection!');
}

$out = array('error' => false);

$usr = json_decode(file_get_contents('php://input'));

$username = $usr->username;
$password = $usr->password;

//$sql = "SELECT * FROM user_security WHERE user_name='$username' AND password='$password'";
$result = R::getAll("SELECT * FROM user_security WHERE user_name=? AND password=?", array( $username, $password));

if (!empty($result)) {
    $out['message'] = 'Login Successful';
    $out['usr'] = uniqid('ang_');
    $_SESSION['usr'] = $result[0]["id"];
} else {
    $out['error'] = true;
    $out['message'] = 'Invalid Login!!!';
}
echo json_encode($out);
