<?php
	require '../session_check.php';
	require '../database.php';
	include '../dashboard_parts/header.php';
?>
<?php
    $id = $_SESSION['id'];
    // $select = "SELECT * FROM tbl_users WHERE id = $id";
    // $select_result = mysqli_query($select);
    // $result_tokra = mysqli_fetch_assoc($select_result);
    //***header file ee thakate akhane ar likha lagbe na****
?>
    <div class="row">
        <div class="col-lg-7 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3>Profile: <?= $result_tokra['name']; ?></h3>
                </div>
                <strong class="text-danger">
                    <?php
                        if(isset($_SESSION['name_update'])){
                            echo $_SESSION['name_update'];
                        }
                    ?>
                </strong>
                <div class="card-body">
                    <form action="profile_info_update.php" method="POST">
                        <input type="hidden" name="id" value="<?= $result_tokra['id']; ?>" >
                        <div class="profile-personal-info">
                            <div class="row mb-2">
                                <div class="">
                                    <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>
                                    <input type="text" name="name" value="<?= $result_tokra['name']; ?>" class="text-primary form-control" id="">
                                </span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="">
                                    <h5 class="f-w-500">Old Password <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>
                                    <input type="password" name="old_password" class="text-primary form-control" placeholder="Enter Old Password" id="">
                                </span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="">
                                    <h5 class="f-w-500">New Password <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>
                                    <input type="password" name="new_password" class="text-primary form-control" placeholder="Enter New Password" id="">
                                </span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class=""><span>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3>Profile Image</h3>
                </div>
                <storng class="text-danger">
                    <?php
                        if(isset($_SESSION['image_message'])){
                            echo $_SESSION['image_message'];
                        }
                    ?>
                </storng>
                <div class="card-body">
                    <form action="profile_image_update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $result_tokra['id']; ?>" name="id">
                        <div class="profile-personal-info">
                            <div class="row mb-2">
                                <div class=""><span>
                                    <img src="../assets/uploads/users/<?= $result_tokra['image']; ?>" alt="" width="200" height="auto" id="blah" >

                                    <input type="file" width="200" height="auto" name="image" class="text-primary form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" id="">
                                </span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class=""><span>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
	include '../dashboard_parts/footer.php';
?>