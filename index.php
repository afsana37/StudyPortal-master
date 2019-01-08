<?php
/**
 * Created by PhpStorm.
 * User: Kazi
 * Date: 18-Oct-16
 * Time: 00:40
 */
$acc='';
//if($acc=='admin') {
if(isset($_GET['id'])) {
    if ($_GET['id'] == "checkloginadmin") {
//    echo "<script> alert('okay!')</script>";


        if (session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
            session_start();
        }

        $response = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['password']) || empty($_POST['email'])) {
                $response['error'] = "Email or Password is not valid1";
            } else {

                include('api/database.php');  // connecting to database
                include('api/testinput.php');

                $user_name = test_input($_POST['email'], $con);
                $user_password = test_input($_POST['password'], $con);

                $query = $con->query("select * from admin where admin_password='$user_password' and admin_username='$user_name'");

                if (mysqli_num_rows($query) > 0) {    // whether we found any row after the query or not.

                    while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {   // taking each row of the resultset of the query.

                        // saving credentials in session for later use.
                        $_SESSION['user_id'] = $row[0];
                        $_SESSION['user_email'] = $user_name;
                        $_SESSION['admin_name'] = $row['admin_name'];
                        $_SESSION['admin_username'] = $row['admin_username'];
                        $_SESSION['propic'] = $row['file'];
                        $_SESSION['admin_designation'] = $row['admin_designation'];
                        $_SESSION['admin_email'] = $row['admin_email'];
                        $_SESSION['admin_department'] = $row['admin_department'];

                        header("location:index_admin.php");

                        $response['error'] = "false";
                    }
                } else {
                    echo "<script> alert('Username and password do not match!')</script>";
//                echo "<script type='text/javascript'>alert('Username and password do not match!')</script>";
//                header("location:../../index.html");

                    $response['error'] = "Email or Password is not valid2";
                }


                mysqli_close($con);  // close database connection

            }
        } else
            $response['error'] = "Not Post Method";

//echo json_encode($response);   // send back json response
    } else if ($_GET['id'] == "checkloginstudent") {
//    echo "<script> alert('okay!')</script>";


        if (session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
            session_start();
        }

        $response = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['password']) || empty($_POST['email'])) {
                $response['error'] = "Email or Password is not valid1";
            } else {

                include('api/database.php');  // connecting to database
                include('api/testinput.php');

                $user_name = test_input($_POST['email'], $con);
                $user_password = test_input($_POST['password'], $con);

                $query = $con->query("select * from student where password='$user_password' and roll='$user_name'");

                if (mysqli_num_rows($query) > 0) {    // whether we found any row after the query or not.

                    while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {   // taking each row of the resultset of the query.

                        // saving credentials in session for later use.
                        $_SESSION['student_name'] = $row['Name'];
                        $_SESSION['student_roll'] = $row['Roll'];
                        $_SESSION['student_name'] = $row['Name'];
                        $_SESSION['propic'] = $row['file'];
                        $_SESSION['student_level_term'] = $row['Level_term'];
                        $_SESSION['student_email'] = $row['Email'];
                        $_SESSION['student_department'] = $row['Department'];
?>
                        <script>
                        window.location.href='index_logged_student.php';
                        </script>

                        <?php
                        $response['error'] = "false";
                    }
                } else {
                    echo "<script> alert('Username and password do not match!')</script>";
//                echo "<script type='text/javascript'>alert('Username and password do not match!')</script>";
//                header("location:../../index.html");

                    $response['error'] = "Email or Password is not valid2";
                }


                mysqli_close($con);  // close database connection

            }
        } else
            $response['error'] = "Not Post Method";

