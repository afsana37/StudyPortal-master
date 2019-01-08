<?php
/**
 * Created by PhpStorm.
 * User: Kazi
 * Date: 30-Oct-16
 * Time: 11:15
 */

if( session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
    session_start();
}
$response=array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['st_old_password']) || empty($_POST['st_password'])
        || empty($_POST['st_password_again'])) {

        ?>
        <script>
            alert('Some fields are empty!');
            window.location.href='../../index_logged_student.php#profile';
        </script>
        <?php
    }
    else
    {

        include('../database.php');  // connecting to database
        include('../testinput.php');

        $st_old_password = test_input($_POST['st_old_password'],$con);
        $st_password = test_input($_POST['st_password'],$con);
        $st_password_again = test_input($_POST['st_password_again'],$con);
        $student_roll = $_SESSION['student_roll'];
        $old_pass='';

        $query1 = $con->query("select Password from student where Roll='$student_roll'");


        if (mysqli_num_rows($query1) > 0) {    // whether we found any row after the query or not.

            while ($row = mysqli_fetch_array($query1, MYSQLI_BOTH)) {   // taking each row of the resultset of the query.

                // saving credentials in session for later use.
                $old_pass = $row['Password'];

            }
            if ($old_pass==$st_old_password){

                if($st_password==$st_password_again){
                    $query2 = $con->query("update student set Password='$st_password' where Roll='$student_roll'");
                    if($query2){
                        ?>
                        <script>
                            alert('Password changed successfully');
                            window.location.href='../../index_logged_student.php';
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            alert('Password change unsuccessful!');
                            window.location.href='../../index_logged_student.php#profile';
                        </script>
                        <?php
                    }
                }
                else{
                    ?>
                    <script>
                        alert('New password don\'t matches!');
                        window.location.href='../../index_logged_student.php#profile';
                    </script>
                    <?php
                }
            }
            else{
    //            printf("Errormessage: %s\n",mysqli_error ($con));
                    ?>
                    <script>
                        alert('Old password is not correct!');
                        window.location.href='../../index_logged_student.php#profile';
                    </script>
                    <?php
            }


        }
        else{
            //            printf("Errormessage: %s\n",mysqli_error ($con));
            ?>
            <script>
                alert('Changing password failed!');
                window.location.href='../../index_logged_student.php#profile';
            </script>
            <?php
        }

        mysqli_close($con);  // close database connection

    }
}else
    $response['error']="Not Post Method";

//echo json_encode($response);   // send back json response

?>
