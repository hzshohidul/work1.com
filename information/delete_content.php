<?php
    require '../database.php';
    $id = $_GET['id'];


    $delete = "DELETE FROM tbl_information WHERE id = $id";
    mysqli_query($db_connection, $delete);

    header('location:information_content.php');
?>