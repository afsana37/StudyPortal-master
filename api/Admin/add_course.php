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
$response=array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['course_code']) || empty($_POST['cr_dept'])) {

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

        $course_code = test_input($_POST['course_code'],$con);
        $course_code = preg_replace("/[^a-zA-Z0-9]+/", "", $course_code);
        $course_code = strtolower($course_code);
        $course_name = test_input($_POST['course_name'],$con);
        $cr_dept = test_input($_POST['cr_dept'],$con);

        $query = $con->query("insert into course (course_code,course_department,course_name) VALUES ('$course_code','$cr_dept','$course_name')");
        if($query){
            ?>
            <script>
                alert('1 new course added successfully.');
                window.location.href='../../index_admin.php#course';
            </script>
            <?php
        }
        else{
//            printf("Errormessage: %s\n",mysqli_error ($con));
            ?>
            <script>
                alert('Course adding not successful!');
                window.location.href='../../index_admin.php#course';
            </script>
            <?php
        }

        mysqli_close($con);  // close database connection

    }
}else
    $response['error']="Not Post Method";

//echo json_encode($response);   // send back json response

?>
