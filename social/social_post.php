<?php
    SESSION_START();
    require '../database.php';
    
    $icon_name = $_POST['icon_name_class'];
    $site_link = $_POST['link'];
    //-------------------------------------
    if(empty($site_link)){
        $_SESSION['message'] = "Site Link Field is Blank";
        header('location:social.php');
    }else{
        if(empty($icon_name)){
            $_SESSION['message'] = "Please Icon Select";
            $_SESSION['site_link_value'] = $site_link;
            header('location:social.php');
        }else{
            $insert = "INSERT INTO tbl_social(class, link) VALUES ('$icon_name','$site_link')";
            mysqli_query($db_connection, $insert);
            header('location:social.php');
        }
    }
?>