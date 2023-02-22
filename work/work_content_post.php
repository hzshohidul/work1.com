<?php
    SESSION_START();
    require '../database.php';

    $icon         = $_POST['icon'];
    $title        = $_POST['title'];
    $description  = $_POST['description'];

    $description_spicial = htmlspecialchars($description);
    // -------------------------------------------------------
    if(empty($icon) || empty($title) || empty($description)){
        $_SESSION['message'] = 'Any Field is Blank.';
        header('location:work_content.php');
    }else{
        //--------------------------------
        $insert = "INSERT INTO tbl_work (icon, title, descrip) VALUES ('$icon', '$title', '$description_spicial')";
        mysqli_query($db_connection, $insert);
        //-------------------------------

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:work_content.php');
        //------------------------------ 
    }
?>