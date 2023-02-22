<?php
    require '../session_check.php';
    require '../database.php';
    include '../dashboard_parts/header.php';
?>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <strong class="text-primary">
                <?php
                    if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                    }
                ?>
            </strong>
            <table class="table table-spirited">
                <tr>
                    <th>SL</th>
                    <th>Sub title</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
<?php
    $select = "SELECT * FROM tbl_about";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$about_tokra){
?>
                <tr>
                    <td><?= $sl+1; ?></td>
                    <td><?= $about_tokra['sub_title']; ?></td>
                    <td><?= $about_tokra['title']; ?></td>
                    <td>
                        <p>
                            <?= $about_tokra['descrip']; ?>
                        </p>
                    </td>
                    <td>
                        <img src="../frontend/img/about/<?= $about_tokra['image']; ?>" alt="" width="100">
                    </td>
                    <td>
                        <?php
                            if($about_tokra['status'] == 1){
                        ?>
                            <a href="content_status.php?id=<?= $about_tokra['id']; ?>" class="btn btn-info">Active</a>
                        <?php }?>

                        <?php
                            if($about_tokra['status'] == 0){
                        ?>
                            <a href="content_status.php?id=<?= $about_tokra['id']; ?>" class="btn btn-success">Deactivate</a>
                        <?php }?>
                    </td>
                    <td>
                        <a class="btn btn-danger deleted-click" data-href="delete_content.php?id=<?= $about_tokra['id']; ?>">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add About</h3>
                </div>
                <div class="card-body">
                    <form action="about_content_post.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="subtitle" class="form-control mb-3" placeholder="Enter Subtitle" id="">

                        <input type="text" name="title" class="form-control mb-3" placeholder="Enter Title" id="">

                        <textarea name="description" id="" placeholder="Description" cols="30" rows="5" class="form-control mb-3" style="resize:none"></textarea>

                        <input type="file" name="image" class="form-control mb-3" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" id="">

                        <img src="../frontend/img/about/about_img2.png" id="blah" width="200" class="mb-3 d-block" alt="">

                        <button type="submit" class="btn btn-primary">Add About</button>
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
        var linkjabe = $(this).attr('data-href');
        
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
        })
    });
</script>