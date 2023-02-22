<?php
    SESSION_START();
    if(isset($_SESSION['login_korse'])){
        // Welcome Deshboard
    }else{
        header('location:/work1.com/index.php');
    }
?>