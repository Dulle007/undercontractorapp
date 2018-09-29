<?php
	session_start();

	$conn = new mysqli("mysql687.loopia.se", "uclogindb@c44997", "undrc%ldb_^01#", "consultech_rs_db_14");
        $conn->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
        
	$output = array();
	//$sql = "SELECT * FROM UserSecurity WHERE ID = '".$_SESSION['user']."'";
        $sql = "SELECT C.Name, US.UserID, US.Username, US.Password "
                    . "FROM UserSecurity US "
                                        . "INNER JOIN User U ON US.UserID=U.ID "
                                        . "INNER JOIN Company C ON U.CompanyID=C.ID "
                    . "WHERE US.ID='".$_SESSION['user']."'";
	$query=$conn->query($sql);
	while($row=$query->fetch_array()){
		$output[] = $row;
	}

	echo json_encode($output);
