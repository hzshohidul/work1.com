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
                    <th>Year</th>
                    <th>Title</th>
                    <th>Percentage</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
<?php
    $select = "SELECT * FROM tbl_education";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$education_tokra){
?>
                <tr>
                    <td><?= $sl+1; ?></td>
                    <td>
                        <p>
                        <?= $education_tokra['year']; ?>
                        </p>
                    </td>
                    <td><?= $education_tokra['title']; ?></td>
                    <td>
                        <p><?= $education_tokra['percentage']; ?></p>
                    </td>
                    <td>
                        <?php
                            if($education_tokra['status'] == 1){
                        ?>
                            <a href="content_status.php?id=<?= $education_tokra['id']; ?>" class="btn btn-info">Active</a>
                        <?php }?>

                        <?php
                            if($education_tokra['status'] == 0){
                        ?>
                            <a href="content_status.php?id=<?= $education_tokra['id']; ?>" class="btn btn-success">Deactivate</a>
                        <?php }?>
                    </td>
                    <td>
                        <a class="btn btn-danger deleted-click" data-href="delete_content.php?id=<?= $education_tokra['id']; ?>">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Education</h3>
                </div>
                <div class="card-body">
                    <form action="education_content_post.php" method="POST" enctype="multipart/form-data">

                        <input type="number" name="year" class="form-control mb-3" placeholder="Enter year" id="">

                        <input type="text" name="title" class="form-control mb-3" placeholder="Enter Title" id="">

                        <input type="number" name="percentage" class="form-control mb-3" placeholder="Enter Percentage" id="">

                        <button type="submit" class="btn btn-primary">Add Education</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Section Title</h3>
                </div>
                <div class="card-body">
                    <form action="education_title_post.php" method="POST" enctype="multipart/form-data">

                        <input type="text" name="title" class="form-control mb-3" placeholder="Enter Title" id="">

                        <button type="submit" class="btn btn-primary">Add Title</button>
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