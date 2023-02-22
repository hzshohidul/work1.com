<?php
    SESSION_START();
    require '../database.php';

    $sub_title    = $_POST['subtitle'];
    $title        = $_POST['title'];
    $description  = $_POST['description'];
    $upload_image = $_FILES['image'];

    $title_spicial = htmlspecialchars($title);
    $description_spicial = htmlspecialchars($description);
    // -------------------------------------------------------
    if(empty($sub_title) || empty($title) || empty($description) || empty($upload_image['name'])){
        $_SESSION['message'] = 'Any Field is Blank.';
        header('location:about_content.php');
    }else{
    //--------------------------------
        $upload_image = $_FILES['image'];
        $image_name = $upload_image['name'];
        $name_tokra = explode('.', $image_name);
        $image_extention = end($name_tokra);
        //--------------------------------------
        $extention_allow = array('jpg','png', 'jpeg');
        if(in_array($image_extention, $extention_allow)){
            if($upload_image['size'] < 4000000){

                $insert = "INSERT INTO tbl_about (sub_title, title, descrip) VALUES ('$sub_title', '$title_spicial', '$description_spicial')";
                
                mysqli_query($db_connection, $insert);
                //-------------------------------
                $image_id = mysqli_insert_id($db_connection);
                $image_new_name = $image_id.'.'.$image_extention;
                $image_up_location = '../frontend/img/about/'.$image_new_name;
                move_uploaded_file($upload_image['tmp_name'], $image_up_location);
                //------------------------------
                $update = "UPDATE tbl_about SET image = '$image_new_name' WHERE id = $image_id";
                mysqli_query($db_connection, $update);

                $_SESSION['message'] = 'Content Insert Successfully!';
                header('location:about_content.php');
            }else{
                $_SESSION['message'] = "Image Maximum size 4mb";
                header('location:about_content.php');
            }
        }else{
            $_SESSION['message'] = "Extention must be use jpg, jpeg and png";
            header('location:about_content.php');
        }
    //------------------------------ 
    }
?>