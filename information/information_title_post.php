<?php
    SESSION_START();
    require '../database.php';

    $sub_title = $_POST['sub_title'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];


    $select = "SELECT * FROM tbl_information_title";
    $select_result = mysqli_query($db_connection, $select);
    $row_count = mysqli_num_rows($select_result);

 
    if($row_count == 0){
        // ---------------------------
        $insert = "INSERT INTO tbl_information_title (sub_title, title, descrip) VALUES ('$sub_title', '$title', '$desc')";
        mysqli_query($db_connection, $insert);

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:information_content.php');
    }else{
        // ---------------------------
        $result_tokra = mysqli_fetch_assoc($select_result);
        $id = $result_tokra['id'];

        $update = "UPDATE tbl_information_title SET sub_title = '$sub_title', title = '$title', descrip = '$desc' WHERE id = $id";
        mysqli_query($db_connection, $update);

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:information_content.php');
    }
?>