<?php
    require '../database.php';
    SESSION_START();
    $id = $_GET['id'];

    $select = "SELECT * FROM tbl_social WHERE id = $id";
    $select_result = mysqli_query($db_connection, $select);
    $result_tokra = mysqli_fetch_assoc($select_result);
    $icon_status = $result_tokra['status'];
    //-----------------------------------------------------
    if($icon_status == 1){
        //--------------------------------------------------
        $update = "UPDATE tbl_social SET status = 0 WHERE id = $id";
        mysqli_query($db_connection, $update);
        header('location:social.php');
    }else{
        //-----------------------------------------------
        $select_status = "SELECT COUNT(*) AS total_active FROM tbl_social WHERE status = 1";
        $select_result = mysqli_query($db_connection, $select_status);
        $result_tokra = mysqli_fetch_assoc($select_result);
        $active_count = $result_tokra['total_active'];
        //------------------------------------------------
        if($active_count >= 4){
            $_SESSION['message'] = "Maximum 4 icons can be active";
            header('location:social.php');
        }else{
            $update = "UPDATE tbl_social SET status = 1 WHERE id = $id";
            mysqli_query($db_connection, $update);
            header('location:social.php');
        }
    }
?>