<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<link rel="stylesheet" type="text/css" href="forgot.css">

<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
<div class="container">
<h2>Reset Your Account Password</h2>
    <div class="regisFrm">
        <form action="userAccount.php" method="post">
            <input type="password" name="password" placeholder="PASSWORD" required="">
            <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required="">
            <div class="send-button">
                <input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
                <input type="submit" name="resetSubmit" value="RESET PASSWORD">
            </div>
			<br>
			<a href="login.php">Back</a>
        </form>
    </div>
</div>