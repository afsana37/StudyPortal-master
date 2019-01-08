<?php
if( session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
    session_start();
}
$response=array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['author']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['text'])) {
        $response['error']="Information is missing";
    }
    else
    {

        include('api/database.php');  // connecting to database
        include('api/testinput.php');

        $author = test_input($_POST['author'],$con);
        $email = test_input($_POST['email'],$con);
		$subject = test_input($_POST['subject'],$con);
		$text = test_input($_POST['text'],$con);
		
        $query = $con->query("insert into Discussion (Name, Email, Subject, Message) VALUES ('$author','$email','$subject','$text')");
		
		if($query){
            echo "<script> alert('info saved')</script>";
            header("location:index7.html");
        }
        else{
            printf("Errormessage: %s\n",mysqli_error ($con));
        }
        mysqli_close($con);  // close database connection

    }
}else
    $response['error']="Not Post Method";

//echo json_encode($response);   // send back json response

?>
