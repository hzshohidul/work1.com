<?php
    SESSION_START();
    require '../database.php';

    $title        = $_POST['title'];

    $title_spicial = htmlspecialchars($title);

    $select = "SELECT * FROM tbl_education_title";
    $select_result = mysqli_query($db_connection, $select);
    $row_count = mysqli_num_rows($select_result);

 
    if($row_count == 0){
        // ---------------------------
        $insert = "INSERT INTO tbl_education_title (title) VALUES ('$title_spicial')";
        mysqli_query($db_connection, $insert);

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:education_content.php');
    }else{
        // ---------------------------
        $result_tokra = mysqli_fetch_assoc($select_result);
        $id = $result_tokra['id'];

        $update = "UPDATE tbl_education_title SET title = '$title_spicial' WHERE id = $id";
        mysqli_query($db_connection, $update);

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:education_content.php');
    }
?>