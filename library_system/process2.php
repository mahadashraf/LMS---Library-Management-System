<?php
require_once('./config.php');
?>
<?php

if(isset($_POST)){

	$fullname 		= $_POST['fullname'];
	$username 		= $_POST['username'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	$password 		= $_POST['password'];
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    

		$sql = "INSERT INTO lms_adminn (fullname, username, email, phonenumber, password  ) VALUES(?,?,?,?,?)";
		$stmtinsert = $link->prepare($sql);
		$result = $stmtinsert->execute([$fullname, $username, $email, $phonenumber,$param_password ]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}