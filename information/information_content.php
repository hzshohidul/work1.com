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
                    <th>Title</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
<?php
    $select = "SELECT * FROM tbl_information";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$information_tokra){
?>
                <tr>
                    <td><?= $sl+1; ?></td>

                    <td><?= $information_tokra['title']; ?></td>

                    <td><?= $information_tokra['address']; ?></td>
                    <td>
                        <p><?= $information_tokra['phone']; ?></p>
                    </td>
                    <td>
                        <p><?= $information_tokra['email']; ?></p>
                    </td>
                    <td>
                        <?php
                            if($information_tokra['status'] == 1){
                        ?>
                            <a href="content_status.php?id=<?= $information_tokra['id']; ?>" class="btn btn-info">Active</a>
                        <?php }?>

                        <?php
                            if($information_tokra['status'] == 0){
                        ?>
                            <a href="content_status.php?id=<?= $information_tokra['id']; ?>" class="btn btn-success">Deactivate</a>
                        <?php }?>
                    </td>
                    <td>
                        <a class="btn btn-danger deleted-click" data-href="delete_content.php?id=<?= $information_tokra['id']; ?>">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Education</h3>
                </div>
                <div class="card-body">
                    <form action="information_content_post.php" method="POST" enctype="multipart/form-data">

                        <input type="text" name="title" class="form-control mb-3" placeholder="Enter Title" id="">

                        <input type="text" name="address" class="form-control mb-3" placeholder="Enter Address" id="">

                        <input type="number" name="phone" class="form-control mb-3" placeholder="Enter Phone" id="">

                        <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" id="">

                        <button type="submit" class="btn btn-primary">Add New Information</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    $select = "SELECT * FROM tbl_information_title";
    $select_result = mysqli_query($db_connection, $select);
    $result_tokra = mysqli_fetch_assoc($select_result);
?>
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Section Title</h3>
                </div>
                <div class="card-body">
                    <form action="information_title_post.php" method="POST" enctype="multipart/form-data">

                        <input type="text" value="<?= (isset($result_tokra['sub_title'])) ? $result_tokra['sub_title'] : 'INFORMATION'; ?>" name="sub_title" class="form-control mb-3" placeholder="Enter Sub Title" id="">

                        <input type="text" value="<?= (isset($result_tokra['title'])) ? $result_tokra['title'] : 'CONTACT INFORMATION'; ?>" name="title" class="form-control mb-3" placeholder="Enter Title" id="">


                        <input type="text" name="desc" value="<?= (isset($result_tokra['descrip'])) ? $result_tokra['descrip'] : ''; ?>" class="form-control mb-3" placeholder="Enter Description (Optional)" id="">

                        <button type="submit" class="btn btn-primary">Add Section Title</button>
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