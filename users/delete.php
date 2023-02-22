<?php
    SESSION_START();
    require '../database.php';
    $id = $_GET['id'];

    if(!isset($id)){
        header('location:../index.php');
    }

    $select = "SELECT * FROM tbl_users WHERE id = $id";
    $select_result = mysqli_query($db_connection, $select);
    $result_tokra = mysqli_fetch_assoc($select_result);
    $image_name = $result_tokra['image'];
    $up_image_delete = '../assets/uploads/users/'.$image_name;
    unlink($up_image_delete);

    $delete = "DELETE FROM tbl_users WHERE id = $id";
    mysqli_query($db_connection, $delete);
    $_SESSION['delete'] = "User Deleted Success";
    header('location:all_users.php');
?>