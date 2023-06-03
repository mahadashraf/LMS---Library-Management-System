<?php

$con = mysqli_connect("localhost","root","","lms") or die("Connection Failed");

if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['book_isbn_number']);
    $email = mysqli_real_escape_string($con, $_POST['user_roll_no']);
    $phone = mysqli_real_escape_string($con, $_POST['issue_date']);
    $name1 = mysqli_real_escape_string($con, $_POST['expected_date']);
    $name2 = mysqli_real_escape_string($con, $_POST['late_fine']);
    $email1 = mysqli_real_escape_string($con, $_POST['status']);
   
    
    // $course = mysqli_real_escape_string($con, $_POST['course']);

    if($name == NULL || $email == NULL || $phone == NULL || $name1 == NULL || $name2 == NULL|| $email1 == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO lms_issue_book (book_id,user_id,issue_date_time,expected_return_date,book_fines,book_issue_status) VALUES ('$name','$email','$phone','$name1','$name2','$email1')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['late_fine']);
    $email = mysqli_real_escape_string($con, $_POST['status']);
   

    if($name == NULL || $email == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE lms_issue_book SET book_fines='$name', book_issue_status='$email' 
                WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['student_id']))
{
    $student_id = mysqli_real_escape_string($con, $_GET['student_id']);

    $query = "SELECT * FROM lms_issue_book WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Student Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $query = "DELETE FROM lms_book WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>