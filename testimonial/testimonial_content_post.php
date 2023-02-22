<?php
    SESSION_START();
    require '../database.php';

    $name             = $_POST['name'];
    $tag_name         = $_POST['tag_name'];
    $letter           = $_POST['letter'];
    $upload_image     = $_FILES['image'];

    $letter_spicial = mysqli_real_escape_string($db_connection, $letter);
    // -------------------------------------------------------
    if(empty($name) || empty($tag_name) || empty($letter) || empty($upload_image['name'])){
        $_SESSION['message'] = 'Any Field is Blank.';
        header('location:testimonial_content.php');
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

                $insert = "INSERT INTO tbl_testimonial (name, tag_name, letter) VALUES ('$name', '$tag_name', '$letter_spicial')";
                
                mysqli_query($db_connection, $insert);
                //-------------------------------
                $image_id = mysqli_insert_id($db_connection);
                $image_new_name = $image_id.'.'.$image_extention;
                $image_up_location = '../frontend/img/testimonial/'.$image_new_name;
                move_uploaded_file($upload_image['tmp_name'], $image_up_location);
                //------------------------------
                $update = "UPDATE tbl_testimonial SET image = '$image_new_name' WHERE id = $image_id";
                mysqli_query($db_connection, $update);

                $_SESSION['message'] = 'Content Insert Successfully!';
                header('location:testimonial_content.php');
            }else{
                $_SESSION['message'] = "Image Maximum size 4mb";
                header('location:testimonial_content.php');
            }
        }else{
            $_SESSION['message'] = "Extention must be use jpg, jpeg and png";
            header('location:testimonial_content.php');
        }
    //------------------------------ 
    }
?>