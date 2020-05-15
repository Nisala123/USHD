<?php 
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Time Tables</title>
	<link rel="stylesheet" type="text/css" href="../form.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Uploads - Time Tables</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../images/admin_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; <a href="create_user.php"> + add user</a>
					</small>

				<?php endif ?>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="topnav" id="myTopnav">
		<link rel="stylesheet" type="text/css" href="../dropbtnstyle.css">
			<a href="home.php" class="active">Home</a>
		
			<div class="dropdown">
				<button class="dropbtn">Uploads 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="lecture_notes.php">Lecture Notes</a>
					<a href="time_tables.php">Time Tables</a>
					<a href="notices.php">Notices</a>
					<a href="exam_details.php">Exam Details</a>
				</div>
			</div> 
				<div class="dropdown">
				<button class="dropbtn">Manage 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="m_lecnotes.php">Manage Lecture Notes</a>
					<a href="m_ttables.php">Manage Time Tables</a>
					<a href="m_notices.php">Manage Notices</a>
					<a href="m_edetails.php">Manage Exam Details</a>
					<a href="m_users.php">Manage Users</a>
				</div>
				</div> 
			<a href="about.php">About</a>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="../btn.css">
			<div class="icon-bar">
			<a class="active" href="drive.php"><i class="fa fa-cog fa-spin"></i></a> 

			</div>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
		<script type="text/javascript">
			function myFunction() {
				var x = document.getElementById("myTopnav");
				if (x.className === "topnav") {
					x.className += " responsive";
				} else {
					x.className = "topnav";
				}
			}
		</script>
		
		
		<br>
		<br>
		
		<form method="post" action="time_tables.php">
		
		<?php echo display_error(); ?>
		<link rel="stylesheet" type="text/css" href="../form.css">
	
			<div class="input-group">
			<label>Department</label>
			<select name="dep" id="dep" >
				<option value=""></option>
				<option value="ICT">ICT</option>
				<option value="BPT">BPT</option>
				<option value="MTT">MTT</option>
			</select>
			
			</div>
			<div class="input-group">
			<label>Semester</label>
			<select name="sem" id="sem" >
				<option value=""></option>
				<option value="1st">1st</option>
				<option value="2nd">2nd</option>
			</select>
			</div>
			<div class="input-group">
			<label>Year</label>
			<select name="year" id="year" >
				<option value=""></option>
				<option value="1st">1st</option>
				<option value="2nd">2nd</option>
			</select>
			</div>
			
			<p>
			<br>Upload Time Tables: <button class="btnn btn-success" onclick=" window.open('https://drive.google.com/drive/folders/1NQHHAYLz6t0Gvq4xZVnwynkXfAUPYWUx','_blank')"> Click Here </button>
			
			</p>
			<br>
			<br>
			<div class="input-group">
			<button type="submit" class="btnn" name="ttables_btn"> + Add Time Tables</button>
		</div>
		<a href="home.php">Back</a>
		
		
		</form>
	<br>
	<br>
	<link rel="stylesheet" type="text/css" href="../footer.css">
		<div class="footer">Copyright &copy; 2018-2019 Team Silverswords</div>
	</div>
	
</body>
</html>