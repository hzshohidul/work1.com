<?php
    require '../database.php';
    $id = $_GET['id'];

    $select = "SELECT * FROM tbl_education WHERE id = $id";
    $select_result = mysqli_query($db_connection, $select);
    $result_tokra = mysqli_fetch_assoc($select_result);

    if($result_tokra['status'] == 1){
        $update = "UPDATE tbl_education SET status = 0 WHERE id = $id";
        mysqli_query($db_connection, $update);
        header('location:education_content.php');
    }else{
        $update2 = "UPDATE tbl_education SET status = 1 WHERE id = $id";
        mysqli_query($db_connection, $update2);
        header('location:education_content.php');
    }
?>