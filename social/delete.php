<?php
    require '../database.php';
    $id = $_GET['id'];

    //------------------------------
    $delete = "DELETE FROM tbl_social WHERE id = $id";
    mysqli_query($db_connection, $delete);
    //------------------------------
    header('location:social.php');
?>