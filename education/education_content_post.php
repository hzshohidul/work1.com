<?php
    SESSION_START();
    require '../database.php';

    $year        = $_POST['year'];
    $title        = $_POST['title'];
    $percentage  = $_POST['percentage'];

    $title_spicial = htmlspecialchars($title);
    // -------------------------------------------------------
    if(empty($year) || empty($title) || empty($percentage)){
        $_SESSION['message'] = 'Any Field is Blank.';
        header('location:education_content.php');
    }else{
        //--------------------------------
        $insert = "INSERT INTO tbl_education (year, title, percentage) VALUES ('$year', '$title_spicial', '$percentage')";
        mysqli_query($db_connection, $insert);
        //-------------------------------

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:education_content.php');
        //------------------------------ 
    }
?>