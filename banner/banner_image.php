<?php
    require '../session_check.php';
    require '../database.php';
    include '../dashboard_parts/header.php';
?>
    <div class="row">
        <div class="col-lg-8 col-md-8">
        <strong class="text-danger">
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
        </strong>
            <table class="table table-spirited">
                <tr>
                    <th>SL</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
<?php
    $select = "SELECT * FROM tbl_banner_image";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$banner_tokra){
?>
                <tr>
                    <td><?= $sl+1; ?></td>
                    <td>
                        <img src="../frontend/img/banner/<?= $banner_tokra['image']; ?>" alt="banner_image" width="300" height="auto" >
                    </td>
                    <td>
                        <a href="image_status.php?id=<?= $banner_tokra['id']; ?>" class="btn btn-<?= ($banner_tokra['status'] == 0) ? 'success' : 'info' ?>">
                            <?= ($banner_tokra['status'] == 1) ? 'Active' : 'Deactivate' ?>
                        </a>
                    </td>
                    <td>
                        <a delete-href="delete_image.php?id=<?= $banner_tokra['id']; ?>" class="btn btn-danger deleted-click">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Image</h3>
                </div>
                <div class="card-body">
                    <form action="banner_image_post.php" method="POST" enctype="multipart/form-data">

                        <input type="file" name="image" class="form-control mb-3" id="" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >

                        <img src="../frontend/img/banner/banner_img.png" alt="bannerimg" id="blah" width="200" class="mb-3">

                        <button type="submit" class="btn btn-primary">Add Banner Image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include '../dashboard_parts/footer.php';
?>
<script>
    $('.deleted-click').click(function(){
        var linkjabe = $(this).attr('delete-href');

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
                window.location.href = linkjabe;
            }
        });
    });
</script>