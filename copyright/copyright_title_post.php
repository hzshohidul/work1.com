<?php
    SESSION_START();
    require '../database.php';

    $content = $_POST['content'];


    $select = "SELECT * FROM tbl_copyright";
    $select_result = mysqli_query($db_connection, $select);
    $row_count = mysqli_num_rows($select_result);

 
    if($row_count == 0){
        // ---------------------------
        $insert = "INSERT INTO tbl_copyright (content) VALUES ('$content')";
        mysqli_query($db_connection, $insert);

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:copyright_content.php');
    }else{
        // ---------------------------
        $result_tokra = mysqli_fetch_assoc($select_result);
        $id = $result_tokra['id'];

        $update = "UPDATE tbl_copyright SET content = '$content' WHERE id = $id";
        mysqli_query($db_connection, $update);

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:copyright_content.php');
    }
?>