<?php
session_start();
$admin_name = $_SESSION['admin_name'];
$admin_username=$_SESSION['admin_username'];
$propic = $_SESSION['propic'];
$designation = $_SESSION['admin_designation'];
$admin_email = $_SESSION['admin_email'];
$department = $_SESSION['admin_department'];
if (session_status() == PHP_SESSION_NONE) {   // start a session if not started already.
	session_start();
}
include('api/database.php');  // connecting to database
include('api/testinput.php');

$welcome_greet = 	'
                			<div class="content_section">
									<h2>Welcome to Admin Panel</h2>
									<div><img src="uploads/admin/'.$propic.'" alt="Image 01" class="image_wrapper image_fl" height="160px" width="135px" /> </div>
									<div style="margin-top:50px;"><p class="name"><a href="#profile">'.$admin_name.'</a></p> </div>
									<p class="designation">'.$designation.'</p>
									<p class="dept">Department of '.$department.', MIST</p>
									<p class="email">Email: '.$admin_email.'</p>
							</div>
						';



if (isset($_SESSION['admin_name'])) {
	?>

	<!DOCTYPE html >
	<html >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Study Portal</title>
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<link href="css/admin/tooplate_style.css" rel="stylesheet" type="text/css"/>
		<link href="css/admin/color.css" rel="stylesheet" type="text/css"/>
		<link href="css/admin/popup.css" rel="stylesheet" type="text/css"/>
		<link href="css/admin/table.css" rel="stylesheet" type="text/css"/>



		<link rel="stylesheet" href="css/admin/coda-slider.css" type="text/css" charset="utf-8"/>
		<link rel="stylesheet" href="css/admin/tabs.css" type="text/css" charset="utf-8"/>

		<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
		<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
		<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/modernizr.custom.js"></script>
		<script src="js/admin/horizontal_tab.js"></script>
		<script src="js/admin/horizontal_tab_sub.js"></script>
		<script src="js/admin/table_view_st.js"></script>

	</head>
	<body>

	<div id="slider">
		<div id="tooplate_wrapper">
			<div id="tooplate_sidebar">

				<div id="header">
					<h1><a href="#"><img src="images/tooplate_logo.png" /></a></h1>
				</div>

				<div id="menu">
					<ul class="navigation">
						<li><a href="#home" class="selected menu_01">Home</a></li>
						<li><a href="#members" class="menu_02">Members</a></li>
						<li><a href="#course" class="menu_03">Courses</a></li>
						<li><a href="#schedule" class="menu_04">Class Schedule</a></li>
						<li><a href="#notice" class="menu_05">Notices</a></li>
						<li><a href="#disscussion" class="menu_06">Disscussion Forum</a></li>
						<!--<li><a href="#home?id=logout" class="menu_07">Log Out</a></li>
    -->
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
							<div clas="content_section">

							<?php echo $welcome_greet; ?>
							</div>

							<div class="content_section last_section content_vio"  style="height:480px;margin-top:-30px; ">

							</div>

						</div> <!-- end of home -->

						<div class="panel" id="profile">
							<div clas="content_section">
								<h3></h3>
								<?php
								echo $welcome_greet;
								?>

							</div>

							<div class="last_section content_vio form_vio"  style="height:350px;margin:-50px 0 0 0px; ">
								<div class="cleaner_h10"></div>
								<h3 style="margin-left:30px;">Change your password:</h3>
								<form method="post" name="profile_admin_form"
									  action="api/Admin/profileAdmin.php"
									  style="margin:50px 0 0 100px">


									<label for="admin_old_password">Old Password:</label>
									<input type="password" maxlength="50" id="admin_old_password"
										   class="input_field" name="admin_old_password"/>

									<div class="cleaner_h10"></div>
									<label for="admin_password">New Password:</label>
									<input type="password" maxlength="50" id="admin_password"
										   class="input_field" name="admin_password"/>

									<div class="cleaner_h10"></div>
									<label for="admin_password_again">Confirm New Password:</label>
									<input type="password" maxlength="50" id="admin_password_again"
										   class="input_field" name="admin_password_again"/>

									<div class="cleaner_h10"></div>

									<button class="button float_l submit_button" style="vertical-align:middle">
										<span>Submit </span></button>
									<button class="button float_l not_move" type="reset" id="reset"
											name="reset" style="vertical-align:middle;">
										<span>Reset </span></button>

								</form>

							</div>

						</div> <!-- end of profile -->



						<div class="panel" id="members">


							<div class="content_section last_section w3-container">

								<div class="w3-row">
									<a href="#" onclick="openTab(event, 'Student');">
										<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"
											 style="margin-left:90px">Student
										</div>
									</a>
									<a href="#" onclick="openTab(event, 'Faculty');">
										<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">
											Faculty
										</div>
									</a>
									<a href="#" onclick="openTab(event, 'Admin');">
										<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">
											Admin
										</div>
									</a>
								</div>
								<div class="cleaner"></div>


								<div id="Student"
									 class="w3-container tab w3-animate-opacity w3-container-sub content_blue"
									 style="height:705px;">


									<div class="w3-row-sub">
										<a href="#" onclick="openTab_sub(event, 'Add_s');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey-sub w3-padding-sub"
												 style="margin-left:70px">Add a student
											</div>
										</a>
										<a href="#" onclick="openTab_sub(event, 'Search_s');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey-sub w3-padding-sub">
												Search a student
											</div>
										</a>
										<a href="#" onclick="openTab_sub(event, 'View_s');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey-sub w3-padding-sub">
												View All Students
											</div>
										</a>
									</div>
									<div class="cleaner"></div>


									<div id="Add_s" class="w3-container-sub tab-sub w3-animate-opacity form_blue">
										<div class="cleaner_h10"></div>
										<form method="post" name="add_student_form"
											  action="api/Admin/addStudent.php"  enctype="multipart/form-data"
											  style="margin-left:100px; margin-top:-15px;">

											<label for="st_name">Name* :</label>
											<input type="text" maxlength="40" id="st_name" class="input_field"
												   name="st_name"/>

											<div class="cleaner_h10"></div>
											<label for="st_roll">Roll* :</label>
											<input type="number" maxlength="9" min="199811001" id="st_roll"
												   class="input_field" name="st_roll"/>

											<div class="cleaner_h10"></div>
											<label for="st_reg_no" style="width=200px">Registration No.* :</label>
											<input type="number" maxlength="13" id="st_reg_no" class="input_field"
												   name="st_reg_no" style="margin-top:;"/>

											<div class="cleaner_h10"></div>
											<label for="st_rank">Rank* :</label>
											<input type="text" maxlength="40" id="st_rank" class="input_field"
												   name="st_rank"/>
											<!--<input type="checkbox" id="st_rank" class="input_field" name="st_rank" value="0" style="float:left; margin:5px -80px 0 -80px" checked /> N/A-->
											<div class="cleaner_h10"></div>
											<label for="st_dept">Department* :</label>
											<select id="st_dept" class="input_field" name="st_dept"
													style="width:261px">
												<option value="CE">Civil Engineering- CE</option>
												<option value="CSE">Computer Science & Engineering- CSE</option>
												<option value="ME">Mechanical Engineering- ME</option>
												<option value="EECE">Electrical, Electronic and Communication
													Engineering- EECE
												</option>
												<option value="AE">Aeronautical Engineering- AE</option>
												<option value="NAME">Naval Architecture and Marine Engineering-
													NAME
												</option>
												<option value="CEWCE">Civil, Environmental, Water Resources and
													Coastal Engineering- CEWCE
												</option>
												<option value="PME">Petroleum & Mining Engineering- PME</option>
												<option value="IPE">Industrial Production Engineering- IPE</option>
												<option value="NSE">Nuclear Science & Engineering- NSE</option>
												<option value="BME">Biomedical Engineering- BME</option>
												<option value="ARCHITECTURE">Architecture</option>
											</select>

											<div class="cleaner_h10"></div>
											<label for="st_term">Level & Term* :</label>
											<select id="st_term" class="input_field" name="st_term"
													style="width:261px">
												<option value="Level-01 Term-I">Level-01 Term-I</option>
												<option value="Level-01 Term-II">Level-01 Term-II</option>
												<option value="Level-02 Term-I">Level-02 Term-I</option>
												<option value="Level-02 Term-II">Level-02 Term-II</option>
												<option value="Level-03 Term-I">Level-03 Term-I</option>
												<option value="Level-03 Term-II">Level-03 Term-II</option>
												<option value="Level-04 Term-I">Level-04 Term-I</option>
												<option value="Level-04 Term-II">Level-04 Term-II</option>
											</select>

											<div class="cleaner_h10"></div>
											<label for="st_section">Section* : </label>
											<select id="st_section" class="input_field" name="st_section"
													style="width:261px">
												<option value="none" selected>none</option>
												<option value="A">A</option>
												<option value="B">B</option>
											</select>

											<div class="cleaner_h10"></div>
											<label for="st_sex">Gender* : </label>
											<input type="radio" id="st_sex" value="Male" name="st_sex" checked/> Male
											<input type="radio" id="st_sex" value="Female" name="st_sex"/> Female
											<div class="cleaner_h10"></div>
											<label for="st_father_name">Father's Name* :</label>
											<input type="text" maxlength="50" id="st_father_name"
												   class="input_field" name="st_father_name"/>

											<div class="cleaner_h10"></div>
											<label for="st_mother_name">Mother's Name* :</label>
											<input type="text" maxlength="50" id="st_mother_name"
												   class="input_field" name="st_mother_name"/>

											<div class="cleaner_h10"></div>
											<label for="st_email">Email* :</label>
											<input type=email maxlength="50" id="st_email" class="input_field"
												   name="st_email"/>

											<div class="cleaner_h10"></div>
											<label for="st_phone">Phone* :</label>
											<input type="number" maxlength="14" id="st_phone" class="input_field"
												   name="st_phone"/>

											<div class="cleaner_h10"></div>
											<label for="st_password">Password* :</label>
											<input type="password" maxlength="50" id="st_password"
												   class="input_field" name="st_password"/>

											<div class="cleaner_h10"></div>
											<label for=password>Confirm Password* :</label>
											<input type=password maxlength="50" id="st_confirm_password"
												   class="input_field" name="st_password"/>

											<div class="cleaner_h10"></div>
											<label for=text>Address:</label>
												<textarea id="st_adress" name="st_address" rows="0" cols="0"
														  class="required"></textarea>

											<div class="cleaner_h10"></div>

											<label for="st_image">Picture:</label>
											<input type="file" name="file" />
											<div class="cleaner_h20"></div>

											<button class="button float_l add_button" onclick="return Validate()" style="vertical-align:middle">
												<span>Add </span></button>
											<button class="button float_l not_move" type="reset" id="reset"
													name="reset" style="vertical-align:middle;">
												<span>Reset </span></button>

											<script type="text/javascript">
												function Validate() {
													var password= document.getElementById("st_password").value;
													var confirmPassword = document.getElementById("st_confirm_password").value;
													if (password != confirmPassword) {
														alert("Passwords do not match.");
														return false;
													}
													return true;
												}

											</script>


										</form>


									</div>

									<div id="Search_s"
										 class="w3-container-sub tab-sub w3-animate-opacity form_blue">
										<!--<h3 style="margin-left:100px">put any (or more) value for the fields:</h3>

                                        <div class="cleaner_h20"></div>

                                        <form method="post" name="search_student_form" action="search_student.php" style="margin-left:100px">

                                          <label for="st_name">Name:</label>
                                          <input type="text" maxlength="40" id="st_name" class="input_field" name="st_name" />
                                          <div class="cleaner_h20"></div>
                                          <label for="st_roll">Roll:</label>
                                          <input type="number" maxlength="9" min="199811001" id="st_roll" class="input_field" name="st_roll" />
                                          <div class="cleaner_h20"></div>
                                          <label for="st_reg_no" style="width=200px" >Registration No.:</label>
                                          <input type="number" maxlength="13" id="st_reg_no" class="input_field" name="st_reg_no" style="margin-top:15px;"/>
                                          <div class="cleaner_h20"></div>
                                          <label for="st_rank">Rank:</label>
                                          <input type="text" maxlength="40" id="st_rank" class="input_field" name="st_rank" />
                                          <input type="checkbox" id="st_rank" class="input_field" name="st_rank" value="0" style="float:left; margin:5px -80px 0 -80px" checked /> N/A
                                          <div class="cleaner_h20"></div>
                                          <label for="st_dept">Department:</label>
                                          <select id="st_dept" class="input_field" name="st_dept" style="width:261px" >
                                            <option value="0">None</option>
                                            <option value="ce">Civil Engineering- CE</option>
                                            <option value="cse">Computer Science & Engineering- CSE</option>
                                            <option value="me">Mechanical Engineering- ME</option>
                                            <option value="eece">Electrical, Electronic and Communication Engineering- EECE</option>
                                            <option value="ae">Aeronautical Engineering- AE</option>
                                            <option value="name">Naval Architecture and Marine Engineering- NAME</option>
                                            <option value="cewce">Civil, Environmental, Water Resources and Coastal Engineering- CEWCE</option>
                                            <option value="pme">Petroleum & Mining Engineering- PME</option>
                                            <option value="ipe">Industrial Production Engineering- IPE</option>
                                            <option value="nse">Nuclear Science & Engineering- NSE</option>
                                            <option value="bme">Biomedical Engineering- BME</option>
                                            <option value="archi">Architecture</option>
                                          </select>
                                          <div class="cleaner_h10"></div>
                                          <label for="st_term">Level & Term:</label>
                                          <select id="st_term" class="input_field" name="st_term" style="width:261px">
                                            <option value="0">None</option>
                                            <option value="1">Level-01 Term-I</option>
                                            <option value="2">Level-01 Term-II</option>
                                            <option value="3">Level-02 Term-I</option>
                                            <option value="4">Level-02 Term-II</option>
                                            <option value="5">Level-03 Term-I</option>
                                            <option value="6">Level-03 Term-II</option>
                                            <option value="7">Level-04 Term-I</option>
                                            <option value="8">Level-04 Term-II</option>
                                          </select>
                                          <div class="cleaner_h20"></div>
                                          <label for="st_section">Section:  </label>
                                          <input type="text" maxlength="1" id="st_section" class="input_field" name="st_section" />
                                          <div class="cleaner_h20"></div>
                                          <label for="st_sex">Gender:  </label>
                                          <input type="radio" id="st_sex" value="1" name="st_sex"  /> Male
                                          <input type="radio" id="st_sex" value="2" name="st_sex" /> Female
                                          <div class="cleaner_h20"></div>
                                          <label for="st_email">Email:</label>
                                          <input type="st_email" maxlength="50" id="st_email" class="input_field" name="st_email" />
                                          <div class="cleaner_h20"></div>
                                          <label for="st_phone">Phone:</label>
                                          <input type="st_phone" maxlength="50" id="st_phone" class="input_field" name="st_phone" />
                                          <div class="cleaner_h30"></div>

                                          <button class="button float_l search_button" style="vertical-align:middle"><span>Search </span></button>
                                          <button class="button float_l not_move" type="reset" id="reset" name="reset" style="vertical-align:middle;"><span>Reset </span></button>

                </form>
-->

										<div class="cleaner"></div>

										<section>

											<!--for demo wrap-->
											<h3 style="text-align: center">Student Search Result:</h3>

												<div class="admin_table_view">
												<table align="center" class="table_view table_blue_content" >
													<thead class="table_blue">
													<tr>
														<th>Name</th>
														<th>Roll</th>
														<th>Department</th>
														<th>Level</br>Term</th>
														<th>Phone</th>
														<th>Email</th>
													</tr>
													</thead>

													<tr>
														<td><a href="#data_selected">Iyolita Islam</a></td>
														<td>201414110</td>
														<td>CSE</td>
														<td> 03 </br> II</td>
														<td>+8801680610158</td>
														<td>iyolita2011@gmail.com</td>
													</tr>

												</table>
</div>
										</section>

										<script src="js/admin/table_scroll.js"></script>
									</div>


									<div id="View_s" class="w3-container-sub tab-sub w3-animate-opacity form_blue "
										 style="height:300px;">

										<div class="cleaner_h20"></div>

										<!--<form method="post" name="view_student_dep_form" action="view_student.php" style="margin-left:100px">

											<label for="st_dept_view">Department:</label>
											<select id="st_dept_view" class="input_field" name="st_dept_view" style="width:261px" >
												<option value="0">None</option>
												<option value="ce">Civil Engineering- CE</option>
												<option value="cse">Computer Science & Engineering- CSE</option>
												<option value="me">Mechanical Engineering- ME</option>
												<option value="eece">Electrical, Electronic and Communication Engineering- EECE</option>
												<option value="ae">Aeronautical Engineering- AE</option>
												<option value="name">Naval Architecture and Marine Engineering- NAME</option>
												<option value="cewce">Civil, Environmental, Water Resources and Coastal Engineering- CEWCE</option>
												<option value="pme">Petroleum & Mining Engineering- PME</option>
												<option value="ipe">Industrial Production Engineering- IPE</option>
												<option value="nse">Nuclear Science & Engineering- NSE</option>
												<option value="bme">Biomedical Engineering- BME</option>
												<option value="archi">Architecture</option>
											</select>
											<div class="cleaner_h20"></div>
											<label for="st_term_view">Level & Term:</label>
											<select id="st_term_view" class="input_field" name="st_term_view" style="width:261px">
												<option value="0">None</option>
												<option value="1">Level-01 Term-I</option>
												<option value="2">Level-01 Term-II</option>
												<option value="3">Level-02 Term-I</option>
												<option value="4">Level-02 Term-II</option>
												<option value="5">Level-03 Term-I</option>
												<option value="6">Level-03 Term-II</option>
												<option value="7">Level-04 Term-I</option>
												<option value="8">Level-04 Term-II</option>
											</select>
											<div class="cleaner_h10"></div>
											<label for="st_section">Section:  </label>
											<input type="text" maxlength="1" id="st_section" class="input_field" name="st_section" />
											<div class="cleaner_h20"></div>
											<label for="st_sex">Gender:  </label>
											<input type="radio" id="st_sex" value="1" name="st_sex"  /> Male
											<input type="radio" id="st_sex" value="2" name="st_sex" /> Female
											<div class="cleaner_h30"></div>



											<button class="button float_l table_button" style="vertical-align:middle; margin-left:200px;"><span>View </span></button>


										</form>-->




										<div class="cleaner"></div>

																					<section>


																						<h3 style="text-align: center;margin-top:-30px">All Students</h3>

																						<div class="admin_table_view">
																							<table align="center" class="table_view table_blue_content" >
																								<thead class="table_blue">
																								<tr>
																									<th>Name</th>
																									<th>Roll</th>
																									<th>Department</th>
																									<th>Level</th>
																									<th>Term</th>
																									<th>Phone</th>
																								</tr>
																								</thead>
																								<?php


																								$allstudent = $con->query("select * from student");
																								if (mysqli_num_rows($allstudent) > 0) {
                                                                                                    while ($row = mysqli_fetch_array($allstudent, 1)) {
                                                                                                        $student_name = $row['Name'];
                                                                                                        $student_id = $row['Roll'];
                                                                                                        $student_phone = $row['Phone'];
                                                                                                        $student_level_term = $row['Level_term'];
                                                                                                        $student_level_term = explode(" ",$student_level_term);
                                                                                                        $student_department = $row['Department'];
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td><a href="ridirect.php?student_id=<?php echo $student_id; ?>"><?php echo $student_name;?></a></td>
<!--                                                                                                    <td><a href="index_admin.php#data_selected">--><?php //echo $student_name;?><!--</a></td>-->
                                                                                                    <td><?php echo $student_id;?></a></td>
                                                                                                    <td><?php echo $student_department;?></td>
                                                                                                    <td><?php echo $student_level_term[0];?></td>
                                                                                                    <td><?php echo $student_level_term[1];?></td>
                                                                                                    <td><?php echo $student_phone;?></td>
                                                                                                </tr>

                                                                                                </tr>
                                                                                                <?php
                                                                                                    }
                                                                                                }
																								?>
<!--																								<tr>-->
<!--																									<td><a href="#data_selected">Iyolita Islam</a></td>-->
<!--																									<td>201414110</td>-->
<!--																									<td>CSE</td>-->
<!--																									<td> 03 - II</td>-->
<!--																									<td>+8801680610158</td>-->
<!--																									<td>iyolita2011@gmail.com</td>-->
<!--																								</tr>-->

																							</table>
																						</div>
																					</section>

																					<script src="js/admin/table_scroll.js"></script>



									</div>


									<script src="js/admin/horizontal_tab_sub.js"></script>
								</div>


								<div id="Faculty"
									 class="w3-container tab w3-animate-opacity w3-container-sub content_blue"
									 style="height:705px;">
									<div class="w3-row-sub">
										<a href="#" onclick="openTab_sub(event, 'Add_f');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey-sub w3-padding-sub"
												 style="margin-left:50px">Add a Faculty Member
											</div>
										</a>
										<a href="#" onclick="openTab_sub(event, 'Search_f');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey-sub w3-padding-sub">
												Search a Faculty Member
											</div>
										</a>
										<a href="#" onclick="openTab_sub(event, 'View_f');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey-sub w3-padding-sub">
												View All faculties
											</div>
										</a>
									</div>
									<div class="cleaner"></div>


									<div id="Add_f" class="w3-container-sub tab-sub w3-animate-opacity form_blue">
										<div class="cleaner_h20"></div>
										<form method="post" name="add_faculty_form" action="api/Admin/add_faculty.php"
											  enctype="multipart/form-data" style="margin-left:100px">

											<label for="fac_name">Name:</label>
											<input type="text" maxlength="40" id="fac_name" class="input_field"
												   name="fac_name"/>
											<div class="cleaner_h10"></div>
											<label for="fac_designation">Designation:</label>
											<input type="text" maxlength="40" id="fac_designation" class="input_field"
												   name="fac_designation"/>

											<div class="cleaner_h10"></div>
											<label for="fac_id">ID:</label>
											<input type="text" id="fac_id" class="input_field" name="fac_id"/>
											<div class="cleaner_h10"></div>
											<label for="fac_username">Username:</label>
											<input type="text" maxlength="40" id="fac_username" class="input_field"
												   name="fac_username"/>
											<div class="cleaner_h10"></div>
											<label for="dept">Department:</label>
											<select id="fac_dept" class="input_field" name="fac_dept"
													style="width:261px">
												<option value="CE">Civil Engineering- CE</option>
												<option value="CSE">Computer Science & Engineering- CSE</option>
												<option value="ME">Mechanical Engineering- ME</option>
												<option value="EECE">Electrical, Electronic and Communication
													Engineering- EECE
												</option>
												<option value="AE">Aeronautical Engineering- AE</option>
												<option value="NAME">Naval Architecture and Marine Engineering-
													NAME
												</option>
												<option value="CEWCE">Civil, Environmental, Water Resources and
													Coastal Engineering- CEWCE
												</option>
												<option value="PME">Petroleum & Mining Engineering- PME</option>
												<option value="IPE">Industrial Production Engineering- IPE</option>
												<option value="NSE">Nuclear Science & Engineering- NSE</option>
												<option value="BME">Biomedical Engineering- BME</option>
												<option value="ARCHITECTURE">Architecture</option>
											</select>

											<div class="cleaner_h10"></div>
											<label for="fac_sex">Gender: </label>
											<input type="radio" id="fac_sex" value="Male" name="fac_sex" checked/> Male
											<input type="radio" id="fac_sex" value="Female" name="fac_sex"/> Female
											<div class="cleaner_h10"></div>
											<label for="fac_instructor_type">Instructor:</label>
											<input type="radio" id="fac_instructor_type" value="Internal"
												   name="fac_instructor_type" checked/> Internal
											<input type="radio" id="fac_instructor_type" value="External"
												   name="fac_instructor_type"/> External
											<div class="cleaner_h10"></div>
											<label for="fac_institution">Institution:</label>
											<input type="text" maxlength="50" id="fac_institution"
												   class="input_field" name="fac_institution"/>

											<div class="cleaner_h10"></div>
											<label for="fac_email">Email:</label>
											<input type=emai" maxlength="50" id="fac_email"
												   class="input_field" name="fac_email"/>

											<div class="cleaner_h10"></div>
											<label for="fac_phone">Phone:</label>
											<input type=number maxlength="14" id="fac_phone"
												   class="input_field" name="fac_phone"/>

											<div class="cleaner_h10"></div>
											<label for="fac_password">Password:</label>
											<input type=password maxlength="50" id="fac_password"
												   class="input_field" name="fac_password"/>
											<div class="cleaner_h10"></div>
											<label for=password>Confirm Password:</label>
											<input type=password maxlength="50" id="fac_confirm_password"
												   class="input_field" name="fac_password"/>

											<div class="cleaner_h10"></div>
											<label for="fac_address">Address:</label>
												<textarea id=text name="fac_address" rows="0" cols="0"
														  class="required"></textarea>

											<div class="cleaner_h10"></div>

											<label for="fac_image">Picture:</label>
											<input type="file" name="file" />
											<div class="cleaner_h10"></div>

											<button class="button float_l add_button" onclick="return Validate_faculty()" style="vertical-align:middle">
												<span>Add </span></button>
											<button class="button float_l not_move" type="reset" id="reset"
													name="reset" style="vertical-align:middle;">
												<span>Reset </span></button>
											<script type="text/javascript">
												function Validate_faculty() {
													var password= document.getElementById("fac_password").value;
													var confirmPassword = document.getElementById("fac_confirm_password").value;
													if (password != confirmPassword) {
														alert("Passwords do not match.");
														return false;
													}
													return true;
												}

											</script>


										</form>
									</div>

									<div id="Search_f"
										 class="w3-container-sub tab-sub w3-animate-opacity form_blue">
										<h3 style="margin-left:100px">put any (or more) value for the fields:</h3>
										<!--
                                        <div class="cleaner_h20"></div>
                                        <form method="post" name="search_faculty_form" action="search_faculty.php" style="margin-left:100px">

                                        <label for="fac_name">Name:</label>
                                        <input type="text" maxlength="40" id="fac_name" class="input_field" name="fac_name" />
                                        <div class="cleaner_h20"></div>
                                        <label for="fac_id">ID:</label>
                                        <input type="text" id="fac_id" class="input_field" name="fac_id" />
                                        <div class="cleaner_h20"></div>
                                        <label for="fac_rank">Rank:</label>
                                        <input type="text" maxlength="40" id="fac_rank" class="input_field" name="fac_rank" />
                                        <input type="checkbox" id="fac_rank" class="input_field" name="fac_rank" value="0" style="float:left; margin:5px -80px 0 -80px" checked /> N/A
                                        <div class="cleaner_h20"></div>
                                        <label for="dept">Department:</label>
                                        <select id="dept" class="input_field" name="dept" style="width:261px">
                                          <option value="0">None</option>
                                          <option value="ce">Civil Engineering- CE</option>
                                          <option value="cse">Computer Science & Engineering- CSE</option>
                                          <option value="me">Mechanical Engineering- ME</option>
                                          <option value="eece">Electrical, Electronic and Communication Engineering- EECE</option>
                                          <option value="ae">Aeronautical Engineering- AE</option>
                                          <option value="name">Naval Architecture and Marine Engineering- NAME</option>
                                          <option value="cewce">Civil, Environmental, Water Resources and Coastal Engineering- CEWCE</option>
                                          <option value="pme">Petroleum & Mining Engineering- PME</option>
                                          <option value="ipe">Industrial Production Engineering- IPE</option>
                                          <option value="nse">Nuclear Science & Engineering- NSE</option>
                                          <option value="bme">Biomedical Engineering- BME</option>
                                          <option value="archi">Architecture</option>
                                        </select>
                                        <div class="cleaner_h20"></div>
                                        <label for="fac_sex">Gender:  </label>
                                        <input type="radio" id="fac_sex" value="1" name="fac_sex" /> Male
                                        <input type="radio" id="fac_sex" value="2" name="fac_sex" /> Female
                                        <div class="cleaner_h20"></div>
                                        <label for="fac_institution">Institution:</label>
                                        <input type="text" maxlength="50" id="fac_institution" class="input_field" name="fac_institution" />
                                        <div class="cleaner_h20"></div>
                                        <label for="fac_email">Email:</label>
                                        <input type="fac_email" maxlength="50" id="fac_email" class="input_field" name="fac_email" />
                                        <div class="cleaner_h20"></div>
                                        <label for="fac_phone">Phone:</label>
                                        <input type="fac_phone" maxlength="50" id="fac_phone" class="input_field" name="fac_phone" />
                                        <div class="cleaner_h30"></div>


                                        <button class="button float_l search_button" style="vertical-align:middle"><span>Search </span></button>
                                        <button class="button float_l not_move" type="reset" id="reset" name="reset" style="vertical-align:middle;"><span>Reset </span></button>

                                      </form>-->

										<div class="cleaner"></div>
										<section>

											<!--for demo wrap-->
											<h3 style="text-align: center">Faculty Search Result:</h3>

											<div class="admin_table_view">
												<table align="center" class="table_view table_blue_content" >
													<thead class="table_blue">
													<tr>
														<th>Name</th>
														<th>Roll</th>
														<th>Department</th>
														<th>Level-Term</th>
														<th>Phone</th>
														<th>Email</th>
													</tr>
													</thead>

													<tr>
														<td><a href="#data_selected">Iyolita Islam</a></td>
														<td>201414110</td>
														<td>CSE</td>
														<td> 03 - II</td>
														<td>+8801680610158</td>
														<td>iyolita2011@gmail.com</td>
													</tr>

												</table>
											</div>
										</section>

										<script src="js/admin/table_scroll.js"></script>
									</div>

									<div id="View_f" class="w3-container-sub tab-sub w3-animate-opacity form_blue">
										<!--<form method="post" name="view_faculty_dep_form" action="view_faculty.php" style="margin-left:100px">
                                          <div class="cleaner_h20"></div>

                                          <label for="fac_dept_view">Department:</label>
                                          <select id="fac_dept_view" class="input_field" name="fac_dept_view" style="width:261px" >
                                          <option value="0">None</option>
                                          <option value="ce">Civil Engineering- CE</option>
                                          <option value="cse">Computer Science & Engineering- CSE</option>
                                          <option value="me">Mechanical Engineering- ME</option>
                                          <option value="eece">Electrical, Electronic and Communication Engineering- EECE</option>
                                          <option value="ae">Aeronautical Engineering- AE</option>
                                          <option value="name">Naval Architecture and Marine Engineering- NAME</option>
                                          <option value="cewce">Civil, Environmental, Water Resources and Coastal Engineering- CEWCE</option>
                                          <option value="pme">Petroleum & Mining Engineering- PME</option>
                                          <option value="ipe">Industrial Production Engineering- IPE</option>
                                          <option value="nse">Nuclear Science & Engineering- NSE</option>
                                          <option value="bme">Biomedical Engineering- BME</option>
                                          <option value="archi">Architecture</option>
                                        </select>
                                        <div class="cleaner_h20"></div>
                                        <label for="fac_sex">Gender:  </label>
                                        <input type="radio" id="fac_sex" value="1" name="fac_sex" /> Male
                                        <input type="radio" id="fac_sex" value="2" name="fac_sex" /> Female
                                        <div class="cleaner_h10"></div>
                                        <label for="fac_instructor_type">Instructor:</label>
                                        <input type="radio" id="fac_instructor_type" value="1" name="fac_instructor_type"  /> Internal
                                        <input type="radio" id="fac_instructor_type" value="2" name="fac_instructor_type" /> External
                                        <div class="cleaner_h30"></div>


                                        <button class="button float_l table_button" style="vertical-align:middle;margin-left:200px" ><span>View </span></button>

                                      </form>
                  -->
										<div class="cleaner"></div>
										<section>

											<!--for demo wrap-->
											<h3 style="text-align: center">View Faculties</h3>

											<div class="admin_table_view">
												<table align="center" class="table_view table_blue_content" >
													<thead class="table_blue">
													<tr>
														<th>Name</th>
														<th>Roll</th>
														<th>Department</th>
														<th>Level-Term</th>
														<th>Phone</th>
														<th>Email</th>
													</tr>
													</thead>

													<tr>
														<td><a href="#data_selected">Iyolita Islam</a></td>
														<td>201414110</td>
														<td>CSE</td>
														<td> 03 - II</td>
														<td>+8801680610158</td>
														<td>iyolita2011@gmail.com</td>
													</tr>

												</table>
											</div>
										</section>

										<script src="js/admin/table_scroll.js"></script>
									</div>

									<script src="js/admin/horizontal_tab_sub.js"></script>
								</div>


								<div id="Admin"
									 class="w3-container tab w3-animate-opacity w3-container-sub content_blue"
									 style="height:705px;">
									<div class="w3-row-sub">
										<a href="#" onclick="openTab_sub(event, 'Add_a');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey w3-padding-sub"
												 style="margin-left:70px">Add an admin
											</div>
										</a>
										<a href="#" onclick="openTab_sub(event, 'Search_a');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey-sub w3-padding-sub">
												Search an admin
											</div>
										</a>
										<a href="#" onclick="openTab_sub(event, 'View_a');">
											<div class="w3-third-sub tablink-sub w3-bottombar-sub w3-hover-light-grey-sub w3-padding-sub">
												View All Admins
											</div>
										</a>
									</div>
									<div class="cleaner"></div>


									<div id="Add_a" class="w3-container-sub tab-sub w3-animate-opacity form_blue">
										<div class="cleaner_h20"></div>
										<form method="post" name="add_admin_form" action="api/Admin/add_admin.php"  enctype="multipart/form-data"
											  style="margin-left:100px">

											<label for="ad_name">Name:</label>
											<input type="text" maxlength="40" id="ad_name" class="input_field"
												   name="ad_name"/>

											<div class="cleaner_h10"></div>
											<label for="ad_designation">Designation:</label>
											<input type="text" maxlength="40" id="ad_designation" class="input_field"
												   name="ad_designation"/>

											<div class="cleaner_h10"></div>
											<label for="ad_dept">Department:</label>
											<select id="ad_dept" class="input_field" name="ad_dept"
													style="width:261px">
												<option value="CE">Civil Engineering- CE</option>
												<option value="CSE">Computer Science & Engineering- CSE</option>
												<option value="ME">Mechanical Engineering- ME</option>
												<option value="EECE">Electrical, Electronic and Communication
													Engineering- EECE
												</option>
												<option value="AE">Aeronautical Engineering- AE</option>
												<option value="NAME">Naval Architecture and Marine Engineering-
													NAME
												</option>
												<option value="CEWCE">Civil, Environmental, Water Resources and
													Coastal Engineering- CEWCE
												</option>
												<option value="PME">Petroleum & Mining Engineering- PME</option>
												<option value="IPE">Industrial Production Engineering- IPE</option>
												<option value="NSE">Nuclear Science & Engineering- NSE</option>
												<option value="BME">Biomedical Engineering- BME</option>
												<option value="ARCHITECTURE">Architecture</option>
											</select>

											<div class="cleaner_h10"></div>

											<label for="ad_id">ID:</label>
											<input type="text" id="ad_id" class="input_field" name="ad_id"/>

											<div class="cleaner_h10"></div>
											<label for="ad_username">Username:</label>
											<input type="text" maxlength="40" id="ad_username" class="input_field"
												   name="ad_username"/>
											<!--												<input type="checkbox" id="ad_rank" class="input_field" name="ad_rank"-->
											<!--													   value="0" style="float:left; margin:5px -80px 0 -80px" checked/>-->
											<!--												N/A-->
											<div class="cleaner_h10"></div>
											<label for="ad_email">Email:</label>
											<input type=email maxlength="50" id="ad_email" class="input_field"
												   name="ad_email"/>

											<div class="cleaner_h10"></div>
											<label for="ad_phone">Phone:</label>
											<input type=number maxlength="14" id="ad_phone" class="input_field"
												   name="ad_phone"/>

											<div class="cleaner_h10"></div>
											<label for="ad_password">Password:</label>
											<input type=password maxlength="50" id="ad_password"
												   class="input_field" name="ad_password"/>
											<div class="cleaner_h10"></div>
											<label for="ad_password">Confirm Password:</label>
											<input type=password maxlength="50" id="ad_confirm_password"
												   class="input_field" name="ad_password"/>

											<div class="cleaner_h10"></div>
											<label for="ad_adress">Address:</label>
												<textarea id="ad_adress" name="ad_address" rows="0" cols="0"
														  class="required"></textarea>

											<div class="cleaner_h10"></div>

											<label for="st_image">Picture:</label>
											<input type="file" name="file" />
											<div class="cleaner_h20"></div>

											<button class="button float_l add_button" style="vertical-align:middle" onclick="return Validate_admin()">
												<span>Add </span></button>
											<button class="button float_l not_move"  type="reset" id="reset"
													name="reset" style="vertical-align:middle;">
												<span>Reset </span></button>

											<script type="text/javascript">
												function Validate_admin() {
													var password= document.getElementById("ad_password").value;
													var confirmPassword = document.getElementById("ad_confirm_password").value;
													if (password != confirmPassword) {
														alert("Passwords do not match.");
														return false;
													}
													return true;
												}

											</script>


										</form>
									</div>

									<div id="Search_a"
										 class="w3-container-sub tab-sub w3-animate-opacity table_blue">
										<h3 style="margin-left:100px">put any (or more) value for the fields:</h3>

										<!--<div class="cleaner_h20"></div>
                                          <form method="post" name="search_admin_form" action="search_admin.php" style="margin-left:100px">

                                          <label for="ad_name">Name:</label>
                                          <input type="text" maxlength="40" id="ad_name" class="input_field" name="ad_name" />
                                          <div class="cleaner_h20"></div>
                                          <label for="ad_id">ID:</label>
                                          <input type="text" id="ad_id" class="input_field" name="ad_id" />
                                          <div class="cleaner_h20"></div>
                                          <label for="ad_rank">Rank:</label>
                                          <input type="text" maxlength="40" id="ad_rank" class="input_field" name="ad_rank" />
                                          <input type="checkbox" id="ad_rank" class="input_field" name="ad_rank" value="0" style="float:left; margin:5px -80px 0 -80px" checked /> N/A
                                          <div class="cleaner_h20"></div>
                                          <label for="ad_email">Email:</label>
                                          <input type="ad_email" maxlength="50" id="ad_email" class="input_field" name="ad_email" />
                                          <div class="cleaner_h20"></div>
                                          <label for="ad_phone">Phone:</label>
                                          <input type="ad_phone" maxlength="50" id="ad_phone" class="input_field" name="ad_phone" />
                                          <div class="cleaner_h20"></div>
                                          <label for="ad_adress">Address:</label>
                                          <textarea id="ad_adress" name="ad_address" rows="0" cols="0" class="required"></textarea>
                                          <div class="cleaner_h30"></div>


                                          <button class="button float_l search_button" style="vertical-align:middle"><span>Search </span></button>
                                          <button class="button float_l not_move" type="reset" id="reset" name="reset" style="vertical-align:middle;"><span>Reset </span></button>

                                        </form>-->

										<div class="cleaner"></div>
										<section>

											<!--for demo wrap-->
											<h3 style="text-align: center">Student Search Result:</h3>

											<div class="admin_table_view">
												<table align="center" class="table_view table_blue_content" >
													<thead class="table_blue">
													<tr>
														<th>Name</th>
														<th>Roll</th>
														<th>Department</th>
														<th>Level-Term</th>
														<th>Phone</th>
														<th>Email</th>
													</tr>
													</thead>

													<tr>
														<td><a href="#data_selected">Iyolita Islam</a></td>
														<td>201414110</td>
														<td>CSE</td>
														<td> 03 - II</td>
														<td>+8801680610158</td>
														<td>iyolita2011@gmail.com</td>
													</tr>

												</table>
											</div>
										</section>

										<script src="js/admin/table_scroll.js"></script>





									</div>

									<div class="cleaner"></div>

									<div id="View_a" class="w3-container-sub tab-sub w3-animate-opacity form_blue">
										<h3 style="text-align: center;">All Admins</h3>

										<div class="cleaner"></div>

										<div class="content_section last_section">
											<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
												<thead>
												<tr>
													<th><h3>Name</h3></th>
													<th><h3 style="width:50px;">Dept</h3></th>
													<th><h3>Designation</h3></th>
													<th><h3>Email</h3></th>

												</tr>
												</thead>
												<tbody>
												<?php


												$alladmin = $con->query("select * from admin");
												if (mysqli_num_rows($alladmin) > 0) {
                                                    while ($row = mysqli_fetch_array($alladmin, 1)) {
                                                        $admin_name = $row['admin_name'];
                                                        $admin_id = $row['admin_id_number'];
                                                        $admin_username=$row['admin_username'];
                                                        $admin_email = $row['admin_email'];
                                                        $admin_designation = $row['admin_designation'];
                                                        $admin_department = $row['admin_department'];
                                                ?>
                                                <tr>
                                                    <td><a href="ridirectAdmin.php?admin_username_view=<?php echo $admin_username; ?>"><?php echo $admin_name;?></a></td>

                                                    <td><?php echo $admin_department;?></td>
                                                    <td><?php echo $admin_designation;?></td>
                                                    <td><?php echo $admin_email;?></td>
                                                </tr>

                                                </tr>
                                                <?php
                                                    }
                                                }
												?>
												<!-- ******************* -->

												</tbody>
											</table>
											<div class="cleaner_h20"></div>
											<div id="controls">
												<div id="perpage">
													<select onchange="sorter.size(this.value)">
														<option value="5">5</option>
														<option value="10" selected="selected">10</option>
														<option value="20">20</option>
														<option value="50">50</option>
														<option value="100">100</option>
													</select>
													<span>Entries Per Page</span>
												</div>
												<div id="navigation">
													<img src="images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
													<img src="images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
													<img src="images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
													<img src="images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
												</div>
												<div id="text">Page <span id="currentpage"></span> of <span id="pagelimit"></span></div>
											</div>
											<script type="text/javascript" src="js/admin/script.js"></script>
											<script type="text/javascript">
												var sorter = new TINY.table.sorter("sorter");
												sorter.head = "head";
												sorter.asc = "asc";
												sorter.desc = "desc";
												sorter.even = "evenrow";
												sorter.odd = "oddrow";
												sorter.evensel = "evenselected";
												sorter.oddsel = "oddselected";
												sorter.paginate = true;
												sorter.currentid = "currentpage";
												sorter.limitid = "pagelimit";
												sorter.init("table",1);
											</script>


										</div>
									</div>


									<script src="js/admin/horizontal_tab_sub.js"></script>
								</div>


							</div>
						</div> <!-- end of members -->


						<div class="panel" id="data_selected">
							<div class=" last_section content_orange form_orange" style="height:730px">


								<h3 style="margin-top:30px;"></h3>

								<div  class="image_wrapper image_fr"  style="margin-right:20px;overflow:hidden"><img src="uploads/student/<?php echo $_SESSION['view_student_propic'];?>"  height="180px" width="155px" /> </div>
									<div class="info">
										<p style="margin-top:30px;">Name : <?php echo $_SESSION['view_student_name'];?></p>
										<div class="cleaner_h10"></div>
										<p >Roll : <?php echo $_SESSION['view_student_id'];?></p>
										<div class="cleaner_h10"></div>
										<p >Registration No. : <?php echo $_SESSION['view_student_reg_no'];?></p>
										<div class="cleaner_h10"></div>
										<p >Rank : <?php echo $_SESSION['view_student_rank'];?></p>
										<div class="cleaner_h10"></div>
										<p >Department : <?php echo $_SESSION['view_student_department'];?></p>
										<div class="cleaner_h10"></div>
										<p ><?php echo $_SESSION['view_student_level_term'];?></p>
										<div class="cleaner_h10"></div>
										<p >Section : <?php echo $_SESSION['view_student_section'];?></p>
										<div class="cleaner_h10"></div>
										<p >Gender : <?php echo $_SESSION['view_student_gender'];?></p>
										<div class="cleaner_h10"></div>
										<p >Father's Name : <?php echo $_SESSION['view_student_father'];?></p>
										<div class="cleaner_h10"></div>
										<p >Mother's Name : <?php echo $_SESSION['view_student_mother'];?></p>
										<div class="cleaner_h10"></div>
										<p >Email : <?php echo $_SESSION['view_student_email'];?></p>
										<div class="cleaner_h10"></div>
										<p >Phone: <?php echo $_SESSION['view_student_phone'];?></p>
										<div class="cleaner_h10"></div>
										<p >Address: <?php echo $_SESSION['view_student_address'];?></p>


									</div>




							</div>


						</div>


						<div class="panel" id="data_selected_admin">
							<div class=" last_section content_orange form_orange" style="height:730px">


								<h3 style="margin-top:30px;"></h3>

								<div  class="image_wrapper image_fr"  style="margin-right:20px;overflow:hidden"><img src="uploads/admin/<?php echo $_SESSION['view_admin_propic'];?>"  height="180px" width="155px" /> </div>
								<div class="info">
									<p style="margin-top:30px;">Name : <?php echo $_SESSION['view_admin_name'];?></p>
									<div class="cleaner_h10"></div>
									<p >Designation : <?php echo $_SESSION['view_admin_designation'];?></p>
									<div class="cleaner_h10"></div>
									<p >Department : <?php echo $_SESSION['view_admin_department'];?></p>
									<div class="cleaner_h10"></div>
									<p >Email : <?php echo $_SESSION['view_admin_email'];?></p>
									<div class="cleaner_h10"></div>
									<p >Phone: <?php echo $_SESSION['view_admin_phone'];?></p>
									<div class="cleaner_h10"></div>
									<p >Address: <?php echo $_SESSION['view_admin_address'];?></p>


								</div>




							</div>


						</div>




						<!--<div class="panel" id="new">
							<div class=" last_section content_yellow" style="height:740px">
								<h1>NOTICESksdljfsdk</h1>

								<table class="notice_table">
									<tr class="notice_table_firstrow"><th>Date</th><th>Notice</th></tr>

									<tr><td><div class="notice_date notice_row"><center style="margin:25px 0 -2px 0; font-size:30px">18</center></br>
												<center style="font-size:20px;">Oct 2016</center></div></td><td><div class="notice_row notice_news">aliceblue</div></td></tr>

								</table>

								<div class="col_380 float_r"></div>
							</div>
						</div>-->




						<div class="panel" id="course">
							<div class="content_section last_section w3-container-course">
								<div class="w3-row-course">
									<a href="#" onclick="openTab_course(event, 'Add_course');">
										<div class="w3-third-course tablink-course w3-bottombar-course w3-hover-course w3-padding-course"
											 style="margin-left:95px">Add a Course
										</div>
									</a>
									<a href="#" onclick="openTab_course(event, 'View_course');">
										<div class="w3-third-course tablink-course w3-bottombar-course w3-hover-course w3-padding-course">
											View a Course
										</div>
									</a>
									<a href="#" onclick="openTab_course(event, 'Delete_course');">
										<div class="w3-third-course tablink-course w3-bottombar-course w3-hover-course w3-padding-course">
											Delete a Course
										</div>
									</a>
								</div>
								<div class="cleaner"></div>


								<div id="Add_course"
									 class="w3-container-course tab-course w3-animate-opacity content_light_blue form_light_blue"
									 style="height:705px">
									<div class="cleaner_h10"></div>
									<form method="post" name="add_course_form" action="api/Admin/add_course.php"
										  style="margin-left:100px">

										<div class="cleaner_h10"></div>
										<label for="course_code">Course Code:</label>
										<input type="text" maxlength="50" id="course_code" class="input_field"
											   name="course_code"/>

										<div class="cleaner_h10"></div>
										<label for="course_name">Course Name :</label>
										<input type=text maxlength="50" id="course_name"
											   class="input_field" name="course_name"/>



										<div class="cleaner_h10"></div>
										<label for="course_off_dept" style="width:500px">Offered by the Department
											of:</label>
										<select id="cr_dept" class="input_field" name="cr_dept"
												style="width:261px">
											<option value="CE">Civil Engineering- CE</option>
											<option value="CSE">Computer Science & Engineering- CSE</option>
											<option value="ME">Mechanical Engineering- ME</option>
											<option value="EECE">Electrical, Electronic and Communication
												Engineering- EECE
											</option>
											<option value="AE">Aeronautical Engineering- AE</option>
											<option value="NAME">Naval Architecture and Marine Engineering-
												NAME
											</option>
											<option value="CEWCE">Civil, Environmental, Water Resources and
												Coastal Engineering- CEWCE
											</option>
											<option value="PME">Petroleum & Mining Engineering- PME</option>
											<option value="IPE">Industrial Production Engineering- IPE</option>
											<option value="NSE">Nuclear Science & Engineering- NSE</option>
											<option value="BME">Biomedical Engineering- BME</option>
											<option value="ARCHITECTURE">Architecture</option>
										</select>

										<div class="cleaner_h10"></div>

										<button class="button float_l add_button" style="vertical-align:middle">
											<span>Add </span></button>
										<button class="button float_l not_move" type="reset" id="reset" name="reset"
												style="vertical-align:middle;"><span>Reset </span>
										</button>

									</form>

								</div>

								<div id="View_course"
									 class="w3-container-course tab-course w3-animate-opacity content_light_blue form_light_blue"
									 style="height:705px">
									<!--<div class="cleaner_h20"></div>
									<h3 style="margin-left:100px">put any (or more) value for the fields:</h3>

									<div class="cleaner_h20"></div>
									<form method="post" name="view_course_form" action="view_course.php"
										  style="margin-left:100px">

										<label for="course_code">Course Code:</label>
										<input type="text" maxlength="10" id="course_code" class="input_field"
											   name="course_code"/>

										<div class="cleaner_h10"></div>
										<label for="course_off_dept" style="width:500px">Offered by the Department
											of:</label>
										<select id="course_off_dept" class="input_field" name="course_off_dept"
												style="width:261px">
											<option value="0">N/A</option>
											<option value="CE">Civil Engineering- CE</option>
											<option value="CSE">Computer Science & Engineering- CSE</option>
											<option value="ME">Mechanical Engineering- ME</option>
											<option value="EECE">Electrical, Electronic and Communication
												Engineering- EECE
											</option>
											<option value="AE">Aeronautical Engineering- AE</option>
											<option value="NAME">Naval Architecture and Marine Engineering-
												NAME
											</option>
											<option value="CEWCE">Civil, Environmental, Water Resources and
												Coastal Engineering- CEWCE
											</option>
											<option value="PME">Petroleum & Mining Engineering- PME</option>
											<option value="IPE">Industrial Production Engineering- IPE</option>
											<option value="NSE">Nuclear Science & Engineering- NSE</option>
											<option value="BME">Biomedical Engineering- BME</option>
											<option value="ARCHITECTURE">Architecture</option>
										</select>

										<div class="cleaner_h10"></div>
										<label for="course_taken_dept" style="width:500px">Taken by the Department
											of:</label>
										<select id="course_taken_dept" class="input_field" name="course_taken_dept"
												style="width:261px">
											<option value="0">N/A</option>
											<option value="CE">Civil Engineering- CE</option>
											<option value="CSE">Computer Science & Engineering- CSE</option>
											<option value="ME">Mechanical Engineering- ME</option>
											<option value="EECE">Electrical, Electronic and Communication
												Engineering- EECE
											</option>
											<option value="AE">Aeronautical Engineering- AE</option>
											<option value="NAME">Naval Architecture and Marine Engineering-
												NAME
											</option>
											<option value="CEWCE">Civil, Environmental, Water Resources and
												Coastal Engineering- CEWCE
											</option>
											<option value="PME">Petroleum & Mining Engineering- PME</option>
											<option value="IPE">Industrial Production Engineering- IPE</option>
											<option value="NSE">Nuclear Science & Engineering- NSE</option>
											<option value="BME">Biomedical Engineering- BME</option>
											<option value="ARCHITECTURE">Architecture</option>
										</select>

										<div class="cleaner_h10"></div>
										<label for="course_term">Level & Term:</label>
										<select id="course_term" class="input_field" name="course_term"
												style="width:261px">
											<option value="Level-01 Term-I">Level-01 Term-I</option>
											<option value="Level-01 Term-II">Level-01 Term-II</option>
											<option value="Level-02 Term-I">Level-02 Term-I</option>
											<option value="Level-02 Term-II">Level-02 Term-II</option>
											<option value="Level-03 Term-I">Level-03 Term-I</option>
											<option value="Level-03 Term-II">Level-03 Term-II</option>
											<option value="Level-04 Term-I">Level-04 Term-I</option>
											<option value="Level-04 Term-II">Level-04 Term-II</option>
										</select>

										<div class="cleaner_h20"></div>

										<button class="button float_l search_button" style="vertical-align:middle">
											<span>Search </span></button>
										<button class="button float_l not_move" type="reset" id="reset" name="reset"
												style="vertical-align:middle;"><span>Reset </span>
										</button>

									</form>-->
									<div class="cleaner"></div>
									<section>

										<!--for demo wrap-->
										<h3 style="text-align: center">Faculty Search Result:</h3>

										<div class="table_view">
											<table cellpadding="0" cellspacing="0" border="0">
												<thead>
												<tr>
													<th>Name</th>
													<th>Roll</th>
													<th>Department</th>
													<th>Level-Term</th>
													<th>Phone</th>
													<th>Email</th>
												</tr>
												</thead>
											</table>
										</div>
										<div class="table_view_content">
											<table cellpadding="0" cellspacing="0" border="0">
												<tbody>
												<tr>
													<td><a href="#data_selected">Iyolita Islam</a></td>
													<td>201414110</td>
													<td>CSE</td>
													<td> 03 - II</td>
													<td>+8801680610158</td>
													<td>iyolita2011@gmail.com</td>
												</tr>
												</tbody>
											</table>
										</div>
									</section>

									<script src="js/admin/table_scroll.js"></script>


								</div>


								<div id="Delete_course"
									 class="w3-container-course tab-course w3-animate-opacity content_light_blue form_light_blue"
									 style="height:705px;">
									<div class="cleaner_h20"></div>
									<h3 style="margin-left:100px">put any (or more) value for the fields:</h3>

									<div class="cleaner_h20"></div>
									<form method="post" name="delete_course_form" action="delete_course_php"
										  style="margin-left:100px">

										<label for="course_code">Course Code:</label>
										<input type="text" maxlength="10" id="course_code" class="input_field"
											   name="course_code"/>

										<div class="cleaner_h10"></div>
										<label for="course_off_dept" style="width:500px">Offered by the Department
											of:</label>
										<select id="course_off_dept" class="input_field" name="course_off_dept"
												style="width:261px">
											<option value="0">N/A</option>
											<option value="CE">Civil Engineering- CE</option>
											<option value="CSE">Computer Science & Engineering- CSE</option>
											<option value="ME">Mechanical Engineering- ME</option>
											<option value="EECE">Electrical, Electronic and Communication
												Engineering- EECE
											</option>
											<option value="AE">Aeronautical Engineering- AE</option>
											<option value="NAME">Naval Architecture and Marine Engineering-
												NAME
											</option>
											<option value="CEWCE">Civil, Environmental, Water Resources and
												Coastal Engineering- CEWCE
											</option>
											<option value="PME">Petroleum & Mining Engineering- PME</option>
											<option value="IPE">Industrial Production Engineering- IPE</option>
											<option value="NSE">Nuclear Science & Engineering- NSE</option>
											<option value="BME">Biomedical Engineering- BME</option>
											<option value="ARCHITECTURE">Architecture</option>
										</select>

										<div class="cleaner_h10"></div>


										<button class="button float_l table_button"
												style="vertical-align:middle; margin-left:200px;"><span>View </span>
										</button>

									</form>

									<div class="cleaner"></div>
									<section>

										<!--for demo wrap-->
										<h3 style="text-align: center">Course Search Result:</h3>

										<div class="table_view">
											<table cellpadding="0" cellspacing="0" border="0">
												<thead>
												<tr>
													<th>Name</th>
													<th>Roll</th>
													<th>Department</th>
													<th>Level-Term</th>
													<th>Phone</th>
													<th>Email</th>
												</tr>
												</thead>
											</table>
										</div>
										<div class="table_view_content">
											<table cellpadding="0" cellspacing="0" border="0">
												<tbody>
												<tr>
													<td><a href="#data_selected">Iyolita Islam</a></td>
													<td>201414110</td>
													<td>CSE</td>
													<td> 03 - II</td>
													<td>+8801680610158</td>
													<td>iyolita2011@gmail.com</td>
												</tr>
												</tbody>
											</table>
										</div>
									</section>

									<script src="js/admin/table_scroll.js"></script>

								</div>


								<script src="js/admin/horizontal_tab_course.js"></script>
							</div>
						</div> <!-- end of services -->

						<div class="panel" id="schedule">
							<div class="content_section last_section w3-container">
								<div class="w3-row-schedule">
									<a href="#" onclick="openTab_schedule(event, 'Add_schedule');">
										<div class="w3-third-schedule tablink-schedule w3-bottombar-schedule w3-hover-schedule w3-padding-schedule"
											 style="margin-left:95px">Add a Schedule
										</div>
									</a>
									<a href="#" onclick="openTab_schedule(event, 'View_schedule');">
										<div class="w3-third-schedule tablink-schedule w3-bottombar-schedule w3-hover-schedule w3-padding-schedule">
											View a Schedule
										</div>
									</a>
									<a href="#" onclick="openTab_schedule(event, 'Delete_schedule');">
										<div class="w3-third-schedule tablink-schedule w3-bottombar-schedule w3-hover-schedule w3-padding-schedule">
											Delete a Schedule
										</div>
									</a>
								</div>
								<div class="cleaner"></div>


								<div id="Add_schedule"
									 class="w3-container-schedule tab-schedule w3-animate-opacity content_green form_green"
									 style="height:705px">
									<div class="cleaner_h10"></div>
									<form method="post" name="add_schedule_form" action="api/Admin/add_schedule.php"
										  style="margin-left:100px">

										<div class="cleaner_h10"></div>
										<label for="schedule_term">Level & Term:</label>
										<select id="schedule_term" class="input_field" name="schedule_term"
												style="width:261px">
											<option value="Level-01 Term-I">Level-01 Term-I</option>
											<option value="Level-01 Term-II">Level-01 Term-II</option>
											<option value="Level-02 Term-I">Level-02 Term-I</option>
											<option value="Level-02 Term-II">Level-02 Term-II</option>
											<option value="Level-03 Term-I">Level-03 Term-I</option>
											<option value="Level-03 Term-II">Level-03 Term-II</option>
											<option value="Level-04 Term-I">Level-04 Term-I</option>
											<option value="Level-04 Term-II">Level-04 Term-II</option>
										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_section">Section: </label>
										<input type="text" maxlength="1" id="schedule_section" class="input_field"
											   name="schedule_section"/>

										<div class="cleaner_h10"></div>
										<label for="schedule_course_code">Course Code:</label>
										<input type="text" maxlength="10" id="schedule_course_code"
											   class="input_field" name="schedule_course_code"/>

										<div class="cleaner_h10"></div>
										<label for="schedule_dept" style="width:500px">Offered by Department
											of:</label>
										<select id="schedule_dept" class="input_field" name="schedule_dept"
												style="width:261px">
											<option value="CE">Civil Engineering- CE</option>
											<option value="CSE">Computer Science & Engineering- CSE</option>
											<option value="ME">Mechanical Engineering- ME</option>
											<option value="EECE">Electrical, Electronic and Communication
												Engineering- EECE
											</option>
											<option value="AE">Aeronautical Engineering- AE</option>
											<option value="NAME">Naval Architecture and Marine Engineering-
												NAME
											</option>
											<option value="CEWCE">Civil, Environmental, Water Resources and
												Coastal Engineering- CEWCE
											</option>
											<option value="PME">Petroleum & Mining Engineering- PME</option>
											<option value="IPE">Industrial Production Engineering- IPE</option>
											<option value="NSE">Nuclear Science & Engineering- NSE</option>
											<option value="BME">Biomedical Engineering- BME</option>
											<option value="ARCHITECTURE">Architecture</option>
										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_day">Day:</label>
										<select id="schedule_day" class="input_field" name="schedule_day"
												style="width:261px">
											<option value="Saturday">Saturday</option>
											<option value="Sunday">Sunday</option>
											<option value="Monday">Monday</option>
											<option value="Tuesday">Tuesday</option>
											<option value="Wednesday">Wednesday</option>
											<option value="Thursday">Thursday</option>
											<option value="Friday">Friday</option>

										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_hour">Hour:</label>
										<input type="number" min="00" max="23" id="schedule_hour"
											   class="input_field" name="schedule_hour" style="width:100px"/>
										<label for="schedule_min">Minute:</label>
										<input type="number" min="00" max="59" checked="00" id="schedule_min"
											   class="input_field" name="schedule_min" style="width:100px"/>

										<div class="cleaner_h10"></div>


										<button class="button float_l add_button" style="vertical-align:middle">
											<span>Add </span></button>
										<button class="button float_l not_move" type="reset" id="reset" name="reset"
												style="vertical-align:middle;"><span>Reset </span>
										</button>

									</form>

								</div>

								<div id="View_schedule"
									 class="w3-container-schedule tab-schedule w3-animate-opacity content_green form_green"
									 style="height:705px">
									<h3 style="margin-left:100px">put any (or more) value for the fields:</h3>

									<div class="cleaner_h20"></div>
									<form method="post" name="search_student_form" action="view_schedule.php"
										  style="margin-left:100px">
										<label for="schedule_dept" style="width:500px">Offered by Department
											of:</label>
										<select id="schedule_dept" class="input_field" name="schedule_dept"
												style="width:261px">
											<option value="CE">Civil Engineering- CE</option>
											<option value="CSE">Computer Science & Engineering- CSE</option>
											<option value="ME">Mechanical Engineering- ME</option>
											<option value="EECE">Electrical, Electronic and Communication
												Engineering- EECE
											</option>
											<option value="AE">Aeronautical Engineering- AE</option>
											<option value="NAME">Naval Architecture and Marine Engineering-
												NAME
											</option>
											<option value="CEWCE">Civil, Environmental, Water Resources and
												Coastal Engineering- CEWCE
											</option>
											<option value="PME">Petroleum & Mining Engineering- PME</option>
											<option value="IPE">Industrial Production Engineering- IPE</option>
											<option value="NSE">Nuclear Science & Engineering- NSE</option>
											<option value="BME">Biomedical Engineering- BME</option>
											<option value="ARCHITECTURE">Architecture</option>
										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_term">Level & Term:</label>
										<select id="schedule_term" class="input_field" name="schedule_term"
												style="width:261px">
											<option value="Level-01 Term-I">Level-01 Term-I</option>
											<option value="Level-01 Term-II">Level-01 Term-II</option>
											<option value="Level-02 Term-I">Level-02 Term-I</option>
											<option value="Level-02 Term-II">Level-02 Term-II</option>
											<option value="Level-03 Term-I">Level-03 Term-I</option>
											<option value="Level-03 Term-II">Level-03 Term-II</option>
											<option value="Level-04 Term-I">Level-04 Term-I</option>
											<option value="Level-04 Term-II">Level-04 Term-II</option>
										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_section">Section: </label>
										<input type="text" maxlength="1" id="schedule_section" class="input_field"
											   name="schedule_section"/>

										<div class="cleaner_h10"></div>
										<label for="schedule_course_code">Course Code:</label>
										<input type="text" maxlength="10" id="schedule_course_code"
											   class="input_field" name="schedule_course_code"/>

										<div class="cleaner_h10"></div>
										<label for="schedule_day">Day:</label>
										<select id="schedule_day" class="input_field" name="schedule_dept"
												style="width:261px">
											<option value="1">Saturday</option>
											<option value="2">Sunday</option>
											<option value="3">Monday</option>
											<option value="4">Tuesday</option>
											<option value="5">Wednesday</option>
											<option value="6">Thursday</option>
											<option value="7">Friday</option>

										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_hour">Hour:</label>
										<input type="number" min="00" max="23" id="schedule_hour"
											   class="input_field" name="schedule_hour" style="width:100px"/>
										<label for="schedule_min">Minute:</label>
										<input type="number" min="00" max="59" checked="00" id="schedule_min"
											   class="input_field" name="schedule_min" style="width:100px"/>

										<div class="cleaner_h10"></div>

										<button class="button float_l search_button" style="vertical-align:middle">
											<span>Search </span></button>
										<button class="button float_l not_move" type="reset" id="reset" name="reset"
												style="vertical-align:middle;"><span>Reset </span>
										</button>

									</form>
								</div>


								<div id="Delete_schedule"
									 class="w3-container-schedule tab-schedule w3-animate-opacity content_green form_green"
									 style="height:705px;">
									<div class="cleaner_h20"></div>
									<h3 style="margin-left:100px">put any (or more) value for the fields:</h3>

									<form method="post" name="view_student_dep_form" action="delete_schedule.php"
										  style="margin-left:100px">

										<label for="schedule_dept" style="width:500px">Offered by Department
											of:</label>
										<select id="schedule_dept" class="input_field" name="schedule_dept"
												style="width:261px">
											<option value="CE">Civil Engineering- CE</option>
											<option value="CSE">Computer Science & Engineering- CSE</option>
											<option value="ME">Mechanical Engineering- ME</option>
											<option value="EECE">Electrical, Electronic and Communication
												Engineering- EECE
											</option>
											<option value="AE">Aeronautical Engineering- AE</option>
											<option value="NAME">Naval Architecture and Marine Engineering-
												NAME
											</option>
											<option value="CEWCE">Civil, Environmental, Water Resources and
												Coastal Engineering- CEWCE
											</option>
											<option value="PME">Petroleum & Mining Engineering- PME</option>
											<option value="IPE">Industrial Production Engineering- IPE</option>
											<option value="NSE">Nuclear Science & Engineering- NSE</option>
											<option value="BME">Biomedical Engineering- BME</option>
											<option value="ARCHITECTURE">Architecture</option>
										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_term">Level & Term:</label>
										<select id="schedule_term" class="input_field" name="schedule_term"
												style="width:261px">
											<option value="Level-01 Term-I">Level-01 Term-I</option>
											<option value="Level-01 Term-II">Level-01 Term-II</option>
											<option value="Level-02 Term-I">Level-02 Term-I</option>
											<option value="Level-02 Term-II">Level-02 Term-II</option>
											<option value="Level-03 Term-I">Level-03 Term-I</option>
											<option value="Level-03 Term-II">Level-03 Term-II</option>
											<option value="Level-04 Term-I">Level-04 Term-I</option>
											<option value="Level-04 Term-II">Level-04 Term-II</option>
										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_section">Section: </label>
										<input type="text" maxlength="1" id="schedule_section" class="input_field"
											   name="schedule_section"/>

										<div class="cleaner_h10"></div>
										<label for="schedule_course_code">Course Code:</label>
										<input type="text" maxlength="10" id="schedule_course_code"
											   class="input_field" name="schedule_course_code"/>

										<div class="cleaner_h10"></div>
										<label for="schedule_day">Day:</label>
										<select id="schedule_day" class="input_field" name="schedule_dept"
												style="width:261px">
											<option value="1">Saturday</option>
											<option value="2">Sunday</option>
											<option value="3">Monday</option>
											<option value="4">Tuesday</option>
											<option value="5">Wednesday</option>
											<option value="6">Thursday</option>
											<option value="7">Friday</option>

										</select>

										<div class="cleaner_h10"></div>
										<label for="schedule_hour">Hour:</label>
										<input type="number" min="00" max="23" id="schedule_hour"
											   class="input_field" name="schedule_hour" style="width:100px"/>
										<label for="schedule_min">Minute:</label>
										<input type="number" min="00" max="59" checked="00" id="schedule_min"
											   class="input_field" name="schedule_min" style="width:100px"/>

										<div class="cleaner_h10"></div>

										<button class="button float_l table_button"
												style="vertical-align:middle; margin-left:200px;"><span>View </span>
										</button>

									</form>


								</div>


								<script src="js/admin/horizontal_tab_schedule.js"></script>
							</div>
						</div>

						<div class="panel" id="notice">
							<div class=" last_section content_yellow form_yellow" style="height:740px;">
								<h1 style="margin-bottom:-15px;">NOTICES</h1>
								<a href="#add_notice"><button class="button  add_button"  style="margin:-1200px 10px -50px 500px;">
									<span>Add </span></button> </a>
								<div class="cleaner"></div>
								<section>
									<div class="admin_table_view" style="height:630px;margin:10px 0 0 13px;">
										<table align="center" class="table_view table_yellow_content" >
											<thead class="table_yellow">
											<tr>
												<th>Date</th>
												<th>Notice</th>
											</tr>
											</thead>

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

										</table>
									</div>

								</section>

								<script src="js/admin/table_scroll.js"></script>



								<div class="col_380 float_r"></div>
							</div>
						</div>



						<div class="panel" id="add_notice">
							<div class=" last_section content_yellow form_yellow" style="height:740px">
								<h1>Add Notices</h1>
								<form method="post"  name="add_admin_notice_form" action="api/Admin/add_notice.php"
									  style="margin-left:100px">

									<label for="admin_notice">Write notice:</label>
												<textarea id="admin_notice" name="admin_notice" rows="0" cols="0"
														  class="required"></textarea>

									<div class="cleaner_h10"></div>

									<button class="button float_l table_button"
											style="vertical-align:middle; margin-left:200px;"><span>Submit </span>
									</button>

								</form>
								<div class="col_380 float_r"></div>
							</div>
						</div>


						<div class="panel" id="discussion">
							<div class=" last_section content_yellow form_yellow" style="height:740px">
								<h3>Add a question for a specific course...</h3>
								<form method="post"  name="add_admin_notice_form" action="api/Admin/add_notice.php"
									  style="margin-left:100px">

									<label for="admin_notice">Write notice:</label>
												<textarea id="admin_notice" name="admin_notice" rows="0" cols="0"
														  class="required"></textarea>

									<div class="cleaner_h10"></div>

									<button class="button float_l table_button"
											style="vertical-align:middle; margin-left:200px;"><span>Submit </span>
									</button>

								</form>
								<div class="col_380 float_r"></div>
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