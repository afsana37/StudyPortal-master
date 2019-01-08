<?php

    if( session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
		session_start();
	}
	
	$response=array();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST['password']) || empty($_POST['email'])) {
			$response['error']="Email or Password is not valid1";
		}
		else
		{

			include('../database.php');  // connecting to database
			include('../testinput.php');
			
			$user_name = test_input($_POST['email'],$con);
			$user_password = test_input($_POST['password'],$con);
			$user_role = test_input($_POST['role'],$con);
		if($user_role=="3")	
		{
			$query = $con->query("select * from admin where admin_password='$user_password' and admin_username='$user_name'");

			if(mysqli_num_rows($query)>0){    // whether we found any row after the query or not.

				while ($row = mysqli_fetch_array($query,MYSQLI_BOTH)) {   // taking each row of the resultset of the query.

				    // saving credentials in session for later use.
					$_SESSION['user_id']=$row[0];
					$_SESSION['user_email']=$user_name;     
					$_SESSION['user_name']=$row['name'];
					
					header("location:../../index_logged_teacher.html");
					
					$response['error']="false";
				}
			}
			else 
				$response['error']="Email or Password is not valid2";
			
		}
			
			mysqli_close($con);  // close database connection 
			
		}
	}else
		$response['error']="Not Post Method";
	
    //echo json_encode($response);   // send back json response	

 	

?>