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
    if (empty($_POST['ad_name']) || empty($_POST['ad_id']) || empty($_POST['ad_username'])
        || empty($_POST['ad_email']) || empty($_POST['ad_phone']) || empty($_POST['ad_password']) ) {

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

        $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $folder="../../uploads/admin/";

        // new file size in KB
        $new_size = $file_size/1024;
        // new file size in KB

        // make file name in lower case
        $new_file_name = strtolower($file);
        // make file name in lower case

        $final_file=str_replace(' ','-',$new_file_name);

        $ad_name = test_input($_POST['ad_name'],$con);
        $ad_id = test_input($_POST['ad_id'],$con);
        $ad_username = test_input($_POST['ad_username'],$con);
        $ad_email = test_input($_POST['ad_email'],$con);
        $ad_phone = test_input($_POST['ad_phone'],$con);
        $ad_password = test_input($_POST['ad_password'],$con);
        $ad_address = test_input($_POST['ad_address'],$con);
        $ad_department = test_input($_POST['ad_dept'],$con);
        $ad_designation = test_input($_POST['ad_designation'],$con);

        move_uploaded_file($file_loc,$folder.$final_file);
        $query = $con->query("insert into admin (admin_username, admin_password, admin_name,
              admin_id_number, admin_email, admin_phone, admin_address,file,type,size,admin_designation,admin_department)
               VALUES ('$ad_username','$ad_password','$ad_name','$ad_id','$ad_email','$ad_phone','$ad_address',
               '$final_file','$file_type','$new_size','$ad_designation','$ad_department')");
        if($query){
            ?>
            <script>
                alert('1 new admin added successfully.');
                window.location.href='../../index_admin.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert('Admin adding not successful!');
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