//echo json_encode($response);   // send back json response
    } else if ($_GET['id'] == "checkloginfaculty") {
//    echo "<script> alert('okay!')</script>";


        if (session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
            session_start();
        }

        $response = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['password']) || empty($_POST['email'])) {
                $response['error'] = "Email or Password is not valid1";
            } else {

                include('api/database.php');  // connecting to database
                include('api/testinput.php');

                $user_name = test_input($_POST['email'], $con);
                $user_password = test_input($_POST['password'], $con);

                $query = $con->query("select * from faculty where faculty_password='$user_password' and faculty_username='$user_name'");

                if (mysqli_num_rows($query) > 0) {    // whether we found any row after the query or not.

                    while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {   // taking each row of the resultset of the query.

                        // saving credentials in session for later use.
                        $_SESSION['user_id'] = $row[0];
                        $_SESSION['user_email'] = $user_name;
                        $_SESSION['faculty_name'] = $row['faculty_name'];
                        $_SESSION['faculty_username'] = $row['faculty_username'];
                        $_SESSION['faculty_propic'] = $row['file'];
                        $_SESSION['faculty_designation'] = $row['faculty_designation'];
                        $_SESSION['faculty_email'] = $row['faculty_email'];
                        $_SESSION['faculty_department'] = $row['faculty_department'];


                        header("location:index_teacher.php");

                        $response['error'] = "false";
                    }
                } else {
                    echo "<script> alert('Username and password do not match!')</script>";
//                echo "<script type='text/javascript'>alert('Username and password do not match!')</script>";
//                header("location:../../index.html");

                    $response['error'] = "Email or Password is not valid2";
                }


                mysqli_close($con);  // close database connection

            }
        } else
            $response['error'] = "Not Post Method";

//echo json_encode($response);   // send back json response
    }
}
?>


<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Study Portal</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link href="css/color.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/coda-slider.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="css/tabs.css" type="text/css" charset="utf-8" />

<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
<script src="js/modernizr.custom.js"></script>

</head>
<body>
	
<div id="slider">
	<div id="tooplate_wrapper">
        <div id="tooplate_sidebar">
		
            <div id="header">
                <h1><a href="#"><img src="images/tooplate_logo.png" title="StudyPortal" /></a></h1>
            </div>    
			
            <div id="menu">
                <ul class="navigation">
                    <li><a href="#home" class="selected menu_01">Home</a></li>
                    <li><a href="#aboutus" class="menu_02">About Us</a></li>
                    <li><a href="#contactus" class="menu_03">Contact Us</a></li>
                </ul>
            </div>
		</div> <!-- end of sidebar -->  
    
        <div id="content">
          <div class="scroll">
            <div class="scrollContainer">
              <div class="panel" id="home">
                <div class="content_section">
                  <h2>Welcome to <i>Study Portal</i></h2>
                  <img src="images/study.png" alt="Image 01" class="image_wrapper image_fl" />
                  <p><em> A comfortable zone for faculties and students.</em></p>
                  <p>Study portal is a platform where students can reach to all necessary study materials very easily, without consuming their valuable time. 
				  The motive of study portal is to built a cooperative platform for students for better performance in their studies.</p>
                </div>
                  <center style="margin-left:-20px"> (please select your role from the left panel)</center>
				<div class="content_section last_section content_vio"  style="height:390px; ">

				<nav class="w3-sidenav blue_bar w3-card-2" style="width:130px">
				 <div class="w3-container">
					<h5>Role..</h5>

				  </div>
  
				  <a href="#"  class="tablink active_blue" onclick="openTab(event, 'login_form_st')">Student</a>
				  <a href="#" class="tablink" onclick="openTab(event, 'login_form_fac')">Faculty</a>
				  <a href="#" class="tablink" onclick="openTab(event, 'login_form_admin')">Admin</a>
				</nav>


                    <script src="js/login_highlight.js" type="text/javascript"></script>


                    <div style="margin-left:200px; ">
				<div class="cleaner_h40"></div>
 
				<div id="login_form_st"  class=" expose content_section last_section tab w3-animate-zoom form_vio">
					<h3>Login as a Student...</h3>
					<div class="cleaner_h20"></div>
                    <form method="post" name="contact" action="index.php?id=checkloginstudent">
			
					  
					  <label for="email">Roll:</label>
                      <input type="text" maxlength="40" id="email" class="input_field" name="email" />
                      <div class="cleaner_h20"></div>
                      <label for="password">Password:</label>
                      <input type="password" maxlength="40" id="password" class="input_field" name="password" />
                      <div class="cleaner_h30"></div>
                      
					  <button class="button float_l submit_button" style="vertical-align:middle"><span>Submit </span></button>
					  <button class="button float_l not_move" type="reset" id="reset" name="reset" style="vertical-align:middle;margin-left:50px"><span>Reset </span></button>
					  
                    </form>
				  </div>

				  <div id="login_form_fac" style="display: none;" class="content_section last_section tab w3-animate-zoom form_vio">
					<h3>Login as a Faculty Member...</h3>
					<div class="cleaner_h20"></div>
					<form method="post" name="contact" action="index.php?id=checkloginfaculty">
			
					  <label for="email">Username:</label>
                      <input type="text" maxlength="40" id="email" class="input_field" name="email" />
                      <div class="cleaner_h20"></div>
                      <label for="password">Password:</label>
                      <input type="password" maxlength="40" id="password" class="input_field" name="password" />
                      <div class="cleaner_h30"></div>
                      
					  <button class="button float_l submit_button" style="vertical-align:middle"><span>Submit </span></button>
					  <button class="button float_l not_move" type="reset" id="reset" name="reset" style="vertical-align:middle;margin-left:50px"><span>Reset </span></button>
					  
                    </form>
				  </div>

				  <div id="login_form_admin" style="display: none;" class="content_section last_section tab w3-animate-zoom form_vio">
					<h3>Login as an Admin...</h3>
					<div class="cleaner_h20"></div>
					<form method="post" name="contact" action="index.php?id=checkloginadmin">
