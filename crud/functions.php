<?php 
		function insert(){
			$hostName="localhost";
			$userName="root";
			$password="";
			$dbName="batch03";
			$name=$_POST["name"];
			$email=$_POST["email"];
			$status=$_POST["status"];
			if($name==""){
				echo '<span class="alert alert-danger">Name field is not be Empty</span>';
			}
			else if($email==""){
				echo '<span class="alert alert-danger">Email field is not be Empty</span>';
			}
			else{
				$con = new mysqli($hostName,$userName,$password,$dbName);
				$qr = $con->query("INSERT INTO tbl_info(name,email,status)VALUES('$name','$email','$status')");
			if ($qr) {
				echo '<span class="alert alert-success">Data Saved</span>';
			}
			else{
				echo '<span class="alert alert-danger">Data Not Saved</span>';
			}
			}
			}
	}
	

?>