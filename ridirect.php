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

$student_id = $_GET['student_id'];

include('api/database.php');  // connecting to database
include('api/testinput.php');


$allstudentinfo = $con->query("select * from student where Roll = '$student_id'");
if (mysqli_num_rows($allstudentinfo) > 0) {
    while ($row = mysqli_fetch_array($allstudentinfo, 1)) {
        $_SESSION['view_student_name'] = $row['Name'];
        $_SESSION['view_student_id'] = $row['Roll'];
        $_SESSION['view_student_reg_no'] = $row['Registration_no'];
        $_SESSION['view_student_rank'] = $row['Rank'];
        $_SESSION['view_student_section'] = $row['Section'];
        $_SESSION['view_student_gender'] = $row['Gender'];
        $_SESSION['view_student_father'] = $row['Father_name'];
        $_SESSION['view_student_mother'] = $row['Mother_name'];
        $_SESSION['view_student_email'] = $row['Email'];
        $_SESSION['view_student_address'] = $row['Address'];
        $_SESSION['view_student_propic'] = $row['file'];
        $_SESSION['view_student_phone'] = $row['Phone'];
        $_SESSION['view_student_level_term'] = $row['Level_term'];
        $_SESSION['view_student_department'] = $row['Department'];
    }
    ?>
    <script>
        window.location.href='index_admin.php#data_selected';
    </script>
    <?php
}
?>
