<?php
function get_one_day_fines($connect)
{
	$output = 0;
	$query = "
	SELECT library_one_day_fine FROM lms_setting 
	LIMIT 1
	";
	$result = $connect->query($query);
	foreach($result as $row)
	{
		$output = $row["library_one_day_fine"];
	}
	return $output;
}

function Count_total_issue_book_number($connect)
{
	$total = 0;

	$query = "SELECT COUNT(issue_book_id) AS Total FROM lms_issue_book";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function Count_total_returned_book_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(issue_book_id) AS Total FROM lms_issue_book 
	WHERE book_issue_status = 'Return'
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function Count_total_not_returned_book_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(issue_book_id) AS Total FROM lms_issue_book 
	WHERE book_issue_status = 'Not Return'
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function Count_total_fines_received($connect)
{
	$total = 0;

	$query = "
	SELECT SUM(book_fines) AS Total FROM lms_issue_book 
	WHERE book_issue_status = 'Return'
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function Count_total_book_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(book_id) AS Total FROM lms_book 
	WHERE book_status = 'Enable'
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function Count_total_author_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(author_id) AS Total FROM lms_author 
	WHERE author_status = 'Enable'
	";

	$result  = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function Count_total_category_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(category_id) AS Total FROM lms_category 
	WHERE category_status = 'Enable'
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}
	return $total;
}

function Count_total_location_rack_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(location_rack_id) AS Total FROM lms_location_rack 
	WHERE location_rack_status = 'Enable'
	";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function fill_author($con)
{
	$query = "
	SELECT Author_name FROM lms_Author 
	WHERE Author_status = 'Enable' 
	ORDER BY Author_name ASC
	";

	$result = $con->query($query);

	$output = '<option value="">Select Author</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["Author_name"].'">'.$row["Author_name"].'</option>';
	}

	return $output;
}


function convert_data($string, $action = 'encrypt')
{
	$encrypt_method = "AES-256-CBC";
	$secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
	$secret_iv = '5fgf5HJ5g27'; // user define secret key
	$key = hash('sha256', $secret_key);
	$iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
	if ($action == 'encrypt') 
	{
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	    $output = base64_encode($output);
	} 
	else if ($action == 'decrypt') 
	{
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}
	return $output;
}



function fill_category($con)
{
	$query = "
	SELECT Category_name FROM lms_category 
	WHERE Category_status = 'Enable' 
	ORDER BY Category_name ASC
	";

	$result = $con->query($query);

	$output = '<option value="">Select Category</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["Category_name"].'">'.$row["Category_name"].'</option>';
	}

	return $output;
}

function fill_location_rack($con)
{
	$query = "
	SELECT location_rack_name FROM lms_location_rack 
	WHERE location_rack_status = 'Enable' 
	ORDER BY location_rack_name ASC
	";

	$result = $con->query($query);

	$output = '<option value="">Select Location Rack</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["location_rack_name"].'">'.$row["location_rack_name"].'</option>';
	}

	return $output;
}



	function fill_book($con)
	{
			$query = "
			SELECT book_isbn_number FROM lms_book 
			WHERE book_status = 'enable'
			";
			$output = '<option value="">Book Isbn Number</option>';
			$result = $con->query($query);
			foreach($result as $row)
			{
				$output .= '<option value="'.$row["book_isbn_number"].'">'.$row["book_isbn_number"].'</option>';
			}
		
			return $output;
	}
?>

