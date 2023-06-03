<?php

$username = "root";
$password = "";
try {
$conn = new PDO("mysql:host=localhost;dbname=test2", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}





$User_id = $_POST["User_id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$password = $_POST["password"];



try {

$conn->query("insert into userr
(	User_id,first_name,last_name,password) values
('$User_id','$first_name','$last_name','$password')" );


}

catch(Exception $e){
    echo $e->getMessage();
    die;
}


echo '<br>';
echo 'your form has been submitted successfully';



?>