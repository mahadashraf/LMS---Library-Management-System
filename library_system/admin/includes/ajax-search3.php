<?php

$search_value = $_POST["searchh"];

$conn = mysqli_connect("localhost","root","","lms") or die("Connection Failed");
// OR fullname LIKE '%{$search_value}%'
$sql = "SELECT * FROM lms_book WHERE book_name LIKE '%{$search_value}%' OR  book_isbn_number LIKE '%{$search_value}%'";
$result = mysqli_query($conn,$sql) or die("sql querey failed");
$output = " ";
if(mysqli_num_rows($result) > 0){
$output = '<table border = "1" width = "100%" >

<tr>

<th>Book Name</th>
<th>ISBN Number</th>
<th>Category </th>
<th>Author</th>
<th>Location Rack</th>
<th>No of Copy</th>
<th>Status </th>
<th>Added On</th>
<th>Updated On</th>

 
</tr>';

while($row = mysqli_fetch_assoc($result)){
$output .= "<tr><td>{$row["book_name"]}</td><td>{$row["book_isbn_number"]}</td><td>{$row["book_category"]}</td><td>{$row["book_author"]}</td><td>{$row["book_location_rack"]}</td><td>{$row["book_no_of_copy"]}</td><td>{$row["book_status"]}</td><td>{$row["added_on"]}</td><td>{$row["updated_on"]}</td></tr>"; 
}
$output .= "</thead> </table>";

mysqli_close($conn);

 echo $output;
}
else{
echo "<h2> No record Found </h2>";
}

?>