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
                    <th>image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
<?php
    $select = "SELECT * FROM tbl_brand";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$brand_tokra){
?>
                <tr>
                    <td><?= $sl+1; ?></td>
                    <td>
                        <img src="../frontend/img/brand/<?= $brand_tokra['image']; ?>" width="200" alt="brand">
                    </td>
                    <td>
                        <?php
                            if($brand_tokra['status'] == 1){
                        ?>
                            <a href="content_status.php?id=<?= $brand_tokra['id']; ?>" class="btn btn-info">Active</a>
                        <?php }?>

                        <?php
                            if($brand_tokra['status'] == 0){
                        ?>
                            <a href="content_status.php?id=<?= $brand_tokra['id']; ?>" class="btn btn-success">Deactivate</a>
                        <?php }?>
                    </td>
                    <td>
                        <a class="btn btn-danger deleted-click" data-href="delete_content.php?id=<?= $brand_tokra['id']; ?>">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Brand</h3>
                </div>
                <div class="card-body">
                    <form action="brand_content_post.php" method="POST" enctype="multipart/form-data">

                        <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" id="">

                        <img src="../frontend/img/brand/brand_img01.png" width="200" class="d-block" id="blah" alt="">

                        <button type="submit" class="btn btn-primary">Add New Brand</button>
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

<!-- icon input -->
<script>
    $('.icon_classta').click(function(){
        var icon_class = $(this).attr('data-iconta');
        $('#input_icon_class').attr('value', icon_class);
        $('#input_icon_class_id').attr('class', icon_class);
    });
</script>