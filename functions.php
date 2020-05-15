<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'multi_login');


$username = "";
$email    = "";
$errors   = array(); 
//$user = new User();


if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	
	if (count($errors) == 0) {
		$password = base64_encode($password_1);//encrypt the password
		

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'Student', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = base64_encode($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}elseif ($logged_in_user['user_type'] == 'lecturer') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: lecturer.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
function isLecturer()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'lecturer' ) {
		return true;
	}else{
		return false;
	}
}


//lecture_notes
$sub_code	= "";
$sub_name	= "";
$dep  		= "";
$sem  		= "";
$year		= "";

if (isset($_POST['lecture_btn'])) {
	notes();
}

function notes(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $sub_code, $sub_name, $dep, $sem, $year;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$sub_code    =  e($_POST['sub_code']);
	$sub_name     =  e($_POST['sub_name']);
	$dep 		 =  e($_POST['dep']);
	$sem  		=  e($_POST['sem']);
	$year       =  e($_POST['year']);
	

	if (empty($sub_code)) { 
		array_push($errors, "Subject Code is required"); 
	}
	if (empty($sub_name)) { 
		array_push($errors, "Subject Name is required"); 
	}
	if (empty($dep)) { 
		array_push($errors, "Department is required"); 
	}
	if (empty($sem)) { 
		array_push($errors, "Semester is required"); 
	}
	if (empty($year)) { 
		array_push($errors, "Year is required"); 
	}
	

	if (count($errors) == 0) {
		

			isset($_POST['sub_code']);
			isset($_POST['sub_name']);
			isset($_POST['dep']);
			isset($_POST['sem']);
			isset($_POST['year']);
			
			$sub_code = e($_POST['sub_code']);
			$sub_name = e($_POST['sub_name']);
			$dep 	= e($_POST['dep']);
			$sem 	= e($_POST['sem']);
			$year 	= e($_POST['year']);
			
			$query = "INSERT INTO lec_notes (sub_code,sub_name,dep,sem,year) 
					  VALUES('$sub_code','$sub_name','$dep','$sem','$year')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New lecture notes added!!";
			header('location: lecture_notes.php');
		}else{
			echo"Error Occured";				
		}
	}

//time_tables

$dep  		= "";
$sem  		= "";
$year		= "";

if (isset($_POST['ttables_btn'])) {
	ttable();
}

function ttable(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $dep, $sem, $year;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	
	$dep 		 =  e($_POST['dep']);
	$sem  		=  e($_POST['sem']);
	$year       =  e($_POST['year']);
	

	if (empty($dep)) { 
		array_push($errors, "Department is required"); 
	}
	if (empty($sem)) { 
		array_push($errors, "Semester is required"); 
	}
	if (empty($year)) { 
		array_push($errors, "Year is required"); 
	}
	

	if (count($errors) == 0) {
		
			isset($_POST['dep']);
			isset($_POST['sem']);
			isset($_POST['year']);
			
		
			$dep 	= e($_POST['dep']);
			$sem 	= e($_POST['sem']);
			$year 	= e($_POST['year']);
			
			$query = "INSERT INTO ti_tables (dep,sem,year) 
					  VALUES('$dep','$sem','$year')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: time_tables.php');
		}else{
			echo"Error Occured";				
		}
	}

//Notices

$dep  		= "";

if (isset($_POST['notice_btn'])) {
	notices();
}

function notices(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $dep;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$dep 		 =  e($_POST['dep']);

	if (empty($dep)) { 
		array_push($errors, "Department is required"); 
	}
	
	if (count($errors) == 0) {
		
			isset($_POST['dep']);
			
			$dep 	= e($_POST['dep']);
			
			$query = "INSERT INTO notice (dep) 
					  VALUES('$dep')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: notices.php');
		}else{
			echo"Error Occured";				
		}
	}	

//Exam Details

$dep  		= "";

if (isset($_POST['exam_btn'])) {
	exam();
}

function exam(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $dep;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$dep 		 =  e($_POST['dep']);

	if (empty($dep)) { 
		array_push($errors, "Department is required"); 
	}
	
	if (count($errors) == 0) {
		
			isset($_POST['dep']);
			
			$dep 	= e($_POST['dep']);
			
			$query = "INSERT INTO exam_d (dep) 
					  VALUES('$dep')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: exam_details.php');
		}else{
			echo"Error Occured";				
		}
	}
	



		


