<?php
    SESSION_START();
    require '../database.php';

    $id = $_SESSION['id'];
    $upload_image = $_FILES['image'];
    $image_tokra = explode('.', $upload_image['name']);
    $image_extension = end($image_tokra);
    $image_new_name = $id. '.' .$image_extension;
    $extension_allow = array('jpg', 'jpeg', 'png');
    //----------------------------------------------
    if(in_array($image_extension, $extension_allow)){
        if($upload_image['size'] < 4000000){
            $select = "SELECT * FROM tbl_users WHERE id = $id";
            $select_result = mysqli_query($db_connection, $select);
            $result_tokra = mysqli_fetch_assoc($select_result);
            $image_db_name = $result_tokra['image'];
            //--------------------------------------
            $image_location = '../assets/uploads/users/'.$image_db_name;
            unlink($image_location);
            //--------------------------------------
            $up_image_location = '../assets/uploads/users/'.$image_new_name;
            move_uploaded_file($upload_image['tmp_name'], $up_image_location);
            //---------------------------------------
            $update = "UPDATE tbl_users SET image = '$image_new_name' WHERE id = $id";
            mysqli_query($db_connection, $update);
            //---------------------------------------
            $_SESSION['image_message'] = 'Profile image update success';
            header('location:profile.php');
        }else{
            $_SESSION['image_message'] = 'Image size maximum 4mb';
            header('location:profile.php');
        }
    }else{
        $_SESSION['image_message'] = 'Must be extention use jpg, jpeg, png'; 
        header('location:profile.php'); 
    }
?>