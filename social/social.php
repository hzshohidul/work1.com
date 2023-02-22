<?php
	require '../session_check.php';
	require '../database.php';
	include '../dashboard_parts/header.php';
?>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Show Font</h3>
                </div>
                <?php
                    if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                    }
                ?>
                <div class="card-body">
                    <table class="table table-sprited">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
<?php
    $select = "SELECT * FROM tbl_social";
    $select_result = mysqli_query($db_connection, $select);
?>
<?php
    foreach($select_result AS $sl=>$social_data){
?>
                        <tr>
                            <td><?= $sl+1; ?></td>
                            <td><i class="fa <?= $social_data['class'] ?>" style="font-family: fontawesome;font-size:30px;font-style:normal;margin:5px;"></i></td>
                            <td>
                                <a href="<?= $social_data['link'] ?>" target="_blank"><?= $social_data['link'] ?></a>
                            </td>
                            <td>
                                <a href="status.php?id=<?= $social_data['id']; ?>" class="btn btn-<?= ($social_data['status'] == 1 ? 'success' : 'secondary') ?>">
                                    <?= ($social_data['status'] == 1 ? 'Active' : 'Deactivate') ?>
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-info deleted" delete-link="delete.php?id=<?= $social_data['id'] ?>" >Delete</button>
                            </td>
                        </tr>
<?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Fonts</h3>
                    <?php
                        $fonts = array (
                            'fa-facebook',
                            'fa-facebook-square',
                            'fa-twitter',
                            'fa-twitter-square',
                            'fa-youtube-play',
                            'fa-linkedin',
                            'fa-linkedin-square',
                            'fa-instagram',
                            'fa-github',
                            'fa-github-square',
                          );
                    ?>
                </div>
                <strong class="text-danger mb-3">
                    <?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                        }
                    ?>
                </strong>
                <div class="card-body">
                    <form action="social_post.php" method="POST">
                        <div class="mb-3">
                            <?php
                                foreach($fonts AS $icon){
                            ?>
                            <i data-iconta="<?= $icon; ?>" class="<?= $icon; ?> icon_classta" style="font-family: fontawesome;font-size:30px;font-style:normal;margin:5px;cursor:pointer;"></i>
                            <?php } ?>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="icon_name_class" placeholder="Font Class" id="input_icon_class" readonly >

                            <i id="input_icon_class_id" style="font-family: fontawesome;font-size:30px;font-style:normal;"></i>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="link" placeholder="Enter Link" value="<?= (isset($_SESSION['site_link_value'])) ? $_SESSION['site_link_value'] : ''; ?>" id="">
                        </div>
                        
                        <div class="mb-3">
                            <button class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
	include '../dashboard_parts/footer.php';
?>
<!-- icon input -->
<script>
    $('.icon_classta').click(function(){
        var icon_class = $(this).attr('data-iconta');
        $('#input_icon_class').attr('value', icon_class);
        $('#input_icon_class_id').attr('class', icon_class);
    });
</script>
<!-- Delete -->
<script>
    $('.deleted').click(function(){
        var linkjabe = $(this).attr('delete-link');

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