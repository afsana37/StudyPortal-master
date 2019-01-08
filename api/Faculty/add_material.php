<?php
/**
 * Created by PhpStorm.
 * User: Kazi
 * Date: 01-Nov-16
 * Time: 23:52
 */

if( session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['fac_material_course_code'])) {

        ?>
        <script>
            alert('Some fields are empty!');
            window.location.href='../../index_teacher.php#add_material';
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
        $folder="../../uploads/materials/";

        // new file size in KB
        $new_size = $file_size/1024;
        // new file size in KB

        // make file name in lower case
        $new_file_name = strtolower($file);
        // make file name in lower case

        $final_file=str_replace(' ','-',$new_file_name);

        $course_code = test_input($_POST['fac_material_course_code'],$con);
        $course_code = preg_replace("/[^a-zA-Z0-9]+/", "", $course_code);
        $course_code = strtolower($course_code);
        $faculty_username = $_SESSION['faculty_username'];

        move_uploaded_file($file_loc,$folder.$final_file);

        $query = $con->query("insert into materials (file,type,size,mat_course,mat_uploader)
               VALUES ('$final_file','$file_type','$new_size','$course_code','$faculty_username')");
        if($query){
            ?>
            <script>
                alert('1 new material uploaded successfully.');
                window.location.href='../../index_teacher.php#material';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert('Upload failed!');
                window.location.href='../../index_teacher.php#add_material';
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
