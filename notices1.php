<?php 
	include('functions.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
	}
		
	if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Notices</title>
	<link rel="stylesheet" type="text/css" href="form.css">
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
		<h2>Student - View - Notices</h2>
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
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; 
					</small>

				<?php endif ?>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="topnav" id="myTopnav">
		<link rel="stylesheet" type="text/css" href="dropbtnstyle.css">
			<a href="index.php" class="active">Home</a>
		
			<div class="dropdown">
				<button class="dropbtn">View 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="lecture_notes1.php">View Lecture Notes</a>
					<a href="time_tables1.php">View Time Tables</a>
					<a href="notices1.php">View Notices</a>
					<a href="exam_details1.php">View Exam Details</a>
				</div>
			</div> 

			<a href="about11.php">About</a>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="btn.css">
			<div class="icon-bar">
			<a class="active" href="#"><i class="fa fa-cog fa-spin"></i></a> 

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
			<form method="post" action="notices1.php">
		
		<?php echo display_error(); ?>
		<link rel="stylesheet" type="text/css" href="form.css">
			
			<p>
			<br>View Notices: 
			</p>
			<br>
			<div class="input-group">
			<button class="btnn btn-success" onclick=" window.open('https://drive.google.com/open?id=1xCFh4_Gtdcvnog83wuxQLAs96hilYOYi','_blank')"> Go >>> </button>
		</div>
		<br>
		<a href="index.php">Back</a>
		
		
		</form>
	<br>
	<br>
	<link rel="stylesheet" type="text/css" href="footer.css">
		<div class="footer">Copyright &copy; 2018-2019 Team Silverswords</div>
	</div>
	
</body>
</html>