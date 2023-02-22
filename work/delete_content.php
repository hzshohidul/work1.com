<?php
    require '../database.php';
    $id = $_GET['id'];


    $delete = "DELETE FROM tbl_work WHERE id = $id";
    mysqli_query($db_connection, $delete);

    header('location:work_content.php');
?>