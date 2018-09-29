<?php

session_start();
	
$conn = new mysqli("mysql687.loopia.se", "uclogindb@c44997", "undrc%ldb_^01#", "consultech_rs_db_14");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$out = array('error' => false);

$user = json_decode(file_get_contents('php://input'));

$username = $user->username;
$password = $user->password;

$sql = "SELECT * FROM UserSecurity WHERE Username='$username' AND Password='$password'";
$query = $conn->query($sql);

if($query->num_rows>0){
	$row = $query->fetch_array();
	$out['message'] = 'Login Successful';
	$out['user'] = uniqid('ang_');
	$_SESSION['user'] = $row['ID'];
}
else{
	$out['error'] = true;
	$out['message'] = 'Invalid Login!!!';
}

echo json_encode($out);

?>