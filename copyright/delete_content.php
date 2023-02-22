<?php
    require '../database.php';
    $id = $_GET['id'];


    $delete = "DELETE FROM tbl_copyright WHERE id = $id";
    mysqli_query($db_connection, $delete);

    header('location:copyright_content.php');
?>