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
    if (empty($_POST['fac_name']) || empty($_POST['fac_id']) || empty($_POST['fac_username'])
        || empty($_POST['fac_email']) || empty($_POST['fac_phone']) || empty($_POST['fac_password']) ) {

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
        $folder="../../uploads/faculty/";

        // new file size in KB
        $new_size = $file_size/1024;
        // new file size in KB

        // make file name in lower case
        $new_file_name = strtolower($file);
        // make file name in lower case

        $final_file=str_replace(' ','-',$new_file_name);

        $fac_name = test_input($_POST['fac_name'],$con);
        $fac_designation = test_input($_POST['fac_designation'],$con);
        $fac_id = test_input($_POST['fac_id'],$con);
        $fac_username = test_input($_POST['fac_username'],$con);
        $fac_dept = test_input($_POST['fac_dept'],$con);
        $fac_sex = test_input($_POST['fac_sex'],$con);
        $fac_instructor_type = test_input($_POST['fac_instructor_type'],$con);
        $fac_institution = test_input($_POST['fac_institution'],$con);
        $fac_email = test_input($_POST['fac_email'],$con);
        $fac_phone = test_input($_POST['fac_phone'],$con);
        $fac_password = test_input($_POST['fac_password'],$con);
        $fac_address = test_input($_POST['fac_address'],$con);

        move_uploaded_file($file_loc,$folder.$final_file);
        $query = $con->query("insert into faculty (faculty_name, faculty_username, faculty_password,
            faculty_id_number, faculty_designation, faculty_department, faculty_gender, faculty_ins, faculty_institution,
            faculty_email, faculty_phone, faculty_address, file, type, size) VALUES ('$fac_name','$fac_username',
            '$fac_password','$fac_id','$fac_designation','$fac_dept','$fac_sex',
               '$fac_instructor_type','$fac_institution','$fac_email','$fac_phone','$fac_address',
               '$final_file','$file_type','$new_size')");
        if($query){
            ?>
            <script>
                alert('1 new faculty added successfully.');
                window.location.href='../../index_admin.php';
            </script>
            <?php
        }
        else{
//
//            printf("Errormessage: %s\n",mysqli_error ($con));
            ?>
            <script>
                alert('Faculty adding not successful!');
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
