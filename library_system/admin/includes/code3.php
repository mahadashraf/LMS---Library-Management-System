<?php

$con = mysqli_connect("localhost","root","","lms") or die("Connection Failed");

if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['book_name']);
    $email = mysqli_real_escape_string($con, $_POST['book_author']);
    $phone = mysqli_real_escape_string($con, $_POST['book_category']);
    $name1 = mysqli_real_escape_string($con, $_POST['book_location_rack']);
    $email1 = mysqli_real_escape_string($con, $_POST['book_isbn_number']);
    $phone1 = mysqli_real_escape_string($con, $_POST['book_no_of_copy']);
    $name2 = mysqli_real_escape_string($con, $_POST['book_status']);
    $email2 = mysqli_real_escape_string($con, $_POST['added_on']);
    
    // $course = mysqli_real_escape_string($con, $_POST['course']);

    if($name == NULL || $email == NULL || $phone == NULL || $name1 == NULL || $email1 == NULL || $phone1 == NULL|| $name2 == NULL || $email2 == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO lms_book (book_name,book_author,book_category,book_location_rack,book_isbn_number,book_no_of_copy,book_status,added_on) VALUES ('$name','$email','$phone','$name1','$email1','$phone1','$name2','$email2')";
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

    $name = mysqli_real_escape_string($con, $_POST['book_name']);
    $email = mysqli_real_escape_string($con, $_POST['book_author']);
    $phone = mysqli_real_escape_string($con, $_POST['book_category']);
    $name1 = mysqli_real_escape_string($con, $_POST['book_location_rack']);
    $email1 = mysqli_real_escape_string($con, $_POST['book_isbn_number']);
    $phone1 = mysqli_real_escape_string($con, $_POST['book_no_of_copy']);
    $name2 = mysqli_real_escape_string($con, $_POST['book_status']);
    $email3 = mysqli_real_escape_string($con, $_POST['updated_on']);

    if($name == NULL || $email == NULL || $phone == NULL || $name1 == NULL || $email1 == NULL || $phone1 == NULL|| $name2 == NULL || $email3 == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE lms_book SET book_name='$name', book_author='$email', book_category='$phone', book_location_rack='$name1', book_isbn_number='$email1', book_no_of_copy='$phone1', book_status='$name2', updated_on='$email3' 
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

    $query = "SELECT * FROM lms_book WHERE id='$student_id'";
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