<!--					<form method="post" name="contact" action="api/LoginApi/loginAdmin.php?id=checklogin">-->

					  <label for="email">Username:</label>
                      <input type="text" maxlength="40" id="email" class="input_field" name="email" />
                      <div class="cleaner_h20"></div>
                      <label for="password">Password:</label>
                      <input type="password" maxlength="40" id="password" class="input_field" name="password" />
                      <div class="cleaner_h30"></div>
                      
					  <button class="button float_l submit_button" style="vertical-align:middle"><span>Submit </span></button>
					  <button class="button float_l not_move" type="reset" id="reset" name="reset" style="vertical-align:middle;margin-left:50px"><span>Reset </span></button>
					  
                    </form>
				  </div>

				</div>

			<script>
				function openTab(evt, tabName) {
				  var i, x, tablinks;
				  x = document.getElementsByClassName("tab");
				  for (i = 0; i < x.length; i++) {
					 x[i].style.display = "none";
				  }
				  tablinks = document.getElementsByClassName("tablink");
				  for (i = 0; i < x.length; i++) {
					 tablinks[i].className = tablinks[i].className.replace(" active_blue", "");
				  }
				  document.getElementById(tabName).style.display = "block";
				  evt.currentTarget.className += " active_blue";
				}
				</script>


              </div> 
              </div> <!-- end of home -->
			  

			  
			  
			  
              <div class="panel" id="aboutus">
                <div class=" last_section content_blue" style="margin-bottom:0">
                  <h1>About Us</h1>
                  <img src="images/mist.jpg" alt="Image 02" class="image_wrapper" style="width:600px; height:320px;" />
                  <p style="margin:10px 10px 10px 20px; width:630px;">Military Institute of Science and Technology (MIST) started its journey since 19 April 1998. It is the pioneer Technical Institute of Bangladesh Armed Forces,
                      It was the visionary leadership of the Honorable Prime Minister of People’s Republic of Bangladesh Sheikh Hasina to establish this Institute.<br>
                      MIST is located on the northwest part of Dhaka City at Mirpur Cantonment. Mirpur Cantonment is well known to be the ‘Education Village’ of Bangladesh Armed
                      Forces and a hub of knowledge for military / civil students and professionals.<br>
                      First Academic Program was launched on 31 January 1999 with the maiden batch of Civil Engineering (CE). Computer Science & Engineering (CSE) Program was started
                      from academic session 2000-2001 followed by Electrical, Electronic & Communication Engineering (EECE) and Mechanical Engineering (ME) Programs from 2002-2003.
                      Aeronautical Engineering (AE) and Naval Architecture and Marine Engineering (NAME) program were started from 2008-2009 and 2012-2013 respectively. Besides, four
                      new departments started their academic session from 2014-2015 i.e. Nuclear Science & Engineering (NSE), Biomedical Engineering (BME), Architecture (Arch) and Civil,
                      Environmental, Water Resources & Coastal Engineering (CEWCE). Industrial Production Engineering (IPE) and Petroleum & Mining Engineering (PME) started from 2016-2017.</p>
                </div>
				

              </div> <!-- end of aboutus -->
			  

              <div class="panel " id="contactus">
                  <div class="last_section content_light_blue" style="height:400px; margin-top: 100px;" >
                <h1>Contact Information</h1>
                <p>Mailing Address: Military Institute of Science & Technology (MIST)  Mirpur Cantonment,<br> Dhaka-1216, Bangladesh. <br>
                    Director Administration:  +88-02-9013166,  +88-02-9010049 Ext:3820<br>
                    Colonel Staff:  +88-02-9011414,  +88-02-9010049 Ext:3804,  +88-02-9011311,info@mist.ac.bd<br>
                    Admission Officer:  +88-02-8035419,  +88-02-9010049 EXT:3842 (Upto 14:30 hrs)</p>
                <div class="cleaner_h10"></div>
				
