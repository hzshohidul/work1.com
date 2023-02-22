<?php
    SESSION_START();
    require '../database.php';

    $title        = $_POST['title'];
    $address      = $_POST['address'];
    $phone        = $_POST['phone'];
    $email        = $_POST['email'];

    $address_spicial = htmlspecialchars($address);
    // -------------------------------------------------------
    if(empty($title) || empty($address) || empty($phone) || empty($email)){
        $_SESSION['message'] = 'Any Field is Blank.';
        header('location:information_content.php');
    }else{
        //--------------------------------
        $insert = "INSERT INTO tbl_information (title, address, phone, email) VALUES ('$title', '$address_spicial', '$phone', '$email')";
        mysqli_query($db_connection, $insert);
        //-------------------------------

        $_SESSION['message'] = 'Content Insert Successfully!';
        header('location:information_content.php');
        //------------------------------ 
    }
?>