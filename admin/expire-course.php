<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}


require_once("../db.php");

if(isset($_GET)) {

	//Delete Company using id and redirect
	$sql = "UPDATE udemy_post SET active='1' WHERE id_udemypost='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: udemyposts.php");
		exit();
	} else {
		echo "Error";
	}
}
