<?php 
    require_once __DIR__ . '/../config.php'; 

    if(isset($_SESSION['admin_name']))
    {
        session_destroy();
        header('Location:'.BURLA.'login.php');
    }
    else
    {
        header('Location:'.BURL);

    } 


?>