<?php
session_start();
if (isset($_SESSION["PermissionID"])) {
    if ($_SESSION["PermissionID"] === 1) 
	{
	}
	else
	{
	header("Location: home.php");
	}
}
else{
header("Location: home.php");
	
}
?>