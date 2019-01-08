<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/10/2016
 * Time: 06:55 PM
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['st_name']) || empty($_POST['st_roll']) || empty($_POST['st_reg_no']) || empty($_POST['st_rank']) || empty($_POST['st_dept']) || empty($_POST['st_term']) || empty($_POST['st_section']) || empty($_POST['st_father_name']) || empty($_POST['st_mother_name']) || empty($_POST['st_email']) || empty($_POST['st_phone']) || empty($_POST['st_password']) || empty($_POST['st_address'])) {
        $response['error']="Information is missing";
    }
    else
    {

        include('api/database.php');  // connecting to database
        include('api/testinput.php');

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

        $query = $con->query("insert into student (Name, Roll, Registration_no, Rank, Department, Level_term, Section, Gender, Father_name, Mother_name, Email, Phone, Password, Address) VALUES ('$st_name','$st_roll','$st_reg_no','$st_rank','$st_dept','$st_term','$st_section','$st_sex','$st_father_name','$st_mother_name','$st_email','$st_phone','$st_password','$st_address')");
		
		if(mysqli_num_rows($query)>0){    // whether we found any row after the query or not.

            while ($row = mysqli_fetch_array($query,MYSQLI_BOTH)) {   // taking each row of the resultset of the query.

                
                
                header("location:index_admin.html");

                $response['error']="false";
            }
        }
        else {
            echo "<script> alert('Error')</script>";
//                echo "<script type='text/javascript'>alert('Error')</script>";
//                header("location:../../index.html");

            $response['error'] = "Error";
        }

        

        mysqli_close($con);  // close database connection

    }
}else
    $response['error']="Not Post Method";

//echo json_encode($response);   // send back json response

?>
