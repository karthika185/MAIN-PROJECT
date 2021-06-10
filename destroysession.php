<?php
	require_once("classes/FormAssist.class.php");
	require_once("classes/DataAccess.class.php");
	$dao=new DataAccess();
	session_start();
	session_destroy();
	session_unset();
	header("location:login.php");
?>