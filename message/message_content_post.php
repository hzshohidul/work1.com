<?php
    SESSION_START();
    require '../database.php';

    $name          = $_POST['name'];
    $email         = $_POST['email'];
    $message       = $_POST['message'];

    $message_spicial = mysqli_real_escape_string($db_connection, $message);
    // -------------------------------------------------------
    if(empty($name) || empty($email) || empty($message)){
        $_SESSION['message'] = 'Any Field is Blank.';
        header('location: ../frontend/index.php?#contact');
    }else{
    //--------------------------------
        $insert = "INSERT INTO tbl_message (name, email, message) VALUES ('$name', '$email', '$message_spicial')";

        mysqli_query($db_connection, $insert);
        //-------------------------------
        $_SESSION['message'] = 'Message send successfully!';
        header('location: ../frontend/index.php?#contact');
    }
?>