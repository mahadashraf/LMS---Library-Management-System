<?php

$search_value = $_POST["searchh"];

$conn = mysqli_connect("localhost","root","","lms") or die("Connection Failed");
// OR fullname LIKE '%{$search_value}%'
$sql = "SELECT * FROM lms_author WHERE author_name LIKE '%{$search_value}%' ";
$result = mysqli_query($conn,$sql) or die("sql querey failed");
$output = " ";
if(mysqli_num_rows($result) > 0){
$output = '<table border = "1" width = "100%" >

<tr>

<th>Author Name</th>
<th>Author Status</th>
<th>Created On</th>
<th>Updated On</th>

 
</tr>';

while($row = mysqli_fetch_assoc($result)){
$output .= "<tr><td>{$row["Author_name"]}</td><td>{$row["Author_status"]}</td><td>{$row["created_on"]}</td><td>{$row["updated_on"]}</td></tr>"; 
}
$output .= "</thead> </table>";

mysqli_close($conn);

 echo $output;
}
else{
echo "<h2> No record Found </h2>";
}

?>