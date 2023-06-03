<?php
require_once('./config.php');
?>
<?php

if(isset($_POST)){

	$rollno 		= $_POST['rollno'];
	$fullname 		= $_POST['fullname'];
	$username 		= $_POST['username'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	$password 		= $_POST['password'];
    $department	= $_POST['department'];
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    

		$sql = "INSERT INTO lms_user (rollno,fullname, username, email, phonenumber, password, department  ) VALUES(?,?,?,?,?,?,?)";
		$stmtinsert = $link->prepare($sql);
		$result = $stmtinsert->execute([$rollno,$fullname, $username, $email, $phonenumber,$param_password, $department ]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}