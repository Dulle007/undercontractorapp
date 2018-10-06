<?php
	session_start();
	if(isset($_SESSION['usr'])){
		echo 'authentified';
	}
?>