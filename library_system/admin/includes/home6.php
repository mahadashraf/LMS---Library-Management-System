<?php
include './function.php';
include './dbconn.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>PHP CRUD using jquery ajax without page reload</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <style>
	#searchh{
      width: 300px;
      background-color: white;
      border: 2px solid black;
	  
    }
	#neww{
		display: flex;
	}
	#neww a{
		background-color: green	;
		width: 60px;
		height: 30px;
		margin-top: 10px;
		margin-left: 20px;
	}
</style>
</head>
<body>
<div class="container-fluid py-4" style="min-height: 700px;" style="width: 100%;">
	<h1>Issue Book Management</h1>
	
<!-- Add Student -->
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Issue Book</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveStudent">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

               
                <div class="mb-3">
                    <label for="">Book Isbn Number</label>
                    <input type="text" name="book_isbn_number" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">User Roll_NO</label>
                    <input type="text" name="user_roll_no" class="form-control" />
                </div>  
                <div class="mb-3">
                    <label for="">Issue Date</label>
                    <input type="datetime-local" name="issue_date" class="form-control" />
                </div>  
                <div class="mb-3">
                    <label for="">Book Expected Return Date</label>
                    <input type="datetime-local" name="expected_date" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Late Return Fine </label>
                    <input type="text" name="late_fine" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Status </label>
                    <input type="text" name="status" class="form-control" />
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Book</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Student Modal -->
<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateStudent">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="student_id" id="student_id" >

                <div class="mb-3">
                    <label for="">Late Return Fines</label>
                    <input type="text" name="late_fine" id="late_fine" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <input type="text" name="status" id="status" class="form-control" />
                </div>  
                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Book</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Student Modal -->
<div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Book</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <div class="mb-3">
                    <label for="">Book ISBN Number</label>
                    <p id="view_isbn_number" class="form-control"></p>
                </div>

                <div class="mb-3">
                    <label for="">User Roll No</label>
                    <p id="view_roll_no" class="form-control"></p>
                </div>
           
                <div class="mb-3">
                    <label for="">Book Issue Date</label>
                    <p id="view_issue_date" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Book Issue Status</label>
                    <p id="view_status" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Total Fines</label>
                    <p id="view_fines" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Issue Book Managment 
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                          Issue Book
                        </button>
                    </h4>
                </div>
                <div class="card-body">
				<input class="form-control form-control-lg form-control-borderless" type="text" id="searchh" autocomplete="off" placeholder="Search for User Id">
                <br>    
				<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th>Book Isbn Number</th>
                                <th>User Roll No</th>
                                <th>Issue Date</th>
                                <th>Expected Return Date</th>
                                <th>Return Date</th>
                                <th>Late Return fees</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require './dbconn.php';

                            $query = "SELECT * FROM lms_issue_book";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <tr>
                                        <!-- <td><?= $student['id'] ?></td> -->
                                        <td><?= $student['book_id'] ?></td>
                                        <td><?= $student['user_id'] ?></td>
                                        <td><?= $student['issue_date_time'] ?></td>
                                        <td><?= $student['expected_return_date'] ?></td>
                                        <td><?= $student['return_date_time'] ?></td>
                                        <td><?= $student['book_fines'] ?></td>
                                        <td><?= $student['book_issue_status'] ?></td>
                                        <td>
                                        <button type="button" value="<?=$student['id'];?>" class="editStudentBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$student['id'];?>" class="viewStudentBtn btn btn-info btn-sm">View</button>
                                          
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
    <script src="https://code1.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).on('submit', '#saveStudent', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_student", true);

            $.ajax({
                type: "POST",
                url: "includes/code5.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        
                        $('#saveStudent')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
						
						$('#myTable').load("includes/home6.php" + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editStudentBtn', function () {

            var student_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "includes/code5.php?student_id=" + student_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#late_fine').val(res.data.book_fines);
                        $('#status').val(res.data.book_issue_status);
                        

                        $('#studentEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updateStudent', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_student", true);

            $.ajax({
                type: "POST",
                url: "includes/code5.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#studentEditModal').modal('hide');
                        $('#updateStudent')[0].reset();

                        $('#myTable').load("includes/home6.php" + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewStudentBtn', function () {

            var student_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "includes/code5.php?student_id=" + student_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_isbn_number').text(res.data.book_id);
                        $('#view_roll_no').text(res.data.user_id);
                        $('#view_issue_date').text(res.data.issue_date_time);
                        $('#view_status').text(res.data.book_issue_status);
                        $('#view_fines').text(res.data.book_fines);

                        $('#studentViewModal').modal('show');
                    }
                }
            });
        });

       

		$(document).ready(function(){
			// live search
$("#searchh").on("keyup",function(){

var search_term = $(this).val();

$.ajax({

  url: "includes/ajax-search5.php",
  type: "POST",
  data: {searchh: search_term},
  success: function(data) {
	$("#myTable").html(data);
  }

});

});
		});

    </script>

</body>
</html>