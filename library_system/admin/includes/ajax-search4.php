<?php

$search_value = $_POST["searchh"];

$conn = mysqli_connect("localhost","root","","lms") or die("Connection Failed");
// OR fullname LIKE '%{$search_value}%'
$sql = "SELECT * FROM lms_user WHERE fullname LIKE '%{$search_value}%' OR  username LIKE '%{$search_value}%'";
$result = mysqli_query($conn,$sql) or die("sql querey failed");
$output = " ";
if(mysqli_num_rows($result) > 0){
$output = '<table border = "1" width = "100%" >

<tr>

<th>Roll No</th>
<th>Full Name</th>
<th>User Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Department</th>
 
</tr>';

while($row = mysqli_fetch_assoc($result)){
$output .= "<tr><td>{$row["rollno"]}</td><td>{$row["fullname"]}</td><td>{$row["username"]}</td><td>{$row["email"]}</td><td>{$row["phonenumber"]}</td><td>{$row["department"]}</td></tr>"; 
}
$output .= "</thead> </table>";

mysqli_close($conn);

 echo $output;
}
else{
echo "<h2> No record Found </h2>";
}

?>