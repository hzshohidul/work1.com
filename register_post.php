<?php
    require 'database.php';
?>
<?php
    SESSION_START();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $flug = true;

    //--------Name work start---
    if(empty($name)){
        $_SESSION['name_err'] = 'Name Filed is Blank.';
        header('location:register.php');
        $flug = false;
    }else {
        // Final --
        $_SESSION['name_value'] = $name;
    }
    //--------Name work end---

    //--------Email work start---
    $select = "SELECT COUNT(*) AS ganona FROM tbl_users WHERE email = '$email'";
    $all_data = mysqli_query($db_connection,$select);
    $data_part = mysqli_fetch_assoc($all_data);
    $email_count = $data_part['ganona'];

    if(empty($email)){
        $_SESSION['email_err'] = 'Email Filed is Blank.';
        header('location:register.php');
        $flug = false;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['email_valid'] = 'Email is not Valid';
        header('location:register.php');
        $flug = false;
    }else if($email_count == 1){
        $_SESSION['email_exists'] = 'Email Already Exists';
        header('location:register.php');
        $flug = false;
    }else {
        // Final --
        $_SESSION['email_value'] = $email;
    }
    //--------Email work end---

    //Password work Start---
    $upper = preg_match('@[A-Z]@', $password);
    $lower = preg_match('@[a-z]@', $password);
    $special = preg_match('@[!,#,$,%,^,&,*]@', $password);
    if(empty($password)){
        $_SESSION['pass_err'] = 'Password Filed is Blank';
        header('location:register.php');
        $flug = false;
    }else{
        if(empty($confirm_password)){
            $_SESSION['con_pass_err'] = 'Confirm Password Filed is Blank';
            header('location:register.php');
            $flug = false;
       }else{
            if($password !== $confirm_password){
                $_SESSION['password_not_match'] = 'Password Not Matching';
                header('location:register.php');
                $flug = false;
            }else{
                if(strlen($password) < 8){
                    $_SESSION['password_small'] = 'Password Must be 8 character.';
                    header('location:register.php');
                    $flug = false;
                }else{
                    if(!$upper){
                        $_SESSION['upper'] = 'Password must be Upper case use.';
                        header('location:register.php');
                        $flug = false;
                    }else{
                        if(!$lower){
                            $_SESSION['lower'] = 'Password must be Lower case use.';
                            header('location:register.php');
                            $flug = false;
                        }else{
                            if(!$special){
                                $_SESSION['special'] = 'Password must be Special case use.';
                                header('location:register.php');
                                $flug = false;
                                // strlen($password) < 8 || !upper || !lower || !special *Ai babe kora jai 1 linee*
                            }else{
                                // Final --
                                $password = PASSWORD_HASH($password, PASSWORD_DEFAULT);
                            }
                        }
                    }
                }
            }
       }
    }
    //Password work end---

    //Image Work Start---
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_explode = explode('.', $image_name);
    $image_formet = end($image_explode);
    $rand_number = rand(1,999999999999999999);
    $image_next_name = $rand_number. '.' .$image_formet;
    
    $image_extention = array('jpg','jpeg','png');
    if(empty($image['name'])){
        $_SESSION['image_err'] = 'Image Filed is Blank';
        header('location:register.php');
        $flug = false;
    }else{
        if(!in_array($image_formet, $image_extention)){
            $_SESSION['image_formet'] = 'Image formet must be jpg, jpeg, png';
            header('location:register.php');
            $flug = false;
        }else{
            if($image['size'] > 4000000){
                $_SESSION['image_size'] = 'Image size maximum 4mb';
                header('location:register.php');
                $flug = false;
            }else{
                // Final --
                $image_primary_name = $image_next_name;
            }
        }
    }
    //Image Work End---

    // Final --
    if($flug){
        $_SESSION['login_hoyegese'] = 'something';
        $name  = $_SESSION['name_value'];
        $email = $_SESSION['email_value'];
        $password;
        $image_primary_name;
        //--------------------------------

        $insert = "INSERT INTO tbl_users(name, email, password) VALUES ('$name','$email','$password')";
        mysqli_query($db_connection, $insert);
        //--------------------------------

        $id = mysqli_insert_id($db_connection);
        $image_new_name = 'id_'. $id. '_' .$image_primary_name;
        //--------------------------------
        
        $update_image = "UPDATE tbl_users SET image = '$image_new_name' WHERE id = $id";
        mysqli_query($db_connection, $update_image);
        //--------------------------------

        $up_location = 'assets/uploads/users/'.$image_new_name;
        move_uploaded_file($image['tmp_name'], $up_location);


        //-------------------------------
        $_SESSION['email'] = $email;

        $_SESSION['register_success'] = 'Register Successfully.';
        header('location:login.php');
    }
    //----------------------

?>