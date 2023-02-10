<?php 
	include"classes.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<?php 
				$id=$_GET['uid'];
				$majid = new Majid;
				$result = $majid->findData($id);
				$data=$result->fetch_assoc();

				if(isset($_POST['update'])){
					$majid->update($_POST,$id);
				}
			?>
			<form method="POST" class="mt-5">
				<div class="form-group">
					<label>User Name</label>
					<input class="form-control" type="text" value="<?php  echo $data["name"]; ?>" name="name" id="">
				</div>
				<div class="form-group">
					<label>Email Address</label>
					<input class="form-control" type="email" value="<?php  echo $data["email"]; ?>" name="email" id="">
				</div>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status">
						
						<?php 

							if($data["status"]==1){
								echo '<option value="1">Active</option>';
							}
							else{
									echo '<option value="1">Active</option>';
							}
						?>
						<option value="1">Active</option>
						
						<option value="2">Inactive</option>
					</select>
				</div>
				<button class="form-control btn btn-info mt-3" name="update">Update</button>
			</form>	
				</div>
	</div>		
	
		

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</body>
</html>