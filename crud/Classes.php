<?php 
	class Majid{
		private $con;
		function __construct(){
			$this->con= new mysqli("localhost","root","","batch03");
		}
		function insert($name,$email,$status){
			$result = $this->con->query("INSERT INTO tbl_info(name,email,status)VALUES('$name','$email','$status')");
			if($result){
				return '<span class="alert alert-success">Data Submited</span>';
			}
			else{
				return '<span class="alert alert-danger">Data Not Submited</span>';
			}
		}

	    function show(){
			$result = $this->con->query("SELECT *FROM tbl_info");
			return $result;
		}

	    function delete($id){
			$result = $this->con->query("DELETE FROM tbl_info WHERE id='$id'");
			
			if ($result) {
				header("location: index.php");
				return true;
				}
			else{
				return false;
			}
		}
	    function findData($id){
			$result = $this->con->query("SELECT *FROM tbl_info WHERE id='$id' LIMIT 1");
			return $result;
		}
	    function update($data,$id){
	    	$name = $data['name'];
	    	$email = $data['email'];
	    	$status = $data['status'];
			$result = $this->con->query("UPDATE tbl_info SET name='$name', email='$email',status='$status' WHERE id='$id'");
			if ($result) {
				header("location: index.php");
			}
		}
	    function statusUpdate1($id){
			$result = $this->con->query("UPDATE tbl_info SET status='1' WHERE id='$id'");
			if ($result) {
				header("location: index.php");
			}
		}
	    function statusUpdate2($id){
			$result = $this->con->query("UPDATE tbl_info SET status='2' WHERE id='$id'");
			if ($result) {
				header("location: index.php");
			}
		}

	}


