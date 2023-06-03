<?php

$conn = mysqli_connect("localhost","root","","lms") or die("Connection Failed");

$sql = "SELECT * FROM userr";
$result = mysqli_query($conn,$sql) or die("sql querey failed");
$output = " ";
if(mysqli_num_rows($result) > 0){
$output = '<table border = "1" width = "100%" >

<tr>
<th>Full Name</th>
<th>User Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Password</th>
</tr>';

while($row = mysqli_fetch_assoc($result)){
$output .= "<tr><td>{$row["fullname"]}</td><td>{$row["username"]}</td><td>{$row["email"]}</td><td>{$row["phonenumber"]}</td><td>{$row["password"]}</td></tr>"; 
}
$output .= "</thead> </table>";

mysqli_close($conn);

 echo $output;
}
else{
echo "<h2> No record Found </h2>";
}

?>
