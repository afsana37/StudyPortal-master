<?php
if( session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
    session_start();
}
$response=array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['return'])) {
        header("Location: StudyPortal-master-929363f4dbae185197fabc2b09d73ebf7b69395d/html so far 2 with php/index_logged_student.html");
		exit;  
}
}