<?php
	require '../session_check.php';
	require '../database.php';
	include '../dashboard_parts/header.php';
?>
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Logos</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
<?php
    $select = "SELECT * FROM tbl_logos";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$result_tokra){
?>
                        <tr>
                            <td><?= $sl+1; ?></td>
                            <td>
                                <img src="../frontend/img/logo/<?= $result_tokra['logo'] ?>" alt="" width="100" height="auto">
                            </td>
                            <td>
                                <a href="status.php?id=<?= $result_tokra['id']; ?>" class="btn btn-<?=($result_tokra['status'] == 1 ?'success' : 'info')?>">

                                    <?=($result_tokra['status'] == 1 ?'Active' : 'Deactivate')?>

                                </a>
                            </td>
                            <td>
                                <div class="dropdown mb-3 show">
									<button type="button" class="btn btn-light" data-toggle="dropdown" aria-expanded="true">
										<svg width="10" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1 0.999999L7 7L13 1" stroke="#0B2A97" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<button class="dropdown-item deleted" delete-link="delete.php?id=<?= $result_tokra['id'] ?>" >
                                            Delete
                                        </buttona>
									</div>
								</div>
                            </td>
                        </tr>
<?php } ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Logo</h3>
                </div>
                <strong class="text-danger">
                    <?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                        }
                    ?>
                </strong>
                <div class="card-body">
                    <form action="logo_post.php" method="POST" enctype="multipart/form-data">
                        <input type="file" class="form-control" name="logo" id="" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img src="" alt="logo" id="blah" class="mb-3" width="200"><br>
                        <button class="btn btn-primary">Add logo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
	include '../dashboard_parts/footer.php';
?>
    <script>
        $('.deleted').click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    var linkjabe = $(this).attr('delete-link');
                    window.location.href = linkjabe;
                }
            })
        });
</script>