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
                    <th>Name</th>
                    <th>Tag name</th>
                    <th>Letter</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
<?php
    $select = "SELECT * FROM tbl_testimonial";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$testimonial_tokra){
?>
                <tr>
                    <td><?= $sl+1; ?></td>
                    <td>
                        <img src="../frontend/img/testimonial/<?= $testimonial_tokra['image']; ?>" width="200" alt="testimonial">
                    </td>
                    <td><?= $testimonial_tokra['name']; ?></td>
                    <td>
                        <p><?= $testimonial_tokra['tag_name']; ?></p>
                    </td>
                    <td>
                        <p><?= $testimonial_tokra['letter']; ?></p>
                    </td>
                    <td>
                        <?php
                            if($testimonial_tokra['status'] == 1){
                        ?>
                            <a href="content_status.php?id=<?= $testimonial_tokra['id']; ?>" class="btn btn-info">Active</a>
                        <?php }?>

                        <?php
                            if($testimonial_tokra['status'] == 0){
                        ?>
                            <a href="content_status.php?id=<?= $testimonial_tokra['id']; ?>" class="btn btn-success">Deactivate</a>
                        <?php }?>
                    </td>
                    <td>
                        <a class="btn btn-danger deleted-click" data-href="delete_content.php?id=<?= $testimonial_tokra['id']; ?>">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Testimonial</h3>
                </div>
                <div class="card-body">
                    <form action="testimonial_content_post.php" method="POST" enctype="multipart/form-data">

                        <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" id="">

                        <img src="../frontend/img/testimonial/testi_avatar.png" width="200" class="d-block" id="blah" alt="">

                        <input type="text" name="name" class="form-control mb-3" placeholder="Enter Name" id="">

                        <input type="text" name="tag_name" class="form-control mb-3" placeholder="Enter Tagname" id="">


                        <textarea name="letter" id="" class="summernote"></textarea>

                        <button type="submit" class="btn btn-primary">Add New Testimonial</button>
                    </form>
                </div>
            </div>
        </div>
<?php
    $select = "SELECT * FROM tbl_testimonial_title";
    $select_result = mysqli_query($db_connection, $select);
    $result_tokra = mysqli_fetch_assoc($select_result);
?>
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Section Title</h3>
                </div>
                <div class="card-body">
                    <form action="testimonial_title_post.php" method="POST" enctype="multipart/form-data">

                        <input type="text" name="sub_title" class="form-control mb-3" value="<?= (isset($result_tokra['sub_title'])) ? $result_tokra['sub_title'] : 'TESTIMONIAL'; ?>" placeholder="Enter Sub Title" id="">

                        <input type="text" name="title" value="<?= (isset($result_tokra['title'])) ? $result_tokra['title'] : 'HAPPY CUSTOMER QUOTES'; ?>" class="form-control mb-3" placeholder="Enter Title" id="">

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