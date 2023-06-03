<?php

$search_value = $_POST["searchh"];

$conn = mysqli_connect("localhost","root","","lms") or die("Connection Failed");
// OR fullname LIKE '%{$search_value}%'
$sql = "SELECT * FROM lms_issue_book WHERE book_id LIKE '%{$search_value}%' OR  user_id LIKE '%{$search_value}%'";
$result = mysqli_query($conn,$sql) or die("sql querey failed");
$output = " ";
if(mysqli_num_rows($result) > 0){
$output = '<table border = "1" width = "100%" >

<tr>

<th>Book Isbn Number</th>
<th>User Roll No</th>
<th>Issue Date</th>
<th>Expected Date Return</th>
<th>Late Return Fine</th>
<th>Status</th>
 
</tr>';

while($row = mysqli_fetch_assoc($result)){
$output .= "<tr><td>{$row["book_id"]}</td><td>{$row["user_id"]}</td><td>{$row["issue_date_time"]}</td><td>{$row["expected_return_date"]}</td><td>{$row["book_fines"]}</td><td>{$row["book_issue_status"]}</td></tr>"; 
}
$output .= "</thead> </table>";

mysqli_close($conn);

 echo $output;
}
else{
echo "<h2> No record Found </h2>";
}

?>