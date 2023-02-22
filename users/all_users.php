<?php
	require '../session_check.php';
	require '../database.php';
	include '../dashboard_parts/header.php';
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xl-6 col-xxl-12">
		<div class="card-header">
			<h3>User List</h3>
		</div>
		<strong class="text-danger">
			<?php
				if(isset($_SESSION['delete'])){
					echo $_SESSION['delete'];
				}
			?>
		</strong>
		<div class="card-body">
			<table class="table table-striped">
				<tr>
					<th>SL</th>
					<th>Name</th>
					<th>Email</th>
					<th>image</th>
					<th>Action</th>
				</tr>
<?php
	$select = "SELECT * FROM tbl_users";
	$user_all = mysqli_query($db_connection, $select);
?>
<?php
	foreach($user_all as $sl=>$user_data) {
?>
				<tr>
					<td><?= $sl+1; ?></td>
					<td><?= $user_data['name'] ?></td>
					<td><?= $user_data['email'] ?></td>
					<td>
						<img src="../assets/uploads/users/<?= $user_data['image'] ?>" width="80" height="80" alt="user-image">
					</td>
					<td>
						<?php
							if($user_data['id'] == $_SESSION['id']){
								echo 'My';
							}else{
						?>
								<a href="delete.php?id=<?= $user_data['id'] ?>" class="btn btn-danger">Delete</a>
						<?php
							}
						?>
					</td>
				</tr>
<?php } ?>
			</table>
		</div>
	</div>
</div>


<?php
	include '../dashboard_parts/footer.php';
?>