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
	<h1>Book Management</h1>
	
<!-- Add Student -->
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveStudent">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

               
            <div class="mb-3">
                    <label for="">Book Name</label>
                    <input type="text" name="book_name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Select Author</label>
                    <select name="book_author" id="book_author" class="form-control">
                    <?php echo fill_author($con); ?>
        					</select>
                </div>
                <div class="mb-3">
                    <label for="">Select Category</label>
                    <select name="book_category" id="book_category" class="form-control">
        						<?php echo fill_category($con); ?>
        					</select>
                </div>
                <div class="mb-3">
                    <label for="">Select Location Rack</label>
                    <select name="book_location_rack" id="book_location_rack" class="form-control">
        						<?php echo fill_location_rack($con); ?>
        					</select>
                </div>
                <div class="mb-3">
                    <label for="">Book ISBN Number</label>
                    <input type="text" name="book_isbn_number" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">No. of Copy</label>
                    <input type="text" name="book_no_of_copy" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Book Status</label>
                    <input type="text" name="book_status" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Added On</label>
                    <input type="datetime-local" name="added_on" class="form-control" />
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
                    <label for="">Book Name</label>
                    <input type="text" name="book_name" id="book_name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Select Author</label>
                    <select name="book_author" id="book_author"  class="form-control">
                    <?php echo fill_author($con); ?>
        					</select>
                </div>
                <div class="mb-3">
                    <label for="">Select Category</label>
                    <select name="book_category" id="book_category" class="form-control">
        						<?php echo fill_category($con); ?>
        					</select>
                </div>
                <div class="mb-3">
                    <label for="">Select Location Rack</label>
                    <select name="book_location_rack" id="book_location_rack" class="form-control">
        						<?php echo fill_location_rack($con); ?>
        					</select>
                </div>
                <div class="mb-3">
                    <label for="">Book ISBN Number</label>
                    <input type="text" name="book_isbn_number" id="book_isbn_number" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">No. of Copy</label>
                    <input type="text" name="book_no_of_copy" id="book_no_of_copy" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Book Status</label>
                    <input type="text" name="book_status" id="book_status" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Updated On</label>
                    <input type="datetime-local" name="updated_on" id="updated_on" class="form-control" />
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
                    <label for="">Book Name</label>
                    <p id="view_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Select Author</label>
                    <p id="view_author" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Select Category</label>
                    <p id="view_category" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Select Location Rack</label>
                    <p id="view_location_rack" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Book ISBN Number</label>
                    <p id="view_isbn_number" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">No. of Copy</label>
                    <p id="view_no_of_copy" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Book Status</label>
                    <p id="view_status" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Added On</label>
                    <p id="view_added_on" class="form-control"></p>
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
                    <h4>Book Managment 
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                            Add Book
                        </button>
                    </h4>
                </div>
                <div class="card-body">
				<input class="form-control form-control-lg form-control-borderless" type="text" id="searchh" autocomplete="off" placeholder="Search for User Id">
                <br>    
				<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th>Book Name</th>
                                <th>ISBN NO</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Location Rack</th>
                                <th>No Of Copy</th>
                                <th>Status</th>
                                <th>Added On</th>
                                <th>Updated On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require './dbconn.php';

                            $query = "SELECT * FROM lms_book";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <tr>
                                        <!-- <td><?= $student['id'] ?></td> -->
                                        <td><?= $student['book_name'] ?></td>
                                        <td><?= $student['book_isbn_number'] ?></td>
                                        <td><?= $student['book_category'] ?></td>
                                        <td><?= $student['book_author'] ?></td>
                                        <td><?= $student['book_location_rack'] ?></td>
                                        <td><?= $student['book_no_of_copy'] ?></td>
                                        <td><?= $student['book_status'] ?></td>
                                        <td><?= $student['added_on'] ?></td>
                                        <td><?= $student['updated_on'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$student['id'];?>" class="viewStudentBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$student['id'];?>" class="editStudentBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$student['id'];?>" class="deleteStudentBtn btn btn-danger btn-sm">Delete</button>
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
                url: "includes/code3.php",
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
						
						$('#myTable').load("includes/home4.php" + " #myTable");

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
                url: "includes/code3.php?student_id=" + student_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#student_id').val(res.data.id);
                        $('#book_name').val(res.data.book_name);
                        $('#book_author').val(res.data.book_author);
                        $('#book_category').val(res.data.book_category);
                        $('#book_location_rack').val(res.data.book_location_rack);
                        $('#book_isbn_number').val(res.data.book_isbn_number);
                        $('#book_no_of_copy').val(res.data.book_no_of_copy);
                        $('#book_status').val(res.data.book_status);
                        $('#updated_on').val(res.data.updated_on);

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
                url: "includes/code3.php",
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

                        $('#myTable').load("includes/home4.php" + " #myTable");

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
                url: "includes/code3.php?student_id=" + student_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_name').text(res.data.book_name);
                        $('#view_author').text(res.data.book_author);
                        $('#view_category').text(res.data.book_category);
                        $('#view_location_rack').text(res.data.book_location_rack);
                        $('#view_isbn_number').text(res.data.book_isbn_number);
                        $('#view_no_of_copy').text(res.data.book_no_of_copy);
                        $('#view_status').text(res.data.book_status);
                        $('#view_added_on').text(res.data.added_on);
                        

                        $('#studentViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteStudentBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var student_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "includes/code3.php",
                    data: {
                        'delete_student': true,
                        'student_id': student_id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load("includes/home4.php" + " #myTable");
                        }
                    }
                });
            }
        });

		$(document).ready(function(){
			// live search
$("#searchh").on("keyup",function(){

var search_term = $(this).val();

$.ajax({

  url: "includes/ajax-search3.php",
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