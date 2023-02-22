<?php
    SESSION_START();
    require 'database.php';
    //------------------------

    $email = $_POST['email'];
    $password = $_POST['password'];
    //-----------------------------
    $select = "SELECT COUNT(*) AS ganona FROM tbl_users WHERE email = '$email'";
    $select_all_result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_all_result);
    $email_number = $after_assoc['ganona'];

    if(empty($email) || empty($password)){
        $_SESSION['field_blank'] = 'Any Field is blank';
        header('location:login.php');
    }else{
        if($email_number == 1){
            $select_email_info = "SELECT * FROM tbl_users WHERE email = '$email'";
            $select_email_all_result = mysqli_query($db_connection, $select_email_info);
            $after_assoc_pass = mysqli_fetch_assoc($select_email_all_result);
            $password_db = $after_assoc_pass['password'];
             //------------------------------------------------------
            if(password_verify($password, $password_db)){
                $_SESSION['id'] = $after_assoc_pass['id'];
                $_SESSION['login_korse'] = 'Login kore asche.';
                header('location:dashboard.php');
            }else{
                 $_SESSION['pass_not_matching'] = 'Password Incurrect';
                 header('location:login.php');
            }
         }else{
             $_SESSION['email_not_found'] = 'Email dose not exist.';
             header('location:login.php');
         }
    }
?>