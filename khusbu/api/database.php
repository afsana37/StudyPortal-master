
<?php
	// $con = mysql_connect("localhost", "root", "");
	// mysql_select_db("healthchart",$con);
	// mysql_query("set names utf8");

$con = new mysqli("localhost", "root", "", "study_portal");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s see\n", mysqli_connect_error());
    exit();
}
/* change character set to utf8 */
if (!$con->set_charset("utf8")) {
    // printf("Error loading character set utf8: %s\n", $con->error);
    exit();
} else {
    // printf("Current character set: %s\n", $con->character_set_name());
}

?>