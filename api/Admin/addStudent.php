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
    if (empty($_POST['st_name']) || empty($_POST['st_roll']) || empty($_POST['st_reg_no'])
        || empty($_POST['st_dept']) || empty($_POST['st_term'])
        || empty($_POST['st_father_name']) || empty($_POST['st_mother_name']) || empty($_POST['st_email'])
        || empty($_POST['st_phone']) || empty($_POST['st_password'])) {

        ?>
        <script>
            alert('Some fields are empty!');
            window.location.href='../../index_admin.php#members';
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
        $folder="../../uploads/student/";

        // new file size in KB
        $new_size = $file_size/1024;
        // new file size in KB

        // make file name in lower case
        $new_file_name = strtolower($file);
        // make file name in lower case

        $final_file=str_replace(' ','-',$new_file_name);

        $st_name = test_input($_POST['st_name'],$con);
        $st_roll = test_input($_POST['st_roll'],$con);
        $st_reg_no = test_input($_POST['st_reg_no'],$con);
        $st_rank = test_input($_POST['st_rank'],$con);
        $st_dept = test_input($_POST['st_dept'],$con);
        $st_term = test_input($_POST['st_term'],$con);
        $st_section = test_input($_POST['st_section'],$con);
        $st_sex = test_input($_POST['st_sex'],$con);
        $st_father_name = test_input($_POST['st_father_name'],$con);
        $st_mother_name = test_input($_POST['st_mother_name'],$con);
        $st_email = test_input($_POST['st_email'],$con);
        $st_phone = test_input($_POST['st_phone'],$con);
        $st_password = test_input($_POST['st_password'],$con);
        $st_address = test_input($_POST['st_address'],$con);
        move_uploaded_file($file_loc,$folder.$final_file);
        $query = $con->query("insert into student (Name, Roll, Registration_no, Rank, Department, Level_term, Section,
                 Gender, Father_name, Mother_name, Email, Phone, Password, Address,file,type,size) VALUES ('$st_name','$st_roll','$st_reg_no',
                 '$st_rank','$st_dept','$st_term','$st_section','$st_sex','$st_father_name','$st_mother_name','$st_email',
                 '$st_phone','$st_password','$st_address','$final_file','$file_type','$new_size')");
        if($query){
            ?>
            <script>
                alert('1 new student added successfully.');
                window.location.href='../../index_admin.php';
            </script>
            <?php
        }
        else{
//            printf("Errormessage: %s\n",mysqli_error ($con));
            ?>
            <script>
                alert('Student adding not successful!');
                window.location.href='../../index_admin.php';
            </script>
            <?php
        }

        mysqli_close($con);  // close database connection

    }
}else
    $response['error']="Not Post Method";

//echo json_encode($response);   // send back json response

?>
