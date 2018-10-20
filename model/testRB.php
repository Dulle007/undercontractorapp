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
//$conn->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
//$sql = "SELECT * FROM UserSecurity WHERE ID = '".$_SESSION['user']."'";
$result = R::getAll("SELECT C.name, US.user_id, US.user_name, US.password, DBT.host_name, DBT.database_name, DBT.user_db, DBT.password_db "
                . "FROM user_security US "
                . "INNER JOIN user U ON US.user_id=U.id "
                . "INNER JOIN company C ON U.company_id=C.id "
                . "INNER JOIN database_table DBT ON C.id=DBT.company_id  "
                . "WHERE US.id='" . "1" . "'");

echo json_encode($result);
