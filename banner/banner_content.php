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
                    <th>Button text</th>
                    <th>Button url</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
<?php
    $select = "SELECT * FROM tbl_banner_contents";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$banner_tokra){
?>
                <tr>
                    <td><?= $sl+1; ?></td>
                    <td><?= $banner_tokra['sub_title']; ?></td>
                    <td><?= $banner_tokra['title']; ?></td>
                    <td><p>
                        <?= $banner_tokra['descrip']; ?>
                    </p></td>
                    <td>
                        <button class="btn btn-success">
                        <?= $banner_tokra['btn_text']; ?>
                        </button>
                    </td>
                    <td>
                        <?= $banner_tokra['btn_url']; ?>
                    </td>
                    <td>
                        <?php
                            if($banner_tokra['status'] == 1){
                        ?>
                            <a href="content_status.php?id=<?= $banner_tokra['id']; ?>" class="btn btn-info">Active</a>
                        <?php }?>

                        <?php
                            if($banner_tokra['status'] == 0){
                        ?>
                            <a href="content_status.php?id=<?= $banner_tokra['id']; ?>" class="btn btn-success">Deactivate</a>
                        <?php }?>
                    </td>
                    <td>
                        <a class="btn btn-danger deleted-click" data-href="delete_content.php?id=<?= $banner_tokra['id']; ?>">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Content</h3>
                </div>
                <div class="card-body">
                    <form action="banner_content_post.php" method="POST">
                        <input type="text" name="subtitle" class="form-control mb-3" placeholder="Enter Subtitle" id="">

                        <input type="text" name="title" class="form-control mb-3" placeholder="Enter Title" id="">

                        <textarea name="description" id="" placeholder="Description" cols="30" rows="5" class="form-control mb-3" style="resize:none"></textarea>

                        <input type="text" name="btn_text" class="form-control mb-3" placeholder="Button text" id="">

                        <input type="url" name="btn_url" class="form-control mb-3" placeholder="Button URL" id="">

                        <button type="submit" class="btn btn-primary">Add Banner Content</button>
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