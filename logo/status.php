<?php
    require '../database.php';
    $id = $_GET['id'];
    //----------------------------------------------

    $update = "UPDATE tbl_logos SET status = 0";
    mysqli_query($db_connection, $update);
    //-----------------------------------------------

    $update2 = "UPDATE tbl_logos SET status = 1 WHERE id = $id";
    mysqli_query($db_connection, $update2);
    //-----------------------------------------------

    header('location:logo.php');
?>