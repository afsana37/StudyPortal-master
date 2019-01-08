<?php
/**
 * Created by PhpStorm.
 * User: Kazi
 * Date: 01-Nov-16
 * Time: 17:05
 */

if( session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
    session_start();
}

$admin_username = $_GET['admin_username_view'];

include('api/database.php');  // connecting to database
include('api/testinput.php');


$allstudentinfoA = $con->query("select * from admin where admin_username = '$admin_username'");
if (mysqli_num_rows($allstudentinfoA) > 0) {
    while ($row = mysqli_fetch_array($allstudentinfoA, 1)) {
        $_SESSION['view_admin_name'] = $row['admin_name'];
        $_SESSION['view_admin_designation'] = $row['admin_designation'];
        $_SESSION['view_admin_email'] = $row['admin_email'];
        $_SESSION['view_admin_address'] = $row['admin_address'];
        $_SESSION['view_admin_propic'] = $row['file'];
        $_SESSION['view_admin_phone'] = $row['admin_phone'];
        $_SESSION['view_admin_department'] = $row['admin_department'];
    }
    ?>
    <script>
        window.location.href='index_admin.php#data_selected_admin';
    </script>
    <?php
}
?>
