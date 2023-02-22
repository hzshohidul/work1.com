<?php
    SESSION_START();
    require '../database.php';

    $sub_title    = $_POST['subtitle'];
    $title        = $_POST['title'];
    $description  = $_POST['description'];
    $btn_text     = $_POST['btn_text'];
    $btn_url      = $_POST['btn_url'];

    $title_spicial = htmlspecialchars($title);
    $description_spicial = htmlspecialchars($description);
    // -------------------------------------------------------
    if(empty($sub_title) || empty($title) || empty($description) || empty($btn_text) || empty($btn_url)){
        $_SESSION['message'] = 'Any Field is Blank.';
        header('location:banner_content.php');
    }else{
        $insert = "INSERT INTO tbl_banner_contents (sub_title, title, descrip, btn_text, btn_url) VALUES ('$sub_title', '$title_spicial', '$description_spicial', '$btn_text', '$btn_url')";
        mysqli_query($db_connection, $insert);
    
        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:banner_content.php');
    }
?>