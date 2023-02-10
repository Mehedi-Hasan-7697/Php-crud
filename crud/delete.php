<?php 
	$id=$_GET["uid"];
	$con= new mysqli("localhost","root","","batch03");
	$con->query("DELETE FROM tbl_info WHERE id='$id'");
	header("location: index.php");