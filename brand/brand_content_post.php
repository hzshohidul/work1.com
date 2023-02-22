<?php
    SESSION_START();
    require '../database.php';

    $upload_image = $_FILES['image'];

    // -------------------------------------------------------
    if(empty($upload_image['name'])){
        $_SESSION['message'] = 'Brand Image Field is Blank.';
        header('location:brand_content.php');
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

                $insert = "INSERT INTO tbl_brand (image) VALUES ('$image_name')";
                
                mysqli_query($db_connection, $insert);
                //-------------------------------
                $image_id = mysqli_insert_id($db_connection);
                $image_new_name = $image_id.'.'.$image_extention;
                $image_up_location = '../frontend/img/brand/'.$image_new_name;
                move_uploaded_file($upload_image['tmp_name'], $image_up_location);
                //------------------------------
                $update = "UPDATE tbl_brand SET image = '$image_new_name' WHERE id = $image_id";
                mysqli_query($db_connection, $update);

                $_SESSION['message'] = 'Brand Image Insert Successfully!';
                header('location:brand_content.php');
            }else{
                $_SESSION['message'] = "Image Maximum size 4mb";
                header('location:brand_content.php');
            }
        }else{
            $_SESSION['message'] = "Extention must be use jpg, jpeg and png";
            header('location:brand_content.php');
        }
    //------------------------------ 
    }
?>