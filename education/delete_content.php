<?php
    require '../database.php';
    $id = $_GET['id'];


    $delete = "DELETE FROM tbl_education WHERE id = $id";
    mysqli_query($db_connection, $delete);

    header('location:education_content.php');
?>