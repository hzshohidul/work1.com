<?php
    require '../database.php';
    $id = $_GET['id'];

    $delete = "DELETE FROM tbl_banner_contents WHERE id = $id";
    mysqli_query($db_connection, $delete);

    header('location:banner_content.php');
?>