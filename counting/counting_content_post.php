<?php
    SESSION_START();
    require '../database.php';

    $icon   = $_POST['icon'];
    $count  = $_POST['count'];
    $title  = $_POST['title'];

    // -------------------------------------------------------
    if(empty($icon) || empty($count) || empty($title)){
        $_SESSION['message'] = 'Any Field is Blank.';
        header('location:counting_content.php');
    }else{
        //--------------------------------
        $insert = "INSERT INTO tbl_counting (icon, count, title) VALUES ('$icon', '$count', '$title')";
        mysqli_query($db_connection, $insert);
        //-------------------------------

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:counting_content.php');
        //------------------------------ 
    }
?>