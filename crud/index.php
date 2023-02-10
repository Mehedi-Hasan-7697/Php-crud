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
	<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<?php 
				$m = new Majid;
				if (isset($_POST["save"])) {
					$name = $_POST["name"];
					$email = $_POST["email"];
					$status = $_POST["status"];
					if(empty($name)){
						echo '<span class="alert alert-danger">Name is Empty</span>';
					}
					else if(empty($email)){
						echo '<span class="alert alert-danger">Name is Empty</span>';
					}
					else{
						echo $mgs = $m->insert($name,$email,$status);	
					}
				}
				if(isset($_GET["uid"])){
					$id = $_GET['uid'];
					if ($m->delete($id)) {
						echo '<span class="alert alert-success">Data Deleted</span>';
					}
					else{
						echo '<span class="alert alert-danger">Data Not Deleted</span>';
					}
				}
				if(isset($_GET["updateId"])){
					$id = $_GET['updateId'];
					if ($m->update($_GET,$id)) {
						echo '<span class="alert alert-success">Data Updated</span>';
					}
					else{
						echo '<span class="alert alert-danger">Data Not Updated</span>';
					}
				}
				if(isset($_GET["statusId1"])){
					$id = $_GET['statusId1'];
					$m->statusUpdate2($id);
				}
				if(isset($_GET["statusId2"])){
					$id = $_GET['statusId2'];
					$m->statusUpdate1($id);
				}
			?>
			<form method="POST" class="mt-5">
				<div class="form-group">
					<label>User Name</label>
					<input class="form-control" type="text" name="name" id="">
				</div>
				<div class="form-group">
					<label>Email Address</label>
					<input class="form-control" type="email" name="email" id="">
				</div>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status">
						<option value="1">------Select Status-------</option>
						<option value="1">Active</option>
						<option value="2">Inactive</option>
					</select>
				</div>
				<button class="form-control btn btn-info mt-3" name="save">Save</button>
			</form>	
				</div>
	</div>		
	<div class="row mt-5">
		<div class="col-md-6 offset-md-3">
			<table class="table table-striped" id="dataTable1" border="5">
				<thead>
				<tr>
					<th>#Sl No</th>
					<th>Name</th>
					<th>Email</th>
					<th>Action</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$rs = $m->show();
					$sl=1;
					while($data=$rs->fetch_assoc()){

						echo '<tr><th>'.$sl.'</th>
								<td>'.$data["name"].'</td>
								<td>'.$data["email"].'</td>
								<td>

								<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit'.$data["id"].'"><i class="fas fa-edit"></i></button>

									<a href="" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#delete'.$data["id"].'"><i class="fas fa-trash"></i></a></td>';
							if($data["status"]==1){
								echo '<form method="GET"><td>
								<button class="btn btn-info btn-sm" value="'.$data["id"].'" name="statusId1">Active</button></td></form></tr>';
							}
							else{
								echo '<form method="GET"><td><button class="btn btn-warning btn-sm" value="'.$data["id"].'" name="statusId2">Inactive</button></td></form></tr>';
							}
							$sl++;
?>
<!-- Modal -->
<div class="modal fade" id="delete<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
      </div>
      <div class="modal-body">
        Are You Sure Want to Delete This User?
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>

        <form method="GET">
        	<button class="btn btn-danger" name="uid" value="<?php echo $data['id'] ?>">Delete</button>
        </form>

        <!-- <a href="delete.php?uid=<?php echo $data['id'] ?>" type="button" class="btn btn-danger">Delete</a> -->

      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="edit<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User Data</h5>
      </div>
      <div class="modal-body">
       <form method="GET">
       		<div class="form-group my-3">
       			<input type="text" placeholder="User Name" class="form-control" name="name" value="<?php echo $data['name'] ?>">
       		</div>
       		<div class="form-group my-3">
       			<input type="email" placeholder="User Email" class="form-control" name="email" value="<?php echo $data['email'] ?>">
       		</div>
       		<div class="form-group my-3">
       			<select class="form-control" name="status">
						<option value="1">------Select Status-------</option>
						<option value="1">Active</option>
						<option value="2">Inactive</option>
					</select>
       		</div>
       
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>

        	<button class="btn btn-danger" name="updateId" value="<?php echo $data['id'] ?>">Update</button>
        </form>

        <!-- <a href="delete.php?uid=<?php echo $data['id'] ?>" type="button" class="btn btn-danger">Delete</a> -->

      </div>
    </div>
  </div>
</div>

<?php 
					}
				?>
				<tbody>
			</table>
		</div>
	</div>
	
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
        	$(document).ready( function () {
					    $('#dataTable1').DataTable();
					} );
        </script>			
</body>
</html>