<?php
    $host_name = 'localhost';
    $host_user = 'root';
    $host_pass = '';
    $database_name = 'db_work1';
    
    $db_connection = mysqli_connect($host_name,$host_user,$host_pass,$database_name);

    if($db_connection){
        //echo 'Database Connection Successfully!'.'<br />';
    }
?>