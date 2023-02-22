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
            <table class="table table-responsive-sm">
                <thead class="thead-info">
                    <tr>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Email</th>
                    </tr>
                </thead>
<?php
    $id = $_GET['id'];
    $select = "SELECT * FROM tbl_message WHERE id = $id";
    $select_result = mysqli_query($db_connection, $select);


    $update2 = "UPDATE tbl_message SET status = 1 WHERE id = $id";
    mysqli_query($db_connection, $update2);
?>
<?php
    foreach($select_result AS $message_tokra){
?>
                <tr>
                    <td><?= $message_tokra['name']; ?></td>
                    <td>
                        <p><?= $message_tokra['message']; ?></p>
                    </td>
                    <td>
                        <p><?= $message_tokra['email']; ?></p>
                    </td>
                </tr>
<?php } ?>
            </table>
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