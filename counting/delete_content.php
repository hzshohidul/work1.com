<?php
    require '../database.php';
    $id = $_GET['id'];


    $delete = "DELETE FROM tbl_counting WHERE id = $id";
    mysqli_query($db_connection, $delete);

    header('location:counting_content.php');
?>