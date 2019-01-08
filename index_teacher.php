<?php
session_start();
$faculty_name = $_SESSION['faculty_name'];
$propic = $_SESSION['faculty_propic'];
$designation = $_SESSION['faculty_designation'];
$faculty_email = $_SESSION['faculty_email'];
$department = $_SESSION['faculty_department'];
if (session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
	session_start();
}
include('api/database.php');  // connecting to database
include('api/testinput.php');

$welcome_greet = 	'
                			<div class="content_section">
									<h2>Welcome to Study Portal</h2>
									<div><img src="uploads/faculty/'.$propic.'" alt="Image 01" class="image_wrapper image_fl" height="160px" width="135px" /> </div>
									<div style="margin-top:50px;"><p class="name"><a href="#profile">'.$faculty_name.'</a></p> </div>
									<p class="designation">'.$designation.'</p>
									<p class="dept">Department of '.$department.', MIST</p>
									<p class="email">Email: '.$faculty_email.'</p>
							</div>
						';

if (isset($_SESSION['faculty_name'])) {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Study Portal</title>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<link href="css/teacher/tooplate_style.css" rel="stylesheet" type="text/css"/>
	<link href="css/teacher/color.css" rel="stylesheet" type="text/css"/>
	<link href="css/teacher/popup.css" rel="stylesheet" type="text/css"/>
	<link href="css/teacher/table.css" rel="stylesheet" type="text/css"/>


	<link rel="stylesheet" href="css/teacher/coda-slider.css" type="text/css" charset="utf-8"/>
	<link rel="stylesheet" href="css/teacher/tabs.css" type="text/css" charset="utf-8"/>

	<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
	<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
	<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/modernizr.custom.js"></script>
	<script src="js/teacher/horizontal_tab.js"></script>
	<script src="js/teacher/horizontal_tab_sub.js"></script>
	<script src="js/teacher/table_view_st.js"></script>

</head>
<body>

<div id="slider">
	<div id="tooplate_wrapper">
		<div id="tooplate_sidebar">

			<div id="header">
				<h1><a href="#"><img src="images/tooplate_logo.png" title="Notebook Template - tooplate.com"
									 alt="Notebook free html template"/></a></h1>
			</div>

			<div id="menu">
				<ul class="navigation">
					<li><a href="#home" class="selected menu_01">Home</a></li>
					<li><a href="#schedule" class="menu_02">Class Schedule</a></li>
					<li><a href="#course" class="menu_03">Courses</a></li>
					<li><a href="#disscussion" class="menu_04">Disscussion Forum</a></li>
					<li><a href="#material" class="menu_05">Materials</a></li>
					<li><a href="#notice" class="menu_06">Notices</a></li>

				</ul>
				<a href="api/Logout/logout.php">
					<div class="logout">
						<img src="images/tooplate_menu_07.png">

						<h2><span> Log Out</span></h2>
					</div>
				</a>
			</div>
		</div> <!-- end of sidebar -->

		<div id="content">
			<div class="scroll">
				<div class="scrollContainer">
					<div class="panel" id="home">

						<?php echo $welcome_greet; ?>


						<div id="announcement_student"  class=" expose content_section last_section tab w3-animate-zoom form_vio">
							<div class="cleaner"></div>

							<section>

								<!--for demo wrap-->
								<h3 style="text-align: center">Announcement published by the instructors:</h3>

								<div class="table_view">
									<table cellpadding="0" cellspacing="0" border="0">
										<thead>
										<tr>
											<th>Date</th>
											<th>Course-Code</th>
											<th>Course Name</th>
											<th>Instructor Name</th>
											<th>Announcement</th>

										</tr>
										</thead>
									</table>
								</div>
								<div class="table_view_content">
									<table cellpadding="0" cellspacing="0" border="0">
										<tbody>
										<tr>
											<td>20 Oct, 2016</td>
											<td>CSE-310</td>
											<td>Concrete Math</td>
											<td> Lec. Wali Abdullah</td>
											<td>-----</td>
										</tr>
										</tbody>
									</table>
								</div>
							</section>

							<script src="js/teacher/table_scroll.js"></script>

						</div>
					</div> <!-- end of home -->


					<div class="panel" id="profile">
						<div clas="content_section">
							<?php
								echo $welcome_greet;
								?>

						</div>

						<div class="last_section content_vio form_vio"  style="height:320px;margin:-50px 0 0 0px; ">
							<div class="cleaner_h10"></div>
							<h3 style="margin-left:30px;">Change your password:</h3>
							<form method="post" name="profile_teacher_form"
								  action="api/Faculty/profileFaculty.php"
								  style="margin:40px 0 0 100px">


								<label for="st_old_password">Old Password:</label>
								<input type="password" maxlength="50" id="st_old_password"
									   class="input_field" name="st_old_password"/>

								<div class="cleaner_h10"></div>
								<label for="st_password">New Password:</label>
								<input type="password" maxlength="50" id="st_password"
									   class="input_field" name="st_password"/>

								<div class="cleaner_h10"></div>
								<label for="st_password">Confirm New Password:</label>
								<input type="password" maxlength="50" id="st_password_again"
									   class="input_field" name="st_password_again"/>

								<div class="cleaner_h10"></div>

								<button class="button float_l submit_button" style="vertical-align:middle">
									<span>Submit </span></button>
								<button class="button float_l not_move" type="reset" id="reset"
										name="reset" style="vertical-align:middle;">
									<span>Reset </span></button>

							</form>

						</div>

					</div> <!-- end of profile -->


					<div class="panel" id="schedule">

						<div id="View_schedule" class=" content_blue form_blue" style="height:705px">
							<h3>The weekly schedule for this term:</h3>
							<div class="cleaner"></div>
							<title>Timetable</title>

							<table align="center" class="table_view_schedule table_blue_content" >
								<thead class="table_blue">
								<th>Day</th>
								<th>0800 - 0850</th>
								<th>0900 - 0950</th>
								<th>1000 - 1050</th>
								<th>1130 - 1220</th>
								<th>1230 - 1320</th>
								<th>1330 - 1420</th>

								</thead>


								<tr>
									<th>Monday</th>

									<td>Physics-1</td>
									<td>English</td>
									<td>Math</td>
									<td>Chemestry-1</td>
									<td>Alzebra</td>
									<td>Physical</td>

								</tr>

								<tr>
									<th>Tuesday</th>

									<td>Math-2</td>
									<td>Chemestry-2</td>
									<td>Physics-1</td>
									<td>Hindi</td>
									<td>English</td>
									<td>Soft Skill</td>

								</tr>

								<tr>
									<th>Wednesday</th>

									<td>Hindi</td>
									<td>English</td>
									<td>Math-1</td>
									<td>Chemistry</td>
									<td>Physics</td>
									<td>Chem.Lab</td>


								</tr>

								<tr>
									<th>Thrusday</th>

									<td>Cumm. Skill</td>
									<td>Sports</td>
									<td>English</td>
									<td>Computer Lab</td>
									<td>Header</td>
									<td>Header</td>


								</tr>

								<tr>
									<th>Friday</th>

									<td>Header</td>
									<td>Header</td>
									<td>Header</td>
									<td>Header</td>
									<td>Header</td>
									<td>Header</td>


								</tr>

							</table>






						</div>
					</div>


					<div class="panel" id="course">
						<div class="content_section last_section content_light_blue form_light_blue" style="height:705px">
							<div class="cleaner"></div>


							<div class="cleaner"></div>
							<section>

								<!--for demo wrap-->
								<h3 style="margin-left: 20px">Courses you have in this term:</h3>

								<table class="table_course">
									<tr id="table_course_firstrow"><th>Course-Code</th><th>Course-Title</th><th>Credit Hrs</th><th>Instructor Name</th><th>CT Marks</th></tr>
									<tr><td>SAIT Open</td><td>Calgary</td><td>5</td><td></td><td><a href="#schedule" style="color:black;text-decoration:none;">&#8681</a></td></tr>
									<tr><td>CALTAF Classic</td><td>Calgary</td><td>1.5</td><td>5.00</td><td><astyle="color:black;text-decoration:none;">&#8681</a></td></tr>
									<tr><td>Calgary Marathon</td><td>Calgary</td><td>21.1</td><td>2:00.00</td><td><astyle="color:black;text-decoration:none;">&#8681</a></td></tr>
								</table>
							</section>


						</div>
					</div> <!-- end of services -->

					<div class="panel" id="material">
						<div class=" last_section content_yellow form_yellow" style="height:740px;">
							<h1 style="margin-bottom:10px;">Materials</h1>
							<a href="#add_material"><button class="button  add_button"  style="margin:-40px 10px -50px 500px;">
								<span>Upload </span></button> </a>
							<div class="cleaner"></div>
							<section>
								<div class="table_view table_yellow">
									<table cellpadding="0" cellspacing="0" border="0">
										<thead>
										<tr>
											<th class="material_course_code">Course Code</th>
											<th class="material_course_name">Course Name</th>
											<th class="material_name">File Name</th>

										</tr>
										</thead>
									</table>
								</div>
								<div class="table_view_content table_yellow_content">
									<table cellpadding="0" cellspacing="0" border="0">
										<tbody>
										<?php


						$allmaterials = $con->query("select * from course c, materials m where c.course_code = m.mat_course order by m.mat_course");
										if (mysqli_num_rows($allmaterials) > 0) {
										while ($row = mysqli_fetch_array($allmaterials, 1)) {
										$mat_name = $row['file'];
										$course_code = $row['course_code'];
										$course_name = $row['course_name'];
										$course_code_name = strtoupper(preg_replace("/[^a-zA-Z]+/", "", $course_code));
										$course_code_number = preg_replace("/[^0-9]+/", "", $course_code);
										?>
										<tr>
											<td><div class="material_course_code material_row"><center style="margin:-10px 0 -2px 0; font-size:25px">
												<?php echo $course_code_name;?></center></br><center style="font-size:20px;margin-top:-25px;"><?php echo $course_code_number;?></center></div></td>
											<td><div class="material_row material_course_name"><?php echo $course_name;?></div></td>
											<td><div class="material_row material_name"><a href="uploads/materials/<?php echo $mat_name;?>" download"</a>
													<?php echo substr($mat_name,6);?></div></td>
										</tr>

										<?php
							}
						}
						?>

										</tbody>
									</table>
								</div>
							</section>

							<script src="js/admin/table_scroll.js"></script>



							<div class="col_380 float_r"></div>
						</div>
					</div>


					<div class="panel" id="add_material">
						<div class=" last_section content_yellow form_yellow" style="height:740px">
							<h1>Add a Study Material</h1>
							<form method="post"  name="add_admin_notice_form" action="api/Faculty/add_material.php"
								  enctype="multipart/form-data"
								  style="margin-left:100px">

								<label for="fac_material_course_code">Course Code :</label>
								<input type=text maxlength="50" id="fac_material_course_code"
									   class="input_field" name="fac_material_course_code"/>

								<div class="cleaner_h10"></div>

								<label for="st_image">Upload the file:</label>
								<input type="file" name="file" />
								<div class="cleaner_h20"></div>

								<button class="button float_l add_button"
										style="vertical-align:middle; margin-left:200px;"><span>Upload </span>
								</button>

							</form>
							<div class="col_380 float_r"></div>
						</div>
					</div>





					<div class="panel" id="notice">
						<div class=" last_section content_yellow form_yellow" style="height:740px;">
							<h1 style="margin-bottom:-15px;">NOTICES</h1>
							<a href="#add_notice"><button class="button  add_button"  style="margin:-1200px 10px -50px 500px;">
								<span>Add </span></button> </a>
							<div class="cleaner"></div>
							<section>
								<div class="table_view table_yellow table_notice">
									<table cellpadding="0" cellspacing="0" border="0">
										<thead>
										<tr>
											<th class="notice_date_head">Date</th>
											<th class="notice_news">Notice</th>
										</tr>
										</thead>
									</table>
								</div>
								<div class="table_view_content table_yellow_content">
									<table cellpadding="0" cellspacing="0" border="0">
										<tbody>
										<?php


						$allnotice = $con->query("select notice_date as 'date', notice_text from notice order by date desc");
										if (mysqli_num_rows($allnotice) > 0) {
										while ($row = mysqli_fetch_array($allnotice, 1)) {
										$notice_text = $row['notice_text'];
										$notice_date = $row['date'];
										?>
										<tr>
											<td><div class="notice_date notice_row"><center style="margin:27px 0 -2px 0; font-size:25px">
												<?php echo date('j M', strtotime($notice_date));?></center></br><center style="font-size:20px;margin-top:-25px;"><?php echo date('Y', strtotime($notice_date));?></center></div></td>
											<td><div class="notice_row notice_news"><?php echo $notice_text;?></div></td>
										</tr>

										<?php
							}
						}
						?>

										</tbody>
									</table>
								</div>
							</section>

							<script src="js/admin/table_scroll.js"></script>



							<div class="col_380 float_r"></div>
						</div>
					</div>

					<div class="panel" id="view_notice">
						<div class=" last_section content_yellow form_yellow" style="height:740px">
							<h1>Notice_title</h1>
							<p>Details</p>
							<div class="col_380 float_r"></div>
						</div>
					</div>


					<div class="panel" id="discussion">
						<div class=" last_section content_yellow form_yellow" style="height:740px">
							<h3>Add a question for a specific course...</h3>
							<form method="post"  name="add_teacher_discussion_form" action="api/teacher/add_post.php"
								  style="margin-left:100px">

								<label for="teacher_post">Write post...</label>
												<textarea id="teacher_post" name="teacher_post" rows="0" cols="0"
														  class="required"></textarea>
								<label for="teacher_post_corse">About Course...</label>
												<textarea id="teacher_post_course" name="teacher_post_course" rows="0" cols="0"
														  class="required"></textarea>


								<div class="cleaner_h10"></div>

								<button class="button float_l table_button"
										style="vertical-align:middle; margin-left:200px;"><span>Submit </span>
								</button>

							</form>
							<div class="col_380 float_r"></div>
							<div class="posted_discussion">
								Table
							</div>
						</div>
					</div>








				</div>


			</div>
		</div><!-- end of scroll -->
	</div>
</div> <!-- end of content -->
</div>

<div id="footer">

	<div id="social_box">
		<a href="#"><img src="images/facebook.png" alt="facebook"/></a>
		<a href="#"><img src="images/flickr.png" alt="flickr"/></a>
		<a href="#"><img src="images/myspace.png" alt="myspace"/></a>
		<a href="#"><img src="images/twitter.png" alt="twitter"/></a>
		<a href="#"><img src="images/youtube.png" alt="youtube"/></a>
	</div>

	<div id="footer_left">

		Copyright © <a href="index.php#aboutus" style="text-decoration: none">StudyPortal</a><br/>
		Designed by <a href="http://mist.ac.bd" style="text-decoration: none">MIST</a>, CSE Department<br/>

	</div>

	<div class="cleaner"></div>
</div>
</body>
</html>

<?php
}
else{
	header("Location:index.php");
}
?>