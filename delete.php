<?php
	include "dbconnect.php";
	$ids = $_GET['id'];
	$sql = "DELETE FROM `note` WHERE `note`.`s.no` = $ids";
	$result = mysqli_query($conn,$sql);
	header('location:crud.php');
?>