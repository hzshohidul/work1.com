<?php
    SESSION_START();
    require '../database.php';
    //--------------------------------
    $id = $_POST['id'];
    $name = $_POST['name'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    //--------------------------------
    if(empty($new_password)){
        if(empty($name)){
            echo 'Name Field is Blank';
        }else{
            $update = "UPDATE tbl_users SET name = '$name' WHERE id = $id";
            mysqli_query($db_connection, $update);
            $_SESSION['name_update'] = 'Name Updated Success';
            header('location:profile.php');
        }
    }else{
        $select = "SELECT * FROM tbl_users WHERE id = $id";
        $select_result = mysqli_query($db_connection, $select);
        $result_tokra = mysqli_fetch_assoc($select_result);
        $user_db_password = $result_tokra['password'];
        //---------------------------
        if(password_verify($old_password, $user_db_password)){
            if(empty($old_password)){
                $_SESSION['name_update'] = 'Old Password Field is Blank';
                header('location:profile.php');
            }else{
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $update = "UPDATE tbl_users SET name = '$name', password = '$new_password_hash' WHERE id = $id";
                mysqli_query($db_connection, $update);
                $_SESSION['name_update'] = 'Name & Password Updated Success';
                header('location:profile.php');
            }
        }else{
                $_SESSION['name_update'] = 'Old Password Incorrect';
                header('location:profile.php');
        }
    }


?>