<!--                <div class="col_380 float_l">-->
<!--                  <div id="contact_form">-->
<!--                    <form method="post" name="contact" action="#">-->
<!--                      <label for="author">Name:</label>-->
<!--                      <input type="text" maxlength="40" id="author" class="input_field" name="author" />-->
<!--                      <div class="cleaner_h10"></div>-->
<!--                      <label for="email">Email:</label>-->
<!--                      <input type="text" maxlength="40" id="email" class="input_field" name="email" />-->
<!--                      <div class="cleaner_h10"></div>-->
<!--                      <label for="subject">Subject:</label>-->
<!--                      <input type="text" maxlength="40" id="subject" class="input_field" name="subject" />-->
<!--                      <div class="cleaner_h10"></div>-->
<!--                      <label for="text">Message:</label>-->
<!--                      <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>-->
<!--                      <div class="cleaner_h10"></div>-->
<!--                      <input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />-->
<!--                      <input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />-->
<!--                    </form>-->
<!--                  </div>-->
<!--                </div>-->
				
<!--                <div class="col_380 float_r"> </div>-->
              </div>
            </div>
            </div>
          </div><!-- end of scroll -->
		</div>
    </div> <!-- end of content -->
</div>

<div id="footer">
    
	<div id="social_box">
		<a href="#"><img src="images/facebook.png" alt="facebook" /></a>
        <a href="#"><img src="images/flickr.png" alt="flickr" /></a>
        <a href="#"><img src="images/myspace.png" alt="myspace" /></a>
        <a href="#"><img src="images/twitter.png" alt="twitter" /></a>
        <a href="#"><img src="images/youtube.png" alt="youtube" /></a>
    </div>
    
    <div id="footer_left">

        Copyright © StudyPortal <a href="#">Company Name</a><br />
        Designed by <a href="http://mist.ac.bd">MIST</a>, CSE Department<br />
       
    </div>
	
    <div class="cleaner"></div>
</div>

<div id="overlay"></div>
<script src="js/login_highlight.js" type="text/javascript"></script>
</body>
</html>