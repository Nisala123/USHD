<?php include('forgotPassword.php', 'function.php')
//$db = mysqli_connect('localhost', 'root', '', 'multi_login');
//include('forgotPassword.php')
$check 		 =  $_POST['email'];
$sql = mysqli_query($db, "SELECT * FROM users WHERE email LIKE '%" . $check . "%'");
//$result = mysqli_query($db, $sql);


   /*elseif(! $sql ) {
      die('Could not get data: ' . mysqli_error());
   }*/
   
   while($row = mysqli_fetch_array($sql)) 
      echo "id :{$row[0]}  <br> ".
         "username : {$row[1]} <br> ".
         "email : {$row[2]} <br> ".
         "user_type : {$row[3]} <br> ".
		 "password : {$row[4]} <br> ".
	
	
	
   
   //mysqli_free_result($sql);
   //echo "Fetched data successfully\n";
   
   mysqli_close($db);
//echo base64_encode($password);
}
?>