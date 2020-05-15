<?php 
include('functions.php');


?>
<!DOCTYPE html>
<html>
<head>
	
	<title>ForgotPassword</title>
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
<link rel="stylesheet" type="text/css" href="forgot.css">

<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
<div class="container">
<h2>Enter the Email of Your Account to Show your Password</h2>
    <div class="regisFrm">
        <form action="forgotPassword.php" method="post">
            <input type="email" name="email" placeholder="EMAIL" required="">
            <div class="send-button">
                <input type="submit" name="forgotSubmit" value="CONTINUE">
            </div>
			<br>
			<br>
			<?php 
			if (isset($_POST['forgotSubmit'])) {

			$check 		 =  $_POST['email'];
			$sql = mysqli_query($db, "SELECT * FROM users WHERE email LIKE '%" . $check . "%'");
			
			while($row = mysqli_fetch_array($sql)) 
			echo "ID :{$row[0]}  <br> ".
				"User Name : {$row[1]} <br> ".
				"Email : {$row[2]} <br> ".
				"User Type : {$row[3]} <br> ".
				"Password :" .base64_decode($row[4]);
	
			mysqli_close($db);

			}
			
			?>
			<br>
			<br>
			<a href="login.php">Back</a>
        </form>
    </div>
</div>