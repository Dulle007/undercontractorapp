<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require 'rb/rb.php';

$db_params = json_decode(file_get_contents('php://input'));

$hostName = $db_params->host_name;
$dbName = $db_params->database_name;
$dbUser = $db_params->user_db;
$dbPassword = $db_params->password_db;
/*$hostName = 'mysql678.loopia.se';
$dbName = 'consultech_rs_db_16';
$dbUser = 'ucdb_gp@c45698';
$dbPassword = '^ucdb_gp#2018';*/


R::setup("mysql:host=$hostName;dbname=$dbName", "$dbUser", "$dbPassword"); //for both mysql or mariaDBR

if (!R::testConnection()) {
    exit('Error connection!');
}

$result = R::getAll("SELECT * FROM action_log");

echo json_encode($result);


