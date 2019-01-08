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
    if (empty($_POST['admin_old_password']) || empty($_POST['admin_password'])
        || empty($_POST['admin_password_again'])) {

        ?>
        <script>
            alert('Some fields are empty!');
            window.location.href='../../index_admin.php#profile';
        </script>
        <?php
    }
    else
    {

        include('../database.php');  // connecting to database
        include('../testinput.php');

        $admin_old_password = test_input($_POST['admin_old_password'],$con);
        $admin_password = test_input($_POST['admin_password'],$con);
        $admin_password_again = test_input($_POST['admin_password_again'],$con);
        $admin_username=$_SESSION['admin_username'];
        $old_pass='';

        $query1 = $con->query("select admin_password from admin where admin_username='$admin_username'");


        if (mysqli_num_rows($query1) > 0) {    // whether we found any row after the query or not.

            while ($row = mysqli_fetch_array($query1, MYSQLI_BOTH)) {   // taking each row of the resultset of the query.

                // saving credentials in session for later use.
                $old_pass = $row['admin_password'];

            }
            if ($old_pass==$admin_old_password){

                if($admin_password==$admin_password_again){
                    $query2 = $con->query("update admin set admin_password='$admin_password' where admin_username='$admin_username'");
                    if($query2){
                        ?>
                        <script>
                            alert('Password changed successfully');
                            window.location.href='../../index_admin.php';
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            alert('Password change unsuccessful!');
                            window.location.href='../../index_admin.php#profile';
                        </script>
                        <?php
                    }
                }
                else{
                    ?>
                    <script>
                        alert('New password don\'t matches!');
                        window.location.href='../../index_admin.php#profile';
                    </script>
                    <?php
                }
            }
            else{
    //            printf("Errormessage: %s\n",mysqli_error ($con));
                    ?>
                    <script>
                        alert('Old password is not correct!');
                        window.location.href='../../index_admin.php#profile';
                    </script>
                    <?php
            }


        }
        else{
            //            printf("Errormessage: %s\n",mysqli_error ($con));
            ?>
            <script>
                alert('Changing password failed!');
                window.location.href='../../index_admin.php#profile';
            </script>
            <?php
        }

        mysqli_close($con);  // close database connection

    }
}else
    $response['error']="Not Post Method";

//echo json_encode($response);   // send back json response

?>
