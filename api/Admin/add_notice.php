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
    if (empty($_POST['admin_notice']) ) {

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

        $admin_notice = test_input($_POST['admin_notice'],$con);

        $query = $con->query("INSERT INTO notice( notice_text ) VALUES  ('$admin_notice')");
        if($query){
            ?>
            <script>
                alert('1 new notice added successfully.');
                window.location.href='../../index_admin.php#notice';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert('Notice adding not successful!');
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
