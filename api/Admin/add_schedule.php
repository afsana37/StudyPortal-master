<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/10/2016
 * Time: 06:55 PM
 */

if( session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['schedule_term']) || empty($_POST['schedule_course_code']) || empty($_POST['schedule_dept'])
        || empty($_POST['schedule_hour']) || empty($_POST['schedule_min'])) {

        ?>
        <script>
            alert('Some fields are empty!');
            window.location.href='../../index_admin.php';
        </script>
        <?php
    }
    else
    {

        include('../database.php');  // connecting to database
        include('../testinput.php');

        $schedule_term = test_input($_POST['schedule_term'],$con);
        $schedule_section = test_input($_POST['schedule_section'],$con);
        $schedule_course_code = test_input($_POST['schedule_course_code'],$con);
        $schedule_dept = test_input($_POST['schedule_dept'],$con);
        $schedule_day = test_input($_POST['schedule_day'],$con);
        $schedule_hour = test_input($_POST['schedule_hour'],$con);
        $schedule_min = test_input($_POST['schedule_min'],$con);

        $query = $con->query("INSERT INTO schedule ( level_term, section, course_code, course_department, day, hour,
                minute) VALUES ('$schedule_term','$schedule_section','$schedule_course_code','$schedule_dept',
                '$schedule_day','$schedule_hour','$schedule_min')");
        if($query){
            ?>
            <script>
                alert('1 new schedule added successfully.');
                window.location.href='../../index_admin.php#schedule';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert('Schedule adding not successful!');
                window.location.href='../../index_admin.php';
            </script>
            <?php
        }

        mysqli_close($con);  // close database connection

    }
}
else{
    echo "No post method";
}


?>
