<?php
/**
 * Created by PhpStorm.
 * User: Kazi
 * Date: 22-Oct-16
 * Time: 22:28
 */
    if( session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
        session_start();
    }

    if(isset($_SESSION['admin_name']) || isset($_SESSION['student_name']) || isset($_SESSION['faculty_name'])){
        unset($_SESSION);
        session_destroy();
        session_write_close();
        header("Location:../../index.php");
    }
    else{

    }
?>