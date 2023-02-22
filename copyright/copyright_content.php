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
                    <th>Content</th>
                    <th>Action</th>
                </tr>
<?php
    $select = "SELECT * FROM tbl_copyright";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$copyright_tokra){
?>
                <tr>
                    <td><?= $sl+1; ?></td>
                    <td><?= $copyright_tokra['content']; ?></td>
                    <td>
                        <a class="btn btn-danger deleted-click" data-href="delete_content.php?id=<?= $copyright_tokra['id']; ?>">Delete</a>
                    </td>
                </tr>
<?php } ?>
            </table>
        </div>
<?php
    $select = "SELECT * FROM tbl_copyright";
    $select_result = mysqli_query($db_connection, $select);
    $result_tokra = mysqli_fetch_assoc($select_result);
?>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Footer Copyright</h3>
                </div>
                <div class="card-body">
                    <form action="copyright_title_post.php" method="POST" enctype="multipart/form-data">

                        <input type="text" value="<?= (isset($result_tokra['content'])) ? $result_tokra['content'] : 'Copyright © Website | All Rights Reserved'; ?>" name="content" class="form-control mb-3" placeholder="Enter Copyright Content" id="">

                        <button type="submit" class="btn btn-primary">Add Copyright</button>
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