<?php
    SESSION_START();
    require '../database.php';
    $id = $_GET['id'];
    //------------------------------
    $select = "SELECT * FROM tbl_logos WHERE id = $id";
    $select_result = mysqli_query($db_connection, $select);
    $result_tokra = mysqli_fetch_assoc($select_result);
    $image_name = $result_tokra['logo'];
    //------------------------------
    $image_location = "../frontend/img/logo/".$image_name;
    unlink($image_location);
    //------------------------------
    $delete = "DELETE FROM tbl_logos WHERE id = $id";
    mysqli_query($db_connection, $delete);
    //------------------------------
    header('location:logo.php');
?>