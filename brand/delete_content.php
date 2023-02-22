<?php
    require '../database.php';
    $id = $_GET['id'];

    //------------------------------
    $select = "SELECT * FROM tbl_brand WHERE id = $id";
    $select_result = mysqli_query($db_connection, $select);
    $result_tokra = mysqli_fetch_assoc($select_result);
    $image_name = $result_tokra['image'];
    //------------------------------
    $image_location = "../frontend/img/brand/".$image_name;
    unlink($image_location);
    //------------------------------


    $delete = "DELETE FROM tbl_brand WHERE id = $id";
    mysqli_query($db_connection, $delete);

    header('location:brand_content.php');

?>